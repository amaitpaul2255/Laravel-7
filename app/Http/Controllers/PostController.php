<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function blog(){
        $category = DB::table('categories')->get();
        return view("pages.blog", compact('category'));
    }

    public function StorePost(Request $request){

        $validateData = $request->validate([
            'title' => 'required | max:100 ',
            'blogdaital' => 'required | max:300',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        $data=array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->blogdaital;
        $image = $request->file('image');
        if($image){

            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='frontend/postimg/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            return Redirect()->route('all.post');

        }else{

            DB::table('posts')->insert($data);
            return Redirect()->route('all.post');
        }
    }

    public function PostShow(){
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->select('posts.*', 'categories.name')
                ->get();
        return view('post.allpost', compact('post'));
        // echo '<pre>';
        // print_r($post);
    }

    public function Viewpost($id){
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->select('posts.*', 'categories.name')
                ->where('posts.id', $id)
                ->first();
        return view('post.viewpost', compact('post'));
    }

    public function Editpost($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('post.Editpost', compact('category', 'post'));
    }

    public function Updatepost(Request $request, $id){
        //return $request->old_photo;
        $validateData = $request->validate([
            'title' => 'required | max: 100',
            'blogdaital' => 'required | max: 300',
            'image' => 'mimes:jpeg,jpg,png,PNG | max: 1000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->blogdaital;
        $image = $request->file('image');

        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'frontend/postimg/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            //unlink old image in database
            //unlink($request->old_photo);
            //file_exists($request->old_photo) ?? unlink($request->old_photo);
            if(file_exists($request->old_photo)){
                unlink($request->old_photo);
            }
            DB::table('posts')->where('id', $id)->update($data);
            return Redirect()->route('all.post');
        }else{
            $data['image']=$request->old_photo;
            DB::table('posts')->where('id', $id)->update($data);
            return Redirect()->route('all.post');
        }
    }

    public function Deletepost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->image;
       
        $delete = DB::table('posts')->where('id', $id)->delete();
        if($delete){
            unlink($image);
            //alart('successfully delete!');
            return Redirect()->back();
        }else{
            //alart('Something wrong!');
            return Redirect()->back();
        }

    }
}
