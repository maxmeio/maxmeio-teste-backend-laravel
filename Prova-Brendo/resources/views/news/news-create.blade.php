@include('app')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Login</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('create-news-confirm')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <div class="form-group">
                <label for="newsTitle">Title</label>
                <input type="Title" name="title" class="form-control is-invalid" id="newsTitle" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="body">Body</label></br>
                <textarea id="" name="body" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="File">Image</label></br>
                <input type="file" id="" name="img" accept="image/*" >
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<!-- /.card -->
</body>

</html>