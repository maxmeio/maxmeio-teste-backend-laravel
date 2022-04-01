<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Brendo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">


</head>

<body class="antialiased">

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
                    <input type="text" name='type'class="form-control is-valid" id="inputSuccess" placeholder="Tipo de usuario">
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