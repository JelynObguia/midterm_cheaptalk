@extends('base')

@section('content')
    <div class="container card ">
        <div class="card-header">
            <h1 class="text-center" style="font-weight: 400; font-size:20px;">{{ __($author->name . "'s Posts") }}
            </h1>
        </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mt-1">
                    <div class="card {{ $post->user->gender === 'female' ? 'f1' : 'm1' }}">
                        <div class="card">
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
                        <div class="card m-3" style="height: 20vh;">
                            <div class="card-body bg-success rounded text-light">
                                <h4 style="font-size:16px; font-weight:400;">{{ $post->post }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col offset-md-5">
        {{ $posts->links() }}
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
