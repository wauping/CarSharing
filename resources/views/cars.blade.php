<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автомобили</title>
</head>
<body>
    <h2>Список авто:</h2>
    <table>
        <thead>
            <td>№</td>
            <td>Модель</td>
            <td>Цена за минуту аренды, руб</td>
            <td>Доступность</td>
        </thead>
    @foreach ($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->brand}}{{$car->model}}</td>
            <td>{{$car->cost_per_minute}}</td>
            <td>{{$car->available}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>