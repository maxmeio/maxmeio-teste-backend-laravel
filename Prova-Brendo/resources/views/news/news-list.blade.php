@include('app')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">News List</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover dtr-inline">
            @if($edit_page)
            <a href="/create-news"><strong>Add a new</strong></a>
            @foreach($all_news as $news)
            <tr>
                <td colspan=4>
                    <h3>{{$news['title']}}</h3>
                </td>
            </tr>
            <tr>
                <td>{{$news['body']}}</td>
                <td><img src="{{$news['img_path']}}" width="300px" alt=""></td>
                <td>
                    @if($news['activated'])
                    <p>OK</p>
                    @else
                    <p>Waiting for aprovation</p>
                    @endif
                </td>
                <td colspan=3>
                    <ul class="inline">
                        <li class="list-inline-item">
                            <form action="/delete-news" method="post">
                                @csrf
                                <input type="hidden" name="news_id" value="{{$news['id']}}">
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </form>
                        </li>
                        <li class="list-inline-item">
                            <form action="/edit-news" method="post">
                                @csrf
                                <input type="hidden" name="news_id" value="{{$news['id']}}">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </form>
                        </li>
                        <li class="list-inline-item">
                            @if($admin)

                            <form action="/auth-news" method="post">
                                @csrf
                                <input type="hidden" name="news_id" value="{{$news['id']}}">
                                <button class="btn btn-primary" type="submit">Authorize</button>
                            </form>

                            @endif
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
            @else
            @foreach($all_news as $news)
            <div class="container-md">
                <div class="">
                    <div class="col">

                        <img src="{{$news['img_path']}}" class="rounded mx-auto d-block" alt="">

                        <h3>{{$news['title']}}</h3>
                        <small>Published in: {{$news['created_at']}}</small>

                        <p>{{$news['body']}}</p>

                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </table>
    </div>

</div>

@include('app-footer')