<?php

namespace App\Http\Controllers\admin_panel;

use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductVerifyRequest;
use App\Http\Requests\ProductEditVerifyRequest;


class productsController extends Controller
{

   public function index()
    {
        $result = Product::all();
    	return view('admin_panel.products.index')->with('prdlist', $result);
    }

     public function create()
    {
        $result = Category::all();
        return view('admin_panel.products.create')->with('catlist', $result);
    }

    public function store(ProductVerifyRequest $request)
    {
        try {
            // $img = explode('|', $request->img);
            // for ($i = 0; $i < count($img) - 1; $i++) {
            // if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
            //     $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);
            //     $ext = '.jpg';
            // }
            // if (strpos($img[$i], 'data:image/png;base64,') === 0) {
            //     $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]);
            //     $ext = '.png';
            // }

            $extension = explode('/', mime_content_type($request->img))[1];
            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif'];
            $check = in_array($extension, $allowedfileExtension);
            $dir = 'products_images';
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            $path=$dir.'/'.Str::random(50).'.'.$extension;
            // Storage::disk('test')->put($path, base64_decode($request->img));
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->img));
            file_put_contents($path, $data);
            $prd = new Product();
            $prd->image_name = $path;
            $prd->name = $request->Name;
            $prd->weight = $request->weight;
            $prd->description = $request->Description;
            $prd->category_id = $request->Category;
            $prd->price = $request->Price;
            $prd->discount = $request->Discounted_Price;
            $prd->colors = $request->Colors;
            $prd->tag = $request->Tags;
            $prd->save();
            // $img[$i] = str_replace(' ', '+', $img[$i]);
            // $data = base64_decode($img[$i]);
            // $temp_string='/uploads/products/'.$prd->id;
            // if (!file_exists(public_path().$temp_string)) {
            //     mkdir( public_path().$temp_string, 0777, true);
            //     $file = $temp_string2.'/1'.$ext;
            // if (file_put_contents($file, $data))
            // {
            //     echo "<p>Image $i was saved as $file.</p>";
            // }
            // else
            // {
            //     echo '<p>Image $i could not be saved.</p>';
            // }
            // }
        // }
        return redirect()->route('admin.products');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function edit($id)
    {
        $cat = Category::all();
        $prd = Product::find($id);
        return view('admin_panel.products.edit')
            ->with('product', $prd)
            ->with('catlist', $cat)
            ->with('select_attribute', '');
    }

    public function update(ProductEditVerifyRequest $request, $id)
    {
        $prdToUpdate = Product::find($request->id);
        $prdToUpdate->name = $request->Name;
        $prdToUpdate->description = $request->Description;
        $prdToUpdate->price = $request->Price;
        $prdToUpdate->weight = $request->weight;
        $prdToUpdate->discount= $request->Discounted_Price;
        $prdToUpdate->category_id = $request->Category;
        $prdToUpdate->colors = $request->Colors;
        $prdToUpdate->tag= $request->Tags;
        //NEW FILE UPLOADED
        if($request->img!="")
        {
            $img = explode('|', $request->img);
            $extension = explode('/', mime_content_type($img[0]))[1];
            $path='products_images/'.Str::random(50).'.'.$extension;
            // Storage::disk('test')->put($path, base64_decode($img[0]));
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img[0]));

            file_put_contents($path, $data);
            $prdToUpdate->image_name = $path;
        }
        $prdToUpdate->save();
        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $prd = Product::find($id);
        return view('admin_panel.products.delete')
            ->with('product', $prd);
    }

    public function destroy(Request $request)
    {
        $prdToDelete = Product::find($request->id);
        //deleting image folder
        try{
            $src='uploads/products/'.$prdToDelete->id.'/';
            $dir = opendir($src);
            while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                    rrmdir($full);
                }
                else {
                    unlink($full);
                }
                }
            }
            closedir($dir);
            rmdir($src);
        }
        catch(\Exception $e){

        }
        //deleting image folder done
        $prdToDelete->delete();
        return redirect()->route('admin.products');
    }

    public function getAllProducts()
    {
        $data = Product::all();
        foreach ($data as $key => $v) {
            $v->category;
        }
        return response()->json($data, 200);
    }


}
