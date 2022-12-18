@extends('main')
@section('index')
    <div class="offset-md-4 col-lg-4 col-md-12" style="1border: 1px solid black;">
        <h3 class="d-none d-sm-block">Анкетирование потребителей услуг</h3>
        <div class="cabinet-login-form align-self-center">
            <a href="{{ route('anketa.index') }}" class="btn btn-success"><i
                    class="fas fa-smile"></i> Пройти анкетирование
            </a><br><br>
        </div>
    </div>
@endsection
