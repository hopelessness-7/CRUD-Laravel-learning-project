@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="max-width: 60rem;">
                <div class="card-header">{{ __('Изменить данные сотрудника')}}</div>
                <div class="card-body">
                    <form action="{{ route('workers.update',$worker->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Фамилия:</strong>
                                    <input type="text" name="surname" class="form-control" value="{{$worker->surname}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Имя:</strong>
                                    <input type="text" name="name" class="form-control" value="{{$worker->name}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Отчество:</strong>
                                    <input type="text" name="patronymic" class="form-control" value="{{$worker->patronymic}}">
                                </div>
                            </div>
                            @if ($worker->position_id  == 10)
                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Данные паспорта:</strong>
                                        <br>
                                        <textarea name="passport" id="textareaPassport" cols="80" rows="8"></textarea>
                                        <input type="text" name="passport" id="inputPassport" class="form-control" value="{{$worker->passport}}" style="display: none">
                                    </div>
                                </div> --}}
                                <div class="col-xs-12 col-sm-12 col-md-12"  id="divPassport"> 
                                    <div class="form-group">
                                        <strong>Паспортные данные:</strong>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Серия и номер паспорта</span>
                                            <input type="text" name="passportSeries" class="form-control" id="inputPassportSeries">
                                            <input type="text" name="passportNumber" class="form-control" id="inputPassportNumber">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Дата выдачи</span>
                                            <input type="date" name="passportDate" class="form-control" id="inputPassportDate">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Кем выдан</span>
                                            <input type="text" name="passportIssued" class="form-control" id="inputPassportIssued">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Код подразделения</span>
                                            <input type="text" name="passportCode" class="form-control" id="inputPassportCode">
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Адрес регистрации</span>
                                            <input type="text" name="passportAdress" class="form-control" id="inputPassportAdress" >
                                        </div>
                                        <input type="text" name="passport" class="form-control" id="inputPassport" value="{{$worker->passport}}" style="display: none">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('workers.index') }}" class="btn btn-primary">Назад</a>
                            <button type="submit" id="btn" class="btn btn-success" onclick="inputClick(event)">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    window.onload = function win() {
        let passport = document.getElementById('inputPassport').value;  
        let pass = passport.split('|')
        console.log(pass)
        document.getElementById('inputPassportSeries').value = pass[0];
        document.getElementById('inputPassportNumber').value = pass[1];
        document.getElementById('inputPassportDate').value = pass[2];
        document.getElementById('inputPassportIssued').value = pass[3];
        document.getElementById('inputPassportCode').value = pass[4];
        document.getElementById('inputPassportAdress').value = pass[5];
        document.getElementById('inputPassport').value = " ";  
    }

    function inputClick(e) {
        let inputPassportSeries = document.getElementById('inputPassportSeries').value;
        let inputPassportNumber = document.getElementById('inputPassportNumber').value;
        let inputPassportDate = document.getElementById('inputPassportDate').value;
        let inputPassportIssued = document.getElementById('inputPassportIssued').value;
        let inputPassportCode = document.getElementById('inputPassportCode').value;
        let inputPassportAdress = document.getElementById('inputPassportAdress').value;
        let inputPassport =  inputPassportSeries + '|' + inputPassportNumber + '|' + inputPassportDate + '|' + inputPassportIssued + '|' + inputPassportCode + '|' + inputPassportAdress;
        document.getElementById('inputPassport').value = inputPassport;
    }

</script>
@endsection