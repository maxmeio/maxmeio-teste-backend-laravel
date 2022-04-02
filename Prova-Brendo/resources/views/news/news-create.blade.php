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
                @if(!is_null($news))
                <input type="Title" name="title" class="form-control is-invalid" id="newsTitle" value="{{$news['title']}}">
                @else
                <input type="Title" name="title" class="form-control is-invalid" id="newsTitle" placeholder="Enter Title">
                @endif
            </div>
            <div class="form-group">
                <label for="body">Body</label></br>
                @if(!is_null($news))
                <textarea id="" name="body" rows="8" cols="100">{{$news['body']}}</textarea>
                @else
                <textarea id="" name="body" rows="8" cols="100"></textarea>
                @endif
            </div>
            <div class="form-group">
                <label for="File">Image</label></br>
                <input type="file" id="" name="img" accept="image/*" >
                @if(!is_null($news))
                <img src="{{$news['img_path']}}" class="img-thumbnail"alt="">
                @endif
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@include('app-footer')