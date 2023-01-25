@extends('layouts.master')
@section('title', 'SALES - ASSEGAF')
@section('page-title', 'Sales Menu')
@section('page-subtitle', 'Sales Invoice - Income')

@section('konten')
<div class="card-body">
    <div class="card-title">Total Sales</div>
    <div class="row card-category">
        <div class="col-md-6">
            <div>Detail All Sales</div>
        </div>
        @if(Auth::user()->role == 'admin')
        <div class="col-md-6 text-right">
            <a href="{{url('export-excel-csv-file/sale/xlsx')}}" class="btn btn-success btn-rounded btn-sm mb-2"><i class="fas fa-file mr-2"></i>Export Excel</a>
            <a href="/export-pdf/sale" class="btn btn-danger btn-sm btn-rounded mb-2"><i class="fas fa-book mr-2"></i> Export PDF</a>
            <a href="/sales_record/create" class="btn btn-primary btn-sm btn-rounded mb-2"><i class="fas fa-plus mr-2"></i> Create</a>
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Date & Time</th>
                    <th>Customer</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Item</th>
                    <th>Date & Time</th>
                    <th>Customer</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $dt)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dt->item}}</td>
                    <td>{{date_format($dt->created_at, 'd M Y - H:i') }}</td>
                    <td>{{$dt->customer}}</td>
                    <td>{{$dt->quantity}}</td>
                    <td>Rp. {{number_format($dt->price)}},-</td>
                    <td>Rp. {{number_format($dt->total_price)}},-</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>
@endsection