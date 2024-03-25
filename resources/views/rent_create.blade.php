@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">   
    <form method="post" action="{{url('rent')}}">
        @csrf
        <div class="mb-3">
            <label for="start_time" class="form-label">Начало аренды</label>
            <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" 
                name="start_time" aria-describedby="nameHelp" value="{{old('start_time')}}"/>
                <div id="nameHelp" class="form-text">Выберите дату начала аренды</div>
            @error('start_time')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label for="car_id" class="form-label">Автомобиль</label>
            <select name="car_id" class="form-control @error('car_id') is-invalid @enderror">
                @foreach ($cars as $car)
                    <option value="{{$car->id}}" {{old('car_id') == $car->id ? 'selected' : ''}}>
                        {{$car->brand}}{{$car->model}}
                    </option>
                @endforeach
            </select>
            @error('car_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <small id="carHelp" class="form-text text-muted">Выберите автомобиль для аренды</small>
        </div>
        <br>
        <div class="mb-3">
            <label for="user_id" class="form-label">Пользователь</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                @foreach ($users as $user)
                    <option value="{{$user->id}}" {{old('user_id') == $user->id ? 'selected' : ''}}>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <small id="userHelp" class="form-text text-muted">Выберите пользователя</small>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>  
    </div>
</div>  
@endsection
