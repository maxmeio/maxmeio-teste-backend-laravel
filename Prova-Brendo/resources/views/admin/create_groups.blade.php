@include('app')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('create-user-group-confirm') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="col-form-label" for="type"><i class="fas fa-check"></i> Grupo</label>
                <input type="text" name='group_name' class="form-control is-valid" id="inputSuccess" placeholder="Group Name">
                <label class="col-form-label" for="type"><i class="fas fa-check"></i> Permission </label>
                <select name="user_type_id" id="">

                    @php

                    use App\Models\UserTypes;

                    use function PHPUnit\Framework\isNull;

                    $user_Types = UserTypes::all();
                    foreach ($user_Types as $user_type) {

                    echo '<option value="' . $user_type['id'] . '">' . $user_type['user_type'] . '</option>';

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
@include('app-footer')