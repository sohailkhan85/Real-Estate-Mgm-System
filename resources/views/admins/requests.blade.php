@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Requests</h5>
        
          <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Agent Name</th>
                <th scope="col">Go to this property</th>
              </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$request->name}}</td>
                    <td>{{$request->email}}</td>
                    <td>{{$request->phone}}</td>
                    <td>{{$request->agent_name}}</td>
                     <td><a href="{{route('single.prop', $request->prop_id)}}" class="btn btn-success  text-center ">Go</a></td>
                  </tr>
                @endforeach
              


            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

  @endsection