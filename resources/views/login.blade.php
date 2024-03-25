@extends('layout')
@section('content')

@if(Auth::user())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>{{__('Здравствуйте,')}} {{Auth::user()->name}}</h1>
                    {{ __('Вы в системе!') }}
                    
                </div>
                
            </div>
            <a href="{{url('logout')}}">Выйти из системы</a>
        </div>
    </div>
</div>
@else
    <h2>Вход в систему</h2>
    <form method="post" action="{{url('auth')}}">
    @csrf
    <label>E-mail</label>
    <input type="text" name="email" value="{{old('email')}}"/>
    <br>
    <label>Пароль</label>
    <input type="password" name="password" value="{{old('password')}}"/>
    <br>
    <input type="submit">
    </form>
@endif 
@endsection