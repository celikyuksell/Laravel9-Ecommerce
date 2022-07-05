@extends('layouts.frontbase')

@section('title', 'User ShopCart')


@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User ShopCart</li>
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

                <div class="col-md-2">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">User ShopCart</h3>
                        </div>
                        @include('home.user.usermenu')
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">ShopCart List</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            @foreach($data as $rs)
                                <tr>
                                    <td class="thumb"><img src="{{Storage::url($rs->product->image)}}" alt=""></td>
                                    <td class="details">
                                        <a href="#">{{$rs->product->title}}</a>

                                    </td>
                                    <td class="price text-center"><strong>${{$rs->product->price}}</strong><br><del class="font-weak"></td>
                                    <td class="qty text-center">

                                        <form action="{{route('shopcart.update',['id' => $rs->id])}}" method="post">
                                            @csrf
                                            <input  name="quantity" type="number" value="{{$rs->quantity}}" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="total text-center"><strong class="primary-color">${{$rs->product->price * $rs->quantity }}</strong></td>
                                    <td class="text-right">

                                        <a href="{{route('shopcart.destroy',['id'=>$rs->id])}}" class="main-btn icon-btn"
                                           onclick="return confirm('Deleting !! Are you sure ?')"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $total += $rs->product->price * $rs->quantity;
                                @endphp
                            @endforeach


                            </tbody>
                            <tfoot>

                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>TOTAL</th>
                                <th colspan="2" class="total">${{$total}}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <form action="{{route("shopcart.order")}}" method="post">
                                @csrf
                                <input name="total" value="{{$total}}" type="hidden">
                                <button type="submit" class="primary-btn">Place Order</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
