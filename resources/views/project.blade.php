@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <h2>Add a Project</h2>
                    {{-- <form method="POST" action="{{ route('register') }}">
                        @csrf --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Read Access</label>
                            <div class="col-md-6">
                                <select id="readSelect" class="form-control" onchange="read(this)">
                                    <option value="{{$users[0]->name}}" name="{{$users[0]->name}}" selected>{{$users[0]->name}}</option>
                                            <?php $count = 0;?>
                                            @foreach($users as $user)
                                            @if($count>=1)
                                        <option value="{{$user->name}}" name="{{$user->name}}">{{$user->name}}</option>
                                        @endif
                                        {{$count++}}
                                           @endforeach
                                </select>
                                </div>
                         
                            </div>
                            
                                <ul id="myList">

                                </ul>
                           
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Write Access</label>
                                <div class="col-md-6">
                                    <select id="writeSelect" class="form-control" onchange="writ(this)">
                                        <option value="{{$users[0]->name}}" name="{{$users[0]->name}}" selected>{{$users[0]->name}}</option>
                                            <?php $count = 0;?>
                                            @foreach($users as $user)
                                            @if($count>=1)
                                        <option value="{{$user->name}}" name="{{$user->name}}">{{$user->name}}</option>
                                        @endif
                                        {{$count++}}
                                           @endforeach
                                    </select>
                                    </div>
                             
                                </div>
                                <ul id="myList1">

                                </ul>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Edit Access</label>
                                    <div class="col-md-6">
                                        <select id="editSelect" class="form-control" onchange="edi(this)">
                                            <option value="{{$users[0]->name}}" selected>{{$users[0]->name}}</option>
                                            <?php $count = 0;?>
                                            @foreach($users as $user)
                                            @if($count>=1)
                                        <option value="{{$user->name}}">{{$user->name}}</option>
                                        @endif
                                        {{$count++}}
                                           @endforeach
                                        </select>
                                        </div>
                                 
                                    </div>
                                    <ul id="myList2">

                                    </ul>

                                    <div class="form-group row">
                                        <label for="role" class="col-md-4 col-form-label text-md-right">Delete Access</label>
                                        <div class="col-md-6">
                                            <select id="deleteSelect" class="form-control" onchange="delet(this)">
                                                <option value="{{$users[0]->name}}" selected>{{$users[0]->name}}</option>
                                                <?php $count = 0;?>
                                                @foreach($users as $user)
                                                @if($count>=1)
                                            <option value="{{$user->name}}">{{$user->name}}</option>
                                            @endif
                                            {{$count++}}
                                               @endforeach
                                            </select>
                                            </div>
                                     
                                        </div>
                                        <ul id="myList3">

                                        </ul>
                          
                            <div class="form-group row">
                            <button class="btn-primary" onclick="submit()">Save</button>
                            </div>
                    {{-- </form> --}}
                        </div>
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 var readarr =[];
 var writearr=[];
 var editarr=[];
 var deletearr=[];
function read(id){
    console.log("YES",id.name);
   readarr.push(id.value);
   var x = document.getElementById("readSelect").selectedIndex;
  var name = document.getElementsByTagName("option")[x].getAttribute('name');
   var node = document.createElement("LI");                 
var textnode = document.createTextNode(name);         
node.appendChild(textnode);                              
document.getElementById("myList").appendChild(node);  
}
function writ(id){
    writearr.push(id.value);
    var x = document.getElementById("writeSelect").selectedIndex;
  var name = document.getElementsByTagName("option")[x].getAttribute('name');
   var node = document.createElement("LI");                 
var textnode = document.createTextNode(name);         
node.appendChild(textnode);                              
document.getElementById("myList1").appendChild(node);  
}

function edi(id){
    editarr.push(id.value);
    var x = document.getElementById("editSelect").selectedIndex;
  var name = document.getElementsByTagName("option")[x].getAttribute('name');
   var node = document.createElement("LI");                 
var textnode = document.createTextNode(name);         
node.appendChild(textnode);                              
document.getElementById("myList2").appendChild(node);  
}

function delet(id){
    deletearr.push(id.value);var x = document.getElementById("deleteSelect").selectedIndex;
  var name = document.getElementsByTagName("option")[x].getAttribute('name');
   var node = document.createElement("LI");                 
var textnode = document.createTextNode(name);         
node.appendChild(textnode);                              
document.getElementById("myList3").appendChild(node);  

}

function submit(){
    var input = document.getElementById("name").value;
        $.ajax({
  
  type:"POST",
  url:'/addProject/',
  data: { _token: '{{csrf_token()}}',projectName:input,readAccess:readarr,writeAccess:writearr,editAccess:editarr,deleteAccess:deletearr },
  success:function(response){
      console.log(response);
  },
  error:function(error){
      console.log(error);
  }
  
})
}


</script>
@endsection
