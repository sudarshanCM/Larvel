<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\CardContent;
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

    public function home(){
        $lists = Lists::all();
        $contents = CardContent::all();
        return view('index',compact('lists','contents'));
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
