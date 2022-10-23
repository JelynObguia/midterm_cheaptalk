@extends('base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card bg-dark">
                <h1 class="text-light text-center pt-5">
                    {{ __($category->category . ' Posts') }}</h1>

                    <div class="ms-auto">
                        {{ $posts->links() }}
                    </div>
            </div>

            <div class="row" style="height: 100vh; overflow: auto">
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-1">

                        <div class="card {{ $post->user->gender === 'female' ? 'f1' : 'm1' }}">
                            <div class="card bg-secondary">
                                <nav class="navbar navbar-expand-lg text-info mb-2">
                                    <div class="container-fluid">
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
                            <div class="card mx-auto mt-3 mb-4" style="height: 20vh; width:390px;">
                                <div class="card-body rounded {{ $post->user->gender === 'female' ? 'f1' : 'm1' }}">
                                    <h4 style="font-weight:400; font-size:16px;">{{ $post->post }}</h4>
                                </div>
                            </div>

                            <div class="footer">

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
