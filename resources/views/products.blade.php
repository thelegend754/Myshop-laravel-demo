
@extends('master')

@section('content')
  <main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      
    @foreach ($products as $product)   
        <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">{{$product['title']}}</h4>
          </div>
          <div class="card-body">
              <div>
              <image src='{{asset('images').'/'.$product['image']}}'/>
              </div>
              <input data-id="{{$product['id']}}" class="btn btn-success add-to-cart-btn" type="button" value="+ Add To Cart"/>
              
            <a href="{{url("product/{$product['url']}")}}">  
            <button type="button" class="w-100 btn btn-lg btn-outline-primary">{{$product['content']}}</button>
            </a>
          </div>
        </div>
      </div>
    @endforeach

    </div>

  </main>
@endsection