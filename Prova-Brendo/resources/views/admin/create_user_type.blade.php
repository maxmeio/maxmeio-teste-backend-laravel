@include('app')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('create_user_type_form') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="col-form-label" for="type"><i class="fas fa-check"></i> Tipo</label>
                <input type="text" name='type' class="form-control is-valid" id="inputSuccess" placeholder="Tipo de usuario">
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@include('app-footer')