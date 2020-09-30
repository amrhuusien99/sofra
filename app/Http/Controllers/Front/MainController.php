<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Product;
use App\Models\Offer;
use App\Models\Client;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\PaymentMethod;
use Mail;
use App\Mail\NewOrder;
use App\Mail\AcceptedOrder;
use App\Mail\RejectedOrder;
use App\Mail\DeclinedOrder;
use App\Mail\ConfirmdOrder;


class MainController extends Controller
{
    public function index(){
        $restaurants = Restaurant::latest()->paginate(20);
        return view('front.home',compact('restaurants'));
    }
 

/////////////////////////////////////////////////////////////////////////////////// start cycle contact

    public function contact(){
        return view('front.contact');
    }


    public function contact_save(Request $request){

        $rules = [
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    		'message' => 'required',
    		'type_of_message' => 'required'
    	];
    	$messages = [
    		'name.required' => 'The Name Is Required',
    		'email.required' => 'The Email Is Required',
    		'phone.required' => 'The Phone Is Required',
    		'message.required' => 'The Message Is Required',
    		'type_of_message.required' => 'The Type Of Message Is Required'
    	];
        $this->validate($request, $rules, $messages);

        $client = contact::create($request->all());
        flash()->success("Success");
        return back();
        
    }

///////////////////////////////////////////////////////////////////////////////////////////// end cycle contact

////////////////////////////////////////////////////////////////////////////////////////////// start cycle product

    public function addProduct(){
        return view('front.addproduct');
    }


    public function addProductSave(Request $request){

        $rules = [
    		'photo' => 'required',
    		'title' => 'required',
    		'content' => 'required',
    		'price' => 'required'
    	];
    	$messages = [
    		'photo.required' => 'The Photo Is Required',
    		'title.required' => 'The Title Is Required',
    		'content.required' => 'The Content Is Required',
    		'price.required' => 'The Price Is Required'
    	];
        $this->validate($request, $rules, $messages);

        $products = Product::create($request->all());
        $products->restaurant_id = $request->id;
        $products->price_offer = $request->price_offer;
        $products->processing_time = $request->processing_time;
        $products->save();
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/front/uploads/products/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $products->photo = 'front/uploads/products/' . $name;
            $products->save();
          }
        flash()->success("Success");
        return back();

    }

    
    public function restaurantProducts(Request $request){
        
        if('id'){
            // dd($request);
            $products = Product::all();
            $resProducts = $products->where('restaurant_id',$request->id);
            if ($resProducts){
                // dd($resProducts);
                return view('front.products',compact('resProducts'));
                
            }
        }    
    } 

    
    public function allProducts(){
        $productsall = Product::all();
        // dd($products);
        return view('front.products',compact('productsall'));
    }

    public function productEdit(Request $request){

        if('id'){
            // dd($request);
            $products = Product::all();
            $resproducts = $products->where('id',$request->id);
            if ($resproducts){
                // dd($resproducts);
                return view('front.editproduct',compact('resproducts'));
                
            }
        }

    }


    public function productEditSave(Request $request){
        
        // dd($request->id);
        if('id'){

            $productedit = Product::where('id',$request->id)->first();
            // dd($productedit);

            if($productedit){
                $productedit->update($request->all()); 
                $productedit->price_offer = $request->price_offer;
                $productedit->processing_time = $request->processing_time;
                $productedit->save();
                if ($request->hasFile('photo')) {
                    $path = public_path();
                    $destinationPath = $path . '/front/uploads/products/'; // upload path
                    $photo = $request->file('photo');
                    $extension = $photo->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                    $photo->move($destinationPath, $name); // uploading file to given path
                    $productedit->photo = 'front/uploads/products/' . $name;
                    $productedit->save();
                }
                flash()->success("Success");
                return back();
            }
        }else{
            return back();
        }

    }


    public function productDelete($id){

        $product = Product::findOrFail($id);
        $product->delete();
        flash()->success("Success");
        return back();

    }

/////////////////////////////////////////////////////////////////////////////////////////////////////// end cycle product

