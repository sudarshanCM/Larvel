<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
{{-- <script type="text/javascript" src="{{asset('css/bootstrap.js')}}"></script> --}}
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
        <script src="{{asset('js/app.js')}}"></script>
        <link rel="stylesheet" href="<?php echo asset('css/home.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/main.css')?>" type="text/css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

    <body style="background-image:url({{asset('storage/cover_images').'/'.$image[0]->cover_image}})">
       @if($access1==true)
        <div id="app">
     <div class="wholebody">
         <div class="insidewholebody">
             <div class="surface">
                 <div class="header">
                     <div class="leftnav">
                         <a class="homelink" href="#">
                             <span class="homelinkicon"><i class='fas fa-landmark'></i></span>
                         </a>
                         <button class="boardbtn">
                             <span class="boardicon">
                                <i class='far fa-id-card'></i>
                             </span>
                             <span class="boardtxt">
                                Boards
                             </span>
                         </button>
                         <div class="search">
                             <input class="inputsearch">
                             <span class="searchicon">
                                 <label class="searchlabel">
                                     <span class="searchicon1">
                                        <i class='fas fa-search'></i>
                                     </span>
                                 </label>
                             </span>
                         </div>
                         <a class="logo">
                             <div>
                                 <span class="logoicon">
                                   
                                 </span>
                                 <span class="logotxt">
                                    <i class='fas fa-columns'></i>
                                     Trello
                                 </span>
                             </div>
                         </a>
                     <div class="leftnav">
                     <button class="addbtn">
                         <span class="addicon">
                            <i class='fas fa-plus'></i>
                         </span>
                     </button>
                     <button class="addbtn">
                        <span class="addicon">
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </span>
                    </button>
                    <a href="/project" style="color:yellow;border:solid 2px black">Project</a>
                    <a href="/myProjects" style="color:yellow;border:solid 2px black">My Projects</a>
                    {{-- <button class="addbtn">
                        <span class="addicon">
                            <i class='far fa-bell'></i>
                        </span>
                    </button>
                    <button class="addbtn">
                        <span class="addicon">
                            <i class='far fa-user-circle'></i>
                        </span>
                    </button> --}}
                 </div>
                     </div>
                 </div>
                 <div class="content">
                    <div class="board">
                        <div class="board1">
                            <div class="boardheader">
                                <div class="welcometxt">
                                    <span class="welcomespan">
                                        Welcome to Trello!
                                    </span>
                                </div>
                                <a class="star">
                                    <span class="staricon">
                                        <i class='far fa-star'></i>
                                    </span>
                                </a>
                            <div class="twobox">
                            <div class="twoboxleft">
                                <span class="divider"></span>
                                <a class="personal" href="#">
                                    <span>Personal</span>
                                </a>
                                <span class="divider"></span>
                            </div>
                            <a class="personal" href="#">
                                <span class="privateicon">
                                    <i class='fas fa-lock'></i>
                                </span>
                                <span class="personaltxt">Private</span>
                            </a>
                        </div>
                        <span class="divider"></span>
                        <div class="twobox">
                            <div class="twoboxleft">
                           
                                <a class="personal" href="#">
                                    <i class='far fa-user-circle'></i>
                                </a>
                                <span class="divider"></span>
                            </div>
                            <a class="personal" href="#">
                              
                                <span class="invitetxt">Invite</span>
                            </a>
                        </div>
                        <div class="rightbox">
                            <a class="personal" href="#">
                                <span class="privateicon">
                                    <i class='fas fa-map-marker'></i>
                                </span>
                                <span class="personaltxt">Butler</span>
                            </a>
                            <a class="personal" href="#">
                                <span class="privateicon">
                                        ...
                                </span>
                                <span class="personaltxt">Show Menu</span>
                            </a>
                            <form action="{{route('index.addimage',$image[0]->_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="custom-file-input" id="customFile" name="cover_image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                               <button class="btn btn-primary" type="submit" >Submit</button>
                           
                            </form>
                            
                        </div>
                            </div>
                           
                            <div class="flex-container">
                                
                                {{-- @foreach($lists as $list) --}}
                                @if($project == 'Project 1')
                                <div class="col-md-3" v-for="lis in lists">
                                    <div class="card">  
                                        <div class="card-header">
                                            {{-- {{$list -> name}} --}}
                                            @{{lis.name}}
                                        </div>
                                <div :id ="lis._id" class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)"
                                v-on:drop="drop"
                                v-on:dragover="allowDrop">
                                
                                            {{-- @foreach($contents as $content) --}}
                    
                                            {{-- {{dump($content->content)}} --}}
                                           
                                            {{-- onclick="window.location='{{ route("index.getdesc",array( $content->_id)) }}'" --}}
                                            
                                            <div v-for="content in cards">
                                                <div v-if ="content.content !== '' ">
                                                    <div v-if="lis._id == content.list_id">
                                                    <div class="cardcontain" >
                                               
                                                   
                                                {{-- @if ($list->_id == $content->list_id) --}}
                                            <textarea  :id="content._id" :name="lis._id" draggable="true" ondragstart="drag(event)"  data-toggle="modal" 
                                                :data-target="'#exampleModal'+content._id"  class="mod" v-on:dragstart="dragStart"
                                                v-on:drag="dragging">@{{content.content}}</textarea>
                                                @if($access3==true && $access4==true)
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle carddropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-edit"></i>
                                                     </button>
                                             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <label for="sel1">Move To</label>
                                                <select class="form-control" id="'sel1'+content._id" onchange="changeFunc(this);">
                                                    @foreach($lists as $list)
                                                <option value="{{$list->name}}" selected>{{$list->name}}</option>
                                                   @endforeach
                                                  </select>
                                                  <a href="{{route('index.deleteCard', ['id' => 'content._id'])}}" class="dropdown-item">Delete</a>
                                                 
                                                </div>
                                                    </div>
                                                    @endif
                                                </div>
                                          <!-- Modal -->
                                          <div class="modal fade" v-bind:id="['exampleModal'+content._id]" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">@{{content.content}}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                  <div class="col-sm-9">
                                                      <div>
                                                          Description
                                                          &nbsp;
                                                          {{-- <a href="#" style="background-color: rgba(9,30,66,.04);border-radius: 3px;line-height: 20px;padding: 6px 12px;color:black;">Edit</a> --}}
                                                      </div>
                                                      <div>
                                                        {{-- @php ($names = []) @endphp --}}
                                                        <form action="{{route('index.adddescription','content._id')}}" method="post">
                                                            @csrf
                                                            
                                                             {{-- @foreach($descs as $desc)
                                                             @if($content->_id == $desc->content_id)
                                                             @php $status1='0'; @endphp
                                                             @break
                                                             @else
                                                             @php $status1='1'; @endphp
                                                             @endif
                                                             @endforeach
                                                             @if($status1=='0')
                                                             <a id="descbtn+content._id" class="description" style="background-color: rgba(9,30,66,.04);">{{$desc->description}}</a>
                                                             <textarea id="textarea+content._id" placeholder="Add a more detailed description.." name="description"></textarea>
                                                             
                                                             <div></div>
                                                             @else
                                                             <a id="descbtn+content._id" class="description" style="background-color: rgba(9,30,66,.04);">Add a more detailed description</a>
                                                          <textarea id="textarea+content._id" placeholder="Add a more detailed description.." name="description"></textarea>
                                                          <div></div>
                                                          @endif --}}
                                                            {{-- @php $status='0'; @endphp
                                                            @php $status1='0'; @endphp
                                                             @foreach($names as $name)
                                                             @if($name==$desc->content_id)
                                                             @php $status='1'; @endphp
                                                             @endif --}}
                                                             {{-- @endforeach --}}
                                                            {{-- @if($content->_id == $desc->content_id)--}}
                                                            
                                                            
                                                            {{-- <div></div> --}} 
                                                            {{-- @php array_push($names,$content->id) @endphp --}}
                                                            {{-- @php $status1='1'; @endphp --}}
                                                          {{-- @endif
                                                          @endforeach                                                  --}}
                                                          {{-- @if($status1=='0') --}}
                                                          
                                                          {{-- <div></div> --}} 
                                                          {{-- @endif --}}
                                                          <div style="display:inline-flex">
                                                          <button id="'save'+content._id" class="btn btn-success" type="submit">Save</button>
                                                          &nbsp;
                                                          <button id="'close'+content._id" class="btn close1">Close</button>
                                                          </div>
                                                        
                                                        </form>
                                                    </div>
                                                    <div>
                                                        Activity
                                                    </div>
                                                    <div>
                                                        <form action="{{route('index.addcomment','content._id')}}" method="post">
                                                            @csrf
                                                             {{-- @foreach($comments as $comment)
                                                             
                                                            @if($content->_id == $comment->content_id)
                             
                                                        <a id="commb+content._id" class="comment" style="background-color: rgba(9,30,66,.04);">{{$comment->comment}}</a>
                                                          <textarea id="commarea+content._id" placeholder="Write a comment.." name="comment">{{$comment->comment}}</textarea>
                                                          <div></div>
                                                         
                                                          @endif
                                                         @endforeach --}}
                                                          <a id="'commbtn1'+content._id" class="comment1" style="background-color: rgba(9,30,66,.04);">Write a comment...</a>
                                                          <textarea id="'commarea1'+content._id" placeholder="Write a comment.." name="comment"></textarea>
                                                          <div></div>
                                                          
                                                          <div style="display:inline-flex">
                                                            <button id="'commsave1=+content._id" class="btn btn-success" type="submit">Save</button>
                                                            &nbsp;
                                                            <button id="'commclose1'+content._id" class="btn commclose1">Close</button>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                  </div>
                                                  <div class="col-sm-3">
                                                    <div style="font-size:13px">
                                                       ADD TO CARD
                                                    </div>
                                                    &nbsp;
                                                    <div style="font-size:13px">
                                                        <a href="#" style="background-color: rgba(9,30,66,.04);border-radius: 3px;line-height: 5px;padding: 6px 12px;color:black;">Members</a> 
                                                    </div>
                                                    &nbsp;
                                                    <div style="font-size:13px">
                                                        <a href="#" style="background-color: rgba(9,30,66,.04);border-radius: 3px;line-height: 20px;padding: 6px 12px;color:black;">Labels</a> 
                                                    </div>
                                                    &nbsp;
                                                    <div style="font-size:13px">
                                                        <a href="#" style="background-color: rgba(9,30,66,.04);border-radius: 3px;line-height: 20px;padding: 6px 12px;color:black;">CheckList</a> 
                                                    </div>

                                                  </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                          </div>
                                        {{-- <div id="div1" ondrop="drop(event)"ondragover="allowDrop(event)" ></div> --}}
                                        {{-- @endif --}}
                                            {{-- @endforeach END OF CONTENT --}}
                                            
                                          {{-- <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div> --}}
                                          
                                          
                                        </div>
                                        @if($access2==true && $access3=true)
                                        <div class="card-footer">
                                            {{-- <form action="{{route('index.addcard',$list->_id)}}" method="post"> --}}
                                                @csrf
                                            <button class="btn show" :id="'showcard'+lis._id" name="showcard" type="button" value="Show Textarea" v-show="!lis.showHide" @click.prevent="openEditor(lis)" >+ Add another card</button>
                                           <template v-if="lis.showHide">
                                            <textarea  :id="'textcard'+lis._id" name="content" ></textarea>
                                            <p>Assign To:</p><select :id="'userSelect'+lis._id" name="user">
                       
                                                <option value={{$users[0]->email}} selected>{{$users[0]->name}}</option>
                                                <?php $count = 0;?>
                                                @foreach($users as $user)
                                                @if($count>=1)
                                                <option value={{$user->email}}>{{$user->name}}</option>
                                                @endif
                                                {{$count++}}
                                                @endforeach  
                                               </select>
                                               <p></p>
                                            {{-- <input type="hidden" name="foo" value="$list->name" /> --}}
                                            <div style="display:inline-flex">
                                            <button :id="'addcard'+lis._id" class="btn btn-success addgreen newbtn" name="showcard" @click.prevent="postcards(lis._id)" value="add" >Add Card</button>
                                            <button  id="'cancelcard'+lis._id" class="btn btn-danger addgreen cancel" name="cardcancel" type="button" value="cancel" @click.prevent="closeEditor(lis)" >Cancel  </button>
                                            </template>    
                                        </div>
                                        @endif
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                {{-- @endforeach --}}
                                @if($access2==true && $access3==true )
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                        {{-- <form action="{{route('index.add')}}" method="post"> --}}
                                            @csrf
                                            <button class="btn btn-primary" id="showarea" name="showarea" type="button" value="Show Textarea">Add another list</button>
                                        <textarea id="textarea" name="name"></textarea>
                                        <div style="display:inline-flex">
                                        <button id="add" class="btn btn-success addgreen" name="ok" @click.prevent="postlists" value="add" >Add List</button>
                                        <button id="cancel" class="btn btn-danger addgreen" name="ok" type="button" value="cancel" >Cancel  </button>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                    
                                </div>
                                @endif
                            </div>
                            
                        </div>
                        
                    </div>
                    
                 </div>

                 
             </div>
             
         </div>
         
     </div>
     </div>
     @else
     <p style="color:yellow">You are not authorized to read</p>
     <a style="color:yellow" class="dropdown-item" href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
  <script type="text/javascript">

    function changeFunc(sel){
    var id = sel.id
    var orgid = id.replace('sel1', '');
        var optionvalue = sel.value;
        $.ajax({
  
  type:"PUT",
  url:'/moveCard/',
  data: { _token: '{{csrf_token()}}',content_id:orgid,list_name:optionvalue },
  success:function(response){
    window.location.reload();
      console.log(response);
  },
  error:function(error){
      console.log(error);
  }
  
})

console.log(orgid);
console.log(optionvalue);
    }
