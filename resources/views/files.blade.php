@extends('main')
@section('index')
    <div class="filesList offset-md-4 col-md-4">
        <h3>Файлы</h3>
        @foreach($files as $file)
        <div class="row file">
            <div class="col-md-1 file-ico"><img src="http://eduqa.egechita.ru/ico/ico_cer.png" alt="file_ico"></div>
            <div class="col-md-11 file-card"><strong class="file-title">{{$file->title}}</strong>
                <p class="file-text">{{$file->text}}</p>
                <a href='{{url('public/files',$file->file)}}'>Скачать</a>
                <hr>
            </div>
        </div>
        @endforeach
    </div>
@endsection
