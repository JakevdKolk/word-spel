@extends('home')


@section('content')
    <div>
        <div>
            <section>put guessed word here</section>
        </div>
        <div>
            <form action="{{ route('game.store') }}" method="post">
                @csrf
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <input type="text" name="guess" id="">
                <input type="submit" value="guess">
            </form>
        </div>
        @if ($guess)
            {{$guess}}
        @endif
    </div>
@endsection
