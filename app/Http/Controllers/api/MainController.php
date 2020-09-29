<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\Region;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Contact;
use App\Models\PaymentMethod;
use App\Models\Restaurant;
use App\Models\Setting;
use Mail;
use App\Mail\NewOrder;
use App\Mail\AcceptedOrder;
use App\Mail\RejectedOrder;
use App\Mail\DeclinedOrder;


class MainController extends Controller 
{
  //////////////////////////////////////////////////////////////////////////// start general cycle

  public function cities(){

    $cities = City::all();
      return responseJson(1,'success', $cities);
  }
  
  public function regions(Request $request){

    $regions = Region::where(function($query) use($request){
      if($request->has('city_id')){
          $query->where('city_id',$request->city_id);
      }
    })->get();
    return responseJson(1 ,'success', $regions);
  }

  public function categories(Request $request){

      $categories = Category::all();
      return responseJson(1, 'success', $categories);
  }

  public function comments(Request $request){

      $comments = Comment::all();
      return responseJson(1, 'success', $comments);
  } 
  
  public function contactUs(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'name' =>'required',
      'email' =>'required',
      'phone'  =>'required',
      'type_of_message' =>'required',
      'message' =>'required',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $contact = Contact::create($request->all());
    return responseJson(1, 'success', $contact );

  }

  public function settings()
    {
      $settings = Setting::all();
      return responseJson(1,'success',$settings);
    }

  public function paymentMethod()
  {
    $payment_method = PaymentMethod::all();
    return responseJson(1,'success',$payment_method);
  }

  //////////////////////////////////////////////////////////////////////////// end general cycle


  //////////////////////////////////////////////////////////////////////////// start restaurant product cycle

  public function products(){

    $products = Product::latest()->first();
      return responseJson(1, 'success', $products);
  }


  public function product_create(Request $request){

      $validator = validator()->make($request->all(),[

          'photo' => 'required',
          'title' => 'required',
          'content' => 'required',
          'price' => 'required',
          'restaurant_id' => 'required'
      ]);

      if($validator->fails()){

          return responseJson(0, $validator->errors->first());

      }

      $products = Product::create($request->all());
      if ($request->hasFile('photo')) {
        $path = public_path();
        $destinationPath = $path . '/uploads/products/'; // upload path
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension(); // getting image extension
        $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
        $photo->move($destinationPath, $name); // uploading file to given path
        $products->photo = 'uploads/products/' . $name;
      }
      $products->save();

      return responseJson(1, 'تم الاضافه بنجاح');

  }

  public function productsDetails(Request $request)
  {
      $products = Product::find($request->product_id);

      if(!$products){
          return responseJson(0,'not post found');
        }else{
          return responseJson(1 ,'success' , $products);
      }

  }

  public function productEdit(Request $request)
  {

    $products = Product::where('id',$request->product_id)->first();
    
    if(!$products){
          return responseJson(0,'not post found');
      }else{
          $products->update($request->all());
          return responseJson(1 ,'success' , $products);
      }
  }

  public function productDelete(Request $request)
  {

    $products = Product::where('id',$request->product_id)->first();

    if(!$products){
          return responseJson(0,'not post found');
      }else{
          $products->delete();
          return responseJson(1 ,'تم الحذف بنجاح');
      }
  }

  //////////////////////////////////////////////////////////////////////////// end restaurant product cycle


  //////////////////////////////////////////////////////////////////////////// start restaurant offer cycle

  public function offers_create(Request $request){

      $validator = validator()->make($request->all(),[

          'photo' => 'required',
          'title' => 'required',
          'content' => 'required',
          'from' => 'required',
          'to' => 'required'
      ]);

      if($validator->fails()){

          return responseJson(0, $validator->errors->first());

      }

      $offer = Offer::create($request->all());
      if ($request->hasFile('photo')) {
        $path = public_path();
        $destinationPath = $path . '/uploads/offers/'; // upload path
        $photo = $request->file('photo');
        $extension = $photo->getClientOriginalExtension(); // getting image extension
        $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
        $photo->move($destinationPath, $name); // uploading file to given path
        $offer->photo = 'uploads/offers/' . $name;
      }
      $offer->save();

      return responseJson(1, 'تم الاضافه بنجاح');

  }


  public function offers(Request $request){

      $offers = Offer::latest()->paginate(20);
      return responseJson(1, 'success', $offers);
  }


  public function offerDetails(Request $request)
  {
      $offer = Offer::find($request->offer_id);

      if(!$offer){
          return responseJson(0,'not post found');
        }else{
          return responseJson(1 ,'success' , $offer);
      }

  }

  public function offerEdit(Request $request)
  {

    $offer = Offer::where('id',$request->offer_id)->first();

    if(!$offer){
          return responseJson(0,'not post found');
      }else{
          $offer->update($request->all());
          return responseJson(1, 'success', $offer);
      }
    
  }

  public function offerDelete(Request $request)
  {

    $offer = Offer::where('id',$request->offer_id)->first();

    if(!$offer){
          return responseJson(0,'not post found');
      }else{
          $offer->delete();
          return responseJson(1 ,'تم الحذف بنجاح');
      }
    
  }

  //////////////////////////////////////////////////////////////////////////// end restaurant offer cycle

  /////////////////////////////////////////////////////////////////////////// client order cycle

  public function newOrder(Request $request){

    $validator = validator()->make($request->all(), [

      'restaurant_id' =>'required|exists:restaurants,id',
      'products.*.product_id' =>'required|exists:products,id',
      'products.*.quantity' =>'required',
      'address' =>'required',
      'payment_method_id' =>'required|exists:payment_methods,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $restaurant = Restaurant::find($request->restaurant_id);

    if($restaurant->state == 'close')
    {
      return responseJson(0, 'هذا المطعم مغلق');
    }

    $order = $request->user()->orders()->create([

      'restaurant_id' => $request->restaurant_id,
      'note' => $request->note,
      'state' =>'pending',
      'address' => $request->address,
      'payment_method_id' => $request->payment_method_id,

    ]);

    $cost = 0;
    $delivery_cost = $restaurant->delivery_cost;

    foreach ($request->products as $p) {

      $product = Product::find($p['product_id']);
      $readyProduct = [
        $p['product_id'] => [
          'quantity' => $p['quantity'],
          'price' => $product->price,
          'note' => (isset($p['note'])) ? $p['note'] : '',
        ]
      ];
      $order->products()->attach($readyProduct);
      // dd($product->price);
      $order->update(['price' => $product->price]);
      // $up = $order->update($readyProduct);
      $cost += ($product->price * $p['quantity']);

    }

    if($cost >= $restaurant->minimum_order)
    {
      $total = $cost + $delivery_cost;
      $commission = Setting::first()->commission * $cost;
      $net = $total - $commission;

      $update = $order->update([
        'cost' => $cost,
        'delivery_cost' => $delivery_cost,
        'total_cost' => $total,
        'commission' => $commission,
        'net' => $net,
        'quantity' => $p['quantity'],

      ]);
      
    }else{
      $order->delete();
      return responseJson(0,'لايمكن أن يكون الطلب أقل من'.$restaurant->minimum_order.'جنيه');
    }

    $notification = $restaurant->notifications()->create(
      [
        'title' => 'يوجد طلب جديد',
        'content' => $request->user()->name .'لديك طلب جديد من العميل',
        'notifiable_id' => $restaurant->id,
        'notifiable_type' => 'restaurant',
      ]
    );

    $payment = PaymentMethod::where('id',$request->payment_method_id)->first();
    
    $or = $order->fresh()->load('products');
    //$or = Order::where('id',$order->id)->first();
    //$tokens = $restaurant->tokens()->where('token','!=', null)->pluck('token')->toArray();

    $data = [
      'client_Name' => $request->user()->name,
      'address' => $request->address,
      'Quantity' => $p['quantity'],
      'The_Payment' => $payment->name,
    ];  

    if ($restaurant->email)
    {
      Mail::to($restaurant->email)
        ->bcc("amrhuusien99@gmail.com")
        ->send(new NewOrder($data));

      return responseJson(1, 'تم الطلب بنجاح', $or);

    }
  }

  public function orderDetails(Request $request)
  {

    $order = Order::where('id',$request->order_id)->first();

    if(!$order){

      return responseJson(0,'not post found');

    }else{

      return responseJson(1, 'success', $order);

    }
  }

  public function myOrders(Request $request)
  {
    $validator = validator()->make($request->all(),[

      'client_id' => 'required|exists:clients,id'

    ]);

    if($validator->fails()){

      return responseJson(0, $validator->errors()->first());

    }

    $orders = $request->user()->orders()->where('client_id',$request->client_id)->first();
    
    if(!$orders){

      return responseJson(0,'not Oredr found');

    }else{

      return responseJson(1, 'success', $orders);

    }

  }

  public function clientconfirmOrder(Request $request)
  {
        $validator = validator()->make($request->all(), [

          'order_id' => 'required',

        ]);

        if($validator->fails())
        {
          return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $order = Order::where('id',$request->order_id)->first();
        $order->update(['state' => 'complete']);
        $client = $order->client()->first();
        $restaurant = $order->restaurant()->first();
        $notification = $restaurant->notifications()->create(
            [
            'title'=>'تم استلام الطلب',
            'content'=>$client->name .'تم استلام العميل للطلب',
            'notifiable_id' => $client->id,
            'notifiable_type' => 'client',
            ]
        );
        // dd($notification);
        // dd($notification);
        $data = [
            'Client_Name' => $client->name,
            'Phone' => $client->phone,
            'Order_id' => $order->id,
            'Title' => $order->products()->first()->title,
            'Address' => $order->address,
            
        ]; 
        //dd($data);

        if ($restaurant->email)
        {
            Mail::to($restaurant->email)
            ->bcc("amrhuusien99@gmail.com")
            ->send(new ConfirmdOrder($data));
            flash()->success('Success');
            return responseJson(1, 'success', $data);


        }

}

  public function clientDeclinedOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'order_id' => 'required',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $order = Order::where('id',$request->order_id)->first();
    $order->update(['state' => 'declined']);
    $restaurant = $order->restaurant()->first();
    $notification = $restaurant->notifications()->create(
      [
        'title'=>'لقد تم رفض الطلب من جانب العميل',
        'content'=>$request->user()->name .'تم رفض الطلب من عميل',
      ]
    );

    $data = [
      'Client_Name' => $request->user()->name,
      'Order_id' => $request->order_id,
      'Title' => $order->products()->first()->title,
      'Content' => $order->products()->first()->content,
      'Address' => $order->address,
      
    ]; 
    //dd($data);

    if ($restaurant->email)
    {
      Mail::to($restaurant->email)
        ->bcc("amrhuusien99@gmail.com")
        ->send(new DeclinedOrder($data));

      return responseJson(1, 'تم رفض الطلب من جانب العميل ', $data);

    }

  }


  /////////////////////////////////////////////////////////////////////////// client order cycle


  /////////////////////////////////////////////////////////////////////////// restaurant order cycle

  
//  public function orders(){
//    $order = Order::latest()->paginate(20);
//    return responseJson(1,'success', $order);
//  }

  public function ratingOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'state' => 'required',
      'restaurant_id' => 'required|exists:restaurants,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first()); 
    }
    
    //dd($request->user()->first()->id);
    //$restaurant = $request->user()->orders()->find('restaurant_id',$request->user()->id)->first();


    $restaurant = Order::where('restaurant_id',$request->restaurant_id)->first();

    //dd($restaurant);

    if($restaurant){

      if($request->state == 'accepted')
      {
        $orders = Order::where('state','accepted')->get();

          return responseJson(1, 'success', $orders );
      }

      if($request->state == 'delivered')
      {
        $delivery = Order::where('state','delivered')->get();

          return responseJson(1, 'success', $delivery );
      }

      if($request->state == 'rejected')
      {
        $rejected = Order::where('state','rejected')->get();

          return responseJson(1, 'success', $rejected );
      }

      if($request->state == 'declined')
      {
        $declined = Order::where('state','declined')->get();

          return responseJson(1, 'success', $declined );
        }

    }else{
      return responseJson(0, 'خطأ');
    }

    //  if($request->state == 'delivered' || $request->state == 'rejected' || $request->state == 'declined' )
    //  {
    //    $orders = Order::where('state','delivered')->orWhere('state','rejected')->orWhere('state','declined')->get();

    //      return responseJson(1, 'success', $orders );
    //  }
  }   
    
