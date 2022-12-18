@extends('main')
@section('index')
    <div class="offset-md-4 col-lg-4 col-md-12" style="1border: 1px solid black;">
        <h3>Код анкеты</h3>
        <form method="GET" action="{{ route('anketa.index') }}" class='form-group'>
            <input type='text' name='id' class='form-control'>
            <input type='submit' class='btn btn-success' value='Ответить'>
        </form>
    </div>
@endsection
