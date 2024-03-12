<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
</head>
<body>
    <h2>Список пользователей:</h2>
    <table border="1">
        <thead>
            <td>Имя</td>
            <td>Тел.</td>
            <td>Скидка, %</td>
        </thead>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->discount}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>