@extends('layouts.frontbase')

@section('title', $data->title)

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">{{$data->category->title}}</a></li>
                <li class="active">{{$data->title}}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img src="{{Storage::url($data->image)}}" alt="">
                            </div>
                            @foreach($images as $rs)
                                <div class="product-view">
                                    <img src="{{Storage::url($rs->image)}}" alt="">
                                </div>
                            @endforeach

                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img src="{{Storage::url($data->image)}}" alt="">
                            </div>
                            @foreach($images as $rs)
                                <div class="product-view">
                                    <img src="{{Storage::url($rs->image)}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            @include('home.messages')
                            <div class="product-label">
                                <span>New</span>
                                <span class="sale">-20%</span>
                            </div>
                            <h2 class="product-name">{{$data->title}}</h2>
                            <h3 class="product-price">${{$data->price}} <del class="product-old-price">${{$data->price * 1.20}}</del></h3>
                            <div>
                                @php
                                    $average = $data->comment->average('rate');
                                @endphp

                                <div class="product-rating">
                                    <i class="fa fa-star @if ($average<1) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($average<2) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($average<3) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($average<4) -o empty @endif"></i>
                                    <i class="fa fa-star @if ($average<5) -o empty @endif"></i>
                                </div>
                                <a href="#"> {{$data->comment->count('id')}} /{{number_format($average,1)}}  Review(s) / Add Review</a>
                            </div>
                            <p><strong>Availability:</strong> In Stock</p>
                            <p><strong>Brand:</strong> E-SHOP</p>
                            <p>{{$data->description}}</p>
                            <div class="product-options">
                                <ul class="size-option">
                                    <li><span class="text-uppercase">Size:</span></li>
                                    <li class="active"><a href="#">S</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">SL</a></li>
                                </ul>
                                <ul class="color-option">
                                    <li><span class="text-uppercase">Color:</span></li>
                                    <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                                    <li><a href="#" style="background-color:#8A2454;"></a></li>
                                    <li><a href="#" style="background-color:#BF6989;"></a></li>
                                    <li><a href="#" style="background-color:#9A54D8;"></a></li>
                                </ul>
                            </div>

                            <div class="product-btns">
                                <form action="{{route('shopcart.store')}}" method="post">
                                    @csrf
                                    <div class="qty-input">
                                        <span class="text-uppercase">QTY: </span>
                                        <input class="input" name="quantity" type="number" value="1" min="1" max="{{$data->quantity}}" >
                                        <input class="input" name="id" value="{{$data->id}}" type="hidden">
                                    </div>
                                    <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </form>
                                <div class="pull-right">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Details</a></li>
                                <li><a data-toggle="tab" href="#tab2">Reviews ({{$data->comment->count('id')}})</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{!!$data->detail!!}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">

                                                @foreach($reviews as $rs)
                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><a href="#"> <i class="fa fa-user-o"></i> {{$rs->user->name}}</a> </div>
                                                            <div><a href="#"><i class="fa fa-clock-o"></i> {{$rs->created_at}}</a></div>
                                                            <div class="review-rating pull-right">
                                                                <i class="fa fa-star @if ($rs->rate<1) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<2) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<3) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<4) -o empty @endif"></i>
                                                                <i class="fa fa-star @if ($rs->rate<5) -o empty @endif"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <strong>{{$rs->subject}}</strong>
                                                            <p>{{$rs->review}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                <ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Write Your Review</h4>
                                            <p>Your email address will not be published.</p>

                                            <form class="review-form" action="{{route('storecomment')}}" method="post">
                                                @csrf
                                                <input class="input" type="hidden" name="product_id" value="{{$data->id}}" />
                                                <div class="form-group">
                                                    <input class="input" type="text" name="subject" placeholder="Subject" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="input" name="review" placeholder="Your review"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">Your Rating: </strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rate" value="5" /><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rate" value="4" /><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rate" value="3" /><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rate" value="2" /><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rate" value="1" /><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @auth
                                                    <button class="primary-btn">Submit</button>
                                                @else
                                                    <a href="/login" class="primary-btn"> For Submit Your Review, Please Login  </a>
                                                @endauth

                                            </form>


                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->


@endsection
