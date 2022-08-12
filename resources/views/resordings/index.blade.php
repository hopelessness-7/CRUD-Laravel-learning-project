@extends('layouts.app')

@section('content')
<div class="container">
    <div >
        <div class="col-md-8">
            <div class="card" style="width: 70em">
                <div class="card-header">{{ __('Контроль сотрудников') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {{-- <a href="{{ url('/home') }}" class="btn btn-primary" >Назад</a> --}}
                        <a href="{{ route('recordings.create') }}" class="btn btn-success" style="margin-right: 25px">Записать время прибытия сотрудника</a>
                        <a href="{{ route('workers.index') }}" class="btn btn-warning">Сотрудники</a>
                    </div>
                    <br>
                    <table class="table table-striped" id="mytable" cellspacing="0" style="width: 100%;">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">ФИО</th>
                              <th scope="col">Кабинет</th>
                              <th scope="col">Время прибытия</th>
                              <th scope="col">Время ухода</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($recordings as $workers => $worker)   <!-- Перебираем список и выводим в таблицу. -->
                            <tr>
                                {{-- <td>{{ $loop->index+1 }}</td> --}}
                                <td>{{ $worker->id }}</td>
                                <td>{{ $worker->surname }} {{ $worker->name }} {{ $worker->patronymic }}</td>
                                <td>{{ $worker->cabinet_number }}</td>
                                <td>{{ $worker->arrival_date }}</td>
                                @if ($worker->departure_date == 'text')
                                    <td><a class="btn btn-secondary" href="{{ route('recordings.edit',$worker->id) }}">Записать время ухода</a></td>
                                @else
                                    <td>{{ $worker->departure_date }}</td>
                                @endif
                            </tr>
                            @endforeach
                          </tbody>
                    </table>
                    {{-- {{$recordings->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable tbody tr"), function() {
                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                       $(this).hide();
                    else
                       $(this).show();                
                });
            });
        });
</script>
@endsection
