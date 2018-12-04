<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partials._head')

    @section('style')
        <link rel="stylesheet" href="/css/dashboard.css">

    @endsection

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <div class="search" style="margin-left: 180px;">
                <form class="form-inline my-3 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" style="width: 350px;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </ul>
        <li class="nav-item dropdown" style="list-style: none;">
            @if(Auth::check())
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: black;">
                    <i>Hello!</i> <strong>{{Auth::user()->name}}</strong>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('post.index')}}">Posts</a>
                    <a class="dropdown-item" href="{{url('categories')}}">Categories</a>
                    <a class="dropdown-item" href="{{url('tags')}}">Tags</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                </div>
            @else
                <a href="{{route('user.login')}}" class="btn btn-primary">Login</a>
            @endif
        </li>
    </div>
</nav>



<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky mt-5">
                <ul class="nav flex-column">
                    <li class="nav-item mb-lg-2">
                        <a class="nav-link active mb-lg-2" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-lg-2" href="#">
                            <span data-feather="file"></span>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-lg-2" href="#">
                            <span data-feather="shopping-cart"></span>
                            Favorites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-lg-2" href="#">
                            <span data-feather="users"></span>
                            User Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-lg-2" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->

@include('partials._footer')


</body>
</html>



