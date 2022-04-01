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
            <form action="/login" method="post">
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Nome</label>
                    <input type="text" name='nome'class="form-control is-valid" id="inputSuccess" placeholder="Nome completo ...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control is-invalid" id="exampleInputEmail1" placeholder="Enter email" aria-invalid="true" aria-describedby="exampleInputEmail1">
                    <span id="exampleInputEmail1" class="invalid-feedback">Please enter a email address</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" name="password" class="form-control is-invalid" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1" aria-invalid="true">
                    <span id="exampleInputPassword1" class="invalid-feedback">Please provide a password</span>
                </div>
                <div class="form-group">
                    <select name="user_group" id="">
                        <option value=""></option>
                    </select>
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