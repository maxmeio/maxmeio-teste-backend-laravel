@include('app')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">News List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover dataTable dtr-inline">
            
            @foreach($news as $new)
            <tr>
                <td colspam='2'><h3>{{$new['title']}}</h3></td>
                <td>{{$new['body']}}</td>
                <td><img src="{{$new['img_path']}}" width="150px" alt=""></td>
                
            </tr>
            @endforeach
        </table>
    </div>

</div>
<!-- /.card -->
</body>

</html>