@extends('layouts.master')
@section('title', 'SKIN - ASSEGAF')
@section('page-title', 'Skin Menu')
@section('page-subtitle', 'Create Skin Data - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Form Input Skin</div>
    <div class="row card-category">
        <div class="container-fluid">
            <div class="col-md-12">
                <form action="/skin/post" method="post">
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
                                <label for="">Price</label>
                                <input type="number" class="form-control" id="price" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Grade</label>
                                <input type="text" class="form-control" id="skin_grade" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Sheets</label>
                        <input type="number" class="form-control" placeholder="Input Sheets..." value="{{old('sheet')}}" min="0" id="sheet" name="sheet">
                    </div>
                    <div class="form-group">
                        <label for="">Total Price</label>
                        <input type="number" id="total_price" class="form-control" name="total_price" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Meat Grade</label><span class="ml-2" style="color: red; font-size:10px;">*Nullable</span>
                                <select name="meat_grade" class="form-control">
                                    <option selected="true" disabled="disabled">---Select Meat Grade---</option>
                                    <option value="merah" @if (old('meat_grade')=='merah' ) selected="selected" @endif>Merah</option>
                                    <option value="putih" @if (old('meat_grade')=='putih' ) selected="selected" @endif>Putih</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total Meat (kg)</label><span class="ml-2" style="color: red; font-size:10px;">*Nullable</span>
                                <input type="number" class="form-control" id="total_meat" name="total_meat">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Meat Price</label><span class="ml-2" style="color: red; font-size:10px;">*Nullable</span>
                                <input type="number" class="form-control" id="meat_price" name="meat_price">
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
    $('#butcher_id').change(function() {
        var id = $(this).val();
        var url = '{{ route("getButcherDetails", ":id") }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    console.log(response);
                    $('#price').val(response.price);
                    $('#skin_grade').val(response.skin_grade);
                }
            }
        });
    });
    $('#sheet').on('keyup', function () {
        let price = $('#price').val();
        let sheet = $('#sheet').val();
        let total = parseInt(price) * parseInt(sheet)
        $('#total_price').val(total)
    })
</script>
@endsection