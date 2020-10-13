<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BoloController extends Controller
{
    //bolo mathod
    public function bolo(){
        return view('contact');
    }

    // go category page
    public function addcategory(){
        return view('pages.addcategory');
    }

    //store category data
    public function storecategory(Request $request){

        //data validation
        $validateData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4,'
        ]);


        //query bulder
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category = DB::table('categories')->insert($data);
        return Redirect()->route('all.category');
        // if($category){
        //     $notification=array(
        //         'message'=>'Successfully Category insert',
        //         'alert-type'=>'success'
        //     );
        //     return Redirect()->back()->with($notification);
        // }else{
        //     $notification=array(
        //         'message'=>'Something went wrong',
        //         'alert-type'=>'error'
        //     );
        //     return Redirect()->back()->with($notification);
        // }
       // return response()->json($data);
    //    echo '<pre>';
    //    print_r($data);
    } 

    public function allcetegory(){
        $allcategory = DB::table('categories')->get();
        return view('pages.allcategories', compact('allcategory')); //here we can use 2 system (With() || compact())
        // echo '<pre>';
        // print_r($allcategory);
    }

    public function ViewCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('pages.viewcategory')->with('cat', $category);
        // echo '<pre>';
        // print_r($category);
    }

    public function Deleteitem($id){
        $deleteitem = DB::table('categories')->where('id', $id)->delete();
        return Redirect()->back();
    }

    public function Edititem($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('pages.editcategory')->with('cat', $category);
    }

    public function Updateitem(Request $request, $id){

        $validateData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->where('id', $id)->update($data);
        return Redirect()->route('all.category');
    }

}
