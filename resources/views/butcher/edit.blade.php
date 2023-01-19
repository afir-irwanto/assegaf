@extends('layouts.master')
@section('title', 'BUTCHER - ASSEGAF')
@section('page-title', 'Butcher Menu')
@section('page-subtitle', 'Butcher Page - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Butcher</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/butcher/{{$data->id}}/update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Input Name..." value="{{$data->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" placeholder="Input Price..." value="{{$data->price}}" name="price">
                    </div>
                    <div class="form-group">
                        <label for="">Butcher's Grade</label>
                        <select class="form-control" name="skin_grade">
                            <option selected="true" disabled="disabled">---Select Buthcer's Grade---</option>
                            <option value="baik" @if ($data->skin_grade == 'baik') selected="selected" @endif>Baik</option>
                            <option value="lokal" @if ($data->skin_grade == 'lokal') selected="selected" @endif>Lokal</option>
                            <option value="afkir" @if ($data->skin_grade == 'afkir') selected="selected" @endif>Afkir</option>
                            <option value="jantan" @if ($data->skin_grade == 'jantan') selected="selected" @endif>Jantan</option>
                            <option value="kulit_kepala" @if ($data->skin_grade == 'kulit_kepala') selected="selected" @endif>Kulit Kepala</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection