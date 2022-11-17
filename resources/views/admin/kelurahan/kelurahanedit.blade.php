@extends('layouts.backend')
@section('headcontent')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Kelurahan</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header"></div>
    <form action="{{route('upkel', $kelurahan->id_kelurahan)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Nama Kelurahan</label>
              <input type="text" class="form-control" name="nama" value="{{$kelurahan->nama}}" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Luas Wilayah</label>
              <input type="text" class="form-control" name="luas" value="{{$kelurahan->luas}}" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Jumlah Penduduk</label>
              <input type="text" class="form-control" name="jml_penduduk" value="{{$kelurahan->jml_penduduk}}" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Kepadatan</label>
              <input type="text" class="form-control" name="kepadatan" value="{{$kelurahan->kepadatan}}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Kode Pos</label>
              <input type="text" class="form-control" name="kdpos" value="{{$kelurahan->kdpos}}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Kode Kemendagri</label>
              <input type="text" class="form-control" name="kdmendagri" value="{{$kelurahan->kdmendagri}}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Alamat Kantor Lurah</label>
              <input type="text" class="form-control" name="alamat" value="{{$kelurahan->alamat}}" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <label>Profil Kelurahan</label>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <textarea id="compose-textarea" name="isi" class="form-control ">
                  {{$kelurahan->isi}}
                  </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
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
<script>
  $(function() {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
<script type="text/javascript">
  $('.datepicker').datepicker();
</script>
@endsection