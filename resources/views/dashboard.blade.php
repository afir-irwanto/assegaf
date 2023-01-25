@extends('layouts.master')
@section('title', 'Dashboard - ASSEGAF')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Front Page Dashboard')

@section('dashboard')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Storage Report</div>
                    <div class="card-category">Daily information about storage in system</div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-spa"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Skins</p>
                                                <h4 class="card-title">{{ $skins->total_skin }} sheets</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <div class="col-md-6">
                            <div class="card card-stats card-secondary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-weight-hanging"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Meats</p>
                                                <h4 class="card-title">{{ $meats->total_meat }} kilos</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total income & spend statistics</div>
                    <div class="row py-3">
                        <div class="col-md-4 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                <h3 class="fw-bold">Rp. {{ number_format($sale) }}</h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                <h3 class="fw-bold">Rp. {{ number_format($purchase) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="chart-container">
                                <canvas id="totalIncomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mini Butcher Table</div>
                </div>
                <div class="card-body">
                    <table class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Skin Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mini_butcher as $mb)
                            <tr>
                                <td>{{ $mb->name }}</td>
                                <td>{{ $mb->skin_grade }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a href="/butcher" class="btn btn-primary btn-rounded btn-sm">View More...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mini Sales Table</div>
                </div>
                <div class="card-body">
                    <table class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Customer</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mini_sale as $ms)
                            <tr>
                                <td>{{ $ms->item }}</td>
                                <td>{{ $ms->customer }}</td>
                                <td>Rp. {{number_format($ms->total_price ) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a href="/sales_record" class="btn btn-primary btn-rounded btn-sm">View More...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Mini Purchase Table</div>
                </div>
                <div class="card-body">
                    <table class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Detail</th>
                                <th>Total Purchase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mini_purchase as $mp)
                            <tr>
                                <td>{{ $mp->detail }}</td>
                                <td>Rp. {{number_format($mp->total_purchase ) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a href="/purchases_record" class="btn btn-primary btn-rounded btn-sm">View More...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection