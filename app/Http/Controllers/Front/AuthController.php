<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Restaurant;
use Auth;
use Hash;
use Mail;
use App\Mail\ResetPassword;


class AuthController extends Controller
{

    public function signin(){
        return view('front.auth.login');
    }
    
    public function login_check_front(Request $request){

        $rules = [
    		'email' => 'required',
    		'password' => 'required'
    	];

    	$messages = [
    		'email.required' => 'The Email Is Required',
    		'password.required' => 'The Password Is Required'
    	];
        $this->validate($request, $rules, $messages);

        $client = Client::where('email',$request->email)->first();
    	if ($client) {
            // dd($client);
            if ($client->is_activate == 1) {
                // dd($client);
                if (Auth::guard('client-web')->attempt($request->only('email', 'password'))) {
                        return redirect(route('index'));
                        
                } else {
                    return back()->with('error', 'خطأ فى تسجيل الدخول');
                }
            }else {
                return back()->with('error', 'لم يتم التفعيل بعد');
            }    
        }
        $restaurant = Restaurant::where('email',$request->email)->first();
    	if ($restaurant) {
            // dd($restaurant);
            if ($restaurant->is_activate == 1) {
                // dd($restaurant);
                if (Auth::guard('restaurant-web')->attempt($request->only('email', 'password'))) {
                        return redirect(route('index'));
                        
                } else {
                    flash()->success("خطأ فى تسجيل الدخول");
                    return back();
                }
            } else {
                flash()->success("لم يتم التفعيل بعد");
                return back();
            }
        }
    }

    
    public function frontResetpassword(){

        return view('front.auth.resetcheck');

    }


    public function frontResetpasswordcheck(Request $request){

        // dd($request);
        $validator = validator()->make($request->all(),[

            'email' => 'required'

        ]);

        if($validator->fails()){

            return responseJson(1, $validator->errors()->first());
        }

        $client = Client::where('email',$request->email)->first();
        if($client){
            $code = rand(1111, 9999);
            $update = $client->update(['pin_code' => $code]);

            if($update){

                //smsMise($request->phone,"Your Rest Code Is : ".$code);

                Mail::to($client->email)
                    ->bcc("amrhuusien99@gmial.com")
                    ->send(new ResetPassword($code));

                return view('front.auth.resetpassword');

            }else{
                return back();
            }
        }

        $restaurant = Restaurant::where('email',$request->email)->first();
        if($restaurant){
            $code = rand(1111, 9999);
            $update = $restaurant->update(['pin_code' => $code]);
            if($update){

                //smsMise($request->phone,"Your Rest Code Is : ".$code);

                Mail::to($restaurant->email)
                    ->bcc("amrhuusien99@gmial.com")
                    ->send(new ResetPassword($code));

                return view('front.auth.resetpassword');

            }else{
                return back();
            }
        }else {
            return back();
        }
    }


