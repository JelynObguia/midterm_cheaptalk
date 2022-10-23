@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-1">
                    <div class="card p3 {{ $user->gender === 'female' ? 'f1' : 'm1' }}">
                        <div class="">
                            <h4 class="text-center p-2">{{ $user->name }}</h4>
                        </div>

                        <a href="{{ url('authors', ['id' => $user->id]) }}">
                        </a>

                        <div class="card-footer text-dark text-center">
                            <p>Total Posts: {{ $user->posts()->count() }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="offset-md-5 mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <style>
        #pf1 {
            height: 150px;
            width: 310px;
        }

        .f1 {
            background-color: lightpink;
        }

        .m1 {
            background-color: lightblue;
        }
    </style>
@endsection
