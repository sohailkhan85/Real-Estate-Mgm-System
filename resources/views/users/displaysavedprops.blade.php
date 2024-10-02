@extends('layouts.app')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('assets/images/hero_bg_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          
          <h1 class="mb-2">All Saved Properties</h1>
          
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm bg-light">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2>All Saved Properties</h2>
          </div>
        </div>
      </div>
    
      <div class="row mb-5">
        @foreach ($savedProps as $relatedprop)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="{{route('single.prop', $relatedprop->id)}}" class="property-thumbnail">
                <div class="offer-type-wrap">
                  
                  <span class="offer-type bg-success">{{$relatedprop->type}}</span>
                </div>
                <img src="{{asset('assets/images/'.$relatedprop->image.'')}}" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                
                <h2 class="property-title"><a href="{{route('single.prop', $relatedprop->id)}}">{{$relatedprop->title}}</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{$relatedprop->location}}</span>
                <strong class="property-price text-primary mb-3 d-block text-success">{{$relatedprop->price}}</strong>


              </div>
            </div>
          </div>
        @endforeach


      </div>
    </div>

    @endsection