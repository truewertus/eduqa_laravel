@extends('main')
@section('index')
    <div class="col-md-8 offset-md-5">
        <h3>Загрузка фото</h3>
        <div class="row form-group">
            <form method="POST" enctype="multipart/form-data" action="{{ route('photo.save', ['id' => $id]) }}">
                {{ csrf_field() }}
                <div><input type='file' name='file[]' multiple></div>
                <div><input type='submit' value='Загрузить' class='btn btn-success'></div>
            </form>
        </div>
        <div class="row">

        </div>
    </div>
@endsection
