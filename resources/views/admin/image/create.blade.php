
<form role="form" action="{{route('admin.image.store',['pid'=>$product->id])}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="input-group">
        <label for="exampleInputEmail1"> Title: </label>
        <input type="text" class="form-control" name="title" placeholder="Title" >
        <label for="exampleInputEmail1"> Image: </label>
        <div class="custom-file">
            <input type="file" class="custom-file-input"  name="image">
            <label class="custom-file-label" >Choose file</label>
        </div>
        <div class="input-group-append">
            <input class="input-group-text"  type="submit" value="Upload">
        </div>
    </div>
</form>
<!-- Default box -->
