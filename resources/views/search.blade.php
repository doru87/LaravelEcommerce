@extends('layouts.app')

@section('content')
<div className="container">
    <div className="title_search">
      <h3>Products found</h3>
    </div>

  <div className="products_wrapper">
  <div class="products_list">

    @foreach ($searchProducts as $product)
      <div class="card p-3 mt-0" style="width: 22rem;">
        <a href="product-information/{{$product['id']}}">
          <img src="{{$product['image']}}" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">{{$product['title']}}</p>
          </div>
        </a>
      </div>
    @endforeach

</div>
</div>
  </div>
@endsection
