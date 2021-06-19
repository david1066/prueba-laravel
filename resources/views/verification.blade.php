@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Hemos envaido un codigo de verificacion a tu correo</h1>
                    <form action="/validate" method="post">
                    {{ csrf_field() }}
                        <label for="code">Codigo de verficacion</label>
                        <input class="form-control" type="text" name="code" id="code">
                        <input class="btn btn-success" type="submit" >
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
