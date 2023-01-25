@extends('layouts.master')
@section('title', 'PURCHASE - ASSEGAF')
@section('page-title', 'Purchase Detail')
@section('page-subtitle', 'Purchase Invoice - Spend')

@section('konten')
<div class="card-body">
    <div class="card-title">Total Purchase</div>
    <div class="row card-category">
        <div class="col-md-6">
            <div>Detail All Purchases</div>
        </div>
        @if(Auth::user()->role == 'admin')
        <div class="col-md-6 text-right">
            <a href="{{url('export-excel-csv-file/purchase/xlsx')}}" class="btn btn-success btn-rounded btn-sm mb-2"><i class="fas fa-file mr-2"></i>Export Excel</a>
            <a href="/export-pdf/purchase" class="btn btn-danger btn-sm btn-rounded mb-2"><i class="fas fa-book mr-2"></i> Export PDF</a>
            <a href="/purchases_record/create" class="btn btn-primary btn-sm btn-rounded mb-2"><i class="fas fa-plus mr-2"></i> Create</a>
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Detail</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Detail</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Amount</th>
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
                    <td>{{$dt->detail}}</td>
                    <td>{{date_format($dt->created_at, 'd M Y')}}</td>
                    <td>{{date_format($dt->created_at, 'H:i')}}</td>
                    
                    @if(isset($dt->amount))
                    <td>{{$dt->amount}}</td>
                    @else
                    <td><i>--Data Unavailable--</i></td>
                    @endif
                    
                    @if(isset($dt->price))
                    <td>Rp. {{number_format($dt->price)}},-</td>
                    @else
                    <td><i>--Data Unavailable--</i></td>
                    @endif
                    
                    <td>Rp. {{number_format($dt->total_purchase)}},-</td>
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