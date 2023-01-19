@extends('layouts.master')
@section('title', 'SKIN - ASSEGAF')
@section('page-title', 'Skin Menu')
@section('page-subtitle', 'Skin Page - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Skin</div>
    <div class="row card-category">
        <div class="col-md-6">
            <div>Detail Data Skins</div>
        </div>
        <div class="col-md-6 text-right">
            <a href="/skin/create" class="btn btn-primary btn-sm btn-rounded mb-2"><i class="fas fa-plus mr-2"></i> Create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Time</th>
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
                    <td>{{date_format($dt->created_at, 'd M Y')}}</td>
                    <td>{{date_format($dt->created_at, 'H:i')}}</td>
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