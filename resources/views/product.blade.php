@extends('layouts.app')

@section('content')
    <div class="container containerProduct">
        <div class="card p-3 mt-0 border border-primary">
            <div class="d-flex flex-row">
                <div class="row col-9 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{$product['image']}}" class="imageproduct" alt="">
                    <div class="price mt-5"> <h3>Price: {{$product['price']}}</h3></div>
                    <div class="bg-secondary text-white p-3 mt-3">{{$product['title']}}</div>
                    <div class="bg-secondary text-white p-3 mt-3">{{$product['description']}}</div>
                </div>
                <div class="row col-3  d-flex flex-column mt-5">
                    <form action="/add-cart" method="POST">
                        @csrf
                        <div class="d-flex">
                            <input type="hidden" name="product_id" value={{$product['id']}}>
                            <input type="number" name="number_products" value="1" class="input_number">
                        </div>
                
                        <button type="submit" class="btn btn-primary mt-3">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-11">
                @foreach ($product->comments as $comment)
                <div class="card card-white post mt-5">
                    <div class="post-heading">
                        @foreach ($profiles as $profile)          
                            @if ($comment->email == $profile->email)
                                @if (strpos($profile->picture, 'bootdey') !== false)
                                    <div class="float-left">
                                        <img src="{{$profile->picture}}" class="img-circle avatar comment-image border border-primary mr-3" alt="user profile image">
                                    </div>
                                @else
                                    <div class="float-left">
                                        <img src="/storage/app/profile/profile_images/{{$profile->email}}/{{$profile->picture}}" class="img-circle avatar comment-image border border-primary mr-3" alt="user profile image">
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        <div class="float-left meta">
                            <div class="title h5">
                                <a href="#"><b>{{$comment->name}}</b></a>
                                made a post.
                            </div>
                            <h6 class="text-muted time">{{$comment->created_at}}</h6>
                        </div>
                    </div> 
                    <div class="post-description"> 
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>
                @endforeach       
            </div>
        </div>
    </div>

    <form action="/comments/{{$product['id']}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-9 text-white p-3">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control border border-primary" id="name" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control border border-primary" id="email" value="" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="comment">Comment</label>
                            <textarea class="form-control border border-primary" name="comment" id="comment" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-danger">Add comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection