@extends('layout')
@section('content')

    <h2>Изменить запись</h2>
    <form method="post" action="{{url('rent/update/'.$rent->id)}}"/>
        @csrf

        <br>
        <label>Начало аренды</label>
        <input type="datetime-local" value="{{ $rent->start_time }}" disabled>

        <br>    
        <label>Конец аренды</label>
        <input type="datetime-local" name="end_time" value="{{$rent->end_time}}"/>
        @error('end_time')
        <div class="is-invalid">{{$message}}</div>
        @enderror

        <br>        
        <label>Пользователь</label>
        <select name="user_id" value="{{ old('user_id') }}">
        <option style="...">
            @foreach ($users as $user)
                <option value="{{$user->id}}"
                        @if(old('user_id'))
                            @if(old('user_id') == $user->id) selected @endif
                        @else
                            @if($rent->user_id == $user->id) selected @endif
                    @endif >{{$user->name}}</option>
            @endforeach
        </select>
        @error('user_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror

        <br>
        <label>Авто</label>
        <select name="car_id" value="{{ old('car_id') }}">
        <option style="...">
            @foreach ($cars as $car)
                <option value="{{$car->id}}"
                        @if(old('car_id'))
                            @if(old('car_id') == $car->id) selected @endif
                        @else
                            @if($rent->car_id == $car->id) selected @endif
                    @endif >{{$car->brand}}{{$car->model}}</option>
            @endforeach
        </select>
        @error('car_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
        <input type="submit" value="Изменить">
</form>
@endsection