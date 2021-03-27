<?php

namespace App\Http\Controllers\admin_panel;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{

   public function index()
   {
       $result = Slide::all();
       return view('admin_panel.slides.index');
   }

    public function create()
   {
       return view('admin_panel.slides.create');
   }

   public function store(Request $request)
   {
       try {
        $path;
        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            $filename = $file->getClientOriginalName();
            $path = Storage::disk('test')->put('images/slides', $file);
        }
        $data=$request->except(['_token','img','view']);
        $data['img']=$path;
        $data['view']=$request->has('view')?1:0;
        if(isset($path))
        $ms=Slide::create($data);
        return \back();
       } catch (\Throwable $th) {
           dd($th->getMessage());
       }
   }

   public function edit($id)
   {
       $slide = Slide::find($id);
       return view('admin_panel.slides.edit')
           ->with('slide', $slide);
   }

   public function update(Request $request,$id)
   {
       $slide=Slide::find($id);
        try
        {
            if ($request->hasFile('img'))
            {
                $file = $request->file('img');
                $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif'];
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                $filename = $file->getClientOriginalName();
                $path = Storage::disk('test')->put('images/slides', $file);
            }
            if(isset($path))
            $slide->img=$path;
            $slide->row1=$request->row1;
            $slide->row2=$request->row2;
            $slide->row3=$request->row3;
            $slide->row4=$request->row4;
            $slide->row5=$request->row5;
            $slide->text_button=$request->text_button;
            $slide->href_button=$request->href_button;
            $slide->view=$request->has('view')?1:0;
            $slide->save();
            return \back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
   }

   public function delete($id)
   {
       $prd = Product::find($id);
       return view('admin_panel.products.delete')->with('product', $prd);
   }

   public function destroy(Request $request,$id)
   {
       $slideToDelete = Slide::find($id);
        unlink($slideToDelete->img);
       $slideToDelete->delete();
       return redirect()->route('admin.slides');
   }

   public function getAllSlides()
   {
       $data = Slide::all();
       return response()->json($data, 200);
   }
}
