<?php

namespace App\Http\Controllers;

use App\sale;
use App\User;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{

    public function index()
    {

        $lastRecent=sale::selectRaw('id,product_id,created_at,max(price) as price , sum(quantity) as quantity')
            ->where('user_id',session()->get('user')->id)
            ->groupBy('created_at')
            ->groupBy('product_id')
            ->groupBy('id')
            ->orderBy('id','desc')
            ->limit(4)
            ->get();
            foreach ($lastRecent as $key => $sale) {
                $sale->product;
                $sale['total']=$sale->price*$sale->quantity;
            }
            $address=Address::where('default',1)->first();
        return view('store2.dashboard',compact('lastRecent','address'));
    }

    public function profile()
    {
        return view('store2.dash-my-profile');
    }
    public function myOrders()
    {
        $lastRecent=sale::selectRaw('id,product_id,created_at,max(price) as price , sum(quantity) as quantity')
        ->where('user_id',session()->get('user')->id)
        ->groupBy('created_at')
        ->groupBy('product_id')
        ->groupBy('id')
        ->orderBy('id','desc')
        ->limit(5)
        ->get();
        foreach ($lastRecent as $key => $sale) {
            $sale->product;
            $sale['total']=$sale->price*$sale->quantity;
        }
        return view('store2.dash-my-order',compact('lastRecent'));
    }


    public function myOrder($id)
    {
        $order=sale::find($id);
        $order->product;
        return view('store2.dash-manage-order',compact('order'));
    }
    public function edit()
    {
        return view('store2.dash-edit-profile');
    }

    public function getFormChangePassword()
    {
        return view('store2.change-password');
    }

    public function password(PasswordRequest $request)
    {
        User::find(session()->get('user')->id)->update(['password',Hash::make($request->password)]);
        return back()->withStatus('update password successfully');
    }

    public function editProfile()
    {
        return view('store2.dash-edit-profile');
    }

    public function storeProfile(Request $request)
    {
        $rules = [
            "fname" => "required|min:3",
            "lname" => "required|min:3",
            "year" => [ "required"],
            "month" => [ "required"],
            "day" => ["required"],
            "gender" => [ "required"],
            "phone"  => "required|numeric",

        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->getMessageBag());
        }
        User::find(session()->get('user')->id)->update([
        'first_name'=>$request->fname,
        'last_name'=>$request->lname,
        'year'=>$request->year,
        'month'=>$request->month,
        'day'=>$request->day,
        'phone' => $request->phone
        ]);

        return back()->withStatus('Update Profile Successfully');
    }



}