///////////////////////////////////////////////////////////////////////////////////////////////////// start cycle offer

    public function addOffer(){
        return view('front.addoffer');
    }


    public function addOfferSave(Request $request){

        $rules = [
    		'photo' => 'required',
    		'title' => 'required',
    		'content' => 'required',
    		'from' => 'required',
    		'to' => 'required'
    	];
    	$messages = [
    		'photo.required' => 'The Photo Is Required',
    		'title.required' => 'The Title Is Required',
    		'content.required' => 'The Content Is Required',
    		'from.required' => 'The From Is Required',
    		'to.required' => 'The To Is Required'
    	];
        $this->validate($request, $rules, $messages);

        $Offers = Offer::create($request->all());
        $Offers->restaurant_id = $request->id;
        $Offers->save();
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/front/uploads/Offers/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $Offers->photo = 'front/uploads/Offers/' . $name;
            $Offers->save();
          }
        flash()->success("Success");
        return back();  

    }


    public function restaurantOffers(Request $request){
        
        if('id'){
            // dd($request);
            $offers = Offer::all();
            $resOffers = $offers->where('restaurant_id',$request->id);
            if ($resOffers){
                // dd($resOffers);
                return view('front.offers',compact('resOffers'));
                
            }
        }    
    } 


    public function allOffers(){
        $offersall = Offer::latest()->paginate(20);
        return view('front.offers',compact('offersall'));
    }


    public function offerEdit(Request $request){

        if('id'){
            // dd($request);
            $offers = Offer::all();
            $resOffers = $offers->where('id',$request->id);
            if ($resOffers){
                // dd($resOffers);
                return view('front.editoffer',compact('resOffers'));
                
            }
        }

    }


    public function offerEditSave(Request $request){

        // dd($request->id);
        if('id'){

            $Offeredit = Offer::where('id',$request->id)->first();
            // dd($Offeredit);

            if($Offeredit){
                $Offeredit->update($request->all()); 
                if ($request->hasFile('photo')) {
                    $path = public_path();
                    $destinationPath = $path . '/front/uploads/offers/'; // upload path
                    $photo = $request->file('photo');
                    $extension = $photo->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                    $photo->move($destinationPath, $name); // uploading file to given path
                    $Offeredit->photo = 'front/uploads/offers/' . $name;
                    $Offeredit->save();
                }
                flash()->success("Success");
                return back();
            }
        }else{
            return back();
        }

    }


    public function offerDelete($id){

        $offer = Offer::findOrFail($id);
        $offer->delete();
        flash()->success("Success");
        return back();

    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////// end cycle offer

//////////////////////////////////////////////////////////////////////////////////////////////////////////// start restaurant order cycle 


    public function restaurantOrdersPending(Request $request){

        
          
        //dd($request->user()->first()->id);
        //$restaurant = $request->user()->orders()->find('restaurant_id',$request->user()->id)->first();
        
        if('id'){

            $restaurant = Order::where('restaurant_id',$request->id)->first();
        
            // dd($restaurant);
        
            if($restaurant){
                $pending = Order::where('state','pending')->get();
                return view('front.restaurantorderspending',compact('pending'));
            }else{
                return responseJson(0, 'خطأ');
            }

        }    

    }


    public function restaurantOrdersCurrent(Request $request){
        
        if('id'){

            $restaurant = Order::where('restaurant_id',$request->id)->first();
        
            // dd($restaurant);
        
            if($restaurant){
                $current = Order::where('state','accepted')->orWhere('state','delivered')->get();
                return view('front.restaurantorderscurrent',compact('current'));
            }else{
                return responseJson(0, 'خطأ');
            }

        }    


    }


    public function restaurantOrdersPreviousRequests(Request $request){
        
        if('id'){

            $restaurant = Order::where('restaurant_id',$request->id)->first();
            // dd($restaurant);
        
            if($restaurant){
                $previousRequests = Order::where('state','complete')->orWhere('state','rejected')->orWhere('state','declined')->get();
                return view('front.restaurantpreviousRequests',compact('previousRequests'));
            }else{
                return back();
            }

        }    
        

    }


    public function restaurantAcceptedOrder(Request $request){
    
        if('id'){  
            $order = Order::where('id',$request->id)->first();
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
            
            $data = [
            'Restaurant_Name' => $res->name,
            'Title' => $order->products()->first()->title,
            'Content' => $order->products()->first()->content,
            'Quantity' => $order->first()->quantity,
            'Delivery_Cost' => $order->first()->delivery_cost,
            'Totel_Cost' => $order->total_cost,

            ]; 
            //dd($data);

            $client = $order->client()->first();

            if ($client->email){

                Mail::to($client->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(new AcceptedOrder($data));
                flash()->success('Success');
                return back();

            }
        }    
    }    


    public function restaurantRejectedOrder(Request $request){
       
        if('id'){

            $order = Order::where('id',$request->id)->first();
            $order->update(['state' => 'rejected']);
            $res = $order->restaurant()->first();
            $notification = $res->notifications()->create(
                [
                'title'=>'تم الغاء الطلب',
                'content'=> $res->first()->name .'تم الغاء الطلب من مطعم  ',
                'notifiable_id' => $res->first()->id,
                'notifiable_type' => 'restaurant',
                ]
            );
        
            $data =[
                'content'=>$res->first()->name .'تم الغاء الطلب من مطعم  ',
            ];
        
            $client = $order->client()->first();
        
            if ($client->email)
            {
                Mail::to($client->email)
                ->bcc("amrhuusien99@gmail.com")
                ->send(new RejectedOrder($data));
                flash()->success('Success');
                return back();
            }
        }    
    }


    public function restaurantConfirmOrder(Request $request){

        if('id'){

            $order = Order::where('id',$request->id)->first();
            $order->update(['state' => 'delivered']);
            flash()->success('Success');
            return back();

        }    
    
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////// end restaurant order cycle 

//////////////////////////////////////////////////////////////////////////////////////////////////////////// start client order cycle 


    public function clientOrdersCurrent(Request $request){
            
        if('id'){

            $client = Order::where('client_id',$request->id)->first();
        
            // dd($client);
        
            if($client){
                $current = Order::where('state','delivered')->orWhere('state','accepted')->get();
                return view('front.clientorderscurrent',compact('current'));
            }else{
                return responseJson(0, 'خطأ');
            }

        }      
    }


    public function clientOrdersPreviousRequests(Request $request){
        
        if('id'){

            $client = Order::where('client_id',$request->id)->first();
            // dd($client);
        
            if($client){
                $previousRequests = Order::where('state','rejected')->orWhere('state','declined')->orWhere('state','complete')->get();
                return view('front.clientpreviousRequests',compact('previousRequests'));
            }else{
                return back();
            }

        }    
        

    }


    public function clientMakeOrder(Request $request){

        if('id'){

            $productinfo = Product::where('id',$request->id)->first();
            // dd($productinfo);
            if($productinfo){
                return view('front.makeorder',compact('productinfo'));
            }

        }

    }


    public function productCart(Request $request){

        if('id'){
            // dd($request->id);
            $productcarts = Cart::all();
            $productcart = $productcarts->where('client_id',$request->id);
            // dd($productcart);
            if($productcart){
                return view('front.makeorder',compact('productcart'));
            }

        }

    }


    public function clientAddCart(Request $request){

        $validator = validator()->make($request->all(), [

            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id'
      
        ]);
    
        if($validator->fails()){
            return back()->with($validator->errors()->first());
        }

        $productcarts = Cart::create($request->all());
        // dd($productcarts);
         
        flash()->success("Added To cart");
        return back();

    }


    public function productCartDelete($id){

        if('id'){

            $ptoductdelete = Cart::findOrFail($id);
            $ptoductdelete->delete();
            flash()->success("Deleted");
            return back();

        }

    }


    public function clientNewOrder(Request $request){

        $validator = validator()->make($request->all(), [

            'restaurant_id' =>'required|exists:restaurants,id',
            'product.*.product_id' =>'required|exists:products,id',
            'product.*.quantity' =>'required',   
            'address' =>'required',
            'payment_id' =>'required|exists:payment_methods,id',
      
        ]);
      
        if($validator->fails()){
            flash()->success($validator->errors()->first());
            return back();
        }

        $restaurant = Restaurant::where('id',$request->restaurant_id)->first();
    
        if($restaurant->state == 'close' || $restaurant->is_activate == 0){
            flash()->success("هذا المطعم غير متاح الان");
            return back();
        }
    
        $order = auth('client-web')->user()->orders()->create([
    
            'restaurant_id' => $request->restaurant_id,
            'client_id' => auth('client-web')->user()->id,
            'note' => $request->notes,
            'state' =>'pending',
            'address' => $request->address,
            'payment_method_id' => $request->payment_id,
    
        ]);

        
        $cost = 0;
        $delivery_cost = $restaurant->delivery_cost;

        foreach ($request->product as $p) { 
            // dd($p);
            if(isset($p['product_id'])){
                $product = Product::find($p['product_id']);
                $readyProduct = [
                  $p['product_id'] => [
                    'quantity' => $p['quantity'],
                    'price' => $product->price,
                    'note' => (isset($p['note'])) ? $p['note'] : '',
                  ]
                ];
                // dd($readyProduct);
                $order->products()->attach($readyProduct);
                $cost += ($product->price * $p['quantity']);
            }else{
                flash()->success("Not Found Product");
                return back();
            }  
        }
    
        if($cost >= $restaurant->minimum_order){
            $total = $cost + $delivery_cost;
            $commission = Setting::first()->commission * $cost;
            $net = $total - $commission;
        
            $update = $order->update([
                'cost' => $cost,
                'delivery_cost' => $delivery_cost,
                'total_cost' => $total,
                'commission' => $commission,
                'net' => $net,
                'quantity' => $request->quantity,
            ]);

        }else{
            $order->delete();
            flash()->success("'لايمكن أن يكون الطلب أقل من'.$restaurant->minimum_order.'جنيه'");
            return back();
          }
    
        $notification = $restaurant->notifications()->create([

            'title' => 'يوجد طلب جديد',
            'content' => auth('client-web')->user()->name .'لديك طلب جديد من العميل',
            'notifiable_id' => $restaurant->id,
            'notifiable_type' => 'restaurant',

        ]);
    
        $payment = PaymentMethod::where('id',$request->payment_id)->first();
        
        // $or = $order->fresh()->load('products');
        //$or = Order::where('id',$order->id)->first();
        //$tokens = $restaurant->tokens()->where('token','!=', null)->pluck('token')->toArray();
    
        $data = [
            'client_Name' => auth('client-web')->user()->name,
            'Product_name' => $product->name,
            'address' => $request->address,
            'Quantity' => $p['quantity'],
            'The_Payment' => $payment->name,
        ];  
    
        if ($restaurant->email){
            Mail::to($restaurant->email)
                ->bcc("amrhuusien99@gmail.com")
                ->send(new NewOrder($data));

    //////////////////////////////////////////////////////////////////////////////// delete product from cart after make order

            $ptoductdelete = Cart::where('client_id',auth('client-web')->user()->id);
            // dd($ptoductdelete);
            $ptoductdelete->delete();

            flash()->success("تم الطلب بنجاح");
            return redirect(url(route('client-orders-current',auth('client-web')->user()->id)));
        }   
    }


    public function clientNewOrderCart(Request $request){

        // dd($request);

        $validator = validator()->make($request->all(), [

            'restaurant_id' =>'required|exists:restaurants,id',
            'product.*.product_id' =>'required|exists:products,id',
            'product.*.quantity' =>'required',   
            'address' =>'required',
            'payment_id' =>'required|exists:payment_methods,id',
      
        ]);
      
        if($validator->fails()){
            flash()->success($validator->errors()->first());
            return back();
        }
        // dd($request);
        // for ($i=0; $i < count($request->restaurant_id); $i++) {
        //     // dd($i);
        // }

        if ( $request->restaurant_id[0] == $request->restaurant_id[1]){

            $restaurant = Restaurant::where('id',$request->restaurant_id)->first();
        
            if($restaurant->state == 'close' && $restaurant->is_activate == 0){
                flash()->success("هذا المطعم غير متاح الان");
                return back();
            }
        
            $order = auth('client-web')->user()->orders()->create([

                'restaurant_id' => $request->restaurant_id[0],
                'client_id' => auth('client-web')->user()->id,
                'state' =>'pending',
                'address' => $request->address,
                'payment_method_id' => $request->payment_id
        
            ]);

            $cost = 0;
            $delivery_cost =   $restaurant->delivery_cost;
        
            // for ($i=0; $i < count($request->product['product_id']); $i++) { 
            foreach ($request->product as $p) { 
                // dd($p);
                if(isset($p['product_id'])){
                    $product = Product::find($p['product_id']);
                    $readyProduct = [
                      $p['product_id'] => [
                        'quantity' => $p['quantity'],
                        'price' => $product->price,
                        'note' => (isset($p['note'])) ? $p['note'] : '',
                      ]
                    ];
                    // dd($readyProduct);
                    $order->products()->attach($readyProduct);
                    $cost += ($product->price * $p['quantity']);
                }else{
                    flash()->success("Not Found Product");
                    return back();
                }  
            }
            // dd($cost);
            if($cost >= $restaurant->minimum_order){

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
                flash()->success("'لايمكن أن يكون الطلب أقل من'.$restaurant->minimum_order.'جنيه'");
                return back();
            }
        
            $notification = $restaurant->notifications()->create([
                'title' => 'يوجد طلب جديد',
                'content' => auth('client-web')->user()->name .'لديك طلب جديد من العميل',
                'notifiable_id' => $restaurant->id,
                'notifiable_type' => 'restaurant',
            ]);
        
            $payment = PaymentMethod::where('id',$request->payment_id)->first();
            
            // $or = $order->fresh()->load('products');
            //$or = Order::where('id',$order->id)->first();
            //$tokens = $restaurant->tokens()->where('token','!=', null)->pluck('token')->toArray();
        
            $data = [
                'client_Name' => auth('client-web')->user()->name,
                'address' => $request->address,
                'Quantity' => $p['quantity'],
                'The_Payment' => $payment->name,
            ];  
        
            if ($restaurant->email){
                Mail::to($restaurant->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(new NewOrder($data));
                    
        //////////////////////////////////////////////////////////////////////////////// delete product from cart after make order

                    $ptoductdelete = Cart::where('client_id',auth('client-web')->user()->id);
                    // dd($ptoductdelete);
                    $ptoductdelete->delete();


                flash()->success("تم الطلب بنجاح");
                return redirect(url(route('client-orders-current',auth('client-web')->user()->id)));
            }  

        }else{
            flash()->success("ليس مسموح بالطلب الا من مطعم واحد ");
            return back();
            }
        }

    }


    public function clientconfirmOrder(Request $request){
      
        if('id'){

            $order = Order::where('id',$request->id)->first();
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
                return back();

            }
        }    
    }


    public function clientDeclinedOrder(Request $request){

        if('id'){    

            $order = Order::where('id',$request->id)->first();
            $order->update(['state' => 'declined']);
            $client = $order->client()->first();
            $restaurant = $order->restaurant()->first();
            $notification = $restaurant->notifications()->create(
                [
                'title'=>'لقد تم رفض الطلب من جانب العميل',
                'content'=>$client->name .'تم رفض الطلب من عميل',
                'notifiable_id' => $client->id,
                'notifiable_type' => 'client',
                ]
            );

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
                ->send(new DeclinedOrder($data));
                flash()->success('Success');
                return back();

            }
        }

    ///////////////////////////////////////////////////////////////////////////////////////// end client order cycle


}
