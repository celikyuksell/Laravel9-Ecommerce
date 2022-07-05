@extends('layouts.frontbase')

@section('title', 'Order Page')


@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Order</li>
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
                @include('home.messages')
                <form id="checkout-form" action="{{route("shopcart.storeorder")}}" class="clearfix" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="billing-details">
                            <div class="section-title">
                                <h4 class="title">Shipping Information</h4>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name & Surname" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="shiping-methods">
                            <div class="section-title">
                                <h4 class="title">Payment Information [ ${{$total}} ]</h4>
                            </div>
                            <div class="input-checkbox">
                                <div class="form-group">
                                    <input class="input"  type="hidden" name="total" value="{{$total}}">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="holder" placeholder="Card Holder">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="number" name="number" placeholder="Card Number">
                                </div>

                                <div class="form-group">
                                    <input class="input" type="text" name="date" placeholder="Exp. Date">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="code" placeholder="Security Code">
                                </div>

                                <div class="pull-right">
                                    <button type="submit" class="primary-btn">Complete Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
