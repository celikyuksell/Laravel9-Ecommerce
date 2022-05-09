@extends('layouts.adminbase')

@section('title', 'Show Product :'.$data->title)

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <a href="{{route('admin.product.edit',['id'=>$data->id])}}" class="btn btn-block bg-gradient-info" style="width: 200px">Edit</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('admin.product.destroy',['id'=>$data->id])}}" onclick="return confirm('Deleting !! Are you sure ?')" class="btn btn-block bg-gradient-danger" style="width: 200px">Delete</a>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Show Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 200px">Id</th>
                            <td>{{$data->id}}</td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>
                                {{ \App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data->category, $data->category->title) }}

                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th>Keywords</th>
                            <td>{{$data->keywords}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$data->description}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$data->price}}</td>
                        </tr>                        <tr>
                            <th>Quantity</th>
                            <td>{{$data->quantity}}</td>
                        </tr>                        <tr>
                            <th>Minimum Quantity</th>
                            <td>{{$data->minquantity}}</td>
                        </tr>                        <tr>
                            <th>Tax</th>
                            <td>{{$data->tax}}</td>

                        <tr>
                        <tr>
                            <th>Detail Inf</th>
                            <td>{!! $data->detail !!}</td>
                        </tr>
                        <th>Image</th>
                        <td>     @if ($data->image)
                                <img src="{{Storage::url($data->image)}}" style="height: 100px">
                            @endif</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$data->status}}</td>
                        </tr>
                        <tr>
                            <th >Cerated Date</th>
                            <td>{{$data->created_at}}</td>
                        </tr>
                        <tr>
                            <th >Update Date</th>
                            <td>{{$data->updated_at}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
