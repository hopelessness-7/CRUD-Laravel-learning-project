@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="max-width: 60rem;">
                <div class="card-header">{{ __('Запись прибытия сотрудника') }}</div>
                <div class="card-body">
                    <form action="{{ route('recordings.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-around">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Сотрудник:</strong>
                                        <br>
                                        <select id="selectWorkersID" class="form-select" multiple aria-label="multiple select example" onchange="WorkersID(event)">
                                            @foreach ($workers as $worker)
                                                <option value="{{$worker->id}}">{{$worker->surname}} {{$worker->name}} {{$worker->patronymic}}</option>
                                            @endforeach
                                          </select>
                                        <input type="text" name="worker_id" class="form-control" id="inputWorkersID" style="display: none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Кабинет:</strong>
                                        <br>
                                        <select id="selectCabinetsID" class="form-select" multiple aria-label="multiple select example" onchange="CabinetsID(event)">
                                            @foreach ($cabinets as $cabinet)
                                                <option value="{{$cabinet->id}}">{{$cabinet->cabinet_number}}</option>
                                            @endforeach
                                          </select>
                                        <input type="text" name="cabinet_id" class="form-control" id="inputCabinetsID" style="display: none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Время прибытия:</strong>
                                        <input type="datetime-local" name="arrival_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('recordings.index') }}" class="btn btn-primary">Назад</a>
                            <button type="submit" id="btn" class="btn btn-primary">Записать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function WorkersID(e) {
        let intext =  document.getElementById("inputWorkersID");
        intext.value = e.target.value
    };
    function CabinetsID(e) {
        let intext =  document.getElementById("inputCabinetsID");
        intext.value = e.target.value
    };
</script>

@endsection