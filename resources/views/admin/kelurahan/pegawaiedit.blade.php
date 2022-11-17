@extends('layouts.backend')
@section('headcontent')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Event</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header"></div>
    <form action="{{route('uppeg', $pegawai->id_pegawai)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nama Pegawai</label>
              <input type="text" class="form-control" name="nama_pegawai" value="{{$pegawai->nama_pegawai}}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>NIP</label>
              <input type="text" class="form-control" name="nip" value="{{$pegawai->nip}}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Jabatan</label>
              <input type="text" class="form-control" name="jabatan" value="{{$pegawai->jabatan}}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Penugasan</label>
              <select name="id_kelurahan" class="form-control">
                <option value="<?= $pegawai->id_kelurahan ?>"> <?= $pegawai->nama ?> </option>
                <?php foreach ($kelurahan as $key => $value) { ?>
                  <option value="<?= $value->id_kelurahan ?>"><?= $value->nama ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Foto Pegawai</label>
              <input type="file" class="form-control" name="foto">
            </div>
          </div>
          <div class="col-md-6">
            <label>Foto Pegawai</label><br>
            <img class="img-fluid" src="{!! asset('foto/'.$pegawai->foto) !!}" width="200" alt="Photo">
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<!-- /.card -->
@endsection