<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> .is-invalid {color : red; } </style>
    <title>Добавление записи</title>
</head>
<body>
    Форма создания записи
    <form method="post" action="{{url('rent')}}">
        @csrf
        <label>Начало аренды</label>
        <input type="datetime-local" name="start_time" value="{{old('start_time')}}"/>
        @error('start_time')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
        <label>Автомобиль</label>
        <select name="car_id">
            @foreach ($cars as $car)
                <option value="{{$car->id}}" {{old('car_id') == $car->id ? 'selected' : ''}}>
                    {{$car->brand}}{{$car->model}}
                </option>
            @endforeach
        </select>
        @error('car_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
        <label>Пользователь</label>
        <select name="user_id">
            @foreach ($users as $user)
                <option value="{{$user->id}}" {{old('user_id') == $user->id ? 'selected' : ''}}>
                    {{$user->name}}
                </option>
            @endforeach
        </select>
        @error('user_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
        <input type="submit">
    </form>    
</body>
</html>
