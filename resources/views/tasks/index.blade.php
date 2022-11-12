@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Užduočiu sąrašas</div>
                    <div class="card-body">
                    <form action="{{ route('tasks.search') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="search" placeholder="Ieškoma prekė" value="{{ $search }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success">Ieškoti</button>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="{{ route('task.filter') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <select class="form-select" name="filter_priority">
                                        <option value=""  {{ ($filter_priority==null)?'selected':'' }}>-</option>
                                        @foreach($priorities as $priority)
                                            <option value="{{ $priority->id }}"  {{ ($priority->id==$filter_priority)?'selected':'' }}>{{ $priority->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success">Filtruoti</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('tasks.search.reset') }}" class="btn btn-warning">Išvalyti</a>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Aprašymas</th>
                                <th>Statusas</th>
                                <th>Prioritetas</th>
                                <th>Vartotojas</th>
                                <th>Redaguoti</th>
                                <th>Ištrinti</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->discription }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>{{ $task->priority->name }}</td>
                                    <td>{{ $task->user->name }}</td>
                                    <td style="width: 100px;">
                                        <a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}" >Redaguoti</a>
                                    </td>

                                    <td style="width: 100px;">
                                        <form method="POST" action="{{route('tasks.destroy', $task->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection