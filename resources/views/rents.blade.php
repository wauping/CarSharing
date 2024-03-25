@extends('layout')
@section('content')
    <h2>Список аренд:</h2>
    <table class="table table-striped-columns">
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
        <div class="pagination">
            {{$rents->links('bootstrap-5')}}
        </div>
    </table>
    <form action="/rent/create" class="inline add-record">
        <button class="btn btn-primary">Добавить запись</button>
    </form>
@endsection