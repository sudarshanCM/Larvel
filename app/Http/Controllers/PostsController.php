<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\CardContent;
use App\Background;
use App\Description;
use Illuminate\Support\Fascades\Storage;
use Illuminate\Filesystem\Filesystem;
class PostsController extends Controller
{
    //
    public function retrieve(){

    }

    public function addcard(Request $request,$_id){
        // dd($request->content,$_id);
        $data = new CardContent();
        $data->content = $request->content;
        $data->list_id = $_id;
    //    dd($data);
$data->save();

if($data){
    return back();
}

    }

    public function update(Request $request){
        $data = CardContent::findOrFail($request->target);
        $data->list_id = $request->to;
        $data->save();
        if($data){
            return back();
        }
    }

    public function description(Request $request,$_id){
        $org =  Description::where('content_id', $_id)->get()->each->delete();
        // dd($org);    
        // if($org) {

        //      $org->delete();
        // }
        // $org1=Description::delete($org);
        // $org->Description()->whereIn('content_id', $id)->get()->delete();
        // $delete = Description::destroy($_id); 
        $data = new Description();
        $data->content_id = $_id;
        $data->description = $request->description;
        $data->save();
        if($data){
            return back();
        }
    }
    public function image(Request $request,$_id){


        
        if($request->hasFile('cover_image')){
            $delete = Background::destroy($_id);    
            $file = new Filesystem;
            $file->cleanDirectory('/home/system3/Documents/Larvel/public/storage/cover_images');
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            $post = new Background;
            $post->cover_image = $fileNameToStore;
            $post->save();
            if($post){
                return back();
            }

        }
       
        

    }


    public function home(){
        $lists = Lists::all();
        $contents = CardContent::all();
        $image = Background::all();
        // dd($image[0]->cover_image);
        return view('index',compact('lists','contents','image'));
    }
    public function add(Request $request){
        // dd($request->name);
$data = new Lists($request->all());
$data->save();

if($data){
    return back();
}


    }

}
