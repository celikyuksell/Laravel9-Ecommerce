@extends('layouts.frontbase')

@section('title', 'User Order Detail')


@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Order Detail</li>
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
                            <h3 class="title">User Order Detail</h3>
                        </div>
                        @include('home.user.usermenu')
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Order Items</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <tr>
                                <th>Name :</th> <td>{{$order->name}}</td>
                            </tr>
                            <tr>
                                <th>Phone :</th> <td>{{$order->phone}}</td>
                            </tr>
                            <tr>
                                <th>Email :</th> <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Address :</th> <td>{{$order->address}}</td>
                            </tr>
                            <tr>
                                <th>Note :</th> <td>{{$order->note}}</td>
                            </tr>
                            <tr>
                                <th>Status :</th> <td>{{$order->status}}</td>
                            </tr>

                        </table>

                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-right">Status</th>

                                <th class="text-right">..</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orderproducts as $rs)
                                <tr>
                                    <td class="thumb"><img src="{{Storage::url($rs->product->image)}}" alt=""></td>
                                    <td class="details">
                                        <a href="#">{{$rs->product->title}}</a>

                                    </td>
                                    <td class="price text-center"><strong>${{$rs->product->price}}</strong><br><del class="font-weak"></td>
                                    <td class="qty text-center">{{$rs->quantity}} </td>
                                    <td class="total text-center"><strong class="primary-color">${{$rs->amount }}</strong></td>
                                    <td class="price text-center"> {{$rs->status }} </td>
                                    <td class="text-right">
                                        @if ($rs->status == "New")
                                            <a href="{{route('userpanel.cancelproduct',['id'=>$rs->id ] )}}" class="main-btn icon-btn"
                                               onclick="return confirm('Cancel !! Are you sure ?')"><i class="fa fa-close"></i></a>
                                       @endif
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                            <tfoot>

                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>TOTAL</th>
                                <th colspan="2" class="total">${{$order->total}}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
