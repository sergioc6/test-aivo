@extends('index')
@section('content')

@isset($message)
<div class="container">
    <div class="alert alert-success">
        {{ $message }}
    </div>
</div>
@endisset

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form method="post" action="{{ route('guardar_configuracion') }}">
                @csrf
                @foreach($configs as $c)
                <div class="form-group row">
                    <label for="inputAccount" class="col-sm-2 col-form-label">{{ $c->name }}</label>
                    <div class="col-sm-4">
                        <input name="{{ $c->id }}" type="text" class="form-control" value="{{ $c->value }}">
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary mb-2">Guardar Configuraciones</button>
            </form> 
        </div>
    </div>
</div>



@endsection