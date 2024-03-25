@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">   
        <form method="post" action="{{url('rent/update/'.$rent->id)}}">
            @csrf
            <div class="mb-3">
                <label for="start_time" class="form-label">Начало аренды</label>
                <input type="datetime-local" class="form-control" name="start_time" value="{{ $rent->start_time }}" disabled>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">Конец аренды</label>
                <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{$rent->end_time}}"/>
                @error('end_time')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Пользователь</label>
                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{ $rent->user_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="car_id" class="form-label">Автомобиль</label>
                <select name="car_id" class="form-control @error('car_id') is-invalid @enderror">
                    @foreach ($cars as $car)
                        <option value="{{$car->id}}" {{ $rent->car_id == $car->id ? 'selected' : '' }}>{{$car->brand}} {{$car->model}}</option>
                    @endforeach
                </select>
                @error('car_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>  
    </div>
</div>  
@endsection
