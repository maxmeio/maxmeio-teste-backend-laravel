@include('app')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">News List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover dataTable dtr-inline">
            @if($edit_page)
            <a href="/create-news"><strong>Add a new</strong></a>
            @foreach($all_news as $news)
            <tr>
                <td colspan=3>
                    <h3>{{$news['title']}}</h3>
                </td>
            </tr>
            <tr>
                <td>{{$news['body']}}</td>
                <td><img src="storage/app/{{$news['img_path']}}" width="150px" alt=""></td>
                <td>
                    @if($news['activated'])
                    <p>OK</p>
                    @else
                    <p>Waiting for aprovation</p>
                    @endif
                </td>
                <td>
                    <form action="/delete-news" method="post">
                        @csrf
                        <input type="hidden" name="news_id" value="{{$news['id']}}">
                        <button type="submit">Delete</button>
                    </form>


                    <form action="/edit-news" method="post">
                        @csrf
                        <input type="hidden" name="news_id" value="{{$news['id']}}">
                        <button type="submit">Edit</button>
                    </form>

                    @if($admin)

                    <form action="/auth-news" method="post">
                        @csrf
                        <input type="hidden" name="news_id" value="{{$news['id']}}">
                        <button type="submit">Authorize</button>
                    </form>

                    @endif
                </td>
            </tr>
            @endforeach
            @else
            @foreach($all_news as $news)
            <tr>
                <td colspan=3>
                    <h3>{{$news['title']}}</h3>
                </td>
            </tr>
            <tr>
                <td>{{$news['body']}}</td>
                <td><img src="@php echo asset(($news['img_path']));
                @endphp" width="150px" alt=""></td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>

</div>
<!-- /.card -->
</body>

</html>