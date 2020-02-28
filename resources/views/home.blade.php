@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <table>
                        <tr>
                        <th>Created By</th>
                        <th>List Name</th>
                        <th>Delete</th>
                        </tr>
                    @foreach($lists as $list)
                        <tr>
                        <td>{{$list->cardCreatedBy}}</td>
                            <td>{{$list->name}}</td>
                            <td> <a href="{{route('index.deleteList', ['id' => $list->_id,'name'=>$list->cardCreatedBy])}}" class="btn btn-primary">Delete</a></td>
                        </tr>
                    @endforeach
                
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
