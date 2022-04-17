<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
    
</head>
<body>
<nav class="navbar navbar-dark navbar-expand bg-dark mb-4">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url() ?>/Contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url() ?>/Register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url() ?>/Login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url() ?>/Dashboard/logout">Logout</a>
            </li>
        </ul>
    </div>    
</nav>