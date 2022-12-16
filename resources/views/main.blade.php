<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('INDEX_TITLE')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img class="img-fluid" src="{{ asset('logo.png') }}" width="50px" height="50px" alt="КЦОКО">
            <a href="/" class='navbar-brand d-none d-lg-block'>{{env('MENU_TITLE')}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('files', ['type' => 'edu']) }}" class='nav-link'><i class="fas fa-school"></i>
                            Образование
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('files', ['type' => 'culture']) }}" class='nav-link'><i
                                class="fas fa-graduation-cap"></i> Культура
                        </a>
                    </li>
                    @guest
                        <li class="nav-item form-inline">
                            <div class="nav-link" style='cursor: pointer;' onclick="$('#login-form').toggle()">
                                <i class="fas fa-lock"></i> Войти
                            </div>
                        </li>
                    @endguest
                    @auth
                        @cannot('show-result')
                        <li class="nav-item form-inline" v-if="user.login && user.option.cabinet">
                            <a href="{{ route('cabinet.index') }}" class='nav-link'><i class="fas fa-briefcase"></i> Личные
                                данные
                            </a>
                        </li>
                        @endcannot
                        <!--<li class="nav-item form-inline" v-if="user.login && user.option.stages">
                            <router-link to="/stages" class='nav-link'><i class="far fa-calendar"></i> Этапы</router-link>
                        </li>-->

                        <li class="nav-item form-inline" v-if="user.login && user.option.edu">
                            <a href='{{ route('schools.index') }}' class='nav-link'><i class="far fa-calendar"></i> Список организаций
                        </a>
                        </li>
                        @can('show-result')
                            <li class="nav-item form-inline" v-if="user.login && user.option.stagesmod">
                                <router-link to="/modstages" class='nav-link'><i class="far fa-calendar"></i> Изменение этапов
                                </router-link>
                            </li>
                            <li class="nav-item form-inline" v-if="user.login && user.option.admin">
                                <router-link to="/fotocheck" class='nav-link'><i class="far fa-calendar"></i> Образование анкеты
                                </router-link>
                            </li>
                            <li class="nav-item form-inline" v-if="user.login && user.option.admin">
                                <router-link to="/fotocheckc" class='nav-link'><i class="far fa-calendar"></i> Культура анкеты
                                </router-link>
                            </li>

                            <li class="nav-item form-inline" v-if="user.login && user.option.admin">
                                <router-link to="/newsadmin" class='nav-link'><i class="fas fa-newspaper"></i> Новости
                                </router-link>
                            </li>
                        @endcan
                        <li class="nav-item form-inline" v-if="user.login">
                            <a class='nav-link' href='{{ route('user.logout') }}' style='cursor: pointer;'><i
                                    class="fas fa-door-open"></i> Выход</a>
                        </li>
                    @endauth
                </ul>
            </div>
            @guest
                <div class="form-inline" id="login-form" style='display:1none;'>
                    <form method="POST" action="{{ route('user.login') }}">
                        {{ csrf_field() }}
                        <input type='text' name="login" class='form-control col-5' placeholder="Логин" />
                        <input type='password' name="password" class='form-control col-5' placeholder="Пароль" />
                        <input type='submit' class='btn btn-outline-success btn-sm' value='Войти' />
                    </form>
                </div>
                @isset($loginErrors)
                    <div class='alert alert-danger'>
                        {{ $loginErrors }}
                    </div>
                @endisset
            @endguest
        </nav>
    </div>
    <div class="conteiner-flud">
        <div class="row">
            <div class="col-md-12">
                @section('index')

                @show
            </div>
        </div>
    </div>
</body>

</html>
