@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
            <div class="container">
                @if (\Session::has('success') )
                
                <div class="alert alert-success">
                    <p> {{ Session('success')}} </p>
                </div>    
            
                @endif
              </div>
              <div class="container">
                @if (\Session::has('delete') )
                
                <div class="alert alert-danger">
                    <p> {{ Session('delete')}} </p>
                </div>    
            
                @endif
              </div>
          <h5 class="card-title mb-4 d-inline">Properties</h5>
          <a href="{{route('props.create')}}" class="btn btn-primary mb-4 text-center float-right ">Create Properties</a>
          <a href="{{route('gallery.create')}}" class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a>

          <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Home type</th>
                <th scope="col">Type</th>
                
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($allProps as $allProp)
            <tr>
                <th scope="row">{{$allProp->id}}</th>
                <td>{{$allProp->title}}</td>
                <td>{{$allProp->price}}</td>
                <td>{{$allProp->home_type}}</td>
                <td>{{$allProp->type}}</td>
                
                 <td><a href="{{route('props.delete', $allProp->id)}}" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
            @endforeach
             


            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

  @endsection