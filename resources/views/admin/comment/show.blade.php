@extends('layouts.adminwindow')

@section('title', 'Show Message :'.$data->title)

@section('content')


    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Message Data</h3>
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
                        <th>Product</th>
                        <td>{{$data->product->title}}</td>
                    </tr>
                    <tr>
                        <th>Name & Surname</th>
                        <td>{{$data->user->name}}</td>
                    </tr>

                    <tr>
                        <th>Subject</th>
                        <td>{{$data->subject}}</td>
                    </tr>                        <tr>
                        <th>Message</th>
                        <td>{{$data->review}}</td>
                    </tr>
                    </tr>                        <tr>
                        <th>Rate</th>
                        <td>{{$data->rate}}</td>
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
                        <th >Admin Note :</th>
                        <td>
                            <form role="form" action="{{route('admin.comment.update',['id'=>$data->id])}}" method="post" >
                                @csrf
                                <select name="status">
                                    <option selected>{{$data->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Comment</button>
                                </div>
                            </form>
                        </td>
                    </tr>


                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>
    <!-- /.content -->

@endsection
