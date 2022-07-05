@extends('layouts.frontbase')

@section('title', 'User Order List')


@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">User Orders</li>
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
                            <h3 class="title">User Menu</h3>
                        </div>
                        @include('home.user.usermenu')
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">User Order List</h4>
                        </div>
                        <div class="input-checkbox">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Id</th>

                                    <th>Name & Surname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>

                                    <th style="width: 40px">Cancel</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $data as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td> {{$rs->name}}  </td>

                                        <td>{{$rs->phone}} </td>
                                        <td>{{$rs->email}} </td>
                                        <td>{{$rs->addres}} </td>
                                        <td>{{$rs->status}} </td>


                                        <td><a href="{{route('userpanel.orderdetail',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">Show Detail</a>  </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
