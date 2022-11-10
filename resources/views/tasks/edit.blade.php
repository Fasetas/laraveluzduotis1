@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pridėti užduotį</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" class="form-control" name="name" value="{{ $task->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Aprašymas</label>
                                <input type="text" class="form-control" name="discription" value="{{ $task->discription }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Statusas</label>
                                <select name="status" class="form-select" >
                                <option value="0" {{ ($task->status == "0")?'selected':''}}>Sukurta</option>
                                <option value="1" {{ ($task->status == "1")?'selected':''}}>Vykdoma</option>
                                <option value="2" {{ ($task->status == "2")?'selected':''}}>Įvykdyta</option>
                                <option value="3" {{ ($task->status == "3")?'selected':''}}>Atšaukta</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Prioritetas</label>

                               <select name="priority_id" class="form-select">
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->name }} </option>
                                @endforeach
                               </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vartotojas</label>

                               <select name="user_id" class="form-select">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                               </select>
                            </div> 
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection