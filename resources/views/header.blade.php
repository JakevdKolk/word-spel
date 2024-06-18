@section('header')
    <header class="headerContainer">
        <ul>
            <li><a href="/">
                    <h3 style="color: blue;">Word<span style="color:yellow;">-</span><span style="color: green">Spel</span>
                    </h3>
                </a></li>
            <li> <a href="/friendlist">Friendslist</a></li>
            <li> <a href="">Previous Games</a></li>
            <li><a href="/leaderboard">Leaderboard</a></li>
            <li><a href="/edit-profile">
                @if(session("loggedIn"))
                    <img src={{route('profile.show')}} alt="User Avatar" style="max-width: 50px; border-radius: 40%">
                @endif
                </a></li>
        </ul>
    </header>
@endsection
