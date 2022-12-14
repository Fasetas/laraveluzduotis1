@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pridėti užduotį</div>
                    <div class="card-body">
                    @include('tasks.error')
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Užduoties pavadinimas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Aprašymas</label>
                                <input type="text" class="form-control @error('discription') is-invalid @enderror" name="discription" value="{{ old('discription') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Statusas</label>
                                <select name="status" class="form-select">
                                <option value="0">Sukurta</option>
                                <option value="1">Vykdoma</option>
                                <option value="2">Įvykdyta</option>
                                <option value="3">Atšaukta</option>
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