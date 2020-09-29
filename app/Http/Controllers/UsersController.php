<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Mail;
use App\Mail\ResetPassword;
use Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::latest()->paginate(20);
        return view('user.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'password' => 'required|confirmed'

        ];
        $messages = [

            'name.required' => 'The Name Is Reqired',
            'email.required' => 'The Email Is Reqired',
            'phone.required' => 'The Phone Is Reqired',
            'photo.required' => 'The Photo Is Reqired',
            'password.required' => 'The Password Is Reqired'

        ];
        $this->validate($request, $rules, $messages);

        $request->merge(['password'=>bcrypt($request->password)]);
        $users = User::create($request->all());
        $users->roles()->attach($request->input('roles_list'));
        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/users/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $users->photo = 'uploads/users/' . $name;
        }
        $users->save();
        flash()->success("Success");
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('user.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = User::findorFail($id);
        $record->update($request->all()); 
        $record->roles()->sync($request->input('roles_list'));
        flash()->success("Success");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::findOrFail($id);
        $record->delete();
        flash()->success("success");
        return back();
    }

    public function login(){
        return view('auth.login');
    }

    public function login_check(Request $request){

        $rules = [

            'email' => 'required',
            'password' => 'required'

        ];
        $messages = [

            'email.required' => 'The Email Is Required',
            'password.required' => 'The Password Is Required'

        ];
        $this->validate($request, $rules, $messages);
        
        $user = User::where('email',$request->email)->first();

        if($user){

            if(Auth::guard('web')->attempt($request->only('email', 'password'))){

                return redirect(route('home'))->with('success', 'تم تسجيل الدخول بنجاح');

            }else{
                flash()->success("خطأ فى تسجيل الدخول");
                return back();
            }   

        }else{
            flash()->success("خطأ فى تسجيل الدخول");
            return back();
        }


    }

    public function ChangPassword(){

        return view('chang.changpassword');
    }

    public function changpasswordsave(Request $request){

        $this->validate($request , [

            'old-password' => 'required',
            'password'  => 'required|confirmed',
        ]);

        $user = Auth::User();

        if(Hash::check($request->input('old-password'),$user->password)){

            $user->password = bcrypt($request->input('password'));
            $user->save();
            flash()->success("Success");
            return back();

        } else{

            flash()->danger("Error");
            return back();
        }
        
    }

    public function resetpassword(){

        return view('auth.resetcheck');

    }

    public function resetpasswordcheck(Request $request){

        $validator = validator()->make($request->all(),[

            'email' => 'required'

        ]);

        if($validator->fails()){

            return responseJson(1, $validator->errors()->first());
        }

        $user = User::where('email',$request->email)->first();

        if($user){

            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);

            if($update){

                //smsMise($request->phone,"Your Rest Code Is : ".$code);


                Mail::to($user->email)
                    ->bcc("amrhuusien99@gmial.com")
                    ->send(new ResetPassword($code));


                return view('auth.resetpassword');

            }else{

                return responseJson(0, 'رجاء المحاوله مره اخري .. حدث خطأ');
            }
        }else {

            return responseJson(0, 'بيانات المرور غير صحيحه');
        }
    }

    public function resetpasswordsave(Request $request){

        $validator = validator()->make($request->all(),[

            'password' => 'required|confirmed',
            'pin_code' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()){

            return back();
        }

        $user = User::where('phone',$request->phone)->first();

        if($user){

            $pin_code = User::where('pin_code',$request->pin_code)->first();

            if($pin_code){

                $user->password = bcrypt($request->input('password'));
                $user->pin_code = null;
                $user->save();

                return view('auth.login');

            }else{

                return responseJson(0, 'pin code Unavailable');
            }
            
        }else{

            return responseJson(0, 'يرجي التاكد من بيناتك');
        }

    }

}
