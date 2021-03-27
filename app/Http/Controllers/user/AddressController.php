<?php

namespace App\Http\Controllers\user;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::where('user_id',session()->get('user')->id)->get();
        return view('store2.address.dash-address-book',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store2.address.dash-address-add');
    }

    public function getDefault()
    {
        $addresses=Address::all();
        return view('store2.address.dash-address-make-default',compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
            'address' => 'required|min:10',
            'phone_number' => 'required|numeric|min:9',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->getMessageBag());
        }

        if($request->has('default'))
        {
            Address::where('user_id',session()->get('user')->id)->update(['default' => 0]);
        }
        $address=Address::find($request->address_id);
        $address->address=$request->address;
        $address->phone_number=$request->phone_number;
        $address->default = $request->has('default') ? 1:0;
        $address->save();
        return back()->withStatus('update address successfully');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $rules=[
            'address' => 'required|min:10',
            'phone' => 'required|numeric|min:9',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->getMessageBag());
        }
        $address= new Address;
        $address->address=$request->address;
        $address->phone_number=$request->phone;
        $address->default=0;
        $address->user_id=session()->get('user')->id;
        $address->save();
        return back()->withStatus('New address added successfully');

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
        $address=Address::find($id);
        return \view('store2.address.dash-address-edit',\compact('address'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
