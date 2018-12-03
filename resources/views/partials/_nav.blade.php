<!--Default Bootstrap Navbar-->

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="{{Request::is('/') ? "active" : ""}}">
                <a class="nav-link" href="{{url('/')}}"><strong>Home</strong> <span class="sr-only">(current)</span></a>
            </li>
            <li class="{{Request::is('blog') ? "active" : ""}}">
                <a class="nav-link" href="{{url('/blog')}}"><strong>Blog</strong></a>
            </li>
            <li class="{{Request::is('about') ? "active" : ""}}">
                <a class="nav-link" href="{{url('/about')}}"><strong>About</strong></a>
            </li>
            <li class= "{{Request::is('contact') ? "active" : ""}}">
                <a class="nav-link" href="{{url('/contact')}}"><strong>Contact</strong></a>
            </li>
            <div class="search" style="margin-left: 50px;">
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
