<?php

namespace App\Http\Controllers\admin_panel;
use App\Product;
use App\Category;
use App\CategoryImage;
use App\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryVerifyRequest;
use App\Http\Requests\CategoryEditVerifyRequest;

class categoriesController extends Controller
{
    public function index()
    {
        $data['catlist']=ProductCategories::all();
        $categories = ProductCategories::with('parentCategory.parentCategory')
        ->whereHas('childCategories')
        ->get();
        $data['categories'] = $categories;
    	return view('admin_panel.categories.index')->with($data);
    }

    public function posted( CategoryVerifyRequest $request)
    {
        // $cat = new Category();
        // $cat->name = $request->Name;
        // $cat->type = $request->Icon;
        // $cat->save();
        $cat = new ProductCategories();
        $cat->name = $request->Name;
        $cat->icon = $request->Icon;
        $cat->description = $request->description;
        $cat->slug = $request->slug;
        $cat->category_id = $request->category_id;
        $cat->save();
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $cat = ProductCategories::find($id);
        return view('admin_panel.categories.edit')
            ->with('category', $cat);
    }

    public function update(CategoryEditVerifyRequest $request, $id)
    {

        $catToUpdate = ProductCategories::find($request->id);
        $catToUpdate->name = $request->Name;
        $catToUpdate->icon = $request->Type;
        $cat->description = $request->description;
        $cat->slug = $request->slug;
        $catToUpdate->save();
        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $cat = ProductCategories::find($id);

        return view('admin_panel.categories.delete')
            ->with('category', $cat);
    }

    public function destroy(Request $request)
    {   //Deleting Category related Products
        $prdsToDelete = Product::all()->where('category_id', $request->id);

        foreach ($prdsToDelete as $prdToDelete)
        {
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

        }





        $catToDelete = ProductCategories::find($request->id);
        $catToDelete->childCategories->update(['category_id'=>'']);
        $catToDelete->delete();



        return redirect()->route('admin.categories');
    }
    public function getAllCategories()
    {
        $data = ProductCategories::all();
        foreach ($data as $key => $d) {
            $date = new \DateTime();
            $date->setTimestamp(strtotime($d->created_at));
            $data1[$key]['id']=$d->id;
            $data1[$key]['name']=$d->name;
            $data1[$key]['description']=$d->description;
            $data1[$key]['type']=$d->type;
            $data1[$key]['slug']=$d->slug;
            $data1[$key]['created_at']=$date->format('Y-m-d');
        }

        return response()->json($data1, 200);
    }

    public function addImage(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            $filename = $file->getClientOriginalName();
            $path = Storage::disk('test')->put('images/categories', $file);

        }
        $data=$request->except(['_token','image']);
        $data['size']=4;
        $data['image_path']=$path;
        if(isset($path))
        $ms=CategoryImage::create($data);
        return \back();
    }
}
