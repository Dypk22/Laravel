<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3',
        ]);   
        
        $credentials = ['email'=>$request->email, 'password'=>$request->password];
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        return redirect('/')->with('message', 'Oppes! You have entered invalid credentials');
    }

    public function register()
    {
        return view('admin.register');
    }    

    public function password_recovery()
    {
        return view('admin.reset_password_email');
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);   

        $check = DB::table('users')->where('email', $request->email)->get()->toArray();

        if ($check) {
            $link = url('email-recovery/'.base64_encode($request->email));
            $data = [ 'token' => $link, 'name' => $check[0]->name];
            $toemail = $request->email;
            Mail::send('email/emailVerify', $data, function($messages) use ($toemail){
                $messages->to($toemail);
                $messages->subject('Account Verification!');
            });
            return redirect()->back()->with('message', 'Password reset link sent to Email');
        } else {
            return redirect()->back()->with('message', 'Email Not Exists');
        }
    }

    public function email_recovery(Request $request, $token){
        $check = User::where('email', base64_decode($token))->get()->pluck('id')->toArray();
        if (isset($check[0])) {
            $uid = $check[0];
            return view('admin.reset_password', compact('uid'));
        } else {
        return redirect('/')->with('message', 'Something went wrong');
        }
        
    }

    function reset_password_form(Request $request) {
        $request->validate([
            'password' => 'required|min:3',
        ]);   

        User::where('id', $request->id)->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect('/')->with('message', 'Account updated Successfully');
    }

    public function registerForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required',
            'password' => 'required|min:3',
        ]);   
        
        date_default_timezone_set("Asia/Kolkata");
        $time=date("Y-m-d H:i:s");       

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->group_id = 1;
        $user->created_at = $time;
        $user->updated_at = $time;
        $user->save();
        $credentials = ['email'=>$request->email, 'password'=>$request->password];
        // $toemail = $request->email;
        // $data = [ 'token' => $token, 'name' => $request->name];
        // Mail::send('email/emailVerify', $data, function($messages) use ($toemail){
        //     $messages->to($toemail);
        //     $messages->subject('Account Verification!');
        // });
        Auth::loginUsingId($user->id);
        return redirect()->intended('admin/dashboard')->with('message', 'You have Successfully loggedin');
    }
}
