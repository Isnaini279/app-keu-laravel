<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apps Keuangan</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/fontawesome/css/all.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{url('assets/css/logo-nav.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <!-- <img src="http://placehold.it/300x60?text=Logo" width="150" height="30" alt=""> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{url('home')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('list_kategori')}}">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('list_transaksi')}}">Transaksi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

