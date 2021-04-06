
<div class="container-fluid d-flex mb-5 mt-5">
    <div class="row">
      <div class="col lg-3">
        <div class="vertical-menu">
          <div class="card  border-0" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              @foreach ($categories as $category)
                <li class="list-group-item border border-info"><a href="{{route('/',['category' => $category->slug])}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

    <div class="col lg-9">
      <div class="products_list">
          @foreach ($allproducts as $product)
            <div class="card p-3 mt-0 border border-primary" style="width: 18rem;">
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
</div>
       