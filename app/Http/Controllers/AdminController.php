<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use Crypt;
use Illuminate\Support\Facades\Cookie;
use Auth;
use File;
use Excel;
// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Imports\ProductsImport;
use App\Exports\UserExports;
// use Validator;
use App\Models\ContractorDetail;
use App\Models\User;
use App\Models\Settings;
use App\Models\Documents;
use DataTables;
use Carbon;
use Maatwebsite\Excel\Concerns\ToArray;
use Session;

class AdminController extends Controller

{
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/')->with('message', 'You\'re successfully logout');
    }

    public function login(Request $request)
    {
        dd(Auth::user()->toArray());
        return view('admin.login');
    }

    public function admin_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = ['email'=>$request->email, 'password'=>$request->password, 'group' => 1];
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        return redirect()->back()->with('message', 'Oppes! You have entered invalid credentials');
    }

    public function dashboard(Request $request)
    {
        $data = User::with('user_address')->get();
        // dd($data->toArray());
        if ($request->ajax()) {

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function ($query) {
                return $query->id;
            })
            ->addColumn('name', function ($query) {
                return $query->name;
            })
            ->addColumn('address', function ($query) {
                return (!empty($query->user_address->address)) ? $query->user_address->address : '' ;
            })  
            ->rawColumns(array('id', 'address', 'name'))
            ->make(true);
        }
        return view('admin.dashboard');
    }

    public function profile(Request $request)
    {
        $data = User::where('id', Auth::user()->id)->get();
        return view('admin.profile', compact('data'));
    }

    public function profile_data(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'mobile' => 'required',
        ]);
        User::where('id', Auth::user()->id)->update([
            'email' => $request->email,
            'name' => $request->name,
            'mobile' => $request->mobile
        ]);

        if($request->password != ''){
            $request->validate([
                'password' => 'required|min:3',
            ]);            
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->back()->with('message', 'Sucess! Profile updated succcessfully');
    }

}