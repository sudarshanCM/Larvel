<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\User;
use App\CardContent;
use App\Background;
use App\Description;
use App\Comment;
use App\Notify;
use App\Project;
use App\Access;
use App\AdminDelete;
use App\Notifications\CardMoved;
use Illuminate\Support\Fascades\Storage;
use Illuminate\Filesystem\Filesystem;
use App\Overrides\Notifications\Notifiable\Notifiable;
use Mail;
use App\Events\accessEvent;
use App\Events\NewCard;
use App\Events\ShoutOut;
use App\Events\projectEvent;
use App\Events\adminDeleteEvent;
use App\Events\projectCardEvent;
class PostsController extends Controller
{
    use Notifiable;
    //
    public function retrieve(){
        $lists = Lists::all();
        return $lists;
    }

    public function addcard(Request $request,$_id){
        // dd($request->content,$request->assignedTo);
        // dd("HI");
        $users = new Notify();
        $user1 = auth()->user();
        // dd($users);
        $users->cardCreatedBy = $user1->name;
        $users->content = $request->content;
        $users->list_id = $_id;
        $users->save(); 
        $data = new CardContent();
        // dd($data->content);
        $data->content = $request->content;
        $data->list_id = $_id;
        $data->cardCreatedBy=$user1->name;
        $data->assignedTo = $request->assignedTo;
    //    dd($data);
    // $insertData = DB::connection('mongodb')->collection('card_contents')->insert($data);
        // dd($data);
        // event(new projectCardEvent($data));
        // event(new ShoutOut($data));
        // dd($user->cardCreatedBy);
        
     $data->save();
// dd("HsIH");
// dd($data);
// dd($user1->email,$request->assignedTo);
// $to = new \SendGrid\Email("RECEIVER NAME", $request->assignedTo);
// $To = $request->assignedTo;
$data1 = array('content' => $request->content,'assignedBy'=>$user1->name);
Mail::send ( 'email', $data1,function ($message)  use ($request) {
        
    $message->from ( 'sudarshan@codingmart.com', 'Just Laravel' );
    
    $message->to ( $request->assignedTo )->subject ( 'Card Assigned' );
} );

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
        // dd($data);
        $data->save();
        if($data){
            return back();
        }
    }
    public function deleteList(Request $request,$_id){
        // event(new adminDeleteEvent($_id));
        // dd($name);
        $name = $request->name;
        // dd("HI",$name);
        $data = new AdminDelete($name);
        $org =  Lists::where('_id', $_id)->get()->each->delete();
        return back();
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
public function desc(Request $request,$_id){
    $org =  Description::where('content_id', $_id)->get();
    return $org;
}
    public function comment(Request $request,$_id){
        $data = new Comment();
        $data->content_id = $_id;
        $data->comment = $request->comment;
        $data->save();
        if($data){
            return back();
        }

    }

    // public function getdesc(Request $request,$_id){
    //     $org =  Description::where('content_id', $_id)->get();
    //     // $this->home();
        
    //     return view('index',compact('org'));
    //     // return $org;
    //     // return back();
        
        
    // }

    public function move(Request $request){

        $content_id=$request->content_id;
        $name=$request->list_name;
        $list_id =  Lists::where('name', $name)->get();
        $findcard = CardContent::findOrFail($request->content_id);
        $findcard->list_id = $list_id[0]->_id;
        $findcard->save();
        return $this->home();
    }

public function deleteCard(Request $request,$_id){
    $deleteCard =  CardContent::where('_id', $_id)->get()->each->delete();
    return back();

}
public function login(){
    return redirect()->route('login');
}

public function cardname(){
    $contents = CardContent::all();
    return $contents;
}

public function addaccess(Request $request){
    // dd("HEY");
    // event(new accessEvent);
    // event(new accessEvent(auth()->user()));
    // broadcast(new accessEvent(auth()->user()));
    $data = new Access();
    $data->access_id = $request->access_id;
    $data->project_id =$request->project_id; 
      $data->user_id = $request->user_id;
      $data->save();

}

public function deleteaccess(Request $request,$project,$name,$access_id){
    // dd("HEY");
    broadcast(new accessEvent(auth()->user()));
    $org =  Access::where([['project_id', $project],['access_id',$access_id],['user_id',$name]])->get()->each->delete();
    return back();
}

public function myProjects(){
    $user1 = auth()->user();
    $currentUser = $user1->name;
    $user = User::all();
    $projectList =  Project::where('createdBy', $currentUser)->get();
    $access = Access::all();
    for($i=0;$i<count($projectList);$i++){
        $access = Access::where('project_id',$projectList[$i]->_id)->get();
        for($j=0;$j<count($access);$j++){
        switch($access[$j]->access_id){
            case 1:
                $readaccess[]=[
                    'project_id'=>$projectList[$i]->_id,
                                'project_name' =>$projectList[$i]->projectName,
                                'user_name' => $access[$j]->user_id,
                                  ];
                break;

                case 2:
                    $writeaccess[]=[
                        'project_id'=>$projectList[$i]->_id,
                                    'project_name' =>$projectList[$i]->projectName,
                                    'user_name' => $access[$j]->user_id,
                                      ];
                    break;
                    case 3:
                        $editaccess[]=[
                            'project_id'=>$projectList[$i]->_id,
                                        'project_name' =>$projectList[$i]->projectName,
                                        'user_name' => $access[$j]->user_id,
                                          ];
                        break;

                        case 4:
                            $deleteaccess[]=[
                                            'project_id'=>$projectList[$i]->_id,
                                            'project_name' =>$projectList[$i]->projectName,
                                            'user_name' => $access[$j]->user_id,
                                              ];
                            break;

        }
        }
    }
// dd($readaccess[0]['project_name']);
    // dd($projectList[0]->projectName);
    // $access = Access::all();
    // for($i=0;$i<count($projectList);$i++){
    //   $access[$i] = Access::where('project_id',$projectList[$i]->_id)->get();
        
    // }
    // dd($access);
    
    // for($i=0;count($access);$i++){
    //     for($j=0;count($access[$i]);$i++){
    //         switch($access[$i][$j]->access_id){
    //             case 1:
    //               $readaccess=[
    //                   'project_name' =>$projectList[$i]->projectName,
    //                     'project_id' => $access[$i][$j]->project_id,
    //                     'user_id' => $access[$i][$j]->user_id,
    //               ];
    //                break;

    //                case 2:
    //                 $writeaccess=[
    //                     'project_name' =>$projectList[$i]->projectName,
    //                       'project_id' => $access[$i][$j]->project_id,
    //                       'user_id' => $access[$i][$j]->user_id,
    //                 ];
    //                  break;

    //                  case 3:
    //                     $editaccess=[
    //                         'project_name' =>$projectList[$i]->projectName,
    //                           'project_id' => $access[$i][$j]->project_id,
    //                           'user_id' => $access[$i][$j]->user_id,
    //                     ];
    //                      break;


    //                      case 4:
    //                         $deleteaccess=[
    //                             'project_name' =>$projectList[$i]->projectName,
    //                               'project_id' => $access[$i][$j]->project_id,
    //                               'user_id' => $access[$i][$j]->user_id,
    //                         ];
    //                          break;
    //         }
    //     }
    // }



    return view('myproject',compact('projectList','readaccess','writeaccess','editaccess','deleteaccess','user'));
}

public function project(){
    $users = User::all();
    return view('project',compact('users'));
}

public function addProject(Request $request){

    $user1 = auth()->user();
    $currentUser = $user1->name;
    $currentUserId = $user1->_id;
    $data = new Project();
    $data->projectName = $request->projectName;
    $data->createdBy = $currentUser;
    $data->save();
    // $project = Project::findOrFail($request->projectName);
    $org =  Project::where('projectName', $request->projectName)->get();
    for ($i = 0; $i < count($request->readAccess); $i++) {
        $answers[] = [
            'access_id' => '1',
            'project_id' => $org[0]->_id,
            'user_id' => $request->readAccess[$i]
        ];
    }
    for ($i = 0; $i < count($request->writeAccess); $i++) {
        $answers[] = [
            'access_id' => '2',
            'project_id' => $org[0]->_id,
            'user_id' => $request->writeAccess[$i]
        ];
    }
    for ($i = 0; $i < count($request->editAccess); $i++) {
        $answers[] = [
            'access_id' => '3',
            'project_id' => $org[0]->_id,
            'user_id' => $request->editAccess[$i]
        ];
    }
    for ($i = 0; $i < count($request->deleteAccess); $i++) {
        $answers[] = [
            'access_id' => '4',
            'project_id' => $org[0]->_id,
            'user_id' => $request->deleteAccess[$i]
        ];
    }
    for($i=1;$i<5;$i++){
        $answers[]=[
            'access_id'=>$i,
            'project_id' => $org[0]->_id,
            'user_id'=>$currentUser
        ];
    }
    Access::insert($answers);
    return $answers;
    
    

}

public function admin(){
    broadcast(new ShoutOut('somedata'));
    return view('admin');
}

    public function home(Request $request){
        // dd("Hey",$request->project);
        $selectedProject =$request->project; 
        // $user = User::find(0);
        // dd($user);
        // $user = User::first();
        // $user->notify(new CardMoved);
        $user1 = auth()->user();
        $currentUser = $user1->name;
        $currentUserId = $user1->_id;
        $project = $user1->project;
        $lists = Lists::all();
        $contents = CardContent::all();
        $image = Background::all();
        $descs = Description::all();
        $comments = Comment::all();
        $users = User::all();
        $project_id =  Project::where('projectName', $selectedProject)->get();
        // dd($project_id[0]->_id);
        $access = Access::all();
        $access1 = false;
        $access2 = false;
        $access3 = false;
        $access4 = false;
        for ($i = 0; $i < count($access); $i++) {
            if($currentUser == $access[$i]->user_id && $project_id[0]->_id == $access[$i]->project_id ){
                switch($access[$i]->access_id){
                    case 1:
                        $access1 = true;
                        break;
                    case 2:
                        $access2 = true;
                        break;
                    case 3:
                        $access3 = true;
                        break;
                    case 4:
                        $access4 = true;
                        break;

                        
                }
            }
            
        }
// dd($access1,$access2,$access3,$access4);
        // dd($descs[0]->content_id);
        // dd($image[0]->cover_image);
        return view('index',compact('users','lists','contents','image','descs','comments','currentUser','project','selectedProject','access1','access2','access3','access4'));
    }
    public function add(Request $request){
        // dd($request->name);
        $user1 = auth()->user();
        // dd("hi");
$data = new Lists($request->all());
event(new projectEvent($data));
$data->cardCreatedBy = $user1->name;
$data->save();

if($data){
    return back();
}


    }


   

    public function authorizeUser(Request $request) {
        // echo 'Check 123';
        // dd($request);
        // echo $request;
        // \Debugbar::disable();
        // if (!Auth::check()) {
     
        //     return new Response('Forbidden', 403);
     
        // }
        dd($request);
     $pusher = new Pusher('88b46fc61e089709e692','e90d73fd7dc7f282a44f','945729');
    $socket_id = $_POST['socket_id'];
    $channel_name = $_POST['channel_name'];
    $auth = $pusher->socket_auth($socket_id, $channel_name);
    echo($auth);
     
        // echo $this->pusher->socket_auth(
     
        //     $request->input('channel_name'), 
     
        //     $request->input('socket_id')
     
        // );
     

    }

}
