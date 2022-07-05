@extends('layouts.adminwindow')

@section('title', 'User Detail :'.$data->title)

@section('content')


    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail User Data</h3>
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
                        <th>Name & Surname</th>
                        <td>{{$data->name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>Roles</th>
                        <td>
                            @foreach ($data->roles as $role)
                                {{$role->name}}
                                <a href="{{route('admin.user.destroyrole',['uid'=>$data->id,'rid'=>$role->id ])}}"
                                   onclick="return confirm('Deleting !! Are you sure ?')">[x]</a>
                            @endforeach

                        </td>
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
                        <th >Add Role to User</th>
                        <td>
                            <form role="form" action="{{route('admin.user.addrole',['id'=>$data->id])}}" method="post" >
                                @csrf
                                <select name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Role</button>
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