  public function restaurantAcceptedOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'order_id' => 'required|exists:orders,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $order = Order::where('id',$request->order_id)->first();
    $order->update(['state' => 'accepted']);
    $res = $order->restaurant()->first();
    $notification = $res->notifications()->create(
      [
        'title'=>'تم قبول الطلب',
        'content'=>$res->name .'تم قبول الطلب من مطعم  ',
        'notifiable_id' => $res->id,
        'notifiable_type' => 'restaurant',
      ]
    );

    $or = Order::where('id',$request->order_id)->first();
    
    $data = [
      'Restaurant_Name' => $res->name,
      'Title' => $or->products()->first()->title,
      'Content' => $or->products()->first()->content,
      'Delivery_Cost' => $or->first()->delivery_cost,
      'Totel_Cost' => $or->total_cost,

    ]; 
    //dd($data);

    $client = $or->client()->first(); 

    if ($client->email)
    {
      Mail::to($client->email)
        ->bcc("amrhuusien99@gmail.com")
        ->send(new AcceptedOrder($data));

      return responseJson(1, 'تم القبول بنجاح', $data);

    }
      
    //  $tokens = $client->tokens()->where('token','!=', null)->pluck('token')->toArray();
    //  if (count($tokens))
    //  {
    //   $title = $notification->title;
    //   $body = $notification->content;
    //   $data =[
    //     'order'=> $order
    //   ];
    //   $send = notifyByFirebase($title,$body,$tokens,$data);
    //  }

  }

  public function restaurantRejectedOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'order_id'               =>'required|exists:orders,id',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $order = Order::where('id',$request->order_id)->first();
    $order->update(['state' => 'rejected']);
    $client = $order->restaurant()->first();
    $notification = $client->notifications()->create(
      [
        'title'=>'تم الغاء الطلب',
        'content'=>$request->user()->name .'تم الغاء الطلب من مطعم  ',
      ]
    );

    $data =[
      'content'=>$request->user()->name .'تم الغاء الطلب من مطعم  ',
    ];

    $client = $order->client()->first();

    if ($client->email)
    {
      Mail::to($client->email)
        ->bcc("amrhuusien99@gmail.com")
        ->send(new RejectedOrder($data));

      return responseJson(1, 'تم الغاء الطلب بنجاح', $data);
    }
  }
  
  public function restaurantConfirmOrder(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'order_id'               =>'required',

    ]);

    if($validator->fails())
    {
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    $order = Order::where('id',$request->order_id)->first();
    $order->update(['state' => 'delivered']);

    return responseJson(1, 'success', $order );

  }



}