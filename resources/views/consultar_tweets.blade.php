@extends('index')
@section('content')

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Account</th>
                <th>Text</th>
                <th>Favs</th>
                <th>RTWs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tweets as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->user_account }}</td>
                <td>{{ $t->text }}</td>
                <td>{{ $t->favorite_count }}</td>
                <td>{{ $t->retweet_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

{{ $tweets->links() }}

</div>






@endsection