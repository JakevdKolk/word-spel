@extends('home')

@section('content')
    <div>
        @if ($turns <= 0)
            <div>
                <p>You have no more turns left</p>
                <p>Do you want to save your score:
                <form action="{{ route('game.create') }}" method="post">
                    @csrf
                    <input type="hidden" name="winner" value="0">
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="submit" value="save">
                </form>
                </p>
            </div>
        @else
            <section>Put guessed word here</section>

            <div>
                <form action="{{ route('game.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="turns" value="{{ $turns }}">
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="text" name="guess" id="">
                    <input type="submit" value="guess">
                </form>
            </div>
        @endif

        @if ($right_guess)
            @if ($right_guess === $word)
                <p>You guessed the right word: {{ $word }}</p>
                <p>Do you want to save your score:
                <form action="{{ route('game.create') }}" method="post">
                    @csrf
                    <input type="hidden" name="winner" value="1">
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="submit" value="save">
                </form>
                </p>
            @else
                <p>Right character: {{ $right_guess }}</p>
                <p>Your guess: {{ $guess }}</p>
            @endif
        @endif
    </div>
@endsection
