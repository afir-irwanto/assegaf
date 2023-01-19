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
                    <th>Butcher</th>
                    <th>Sheets</th>
                    <th>Price</th>
                    <th>Meat Grade</th>
                    <th>Meat Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Butcher</th>
                    <th>Sheets</th>
                    <th>Price</th>
                    <th>Meat Grade</th>
                    <th>Meat Total</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $dt)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dt->name}}</td>
                    <td>{{$dt->sheet}}</td>
                    <td>Rp. {{number_format($dt->total_price)}},-</td>
                    @if(isset($dt->meat_grade))
                    <td>{{$dt->meat_grade}}</td>
                    @else
                    <td><i>--Data Unavailable--</i></td>
                    @endif
                    @if(isset($dt->total_meat))
                    <td>{{$dt->total_meat}}</td>
                    @else
                    <td><i>--Data Unavailable--</i></td>
                    @endif
                    <td>
                        <a href="/skin/{{$dt->id}}/edit" class="btn btn-sm btn-rounded btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-rounded btn-danger delete" data-id="{{$dt->id}}" data-name="{{$dt->name}}"><i class="fas fa-trash"></i></a>
                    </td>
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
                    window.location = "/skin/" + data_id + "/delete"
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