<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                @foreach($sliderdata as $rs)
                    <div class="banner banner-1">
                        <img src="{{Storage::url($rs->image)}}" style="width: 1200px; height: 675px">
                        <div class="banner-caption text-center">
                            <h1>{{$rs->title}}</h1>
                            <h3 class="white-color font-weak">Up to 50% Discount</h3>
                            <a href="{{route('product',['id'=>$rs->id])}}" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
            @endforeach
            <!-- /banner -->
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->
