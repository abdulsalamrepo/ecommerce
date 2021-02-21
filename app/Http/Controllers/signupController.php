<?php

namespace App\Http\Controllers;

use App\sale;


use App\User;
use App\Address;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class signupController extends Controller
{
    public function userIndex()
    {
        if(session()->has('user'))
        {
            return redirect()->route("user.cart");
        }
        $res = Product::all();
        $cat = Category::all();
    	return view('store2.signup')
        ->with('products', $res)
        ->with("cat", $cat);
    }

    public function userPosted(Request $r)
    {
        // return response()->json($r, 200);
            $validatedData = $r->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'day' => 'required',
            'month' => 'required',
            'gender' => 'required',
            'year' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'tel' => 'required|numeric',
            'pass' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:pass'
            ]);

            //dd($validatedData);
            $u=new User();
            $add=new Address();

            $u->first_name=$r->fname;
            $u->last_name=$r->lname;
            $u->email=$r->email;
            $u->password=Hash::make($r->pass);
            $u->phone=$r->tel;
            $u->gender=$r->gender;
            $u->day=$r->day;
            $u->month=$r->month;
            $u->year=$r->year;
            $u->save();
            $add->area=$r->address;
            $add->city=$r->city;
            $add->zip=$r->zip;
            $add->user_id=$u->id;
            $add->default=true;
            $add->save();
            $user=User::find($u->id);
            $r->session()->put('user',$user);
            return redirect()->route('user.home');
    }

    public function emailCheck(Request $r)
    {
       $user = User::where('email',$r->email)->first();

        if($user==null)
        {
             $emailstate = 0;
        }
        else
        {
            $emailstate = 1;
        }

         echo json_encode($emailstate);
    exit;
    }


}
