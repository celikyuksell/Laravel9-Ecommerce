@extends('layouts.adminwindow')

@section('title', 'Show Message :'.$data->title)

@section('content')


    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Detail</h3>
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
                        <th>User</th>
                        <td>{{$data->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Name & Surname</th>
                        <td>{{$data->name}}</td>
                    </tr>

                    <tr>
                        <th>Phone</th>
                        <td>{{$data->phone}}</td>
                    </tr>                        <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$data->address}}</td>
                    </tr>
                    <tr>
                        <th>Ip Number</th>
                        <td>{{$data->IP}}</td>

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
                    <tr>
                        <th >Admin Note :
                        <br><br><br>
                            Status :
                        </th>
                        <td>
                            <form role="form" action="{{route('admin.order.update',['id'=>$data->id])}}" method="post" >
                                @csrf
                                <textarea name="note" cols="80">{{$data->note}}</textarea>
                                <br>
                                <select name="status">
                                    <option selected>{{$data->status}}</option>
                                    <option>Accepted</option>
                                    <option>Shipped</option>
                                    <option>Canceled</option>
                                    <option>Completed</option>
                                </select>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </form>
                        </td>
                    </tr>


                </table>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th style="width: 40px">Cancel</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $datalist as $rs)
                        <tr>
                            <td>{{$rs->id}}</td>
                            <td>{{$rs->product->title}} </td>
                            <td>{{$rs->price}} </td>
                            <td>{{$rs->quantity}} </td>
                            <td>{{$rs->amount}} </td>
                            <td>
                                @if ($rs->product->image)
                                    <img src="{{Storage::url($rs->product->image)}}" style="height: 40px">
                                @endif

                            </td>

                            <td>{{$rs->status}} </td>
                            <td>
                                <a href="{{route('admin.order.acceptproduct',['id'=>$rs->id ] )}}" class="btn btn-block btn-success btn-sm"
                                   onclick="return confirm('Accepting !! Are you sure ?')">Accept</a>

                                <a href="{{route('admin.order.cancelproduct',['id'=>$rs->id ] )}}" class="btn btn-block btn-danger btn-sm"
                                   onclick="return confirm('Cancelling !! Are you sure ?')">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>

    </section>
    <!-- /.content -->

@endsection
