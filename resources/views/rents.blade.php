<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аренда</title>
</head>
<body>
    <h2>Список аренд:</h2>
    <table border="1">
        <thead>
            <td>№</td>
            <td>Начало поездки</td>
            <td>Конец поездки</td>
            <td>Авто</td>
            <td>Пользователь</td>
            <td>Сумма</td>
            <td>Действия</td>
        </thead>
        @foreach($rents as $rent)
        <tr>
            <td>{{$rent->id}}</td>
            <td>{{$rent->start_time}}</td>
            <td>{{$rent->end_time}}</td>
            <td>{{$rent->car->brand}}{{$rent->car->model}}</td>
            <td>{{$rent->user->name}}</td>
            <td>{{$rent->checksum}}</td>
            <td><a href="{{url('rent/destroy/'.$rent->id)}}">Удалить</a>
                <a href="{{url('rent/edit/'.$rent->id)}}">Редактировать</a>
            </td>
        </tr>
        @endforeach
    </table>    
</body>
</html>