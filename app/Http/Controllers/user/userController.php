<?php
namespace App\Http\Controllers\user;
use Session;
use App\sale;
use App\User;
use App\Slide;
use App\Swish;
use App\Address;
use App\Product;
use App\Category;
use App\SalesProduct;
use App\MarketSetting;
use App\SalesProductTemp;
use App\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\orderRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\SwishPaymentController;

class userController extends Controller
{
    public function index()
    {
    	$res = Product::all();
        $categories = ProductCategories::with('childCategories.childCategories')->with('parentCategory')->get();
        // return response()->json($categories);
        $slides=Slide::where('view',1)->get();
    	return view('store2.index_s')
            ->with('products', $res)
            ->with("categories", $categories)
            ->with('index', 1)
            ->with('slides', $slides);
    }
    public function view($id)
    {
        $products = ProductCategories::find($id);

        // if(is_null($products))
        // return view('store2.empty-search');

        return view('store2.search')
            ->with('products', $products->products);

    }
    public function viewCheckout()
    {
        // $colorList = explode(',',$res->colors);
        return view('store2.checkout');
    }
    public function search(Request $r){
        $category ;
        $name ;
        if($r->query("c")){
            $category = $r->query("c");
        }
        if($r->query("n")){
            $name = $r->query("n");
        }
        $res = Product::all();
        $cat = ProductCategories::all();

        if(isset($category) && isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ) );
            //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" );
            //$a = 0;
        }
        else if(isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'" ) );
          //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%'" );
           // $a = 1;
        }
        else if(isset($category)){
            $sRes = Product::where('category_id',$category)->get();
            if(count($sRes) == 0)
            {
                return view('store2.empty-category');
            }
            else
            {
                return view('store2.search')
                ->with('products', $sRes);
            }
        }
        else{
            $sRes = DB::table('products')
            ->get();
            return view('store2.search')
            ->with('products', $sRes)
            ->with("cat", $cat)
            ->with("a", $category);
           // $a= 3;
        }

        if(!isset($category)) {
            $category = -1;
        }
        //dd($sRes);
    	return view('store2.search')
            ->with('products', $sRes)
            ->with("cat", $cat)
            ->with("a", $category);
    }

    public function post($id,orderRequest $r)
    {
        //dd($r->discount_price_holder);

        if(!(Session::has('cart')))
        {
            Session::put('orderCounter',1);
            $c=$id.":".$r->quantity.":".$r->color.":".Session::get('orderCounter');   //the order counter is added after color so that order serial can be obtained
            Session::put('cart',$c);
        }
        else
        {
            Session::put('orderCounter',Session::get('orderCounter')+1);
            $cd=$id.":".$r->quantity.":".$r->color.":".Session::get('orderCounter');
            $total=Session::get('cart').",".$cd;
            Session::put('cart',$total);
        }
        return redirect()->route('user.home');
    }

    public function cart(Request $r)
    {   //Session::forget('cart');
        $res = Product::all();
        $cat = ProductCategories::all();
        if(!Session::has('cart'))
        {
            return view('store2.cart')->with('all',null)
            ->with('products',[])
            ->with('products', $res)
            ->with("cat", $cat);
        }
        $cart=[];
        $product=[];
        $cost=0;
        $cost_after_quantity=0;
        $totalCart = explode(',',Session::get('cart'));
        //dd(Session::get('cart'));
        foreach($totalCart as $c)
        {
            $cart[]=explode(':',$c);
            $a=explode(':',$c);
            $res = Product::find($a[0]);
            $product[]=$res;
            $cost_after_quantity=$a[1]*$res->discount;
            $cost+= $cost_after_quantity;
            Session::put('price',$cost);
        }

    	return view('store2.cart')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('all',$cart)
            ->with('prod',$product)
            ->with('total',Session::get('price'));
    }
