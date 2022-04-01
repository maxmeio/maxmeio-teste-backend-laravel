<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Brendo</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">


</head>

<body class="antialiased">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <span class="brand-text font-weight-light">Prova</span>
      </a>
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">News</a>
        </li>

        <?php

        use App\Models\UserGroups;
        use Illuminate\Support\Facades\Auth;

        // print_r(Auth::user());
        if (Auth::check()) {
          if (Auth::user()->user_group_id == 1) {
            echo '<li class="nav-item d-none d-sm-inline-block">
            <a href="/registration" class="nav-link">Manage Users</a>
          </li>';
            echo '<li class="nav-item d-none d-sm-inline-block">
            <a href="manage-news" class="nav-link">Manage News</a>
          </li>';
            echo '<li class="nav-item d-none d-sm-inline-block">
            <a href="logout" class="nav-link">Logout</a>
          </li>';
          } elseif (Auth::user()->user_group_id == 2) {
            echo '<li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Manage News</a>
          </li>';
            echo '<li class="nav-item d-none d-sm-inline-block">
            <a href="logout" class="nav-link">Logout</a>
          </li>';
          }
        } else {
          echo '<li class="nav-item d-none d-sm-inline-block">
            <a href="/login" class="nav-link">Login</a>
          </li>';
        }
        ?>
      </ul>
      <!-- SEARCH FORM -->
    </div>
  </nav>