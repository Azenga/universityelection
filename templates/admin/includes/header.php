<?php session_start(); ?>
<?php include('helper.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <base href="http://localhost/election/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for the dashboard -->
    <link href="css/dashboard.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Visit Site</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="JavaScript:void(0)">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="templates/admin/index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="templates/admin/candidates/candidates.php">
                  <span data-feather="file"></span>
                  Candidates
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="templates/admin/voters/voters.php">
                  <span data-feather="shopping-cart"></span>
                  Voters
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="templates/admin/faculties/faculties.php">
                  <span data-feather="users"></span>
                  Faculties
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="templates/admin/positions/positions.php">
                  <span data-feather="users"></span>
                  Vying Positions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="templates/admin/posts.php">
                  <span data-feather="bar-chart-2"></span>
                  Posts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="templates/admin/results.php">
                  <span data-feather="layers"></span>
                  Results
                </a>
              </li>
            </ul>
          </div>
        </nav>
