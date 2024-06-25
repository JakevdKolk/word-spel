@extends('home')

@section('content')
    <div>
        <h2> Welcome to {{ $user->name }}'s profile</h2>

        @foreach ($games as $game)
            <div>
                game number: {{ $game->id }},
                game word: {{ $game->word->word }},
                game user: {{ $game->user->name }},
                winner: @if ($game->winner === 1)
                    yes
                @else
                    no
                @endif

            </div>
        @endforeach
    </div>
@endsection