    public function frontResetpasswordsave(Request $request){

        $validator = validator()->make($request->all(),[

            'password' => 'required|confirmed',
            'pin_code' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()){

            return back();
        }

        $client = Client::where('phone',$request->phone)->first();
        if($client){
            $pin_code = Client::where('pin_code',$request->pin_code)->first();
            if($pin_code){

                $client->password = bcrypt($request->input('password'));
                $client->pin_code = null;
                $client->save();

                return view('front.auth.login');

            }else{
                return back();
            }
            
        }

        $restaurant = Restaurant::where('phone',$request->phone)->first();
        if($restaurant){
            $pin_code = Restaurant::where('pin_code',$request->pin_code)->first();
            if($pin_code){

                $restaurant->password = bcrypt($request->input('password'));
                $restaurant->pin_code = null;
                $restaurant->save();

                return view('front.auth.login');

            }else{
                return back();
            }
        }else{
            return back();
        }

    }


    /////////////////////////////////////////////////////////////////////////////////////////////////// start client cycle auth 

    public function register_client(){
        return view('front.auth.register-client');
    }


    public function register_client_save(Request $request){

        $rules = [
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    		'region_id' => 'required|exists:regions,id',
    		'password' => 'required|confirmed'
    	];

    	$messages = [
    		'name.required' => 'The Name Is Required',
    		'email.required' => 'The Email Is Required',
    		'region_id.required' => 'The City Is Required',
    		'phone.required' => 'The Phone Is Required',
    		'password.required' => 'The Password Is Required'
    	];
        $this->validate($request, $rules, $messages);
        
        $request->merge(['password'=>bcrypt($request->password)]);
    	$client = Client::create($request->all());
        $client->api_token = str_random(60);
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/front/uploads/clients/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $users->photo = 'front/uploads/clients/' . $name;
        }
    	$client->save();
    	return redirect(route('index'));

    }

        
    public function client_info(Request $request){

        if('id'){

            $clients = Client::all();
            $client_info = $clients->where('id',$request->id);
            
            if($client_info){
                // dd($$client_info);
                return view('front.account',compact('client_info'));
            }
        }else{
            return back();
        }

    }

    
    public function client_info_change(Request $request){
        // dd($request);
        if('id'){

            $clientinfo = Client::where('id',$request->id)->first();
            // dd($clientinfo);

            if($clientinfo){
                $clientinfo->update($request->all()); 
                if ($request->hasFile('photo')) {
                    $path = public_path();
                    $destinationPath = $path . '/front/uploads/clients/'; // upload path
                    $photo = $request->file('photo');
                    $extension = $photo->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                    $photo->move($destinationPath, $name); // uploading file to given path
                    $clientinfo->photo = 'front/uploads/clients/' . $name;
                    $clientinfo->save();
                }
                flash()->success("Success");
                return back();
            }
        }else{
            return back();
        }

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////// end client cycle auth 

    /////////////////////////////////////////////////////////////////////////////////////////////// start restaurant cycle auth

    
    public function register_restaurant(){
        return view('front.auth.register-restaurant');
    }


    public function register_restaurant_save(Request $request){

        $rules = [
    		'name' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    		'region_id' => 'required|exists:regions,id',
    		'password' => 'required|confirmed',
    		'minimum_order' => 'required',
    		'delivery_cost' => 'required',
    		'whats_app' => 'required',
    		'delivery_number' => 'required',
    		'photo' => 'required',
    		'category_id' => 'required|exists:categories,id'
    	];
    	$messages = [
    		'name.required' => 'The Name Is Required',
    		'email.required' => 'The Email Is Required',
    		'region_id.required' => 'The City Is Required',
    		'phone.required' => 'The Phone Is Required',
    		'password.required' => 'The Password Is Required',
    		'minimum_order.required' => 'The Minimum Order Is Required',
    		'delivery_cost.required' => 'The Delivery Cost Is Required',
    		'whats_app.required' => 'The Whats App Is Required',
    		'delivery_number.required' => 'The Delivery Number Is Required',
    		'photo.required' => 'The Photo Is Required',
    		'category_id.required' => 'The Categoty Is Required'
    	];
        $this->validate($request, $rules, $messages);
        
        $request->merge(['password'=>bcrypt($request->password)]);
    	$restaurant = Restaurant::create($request->all());
        $restaurant->api_token = str_random(60);
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/front/uploads/restaurants/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $restaurant->photo = 'front/uploads/restaurants/' . $name;
        }
        $restaurant->save();
    	return redirect(route('index'));

    }
    

    public function restaurant_info(Request $request){

        if('id'){

            $restaurants = Restaurant::all();
            $restaurant_info = $restaurants->where('id',$request->id);
            
            if($restaurant_info){
                // dd($restaurant_info);
                return view('front.account',compact('restaurant_info'));
            }
        }else{
            return back();
        }

    }


    public function restaurant_info_change(Request $request){
        // dd($request);
        if('id'){

            $restaurantinfo = Restaurant::where('id',$request->id)->first();
            // dd($restaurantinfo);

            if($restaurantinfo){
                $restaurantinfo->update($request->all()); 
                if ($request->hasFile('photo')) {
                    $path = public_path();
                    $destinationPath = $path . '/front/uploads/restaurants/'; // upload path
                    $photo = $request->file('photo');
                    $extension = $photo->getClientOriginalExtension(); // getting image extension
                    $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
                    $photo->move($destinationPath, $name); // uploading file to given path
                    $restaurantinfo->photo = 'front/uploads/restaurants/' . $name;
                    $restaurantinfo->save();
                }
                flash()->success("Success");
                return back();
            }
            
        }else{
            return back();
        }

    }

    /////////////////////////////////////////////////////////////////////////////////////////////// end restaurant cycle auth

}