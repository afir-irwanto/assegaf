@extends('layouts.master')
@section('title', 'MEAT - ASSEGAF')
@section('page-title', 'Meat Menu')
@section('page-subtitle', 'Create Meat Data - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Meat Data</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/meat/post" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Butcher</label>
                        <select class="form-control" name="butcher_id" id="butcher_id">
                            <option selected="true" disabled="disabled">---Select Buthcer---</option>
                            @foreach($butcher as $btc)
                            <option value="{{$btc->id}}" @if (old('butcher_id')=='{{$btc->id}}' ) selected="selected" @endif>{{$btc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Meat Grade</label><span class="ml-2" style="color: red; font-size:10px;"></span>
                                <select name="meat_grade" class="form-control">
                                    <option selected="true" disabled="disabled">---Select Meat Grade---</option>
                                    <option value="merah" @if (old('meat_grade')=='merah' ) selected="selected" @endif>Merah</option>
                                    <option value="putih" @if (old('meat_grade')=='putih' ) selected="selected" @endif>Putih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Weight (kg)</label>
                                <input type="number" name="weight" class="form-control" id="weight">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" placeholder="Input price..." value="{{old('price')}}" min="0" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="">Total Price</label>
                        <input type="number" id="total_price" class="form-control" name="total_price" readonly>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary btn-rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#total_price').on('click', function () {
        let price = $('#price').val();
        let weight = $('#weight').val();
        let total = parseInt(price) * parseInt(weight)
        $('#total_price').val(total)
    })
</script>
@endsection