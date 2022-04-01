@include('app')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
    @if(!is_null($user_edit))
        <form action="{{route('edit-user-confirm')}}" method="post">
            @else
            <form action="{{route('register')}}" method="post">
            @endif
            @csrf
            @if(!is_null($user_edit))
            <input type="hidden" name="user_id" value="{{$user_edit['id']}}">
            @endif
            <div class="form-group">
                <label class="col-form-label" for="full_name"><i class="fas"></i> Nome Completo</label>
                @if(!is_null($user_edit))
                <input type="text" name='full_name' class="form-control" id="inputSuccess" placeholder="Nome completo ..." value="{{$user_edit['full_name']}}" required>
                @else
                <input type="text" name='full_name' class="form-control" id="inputSuccess" placeholder="Nome completo ..." required>
                @endif
            </div>

            <div class="form-group">
                <label for="InputEmail">Email</label>
                @if(!is_null($user_edit))
                <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter email" value="{{$user_edit['email']}}" aria-invalid="false" aria-describedby="InputEmail" required>
                @else
                <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter email" aria-invalid="false" aria-describedby="InputEmail">
                @endif

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1" aria-invalid="false">
            </div>
            <div class="form-group">
                <label for="user_group">Grupo</label>
                @if(!is_null($user_edit))
                <select name="user_group_id" id="">
                    @else
                    <select name="user_group_id" id="">
                        @endif
                        @php

                        use App\Models\UserGroups;

                        use function PHPUnit\Framework\isNull;

                        $user_groups = UserGroups::all();
                        foreach ($user_groups as $user_group) {
                            if (!is_null($user_edit) && $user_edit['user_group_id'] == $user_group['id']){
                                echo '<option value="' . $user_group['id'] . '" selected>' . $user_group['group_name'] . '</option>';
                            }else{
                                echo '<option value="' . $user_group['id'] . '">' . $user_group['group_name'] . '</option>';
                            }
                        }
                        @endphp
                    </select>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Users List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover dataTable dtr-inline">
            <th>User Name</th>
            <th>Email</th>
            <th>User Group</th>
            <th>Manage</th>
            @foreach($users as $user)
            <tr>
                <td>{{$user['full_name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['user_group_id']}}</td>
                <td>
                    <form action="/delete-user" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user['id']}}">
                        <button type="submit">Delete</button>
                    </form>
                    <form action="/edit-user" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user['id']}}">
                        <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- <tr>
                <td>Brendo</td>
                <td>brendoja@gmail.com</td>
                <td>Administrator</td>
                <td>
                    <button></button>
                    <button></button>
                    <button></button>
                </td>
            </tr> -->
        </table>
    </div>

</div>
<!-- /.card -->
</body>

</html>