$('document').ready(function($) {
 

$(".mod").click(function(e){
    var id= e.target.id;
    $.ajax({
  
     type:"PUT",
     url:'/desc/'+id,
     data: { _token: '{{csrf_token()}}' },
     success:function(response){
        $("#textarea"+id).val(response[0].description);
         console.log(response[0].description);
     },
     error:function(error){
         console.log(error);
     }
     
 })
    
console.log("#exampleModal"+e.target.id);
    // $("#exampleModal"+e.target.id).modal();

});
});
// $('[id^="textcard"],[id^="addcard"],[id^="cancelcard"]').hide();
     $('[id^="textarea"],[id^="save"],[id^="close"]').hide();
     $('[id^="commarea"],[id^="commsave"],[id^="commclose"]').hide();
     $('[id^="commarea1"],[id^="commsave1"],[id^="commclose1"]').hide();
    // $(document).ready(function(){
        // $('textarea[name="cardname"],button[name="cardadd"],button[name="cardcancel"]').hide();
        
// });

     $("#textarea, #add,#cancel").hide(); 
    //  $("#textcard, #addcard,#cancelcard").hide(); 
    // $("#showarea").click(function(){
    //     // debugger
    //     $("#textarea").show();
    //     $("#showarea").hide();
    //     $("#add").show();
    //     $("#cancel").show();
    // });
    // $("#showcard").click(function(){
    //     // console.log('Listening')
    //     $("#textcard").show();
    //     $("#showcard").hide();
    //     $("#addcard").show();
    //     $("#cancelcard").show();
    // });
    // $("#cancel").click(function(){
    //     $("#showarea").show();
    //     $("#textarea").hide();
    //     $("#add").hide();
    //     $("#cancel").hide();
    // })
    // $("#cancelcard").click(function(){
    //     $("#showcard").show();
    //     $("#textcard").hide();
    //     $("#addcard").hide();
    //     $("#cancelcard").hide();
    // })
    // $("#add").click(function(){
      
    // });
   
    // $('.addlist').on('click',function(){
    //     addList();
    // });
    function addList(){
        alert("Hi");
    }
 
    function allowDrop(ev) {
        console.log("LL");
//   ev.preventDefault();
}

