<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Hash;
use App\Models\Restaurant;
use Mail;
use App\Mail\ResetPassword;
use App\Models\Token;


class AuthController extends Controller
{   
    ///////////////////////////////////////////////////////////////////////////////// start client auth
    public function client_register(Request $request){

    	$validator = validator()->make($request->all(),[

    		'name' => 'required',
    		'email' => 'required|unique:clients',
    		'phone' => 'required|unique:clients',
    		'photo' => 'required',
    		'password' => 'required|confirmed',
    		'region_id' => 'required',
    	]);

    	if($validator->fails()){

    		return $response = [
            'status' => 1,
            'msg' => $validator->errors()->first(),
            'data' => $validator->errors(),

        	];
        	return response()->json($response);
    	}

    	$request->merge(['password'=>bcrypt($request->password)]);
    	$client = Client::create($request->all());
        $client->api_token = str_random(60);
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/clients/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $client->photo = 'uploads/clients/' . $name;
        }
    	$client->save();
    	return $response = [
            'status' => 1,
            'msg' => 'Success',
            'data' => [
            		'api_token' => $client->api_token,
            		'client' => $client
            	]
        	];
        	return response()->json($response); 
    }

    public function client_login(Request $request){

    	$validator = validator()->make($request->all(),[

    		'email' => 'required',
    		'password' => 'required'
    	]);

    	if($validator->fails()){

    		return $response = [
            'status' => 1,
            'msg' => $validator->errors()->first(),
            'data' => $validator->errors(),

        	];
        	return response()->json($response);
    	}

    	$client = Client::where('email',$request->email)->first();

    	if($client){

    		if(Hash::check($request->password,$client->password)){
	    		return $response = [
	            'status' => 1,
	            'msg' => 'Success',
	            'data' => [
	            		'api_token' => $client->api_token,
	            		'client' => $client
	            	]
	        	];
	    	}else{
	    		return $response = [
	            'status' => 0,
	            'msg' => 'بيانات الدخول غير صحيحه',
	        	];
	    	}
    	}else{

    		return $response = [
	            'status' => 0,
	            'msg' => 'بيانات الدخول غير صحيحه',
	        ];
    	}
    }

    public function client_restPassword(Request $request){

        $validator = validator()->make($request->all(),[

            'phone' => 'required'

        ]);

        if($validator->fails()){

            return responseJson(1, $validator->errors()->first());
        }

        $user = Client::where('phone',$request->phone)->first();

        if($user){

            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);

            if($update){

                //smsMise($request->phone,"Your Rest Code Is : ".$code);


                Mail::to($user->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(new ResetPassword($code));


                return responseJson(1, 'برجاء فحص الايميل',
                 ['pin_code_for_rest' => $code]);

            }else{

                return responseJson(0, 'رجاء المحاوله مره اخري .. حدث خطأ');
            }
        }else {

            return responseJson(0, 'بيانات المرور غير صحيحه');
        }
    }

    public function clien_changpassword (Request $request){

        $validator = validator()->make($request->all(),[

            'new_password' => 'required',
            'pin_code' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()){

            return responseJson(1, $validator->errors()->first());
        }

        $user = Client::where('phone',$request->phone)->first();

        if($user){

            $pin_code = Client::where('pin_code',$request->pin_code)->first();

            if($pin_code){

                $user->password = bcrypt($request->input('new_password'));
                $user->pin_code = null;
                $user->save();

                return responseJson(1, 'تم التغير بنجاح');

            }else{

                return responseJson(0, 'pin code Unavailable');
            }
            
        }else{

            return responseJson(0, 'يرجي التاكد من بيناتك');
        }
    }

    public function clientRegisterToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'type'  => 'required|in:android,ios',
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();
        //    Token::create([
        //   'token' => $request->token,
        //   'type' => $request->type,
        //   'tokenable_id' => 1,//$request->user()->id,//auth()->guard('client')->id,
        //   'tokenable_type' => 'client',
        //
        // ]);
        
        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'تم التسجيل بنجاح');
    }


    public function clientRemoveToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();
        return responseJson(1, 'تم الحذف بنجاح بنجاح');
    }

    ///////////////////////////////////////////////////////////////////////////////// end client auth


    ///////////////////////////////////////////////////////////////////////////////// start restaurant auth

    public function restaurant_register(Request $request){

        $validator = validator()->make($request->all(),[

            'name' => 'required',
            'email' => 'required|unique:restaurants',
            'phone' => 'required|unique:restaurants',
            'photo' => 'required',
            'password' => 'required|confirmed',
            'minimum_order' => 'required',
            'delivery_cost' => 'required',
            'whats_app' => 'required',
            'delivery_number' => 'required',
            'category_id' => 'required',
            'region_id' => 'required'
        ]);

        if($validator->fails()){

            return $response = [
            'status' => 1,
            'msg' => $validator->errors()->first(),
            'data' => $validator->errors(),

            ];
            return response()->json($response);
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $restaurant = Restaurant::create($request->all());
        $restaurant->api_token = str_random(60);
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/restaurants/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $restaurant->photo = 'uploads/restaurants/' . $name;
        }
        $restaurant->save();
        $restaurant->category()->attach([$request->category_id,$restaurant->first()->id]);
        return $response = [
            'status' => 1,
            'msg' => 'Success',
            'data' => [
                    'api_token' => $restaurant->api_token,
                    'Restaurant' => $restaurant
                ]
            ];
            return response()->json($response);
    }

    public function restaurant_login(Request $request){

        $validator = validator()->make($request->all(),[

            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){

            return $response = [
            'status' => 1,
            'msg' => $validator->errors()->first(),
            'data' => $validator->errors(),

            ];
            return response()->json($response);
        }

        $restaurant = Restaurant::where('email',$request->email)->first();
        
        if($restaurant){

            if(Hash::check($request->password,$restaurant->password)){

                return $response = [

                    'status' => 1,
                    'msg' => 'Success',
                    'data' => [

                        'api_token' => $restaurant->api_token,
                        'Restaurant' => $restaurant
                    ]
                ];
            }else{

                return $response = [
                    'status' => 1,
                    'msg' => 'هذه البيانات غير صحيحه',
                ];
                return response()->json($response);
            }
        }
    }

    public function restaurant_resetpassword(Request $request){

        $validator = validator()->make($request->all(),[

            'phone' => 'required'

        ]);

        if($validator->fails()){

            return responseJson(0, $validator->errors()->first());

        }

        $restaurant = Restaurant::where('phone',$request->phone)->first();

        if($restaurant){

            $code = rand(1111, 9999);
            $update = $restaurant->update(['pin_code' => $code]);

            if($update){

                //smsMise($request->phone,"Your Rest Code Is : ".$code);

                Mail::to($restaurant->email)
                    ->bcc("amrhuusien99@gmail.com")
                    ->send(new ResetPassword($code));


                return responseJson(1, 'برجاء فحص هاتفك',
                 ['pin_code_for_rest' => $code]);

            }else{

                return responseJson(0, 'رجاء المحاوله مره اخري .. حدث خطأ');
            }

        }else {

            return responseJson(0, 'بيانات المرور غير صحيحه');
        }

    }

    public function restaurant_changpassword(Request $request){

        $validator = validator()->make($request->all(),[

            'new_password' => 'required',
            'pin_code' => 'required',
            'phone' => 'required'

        ]);

        if($validator->fails()){

            return responseJson(0, $validator->errors()->first());

        }

        $restaurant = Restaurant::where('phone',$request->phone)->first();

        if($restaurant){

            $pin_code = Restaurant::where('pin_code',$request->pin_code)->first();

            if($pin_code){

                $restaurant->password = bcrypt($request->input('new_password'));
                $restaurant->pin_code = null;
                $restaurant->save();

                return responseJson(1, 'تم التعديل بنجاح');

            }else{

                return responseJson(0, 'pin code unavailable');
            }

        }else{

            return responseJson(0, 'بيانات الدخول غير صحيحه');
        }

    }

    public function restaurantRegisterToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'type'  => 'required|in:android,ios',
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();

        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'تم التسجيل بنجاح');
    }


    public function restaurantRemoveToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();
        return responseJson(1, 'تم الحذف بنجاح بنجاح');
    }
    
}

///////////////////////////////////////////////////////////////////////////////// end restaurant auth

