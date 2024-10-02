@extends('layouts.app')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('assets/images/'.$singleprop->image.'')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
          <h1 class="mb-2">{{$singleprop->title}}</h1>
          <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{$singleprop->price}}</strong></p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    @if (\Session::has('success') )
    
    <div class="alert alert-success">
        <p> {{ Session('success')}} </p>
    </div>    

    @endif
  </div>

  <div class="container">
    @if (\Session::has('save') )
    
    <div class="alert alert-success">
        <p> {{ Session('save')}} </p>
    </div>    

    @endif
  </div>
 

  <div class="site-section site-section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div>
            <div class="slide-one-item home-slider owl-carousel">
              @foreach ( $propimages as $propimage)
                <div><img src="{{asset('assets/images/'.$propimage->image.'')}}" alt="Image" class="img-fluid"></div>
              @endforeach
              
           
            </div>
          </div>
          <div class="bg-white property-body border-bottom border-left border-right">
            <div class="row mb-5">
              <div class="col-md-6">
                <strong class="text-success h1 mb-3">{{$singleprop->price}}</strong>
              </div>
              <div class="col-md-6">
                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{$singleprop->beds}} <sup>+</sup></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{$singleprop->baths}}</span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number">{{$singleprop->sq_ft}}</span>
                  
                </li>
              </ul>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                <strong class="d-block">{{$singleprop->home_type}}</strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                <strong class="d-block">{{$singleprop->year_built}}</strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                <strong class="d-block">{{$singleprop->price_sqft}}</strong>
              </div>
            </div>
            <h2 class="h4 text-black">More Info</h2>
            <p>{{$singleprop->more_info}}</p>

            <div class="row no-gutters mt-5">
              <div class="col-12">
                <h2 class="h4 text-black mb-3">Gallery</h2>
              </div>
              @foreach ($propimages as $data)
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="{{asset('assets/images/'.$data->image.'')}}" class="image-popup gal-item"><img src="{{asset('assets/images/'.$data->image.'')}}" class="img-fluid"></a>
                </div>
              @endforeach

  
            </div>
          </div>
        </div>
        <div class="col-lg-4">

          
          <div class="bg-white widget border rounded">


            <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
            @if ($SameProp > 0 )
              <p class="alert alert-success">You already sent request for this Property.</p>
            @else
            <form method="post" action="{{ route('insert.request', $singleprop->id )}}" class="form-contact-agent">
              @csrf
              <div class="form-group">
                
                <input type="hidden" name="prop_id" id="prop_id" value="{{$singleprop->id}}" class="form-control">
              </div>
              <div class="form-group">
                
                <input type="hidden" name="agent_name" id="prop_id" value="{{$singleprop->agent_name}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                  
              @enderror
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>
              @error('email')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                
            @enderror
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
              </div>
              @error('phone')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                
            @enderror
              <div class="form-group">
                <input type="submit" id="phone" class="btn btn-primary" value="Send Request">
              </div>
            </form>

            @endif
            
          </div>
          <div class="bg-white widget border rounded">


            <h3 class="h4 text-black widget-title mb-3">Save this Property</h3>
             @if ($SavedProp > 0 )
              <p class="alert alert-success">You already saved this Property.</p>
            @else
            <form method="post" action="{{ route('save.prop', $singleprop->id )}}" class="form-contact-agent">
              @csrf
              <div class="form-group">
                
                <input type="hidden" name="prop_id" id="prop_id" value="{{$singleprop->id}}" class="form-control">
              </div>
              <div class="form-group">
                
                <input type="hidden" name="title" id="title" value="{{$singleprop->title}}" class="form-control">
              </div>
              <div class="form-group">
                
                <input type="hidden" name="image" id="image" value="{{$singleprop->image}}" class="form-control">
              </div>

              <div class="form-group">
                
                <input type="hidden" name="location" id="location" value="{{$singleprop->location}}" class="form-control">
              </div>

              <div class="form-group">
                
                <input type="hidden" name="price" id="price" value="{{$singleprop->price}}" class="form-control">
              </div>

              <div class="form-group">
                <input type="submit" id="phone" class="btn btn-primary" value="Save Property">
              </div>
            </form>

          @endif
            
          </div>

          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                <div class="px-3" style="margin-left: -15px;">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                  <a  href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                  <a href="https://www.linkedin.com/sharing/share-offsite/?url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>    
                </div>            
          </div>

        </div>
        
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm bg-light">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2>Related Properties</h2>
          </div>
        </div>
      </div>
    
      <div class="row mb-5">
        @foreach ($relatedprops as $relatedprop)
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
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">{{$relatedprop->beds}} <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">{{$relatedprop->baths}}</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">{{$relatedprop->sq_ft}}</span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>
        @endforeach


      </div>
    </div>

    @endsection