var to;
var from;
var target;

function drag(ev) {
     target = ev.target.id
     from = ev.target.name
    console.log("Item dragged",ev.target.id)
    console.log("card from whicg dragged",ev.target.name)
  ev.dataTransfer.setData("text", ev.target.value);
}
var bool = false;
function drop(ev) {
    to = ev.target.id
    console.log("Card dropped",ev.target.id)
  ev.preventDefault();
  var x = document.createElement("textarea");
  var data = ev.dataTransfer.getData("text");
  var t = document.createTextNode(data);
  x.appendChild(t);
//   console.log("ss",x);
  ev.target.appendChild(x);
  bool = true;
//   var data = ev.dataTransfer.getData("text");
//   ev.target.appendChild(document.getElementById(data));
}
function dropfunc(){
    console.log("IN");
//     $.ajax({
  
//     type:"GET",
//     url:'/update/'+to'/'+from'/'+target,
//     data: { _token: '{{csrf_token()}}' },
//     success:function(response){
       
//         console.log("SUCCESS");
//     },
//     error:function(error){
//         console.log(error);
//     }
    
//   })
}

document.addEventListener("dragend", function(event) {
    // console.log(from,to,target);
      event.preventDefault();
    if(bool){
        bool = false;
        
        dropfunc();
    // let url = "{{ route('index.update',['to'=>':to','from'=>':from','target'=>':target'])}}";
    // url = url.replace(':to', to);
    // url = url.replace(':from', from);
    // url = url.replace(':target',target)
    // document.location.href=url;
    console.log(to, from,);
//     $.ajax({
  
//   type:"GET",
//   url:'/update/'+to'/'+from'/'+target,
//   data: { _token: '{{csrf_token()}}' },
//   success:function(response){
     
//       console.log("SUCCESS");
//   },
//   error:function(error){
//       console.log(error);
//   }
  
// })
    }
//   console.log("ended",event)
});
$('[:id^="textcard"],[id^="addcard"],[id^="cancelcard"]').hide();
    </script>
    
 </body>
 <script type="text/javascript">


    const app = new Vue({
        el:'#app',
        data:{
            lists:{},
            cards:{},
            
        },
        props: ['listid'],
        mounted(){
            this.getLists();
            this.getcards();
     
            window.Laravel = {!! json_encode([
        'user' => auth()->check() ? auth()->user()->id : null,
    ]) !!};
    

    console.log("Id",window.Laravel.user);
            
            $("#showarea").click(function(){
        // debugger
        $("#textarea").show();
        $("#showarea").hide();
        $("#add").show();
        $("#cancel").show();


        $("#showarea").click(function(){
        // debugger
        $("#textarea").show();
        $("#showarea").hide();
        $("#add").show();
        $("#cancel").show();
    });
    $("#showcard").click(function(){
        // console.log('Listening')
        $("#textcard").show();
        $("#showcard").hide();
        $("#addcard").show();
        $("#cancelcard").show();
    });
    $("#cancel").click(function(){
        $("#showarea").show();
        $("#textarea").hide();
        $("#add").hide();
        $("#cancel").hide();
    })
    $("#cancelcard").click(function(){
        $("#showcard").show();
        $("#textcard").hide();
        $("#addcard").hide();
        $("#cancelcard").hide();
    })
    $("#add").click(function(){
      
    });
   
    $('.addlist').on('click',function(){
        addList();
    });

    $(".comment").click(function(e){
            $.id= e.target.id;
            $.id1 = e.target.id.replace('commbtn', '');
            var input = $("#commarea"+$.id1);
            var input1 = $("#commsave"+$.id1);
            var input2 = $("#commclose"+$.id1);
            $("#"+$.id).hide();
            input.show();
    input1.show();
    input2.show();
        })
        $(".comment1").click(function(e){
            $.id= e.target.id;
            $.id1 = e.target.id.replace('commbtn1', '');
            var input = $("#commarea1"+$.id1);
            var input1 = $("#commsave1"+$.id1);
            var input2 = $("#commclose1"+$.id1);
            $("#"+$.id).hide();
            input.show();
    input1.show();
    input2.show();
        })
        $(".description").click(function(e){
            $.id= e.target.id;
            $.id1 = e.target.id.replace('descbtn', '');
            var input = $("#textarea"+$.id1);
            var input1 = $("#save"+$.id1);
            var input2 = $("#close"+$.id1);
            $("#"+$.id).hide();
            input.show();
    input1.show();
    input2.show();

        })
        $(".commclose1").click(function(e){
            $.id= e.target.id;
            $.id1 = e.target.id.replace('commclose1', '');
            var input = $("#commarea1"+$.id1);
            var input1 = $("#commsave1"+$.id1);
            var input2 = $("#commbtn1"+$.id1);

            $("#"+$.id).hide();
            input.hide();
    input1.hide();
    input2.show();
    

        })
        $(".commclose").click(function(e){
            $.id= e.target.id;
            $.id1 = e.target.id.replace('commclose', '');
            var input = $("#commarea"+$.id1);
            var input1 = $("#commsave"+$.id1);
            var input2 = $("#commbtn"+$.id1);

            $("#"+$.id).hide();
            input.hide();
    input1.hide();
    input2.show();
    

        })
        $(".close1").click(function(e){
            $.id= e.target.id;
            $.id1 = e.target.id.replace('close', '');
            var input = $("#textarea"+$.id1);
            var input1 = $("#save"+$.id1);
            var input2 = $("#descbtn"+$.id1);

            $("#"+$.id).hide();
            input.hide();
    input1.hide();
    input2.show();
    

        })
        $(".show").click(function(e){
            console.log("HI");
      $.id = e.target.id;
    $.id1 = e.target.id.replace('showcard', '');
    var input = $("#textcard"+$.id1);
    var input1 = $("#addcard"+$.id1);
    var input2 = $("#cancelcard"+$.id1);
    // console.log(input)
    input.show();
    input1.show();
    input2.show();
    // $('.card-body').contents().find('[id="textcard"+'$.id']').show();;
    // $('textarea[name="cardname"],button[name="cardadd"],button[name="cardcancel"]').show();
    // $('[id="textcard"+'$.id'],[id="addcard"+'$.id'],[id^="cancelcard"+'$.id']').show();
    // $("#textcard"+$.id,"#addcard"+$.id,"#cancelcard"+$.id).show();
    // $("#textcard"+$.id).show();
    $("#"+$.id).hide();
     
  });
  $(document).on("click",".cancel",function(e){
    $.id = e.target.id;
    $.id1 = e.target.id.replace('cancelcard', 'showcard');
    $.id2 = e.target.id.replace('cancelcard', 'textcard');
    $.id3 = e.target.id.replace('cancelcard', 'addcard');
    $("#"+$.id).hide();
    $("#"+$.id3).hide();
    $("#"+$.id2).hide();
    $("#"+$.id1).show();
  });
    });
        },
        methods:{
            dragStart:function(event)  {
            console.log("HI1");
          },
          dragging:function(event) {
            console.log("HI2");
          },
          allowDrop:function(event) {
            event.preventDefault();
          },
          drop:function(event) {
            console.log("HI3",to,from);
            // event.preventDefault();
           axios.get('/update/'+to+'/'+from+'/'+target).then((response)=>{
               console.log("SUCCESS",event);
               this.cards.map((item) => {
                //    console.log("IN4",item._id," ",target);
                   if(item._id == target){
                    Vue.set(item, 'list_id', 'x');
                    console.log("done",item);
                   }
               })
               
            //    this.getLists();
            //    this.getcards();
            //    this.$forceUpdate();
           }).catch(function(error){
            console.log(error);
           })
          },
          
            meth(obj){
                console.log(obj);
            },
            openEditor(slider) {
                Vue.set(slider, 'showHide', true)
            // slider.showHide = true;
            // this.$forceUpdate(); 
            console.log(slider);
        },
        closeEditor(slider) {
            Vue.set(slider, 'showHide', false)
            // slider.showHide = false;
            // this.$forceUpdate(); 
            console.log(slider);
        },
            getLists(){
                axios.get('/listname')
                     .then((response)=>{
                         this.lists = response.data;
                        //  this.$forceUpdate(); 
                         console.log("KK",this.lists);
                         this.listen();
                         
                     })
                     .catch(function(error){
                         console.log(error);
                     })
            },
            postlists(){
                console.log("posted");
                console.log(document.getElementById("textarea").value); 
                axios.post('/addname',{
                    name:document.getElementById("textarea").value
                })
                .then((response)=>{
                    // this.$forceUpdate(); 
                    
                    // this.lists.unshift(response.data);
                    // console.log("post1",this.lists);
                    // this.$forceUpdate(); 
                })
                .catch(function(error){
                         console.log(error);
                     })

                
            },
            getcards(){
                axios.get('/cardname')
                     .then((response)=>{
                         this.cards = response.data;
                         console.log("asdasdKK",this.cards);
                        //  this.listen1();
                     })
                     .catch(function(error){
                         console.log(error);
                     })
            },
            postcards(id){
                // console.log("textarea"+id);
                // console.log("ID",id,document.getElementById("textcard"+id).value);
                console.log("YES");
                console.log("ID",id);
                var e = document.getElementById("userSelect"+id);
                var strUser = e.options[e.selectedIndex].value;
                // var user = $( "#userSelect" ).val();
                // alert("Hey",this.user);
                console.log("hey",strUser); 
                // alert("Hey",strUser);
                axios.post('/addcard/'+id,{
                    assignedTo:strUser,
                    content:document.getElementById("textcard"+id).value
                })
                .then((response)=>{
                    // console.log("YES1",response);
                    // this.cards.unshift(response.data);
                    this.$forceUpdate();
                    window.location.reload();
                })
                .catch(function(error){
                         console.log(error);
                     })
            },
            

            
            listen(){
                console.log("HUI",this.lists);
                
                 var pusher = new Pusher('88b46fc61e089709e692',{
cluster: 'ap2'
});
// var channel = pusher.subscribe('ProjectChannel',function(){
// console.log("jjj"); 
// });
// var channel1 = pusher.subscribe('ProjectCardChannel',function(){
// console.log("jjj"); 
// });
// var channel2 = pusher.subscribe('user.' + window.Laravel.user,function(){
// // console.log("jjj"); 
// });
var channel2 = pusher.subscribe('Access',function(){
// console.log("jjj"); 
});
// console.log("usss ", )
// Echo.private('user.' + window.Laravel.user)
//     .listen('.accessEvent', function (data) {
//         console.log(data);
//     });
   
// channel.bind('pusher:subscription_succeeded', function(members) {
//   alert('successfully subscribed!',members);
// });
// console.log("as",this.lists)
// channel.bind('Project',
// function(data) {
//   console.log("HI",data);
// //   console.log(this.lists);
// //   this.lists.unshift(list);
// app.newFunc(data);

// }
// );
// channel1.bind('ProjectCard',
// function(data) {
//   console.log("HI",data);
// //   console.log(this.lists);
// //   this.lists.unshift(list);
// app.newFunc1(data);

// }
// );
channel2.bind('AccessChannel',
function(data) {
  console.log("HI",data);
//   console.log(this.lists);
//   this.lists.unshift(list);
window.location.reload();

}
);

                // Echo.channel('ProjectChannel')
               
                //     .listen('.Project',(list)=>{
                //         alert("HUH");
                //         console.log("HIHIHI",list);
                //         this.lists.unshift(list);
                //     })
            },
            newFunc(list){
             
                this.lists.unshift(list);
                console.log("KHI",this.lists);
            },
            newFunc1(card){
                // console.log("KHIsdvff",card);
                this.cards.unshift(card);
                console.log("KHIsdvff1",this.cards);
            }
        }
    })

</script>
</html>
