<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авто</title>
</head>
<body>
    <h2>{{$car ? "Список записей автомобиля " . $car->brand . $car->model : "Неверный ID авто"}}</h2>
    @if($car)
    <table border="1">
        <thead>
            <tr>
                <td>№</td>
                <td>Начало поездки</td>
                <td>Конец поездки</td>
                <td>Сумма</td>
                <td>Точка конца поездки</td>
                <td>Пользователь</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($car->rents as $rent)
                <tr>
                    <td>{{$rent->id}}</td>
                    <td>{{$rent->start_time}}</td>
                    <td>{{$rent->end_time}}</td>
                    <td>{{$rent->checksum}}</td>
                    <td>{{$rent->address_latitude}}° {{$rent->address_longitude}}°</td>
                    <td>{{$rent->user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>
