@extends('home')

@section('content')
    <div>
        <h1>Edit Your Profile</h1>
        <h2>Hallo {{ session('loggedIn')->name }}</h2>
        <section>
            <h3>change avatar</h3>
            <form action="" method="post">
                <input type="file" name="" accept=".png" id="">
                <input name="submitNewAvater" type="submit" value="submit">
            </form>
        </section>
    </div>
@endsection
