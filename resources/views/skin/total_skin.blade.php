@extends('layouts.master')
@section('title', 'STORAGE - ASSEGAF')
@section('page-title', 'Storage Menu')
@section('page-subtitle', 'Total Storage Data - Stuff')

@section('konten')
<div class="card-body">
    <div class="card-title">Storage</div>
    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="fas fa-spa"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category">Total Skins</p>
                                <h4 class="card-title">{{$data->total_skin}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col-9 col-stats">
                            <div class="numbers">
                                <p class="card-category">Total Meat</p>
                                <h4 class="card-title">{{ $meat->total_meat }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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