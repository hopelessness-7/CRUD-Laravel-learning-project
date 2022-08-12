@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="max-width: 60rem;">
                <div class="card-header">{{ __('Запись ухода сотрудника') }}</div>
                <div class="card-body">
                    <form action="{{ route('recordings.update',$recording->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-around">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Время ухода:</strong>
                                        <input type="datetime-local" name="departure_date" class="form-control" value ="{{ $recording->departure_date}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route('recordings.index') }}" class="btn btn-primary">Назад</a>
                            <button type="submit" id="btn" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection