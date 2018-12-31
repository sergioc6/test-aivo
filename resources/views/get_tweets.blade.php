@extends('index')
@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form method="post" action="{{ route('descargar_tweets') }}">
                @csrf
                <div class="form-group row">
                    <label for="inputAccount" class="col-sm-2 col-form-label">Cuenta de Twitter</label>
                    <div class="col-sm-4">
                        <input name="inputAccount" type="text" class="form-control" id="inputAccount" placeholder="Cuenta">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Obtener Tweets</button>
            </form> 
        </div>
    </div>
</div>


@isset($tweets)
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
            <td>{{ $t->account }}</td>
            <td>{{ $t->text }}</td>
            <td>{{ $t->favorite_count }}</td>
            <td>{{ $t->retweet_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endisset


@endsection

