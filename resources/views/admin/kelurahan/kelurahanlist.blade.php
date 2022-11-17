@extends('layouts.backend')
@section('headcontent')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Kelurahan</h1>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>{{session('pesan')}}</h5>
        </div>
        @endif
        <div class="card-header ">
            <a href="{{route('addkelurahan')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
            <form style="float: right" action="" method="">
                <input type="text">
            </form>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Kelurahan</th>
                        <th>Kode Pos</th>
                        <th>Kode Kemendagri</th>
                        <th>Jumlah Penduduk</th>
                        <th>Kepadatan</th>
                        <th>Luas Wilayah</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($kelurahan as $kel)
                    <tr>
                        <td class="text-center">{{$no++; }}</td>
                        <td>{{$kel->nama}}</td>
                        <td>{{$kel->kdpos}}</td>
                        <td>{{$kel->kdmendagri}}</td>
                        <td>{{$kel->jml_penduduk}}</td>
                        <td>{{$kel->kepadatan}}</td>
                        <td>{{$kel->luas}}</td>
                        <td class="text-center">
                            <a href="{{route('edevn',$kel->id_kelurahan)}}" class="btn btn-xs btn-warning"> <i class="fa fa-pen"> </i> Edit</a>
                            <a href="{{route('delevn',$kel->id_kelurahan)}}" onclick="return confirm('Anda Yakin...?')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection