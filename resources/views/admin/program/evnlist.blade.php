@extends('layouts.backend')
@section('headcontent')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Berita</h1>
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
      <a href="{{route('adber')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
      <form style="float: right" action="" method="">
        <input type="text">
      </form>
    </div>

    <div class="card-body table-responsive">
      <table class="table table-striped">
        <thead>
          <tr class="">
            <th>No</th>
            <th>Nama </th>
            <th>Kategori </th>
            <th>Lokasi</th>
            <th>Tanggal </th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          @foreach ($event as $ev)
          <tr>
            <td class="text-center">{{$no++; }}</td>
            <td>{{$ev->nama}}</td>
            <td>{{$ev->nama_kategori}}</td>
            <td>{{$ev->lokasi}}</td>
            <td>{{$ev->tanggal}}</td>
            <td><img src="{{asset('foto')}}/{{$ev->foto}}" height="50px"></td>
            <td class="">
              <a href="{{route('edber',$ev->id)}}" class="btn btn-xs btn-warning"> <i class="fa fa-pen"> </i> Edit</a>
              <a href="{{route('delber',$ev->id)}}" onclick="return confirm('Anda Yakin...?')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i> Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection