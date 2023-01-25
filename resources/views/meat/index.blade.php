@extends('layouts.master')
@section('title', 'MEAT - ASSEGAF')
@section('page-title', 'Meat Menu')
@section('page-subtitle', 'Meat Page - Administrator')

@section('konten')
<div class="card-body">
    <div class="card-title">Meat</div>
    <div class="row card-category">
        <div class="col-md-6">
            <div>Detail Data Meats</div>
        </div>
        @if(Auth::user()->role == 'admin')
        <div class="col-md-6 text-right">
            <a href="/meat/create" class="btn btn-primary btn-sm btn-rounded mb-2"><i class="fas fa-plus mr-2"></i> Create</a>
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Butcher</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>Meat Grade</th>
                    <th>Total Price</th>
                    @if(Auth::user()->role == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Butcher</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>Meat Grade</th>
                    <th>Total Price</th>
                    @if(Auth::user()->role == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
            </tfoot>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($meats as $dt)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dt->name}}</td>
                    <td>{{$dt->weight}}</td>
                    <td>Rp. {{number_format($dt->price)}},-</td>
                    @if(isset($dt->meat_grade))
                    <td>{{$dt->meat_grade}}</td>
                    @else
                    <td><i>--Data Unavailable--</i></td>
                    @endif
                    @if(isset($dt->total_price))
                    <td>Rp. {{number_format($dt->total_price)}},-</td>
                    @else
                    <td><i>--Data Unavailable--</i></td>
                    @endif
                    @if(Auth::user()->role == 'admin')
                    <td>
                        {{-- <a href="/meat/{{$dt->id}}/edit" class="btn btn-sm btn-rounded btn-warning"><i class="fas fa-edit"></i></a> --}}
                        <a href="#" class="btn btn-sm btn-rounded btn-danger delete" data-id="{{$dt->id}}" data-name="{{$dt->name}}"><i class="fas fa-trash"></i></a>
                    </td>
                    @endif
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

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete').click(function() {
        var data_id = $(this).attr('data-id');
        var data_name = $(this).attr('data-name');
        swal({
                title: "Ingin menghapus data " + data_name + "?",
                text: "Setelah dihapus, data tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/meat/" + data_id + "/delete"
                    swal("Data telah dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak terhapus!");
                }
            });
    });
</script>
@endsection