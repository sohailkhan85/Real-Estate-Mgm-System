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
          <h5 class="card-title mb-4 d-inline">Admins</h5>
         <a  href="{{route('admins.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Admin Name</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
            @foreach($allAdmins as $allAdmin)
            <tr>
                <th scope="row">{{$allAdmin->id}}</th>
                <td>{{$allAdmin->name}}</td>
                <td>{{$allAdmin->email}}</td>
               
              </tr>
            @endforeach

             

            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

@endsection