<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\User;
use App\Address;
class managementController extends Controller
{
    public function manage()
    {
    	$sales= sale::all();
        if(is_null($sales))
        {
			return view('admin_panel.dashboard.orderManagement')->with('all',[])
	         ->with('products',[])
	         ->with('sale',[]);
        }

        $cart=[];
        $product=[];
        $users=[];
        foreach($sales as $r )
        {
            // $users[]   = DB::select( DB::raw("select users.id as id , CONCAT( users.first_name, ' ', users.last_name ) as full_name , addresses.area as area , addresses.city as city , addresses.zip as zip from users inner join addresses on users.id = addresses.user_id where users.id = $r->user_id" ))[0];
            // // $totalCart = explode(',',$r->product_id);
            // // foreach($totalCart as $c)
            // // {
            // //     $cart[]=array_prepend(explode(':',$c), $r->id);
            // //     $a=explode(':',$c);
            // //     $res = Product::find($a[0]);
            // //     $product[]=$res;
            // // }
            // $product[]=$r->product;
            $r->product;
            $r->user->addresses;
        }

        return view('admin_panel.orders.index')
        ->with('all',$cart)
        ->with('products',$product)
        ->with('sale',$sales)
        ->with('users',$users)
        ->with('status',['Placed','On Process','Delivered','Cancel']);

    }
    public function update(Request $r)
    {
    	$n=sale::find($r->orderId);
    	if(!is_null($n))
    	{
    		$n->order_status=$r->stat;
    		$n->save();
    	}
         return redirect()->route('admin.orderManagement');

    }
}
