@extends('layouts.app')

@section('content')
<div class="container">
    <div >
        <div class="col-md-8">
            <div class="card" style="width: 70em">
                <div class="card-header">{{ __('Сотрудники организации') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('recordings.index') }}" class="btn btn-primary" style="margin-right: 25px">Назад</a>
                        <a href="{{ route('workers.create') }}" class="btn btn-success">Добавить сотрудника</a>
                    </div>
                    <br>
                    <table class="table table-striped" id="mytable" cellspacing="0" style="width: 100%;">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">ФИО</th>
                              <th scope="col">Должность</th>
                              <th scope="col">Действие</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($workers as $positions => $position)   <!-- Перебираем список и выводим в таблицу. -->
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $position->surname }} {{ $position->name }} {{ $position->patronymic }}</td>
                                <td>{{ $position->post }}</td>
                                <td>
                                    <form action="{{ route('workers.destroy',$position->id) }}" method="POST" id="form">
                                        <a class="btn btn-secondary" href="{{ route('workers.edit',$position->id) }}">Изменить данные о сотруднике</a>
                                        @csrf    <!-- Проверка запросов. -->
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
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
