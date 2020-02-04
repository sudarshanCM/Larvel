<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
         
        <link rel="stylesheet" href="<?php echo asset('css/home.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/main.css')?>" type="text/css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
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
                            <i class='fas fa-info'></i>
                        </span>
                    </button>
                    <button class="addbtn">
                        <span class="addicon">
                            <i class='far fa-bell'></i>
                        </span>
                    </button>
                    <button class="addbtn">
                        <span class="addicon">
                            <i class='far fa-user-circle'></i>
                        </span>
                    </button>
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
                            
                            
                        </div>
                            </div>
                            <div class="flex-container">
                                
                                @foreach($lists as $list)
                                <div class="col-md-3">
                                    <div class="card">  
                                        <div class="card-header">
                                            {{$list -> name}}
                                        </div>
                                        <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            
                                            @foreach($contents as $content)
                                            @if ($list->_id == $content->list_id)
                                            
                                        <textarea id="<?php echo $list->_id?>" name="<?php echo $content->_id?>" draggable="true" ondragstart="drag(event)">{{$content->content}}</textarea>
                                        {{-- <div id="div1" ondrop="drop(event)"ondragover="allowDrop(event)" ></div> --}}
                                        @endif
                                            @endforeach
                                            
                                          {{-- <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div> --}}
                
                                          
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{route('index.addcard',$list->_id)}}" method="post">
                                                @csrf
                                            <button class="btn show" id="showcard<?php echo $list->_id?>" name="showcard" type="button" value="Show Textarea" >+ Add another card</button>
                                            <textarea id="textcard<?php echo $list->_id?>" name="content"></textarea>
                                            {{-- <input type="hidden" name="foo" value="$list->name" /> --}}
                                            <div style="display:inline-flex">
                                            <button id="addcard<?php echo $list->_id?>" class="btn btn-success addgreen" name="cardadd" type="sumbit" value="add" >Add Card</button>
                                            <button id="cancelcard<?php echo $list->_id?>" class="btn btn-danger addgreen cancel" name="cardcancel" type="button" value="cancel" >Cancel  </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                
                                @endforeach
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                        <form action="{{route('index.add')}}" method="post">
                                            @csrf
                                            <button class="btn btn-primary" id="showarea" name="showarea" type="button" value="Show Textarea">Add another list</button>
                                        <textarea id="textarea" name="name"></textarea>
                                        <div style="display:inline-flex">
                                        <button id="add" class="btn btn-success addgreen" name="ok" type="sumbit" value="add" >Add List</button>
                                        <button id="cancel" class="btn btn-danger addgreen" name="ok" type="button" value="cancel" >Cancel  </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript">
     $('[id^="textcard"],[id^="addcard"],[id^="cancelcard"]').hide();
    // $(document).ready(function(){
        // $('textarea[name="cardname"],button[name="cardadd"],button[name="cardcancel"]').hide();
        $(".show").click(function(e){
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
// });

     $("#textarea, #add,#cancel").hide(); 
    //  $("#textcard, #addcard,#cancelcard").hide(); 
    $("#showarea").click(function(){
        $("#textarea").show();
        $("#showarea").hide();
        $("#add").show();
        $("#cancel").show();
    });
    $("#showcard").click(function(){
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
    function addList(){
        alert("Hi");
    }
    function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.value);
}

function drop(ev) {
  ev.preventDefault();
  var x = document.createElement("textarea");
  var data = ev.dataTransfer.getData("text");
  var t = document.createTextNode(data);
  x.appendChild(t);
  console.log("ss",x);
  ev.target.appendChild(x);
//   var data = ev.dataTransfer.getData("text");
//   ev.target.appendChild(document.getElementById(data));
}
    </script>
</html>
