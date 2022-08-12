@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="max-width: 60rem;">
                <div class="card-header">{{ __('Добавить сотрудника') }}</div>
                <div class="card-body">
                    <form action="{{ route('workers.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Фамилия:</strong>
                                    <input type="text" name="surname" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Имя:</strong>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Отчество:</strong>
                                    <input type="text" name="patronymic" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12"  id="divPassport" style="display:none"> 
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
                                    <input type="text" name="passport" class="form-control" id="inputPassport" style="display:none">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Должность:</strong>
                                    <br>
                                    <select id="selectPositionsID" class="form-select" multiple aria-label="multiple select example" onchange="PositionsID(event)">
                                        @foreach ($positions as $position)
                                            <option value="{{$position->id}}">{{$position->post}}</option>
                                        @endforeach
                                      </select>
                                    <input type="text" name="position_id" class="form-control" id="inputPositionsID" style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('workers.index') }}" class="btn btn-primary">Назад</a>
                            <button type="submit" id="btn" class="btn btn-success" onclick="inputClick(event)">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function PositionsID(e) {
        let intext =  document.getElementById("inputPositionsID");
        intext.value = e.target.value

        let SelPassport = document.getElementById('selectPositionsID').selectedIndex
        console.log(SelPassport)
        if ( SelPassport == 9) {
            document.getElementById('divPassport').style.display = 'block'
        }else{
            document.getElementById('divPassport').style.display = 'none'
        }
    };

    function inputClick (e) {
        let inputPassportSeries = document.getElementById('inputPassportSeries').value;
        let inputPassportNumber = document.getElementById('inputPassportNumber').value;
        let inputPassportDate = document.getElementById('inputPassportDate').value;
        let inputPassportIssued = document.getElementById('inputPassportIssued').value;
        let inputPassportCode = document.getElementById('inputPassportCode').value;
        let inputPassportAdress = document.getElementById('inputPassportAdress').value;
        let inputPassport =  inputPassportSeries + '|' + inputPassportNumber + '|' + inputPassportDate + '|' + inputPassportIssued + '|' + inputPassportCode + '|' + inputPassportAdress;
        document.getElementById('inputPassport').value = inputPassport;
    }

    // onchange="inputOncheng(event)"


</script>

@endsection