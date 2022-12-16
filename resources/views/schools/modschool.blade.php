@extends('main')
@section('index')
    <form method="POST" action="{{ route('schools.change',['id' => $school->id]) }}">
    {{ csrf_field() }}
    <div class="col-md-6 offset-md-3 form-group">
        <h3>{{$school->name}}</h3>
        <div class="form-group row"><label class="col-form-label col-sm-2">Наименование</label>
            <div class="col-sm-10"><input type="text" name='name' value='{{$school->name}}' class="form-control"></div>
        </div>
        <div class="form-group row"><label class="col-form-label col-sm-2">Адрес</label>
            <div class="col-sm-10"><input type="text" name='address' value='{{$school->address}}' class="form-control"></div>
        </div>
        <div class="form-group row"><label class="col-form-label col-sm-2">Сайт</label>
            <div class="col-sm-10"><input type="text" name='site' value='{{$school->site}}' class="form-control"></div>
        </div>
        <div class="form-group row"><label class="col-form-label col-sm-2">Контингент</label>
            <div class="col-sm-10"><input type="text" name='con' value='{{$school->con}}' class="form-control"></div>
        </div>
        <div class="form-group row"><label class="col-form-label col-sm-2">Выборка</label>
            <div class="col-sm-10"><input type="text" name='vib' value='{{$school->vib}}' class="form-control"></div>
        </div>
        <input type="submit" value="Сохранить" class="btn btn-success">
        <a href='{{route('schools.index')}}' class="btn btn-danger">Отменить</a>
        @if(session('saved'))
            <div class='alert alert-success'>{{session('saved')}}</div>
            <a class='btn btn-primary' href='{{route('schools.index')}}'>Назад</a>
        @endif
        @if(!empty($errors->all()))
            <div class='alert alert-danger'>Ошибка сохранения! Проверьте поля!</div>
        @endif
    </div>
</form>
@endsection
