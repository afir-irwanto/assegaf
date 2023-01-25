@extends('layouts.master')
@section('title', 'MEAT - ASSEGAF')
@section('page-title', 'Meat Menu')
@section('page-subtitle', 'Create Meat Data - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Sales Data</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/sales_record/post" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Item</label>
                                <select name="item" class="form-control">
                                    <option selected="true" disabled="disabled">---Select Item---</option>
                                    <option value="Skin" @if (old('item')=='Skin' ) selected="selected" @endif>Skin</option>
                                    <option value="Meat" @if (old('item')=='Meat' ) selected="selected" @endif>Meat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Customer</label>
                                <select name="customer" class="form-control">
                                    <option selected="true" disabled="disabled">---Select Customer---</option>
                                    <option value="General" @if (old('customer')=='General' ) selected="selected" @endif>General</option>
                                    <option value="Company" @if (old('customer')=='Company' ) selected="selected" @endif>Company</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="number" class="form-control" placeholder="Input quantity..." value="{{old('quantity')}}" min="0" name="quantity">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="Input price..." value="{{old('price')}}" min="0" name="price">
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