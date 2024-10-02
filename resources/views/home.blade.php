@extends('layouts.app')

@section('content')
 
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="slide-one-item home-slider owl-carousel">
              @foreach ($prop as $data)
                <div class="site-blocks-cover overlay" style="background-image: url({{asset('assets/images/'.$data->image.'')}});" data-aos="fade">
                  <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                      <div class="col-md-10">
                        <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">{{$data->type}}</span>
                        <h1 class="mb-2">{{$data->title}}</h1>
                        <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{$data->price}}</strong></p>
                        <p><a href="{{route('single.prop', $data->id)}}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
                      </div>
                    </div>
                  </div>
                </div>  
              @endforeach
                
          
 
          
              </div>
    
        </div>
    </div>

    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form method="post" action="{{route('search.prop')}}" class="form-search col-md-12" style="margin-top: -100px;">
            @csrf
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="list_types" id="list-types" class="form-control d-block rounded-0">
                    <option value="Condo">Condo</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Land">Land</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer_types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                    <option value="Buy">For Buy</option>
                    <option value="Rent">For Rent</option>
                    <option value="Lease">For Lease</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select_city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                    <option value="New York">New York</option>
                    <option value="Brooklyn">Brooklyn</option>
                    <option value="London">London</option>
                    <option value="Tokyo">Tokyo</option>
                    <option value="Cairo">Cairo</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form>
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="index.html" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                       
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="{{route('home')}}" class="view-list px-3 border-right active">All</a>
                  <a href="{{route('rent.prop')}}" class="view-list px-3 border-right">Rent</a>
                  <a href="{{route('buy.prop')}}" class="view-list px-3">Buy</a>
                  <a href="{{route('price.asc.prop')}}" class="view-list px-3">Ascending Price</a>
                  <a href="{{route('price.desc.prop')}}" class="view-list px-3">Descending Price</a>
                </div>



              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">

        <div class="row mb-5">
          @foreach ($prop as $data)
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="property-entry h-100">
                <a href="{{route('single.prop', $data->id)}}" class="property-thumbnail">
                  <div class="offer-type-wrap">
                    
                    <span class="offer-type bg-success">{{$data->type}}</span>
                  </div>
                  <img src="{{asset('assets/images/'.$data->image.'')}}" alt="Image" class="img-fluid">
                </a>
                <div class="p-4 property-body">
                  
                  <h2 class="property-title"><a href="property-details.html">{{$data->title}}</a></h2>
                  <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{$data->location}}</span>
                  <strong class="property-price text-primary mb-3 d-block text-success">{{$data->price}}</strong>
                  <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                      <span class="property-specs">Beds</span>
                      <span class="property-specs-number">{{$data->beds}} <sup>+</sup></span>
                      
                    </li>
                    <li>
                      <span class="property-specs">Baths</span>
                      <span class="property-specs-number">{{$data->baths}}</span>
                      
                    </li>
                    <li>
                      <span class="property-specs">SQ FT</span>
                      <span class="property-specs-number">{{$data->sq_ft}}</span>
                      
                    </li>
                  </ul>

                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Why Choose Us?</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
              <p><span class="read-more">Read More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
              <p><span class="read-more">Read More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
              <p><span class="read-more">Read More</span></p>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7">
            <div class="site-section-title text-center">
              <h2>Our Agents</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima quibusdam, laboriosam.</p>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
              <div class="team-member">
  
                <img src="{{asset('assets/images/person_1.jpg')}}" alt="Image" class="img-fluid rounded mb-4">
  
                <div class="text">
  
                  <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                  <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae minus obcaecati provident beatae!</p>
                  <p>
                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                  </p>
                </div>
  
              </div>
            </div>
  
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
              <div class="team-member">
  
                <img src="{{asset('assets/images/person_2.jpg')}}" alt="Image" class="img-fluid rounded mb-4">
  
                <div class="text">
  
                  <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                  <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cumque vitae voluptates culpa earum similique corrupti itaque veniam doloribus amet perspiciatis recusandae sequi nihil tenetur ad, modi quos id magni!</p>
                  <p>
                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                  </p>
                </div>
  
              </div>
            </div>
  
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
              <div class="team-member">
  
                <img src="{{asset('assets/images/person_3.jpg')}}" alt="Image" class="img-fluid rounded mb-4">
  
                <div class="text">
  
                  <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                  <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illo iusto, inventore, iure dolorum officiis modi repellat nobis, praesentium perspiciatis, explicabo. Atque cupiditate, voluptates pariatur odit officia libero veniam quo.</p>
                  <p>
                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                  </p>
                </div>
  
              </div>
            </div>
  
            
  
          </div>
      </div>
      </div>
@endsection
