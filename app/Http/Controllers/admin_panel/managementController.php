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
			return view('admin_panel.dashboard.orderManagement')->with('sale',[]);
        }

        return view('admin_panel.orders.index')
        ->with('sale',$sales)
        ->with('status',['pending','processing','completed','decline']);
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
