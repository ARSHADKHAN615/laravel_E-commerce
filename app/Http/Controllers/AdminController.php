<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_ID')) {
            return redirect("admin/dashboard");
        } else {
            return view("admin.login");
        }
    }

    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // $result = admin::where(['email' => $email, 'password' => $password])->get();


        $result = admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put("ADMIN_LOGIN", true);
                $request->session()->put("ADMIN_ID", $result->id);
                $request->session()->put("user_name", $email);
                return redirect("admin/dashboard");
            } else {
                $request->session()->flash("msg", "Password Not Exist");
                return redirect('/');
            }
        } else {
            $request->session()->flash("msg", "Email Not Exist");
            return redirect('/');
        }
    }



    public function dashboard()
    {
        return view("admin/dashboard");
    }



    // public function updatePassword()
    // {
    //     $r = admin::find(1);
    //     $r->password = Hash::make("123");
    //     $r->save();
    // }
}
