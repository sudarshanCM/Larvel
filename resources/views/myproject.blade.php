@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Projects
              
                </div>

                <div class="card-body">
                   
                    @if($projectList)
                    <p>List of projects</p>
                    <ul>
                    @foreach($projectList as $project)
                    
                        <li>{{$project->projectName}}</li>
                        
                    @endforeach
                    </ul>
                    <br>
                    <h2>Read access</h2>
                    <table>
                        <tr>
                        <th>Project name</th>
                        <th>User name</th>
                        <th>Delete</th>
                        </tr>
                        {{-- {{$readaccess[0]['project_name']}} --}}
                    @foreach($readaccess as $read)
                    <form action="{{route('index.deleteaccess',[$read['project_id'],$read['user_name'],'1'])}}" method="post">
                        @csrf
                    <tr>
                        <td>{{$read['project_name']}}</td>
                        <td>{{$read['user_name']}}</td>
                        <td><button class="btn-primary">Delete</button></td>
                    </tr>
                    </form>
                        @endforeach
                    </table>


                    <br>
                    <h2>Write access</h2>
                    <table>
                        <tr>
                        <th>Project name</th>
                        <th>User name</th>
                        <th>Delete</th>
                        </tr>
                        {{-- {{$readaccess[0]['project_name']}} --}}
                    @foreach($writeaccess as $read)
                    <form action="{{route('index.deleteaccess',[$read['project_id'],$read['user_name'],'2'])}}" method="post">
                        @csrf
                    <tr>
                        <td>{{$read['project_name']}}</td>
                        <td>{{$read['user_name']}}</td>
                        <td><button class="btn-primary">Delete</button></td>
                    </tr>
                    </form>
                        @endforeach
                    </table>


                    <br>
                    <h2>Edit access</h2>
                    <table>
                        <tr>
                        <th>Project name</th>
                        <th>User name</th>
                        <th>Delete</th>
                        </tr>
                        {{-- {{$readaccess[0]['project_name']}} --}}
                    @foreach($editaccess as $read)
                    <form action="{{route('index.deleteaccess',[$read['project_id'],$read['user_name'],'3'])}}" method="post">
                        @csrf
                    <tr>
                        <td>{{$read['project_name']}}</td>
                        <td>{{$read['user_name']}}</td>
                        <td><button class="btn-primary">Delete</button></td>
                    </tr>
                    </form>
                        @endforeach
                    </table>


                    <br>
                    <h2>Delete access</h2>
                    <table>
                        <tr>
                        <th>Project name</th>
                        <th>User name</th>
                        <th>Delete</th>
                        </tr>
                        {{-- {{$readaccess[0]['project_name']}} --}}
                    @foreach($deleteaccess as $read)
                    <form action="{{route('index.deleteaccess',[$read['project_id'],$read['user_name'],'4'])}}" method="post">
                        @csrf
                    <tr>
                       
                        <td>{{$read['project_name']}}</td>
                        <td>{{$read['user_name']}}</td>
                    <td><button id="{{$read['project_name']}}" class="btn-primary" type="submit">Delete</button></td>
                    </tr>
                </form>
                        @endforeach
                    </table>

                    <button id="access" class="btn-primary accessbtn">Add Access</button>
                    <select id="projectSelect" name="project">
                       
                     <option value={{$projectList[0]->_id}} selected>{{$projectList[0]->projectName}}</option>
                     @if(count($projectList)>1)
                     @foreach($projectList as $project)
                    <option value={{$project->_id}}>{{$project->projectName}}</option>
                    @endforeach
                    @endif
                    </select>
                    <select id="userSelect" name="users">
                        <option value={{$user[0]->name}} selected>{{$user[0]->name}}</option>
                        @foreach($user as $users)
                    <option value={{$users->name}}>{{$users->name}}</option>
                    @endforeach    
                </select>
                    <select id="accessSelect" name="access">
                        <option value="1" selected>Read Access</option>
                        <option value="2" selected>Write Access</option>
                        <option value="3" selected>Edit Access</option>
                        <option value="4" selected>Delete Access</option>
                      
                    
                    </select>

                    <button id="addAccess" class="btn-primary addbtn">Add</button>
                    <button id="cancelAccess" class="btn-danger cancel">Cancel</button>
                    @else
                    <p>No project</p>
                    @endif





                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    function delet(e){
        console.log(e);
    }
     $("#projectSelect").hide();
     $("#userSelect").hide();
     $("#accessSelect").hide();
     $("#addAccess").hide();
     $("#cancelAccess").hide();
    $(".accessbtn").click(function(e){
        $("#projectSelect").show();
        $("#userSelect").show();
     $("#accessSelect").show();
     $("#addAccess").show();
     $("#cancelAccess").show();
        $("#access").hide();
    })
    $(".cancel").click(function(e){
        $("#projectSelect").hide();
        $("#userSelect").hide();
     $("#accessSelect").hide();
     $("#addAccess").hide();
     $("#cancelAccess").hide();
        $("#access").show();
    })

    $(".addbtn").click(function(e){
        var project = $( "#projectSelect" ).val();
        var user = $( "#userSelect" ).val();
        var access = $( "#accessSelect" ).val();
        console.log(project,user,access);
        axios.post('/addaccess',{
            project_id:project,
            user_id:user,
            access_id:access
        }).then(response=>{
            
            // console.log("as",response);
            // alert("HI");
            window.location.reload();
            // alert("HI");
            console.log(response);
        }).catch(error=>{
            console.log(error);
        })
    })
    </script>
@endsection
