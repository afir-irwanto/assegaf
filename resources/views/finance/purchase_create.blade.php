@extends('layouts.master')
@section('title', 'MEAT - ASSEGAF')
@section('page-title', 'Meat Menu')
@section('page-subtitle', 'Create Meat Data - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Purchase Data</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/purchases_record/post" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Detail</label>
                        <input type="text" class="form-control" placeholder="Input Purchase Details..." value="{{old('detail')}}"name="detail">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" placeholder="Input Purchase Amount..." value="{{old('amount')}}"name="amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="Input Purchase Price..." value="{{old('price')}}" name="price">
                            </div>
                        </div>
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