public function proceedCart(CheckoutRequest $request)
{
    if(Session::has('user')){
        $user=User::find(session()->get('user')->id);
        $ms=MarketSetting::find(1);
        $shipping = 0;
        $weight   = 0;
        $total    = 0;
        $count    = 0;
        $sales=SalesProductTemp::where('user_id',session()->get('user')->id)->get();
        foreach ($sales as $key => $sale) {
            $weight += $sale->product->weight * $sale->quantity;
            $total  += $sale->price * $sale->quantity;
            $count  += $sale->quantity;
            $sale->delete();
        }
        $shipping=($weight*$ms->shipping)/100;
        $order = new sale;
        $order->order_number = uniqid('MAT-');
        $order->user_id =  $user->id;
        $order->address_id = $user->addresses->where('default',1)->first()->id;
        $order->grand_total = ceil($total + $shipping);
        $order->item_count = $count;
        $order->shopping_country = $request->country ;
        $order->shipping_fullname = $request->fname.' '.$request->lname;
        $order->shipping_address = $request->street;
        $order->shipping_city = $request->city;
        $order->shipping_state = $request->state;
        $order->shipping_zipcode = $request->zip;
        $order->shipping_phone = $request->phone;
        $order->notes = $request->notes;
        $order->save();
        foreach ($sales as $key => $sale)
        {
            $sale_product = new SalesProduct;
            $sale_product->sale_id = $order->id;
            $sale_product->product_id = $sale->product_id;
            $sale_product->price = $sale->price;
            $sale_product->quantity = $sale->quantity;
            $sale_product->save();
        }
        $s=new Swish;
        $s->order_id=$order->id;
        $s->properties='';
        $s->swish_number=$request->swish;
        $s->save();
        SwishPaymentController::createPaymentRequest($order->id,$request->swish,ceil($total + $shipping));
        return back()->withStatus('Placed your order successfuly');
    }
    return back()->withErrors('Somthing Error ,please try again or check your login');
}
//    for quntity control in cart
    public function editCart(Request $r)
    {
        foreach ($r->sort as $key => $product_id) {
        SalesProductTemp::where(['product_id'=>$product_id,'user_id'=>session()->get('user')->id])->delete();

            $product=Product::find($product_id);
            $newQuantity=$r->count[$key];
            $spt             = new SalesProductTemp;
            $spt->product_id = $product->id;
            $spt->price = $product->discount;
            $spt->user_id    = session()->get('user')->id;
            $spt->quantity   = $newQuantity;
            $spt->save();
        }

        return back()->withStatus('Updated cart successfully');
    }
//    for quntity control in cart ENDS
    public function deleteCartItem($id)
    {
        // $counter=0;
        // $newtotalCart = explode(',',Session::get('cart'));
        // //dd(Session::get('cart'));
        // foreach($newtotalCart as $c)
        // {
        //     $newcart[]=explode(':',$c);
        // }
        // foreach($newcart as $t)
        // {
        //         if($t[3]==$r->serial)
        //         {
        //             $another_counter=$counter;
        //         }
        //         $counter++;
        // }
        // array_splice($newtotalCart, $another_counter, 1);

        // //testing Starts
        // //dd(Session::get('tempCart'));
        //  foreach($newtotalCart as $c2)
        // {

        //     $newcart2[]=explode(':',$c2);
        // }

        // if($newtotalCart==null)
        // {
        //     Session::forget('cart');
        //     Session::forget('price');
        //     Session::forget('orderCounter');
        //     return json_encode("Empty");
        //     exit;

        // }

        // else
        // {
        //     foreach($newcart2 as $t2)
        // {

        //         if(!(Session::has('tempCart')))
        //         {

        //             $str2=$t2[0].":".$t2[1].":".$t2[2].":".$t2[3];
        //             Session::put('tempCart',$str2);


        //         }
        //         else
        //         {
        //             $str2=$t2[0].":".$t2[1].":".$t2[2].":".$t2[3];
        //             $mytotal2=Session::get('tempCart').",".$str2;
        //             Session::put('tempCart',$mytotal2);
        //         }

        // }

        //     Session::forget('cart');
        //     Session::put('cart',Session::get('tempCart'));
        //     Session::forget('tempCart');

        //     //for price update
        //     $res = Product::all();
        //     $cat = Category::all();
        //     $cart=[];
        //     $product=[];
        //     $cost=0;
        //     $cost_after_quantity=0;
        //     Session::forget('price');
        //     $totalCart = explode(',',Session::get('cart'));
        //     //dd(Session::get('cart'));
        //     foreach($totalCart as $c)
        //     {
        //         $cart[]=explode(':',$c);
        //         $a=explode(':',$c);
        //         $res = Product::find($a[0]);
        //         $product[]=$res;
        //         $cost_after_quantity=$a[1]*$res->discount;
        //         $cost+= $cost_after_quantity;
        //         Session::put('price',$cost);

        //     }
        //     $szn[0]=Session::get('cart');
        //     $szn[1]=Session::get('price');
        //     $szn[2]=$cost;
        //     $szn[3]=$r->serial;
        //     return json_encode($szn);
        //     exit;
        // }

        if(Session::has('user'))
        {
            $sale=SalesProductTemp::where(['user_id' => session()->get('user')->id,'product_id'=>$id])->delete();
            return back();
        }
        else
        {
            \abort(500);
        }

    }
    public function deleteCartItems()
    {
        if(Session::has('user'))
        {
            $sale=SalesProductTemp::where(['user_id' => session()->get('user')->id])->delete();
            return back();
        }
        else
        {
            \abort(500);
        }
    }

    public function addToCart(Request $request)
    {
        if(Session::has('user'))
        {
            $product=Product::find($request->id);
            $sales= new SalesProductTemp();
            $sales->user_id=session('user')->id;
            $sales->product_id=$product->id;
            $sales->price=$product->discount;
            $sales->quantity=$request->quantity;
            $sales->save();
            return response()->json();
        }
    }

    public function confirm(Request $r)
    {
        if($r->has('order'))
        {
            if(Session::has('user'))
            {
                $sales= new sale();
                $sales->user_id=session('user')->id;
                $sales->product_id=session('cart');
                $sales->order_status='Placed';
                $sales->price=session('price');
                $sales->save();
           // dd(1);
            Session::forget('cart');
            Session::forget('price');
            Session::forget('orderCounter');
            //dd( $r->session());
            return redirect()->route('user.cart');
            }
            else{
                return redirect()->route('user.cart');
            }

        }

        if($r->has('signup'))
        {
            $validatedData = $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'tel' => 'required|numeric',
            'pass' => 'required|min:5'
            ]);
            //dd($validatedData);
            $u=new User();
            $add=new Address();
            $add->address=$r->address;
            $add->phone_number=$r->tel;
            $add->save();
            $add_id=$add->id;
            $u->full_name=$r->name;
            $u->email=$r->email;
            $u->password=$r->pass;
            $u->address_id=$add_id;
            $u->phone=$r->tel;
            //dd($u);
            $u->save();
            $user=User::find($u->id);
            Session::put('user',$user);
            return redirect()->route('user.cart');
        }

    }
    public function history(Request $r)
    {
        $res1= sale::where('user_id', session('user')->id)->get();
        if(!$res1)
        {
            return view('user.orderHistory')->with('all',[])
                 ->with('products',[])
                 ->with('sale',[]);
        }

        $cart=[];
        $product=[];
        $id=[];
        foreach($res1 as $r )
        {
             $totalCart = explode(',',$r->product_id);
             foreach($totalCart as $c)
             {
                $cart[]=array_prepend(explode(':',$c), $r->id);
                $a=explode(':',$c);
                $res = Product::find($a[0]);
                $product[]=$res;
             }
        }
        $res = Product::all();
        $cat = ProductCategories::all();
          //dd($cart);
         return view('store.history')
         ->with('products', $res)
         ->with("cat", $cat)
         ->with('all',$cart)
         ->with('prods',$product)
         ->with('sale',$res1);
    }

}
