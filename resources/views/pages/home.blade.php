@extends('base')

@section('content')
    <div class="container">
            <div class="col">
            
                <div class="search" style="position:relative; top: 5px;">
                    
                    <div class="mx-auto" style="width:450px;">
                        <form action="{{ route('posts') }}" method="GET" role="search">
            
                            <div class="input-group">
                                <span class="input-group-btn mr-2 mt-0">
                                    <button class="btn" type="submit" title="Search Post">
                                        <span>Search</span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="post" placeholder="Search posts" id="post">
                                <a href="{{ route('posts') }}" class=" mt-0">
                                    <span class="input-group-btn">
                                        <button class="btn" type="button" title="Refresh page">
                                            <span class="text-light"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                        
                    </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header d-flex">
                <div class="ms-auto mt-3">
                    {{ $posts->links() }}
                </div>
            </div>

            <div class="row ">
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-1">
                        <div class="card {{ $post->user->gender === 'female' ? 'f1' : 'm1' }}">
                            <div class="card bg-secondary">
                                <nav class="navbar navbar-expand-lg text-info mb-2">
                                    <div class="container-fluid ">
                                        <a class="navbar-brand" href="">
                                            {{ $post->user->name }}</a>

                                        <div class="collapse navbar-collapse" id="navbarNavAlt">
                                            <div class="navbar-nav ms-auto">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $post->category->category }}
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        @foreach (App\Models\User::byCategory($post->category_id) as $user)
                                                            <li><a class="dropdown-item"
                                                                    href="{{ url('authors', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </nav>

                            </div>
                            <div class="card m-3" style="height: 20vh; ">
                                <div class="card-body rounded {{ $post->user->gender === 'female' ? 'f1' : 'm1' }}">
                                    <h4 style="font-weight:400; font-size:16px;">{{ $post->post }}</h4>
                                </div>
                            </div>


                        </div>

                    </div>
                @endforeach
            </div>

            
        </div>
    </div>

    <style>
        .f1 {
            background-color: lightpink;
        }

        .m1 {
            background-color: lightblue;

        }
    </style>
@endsection
