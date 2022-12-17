@extends('main')
@section('index')
    <div class='col-md-8 offset-md-2'>
        <h3>Список организаций</h3>
        <a href='{{ route('schools.show', ['id' => 'new']) }}' class='badge badge-primary'>Добавить</a>
        @if (session('message'))
            <div class='alert alert-success'>
                {{ session('message') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ОО</th>
                <th>Адрес</th>
                <th>Сайт</th>
                <th>Контингент</th>
                <th>Выборка</th>
                <th>Актуализация</th>
                <th>Пароль для анкеты</th>
                <th></th>
            </tr>
            @foreach ($schoolList as $school)
                <tr>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->address }}</td>
                    <td>{{ $school->site }}</td>
                    <td></td>
                    <td>{{ $school->con }}</td>
                    <td>{{ $school->vib }}</td>
                    <td>{{ $school->id }}</td>
                    <td><a href='{{ route('schools.show', ['id' => $school->id]) }}'
                            class="btn btn-success">Редактировать</a>
                        <a href="{{route('photo.index', ['id' => $school->id]) }}" class="btn btn-info">Фото</a>
                        <a href='{{ route('schools.delete', ['id' => $school->id]) }}' type="button"
                            class="btn btn-danger">Удалить</a>
                        <a href="/eam/2108" class="btn btn-info">Анкета</a>
                        <!----><a href="http://eduqa.egechita.ru/forma.pdf" class="btn btn-info">Скачать форму</a><a
                            href="https://eduqa.egechita.ru/back/showqr/2108" class="btn btn-info">qr</a><label>Загрузить
                            форму:</label><input type="file" id="form" class="btn btn-info"><a target="_blank"
                            class="btn btn-success" style="display: none;">Скачать</a><i class="fas fa-sync"
                            style="display: none;"></i><a href="/schoolexpertfoto/2108" class="btn btn-info"
                            style="display: none;">Заполнить электронную форму</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
