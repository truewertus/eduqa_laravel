@extends('main')
@section('index')
    <form method="POST" action='{{ route('cabinet.save') }}'>
        {{ csrf_field() }}
        <div class="col-md-5 offset-md-4 justify-content-md-center">
            <div class="UserInfo form-control">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-12 col-form-label">{{ @$ateName }}</label>

                </div>
                <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">ФИО координатора</label>
                    <div class="col-sm-10"><input type="text" value="{{ $user->fio }}" name='fio'
                            placeholder="ФИО" class="form-control"></div>
                </div>
                <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">Должность</label>
                    <div class="col-sm-10"><input type="text" value="{{ $user->work }}" name='work'
                            placeholder="Должность" class="form-control"></div>
                </div>
                <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">Электронная
                        почта</label>
                    <div class="col-sm-10"><input type="text" value="{{ $user->email }}" name='mail'
                            placeholder="E-mail" class="form-control"></div>
                </div>
                <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">Мобильный
                        телефон</label>
                    <div class="col-sm-10"><input type="text" value="{{ $user->mob_phone }}" name='mob'
                            placeholder="Мобильный телефон" class="form-control"></div>
                </div>
                <div class="form-group row"><label for="inputPassword" class="col-sm-2 col-form-label">Рабочий
                        телефон</label>
                    <div class="col-sm-10"><input type="text" value="{{ $user->phone }}" name='phone'
                            placeholder="Рабочий телефон" class="form-control"></div>

                </div><input type="submit" value="Сохранить изменения" class="btn btn-outline-success">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (!empty($errors->all()))
                    <div class="alert alert-danger">
                        Ошибка! Проверьте поля!
                        @if ($errors->has('mail'))
                            Email
                        @endif
                        @if ($errors->has('fio'))
                            ФИО
                        @endif
                        @if ($errors->has('work'))
                            Должность
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
