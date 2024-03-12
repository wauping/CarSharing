<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статистика</title>
</head>
<body>
    <h2>{{$user ? "Список аренды пользователем ".$user->name . " автомобилей" : 'Неверный ID пользователя' }}</h2>
    @if($user)
    <table border="1">
        <tr>
            <td>id</td>
            <td>Модель</td>
            <!-- <td>Суммарное время пользования</td> -->
        </tr>
        @foreach($user->cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->brand}}{{$car->model}}</td>
            <!-- <td>{{$car-></td> #TODO: User's usage time summary-->
        </tr>
        @endforeach
    </table>
    @endif
</body>
</html>