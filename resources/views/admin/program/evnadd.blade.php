@extends('layouts.backend')
@section('headcontent')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Berita</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header"></div>
    <form action="{{route('postevn')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Judul </label>
              <input type="text" class="form-control" name="nama" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Kategori</label>
              <select name="id_kategori" class="form-control">
                <option value=""> Pilih Kategori </option>
                <?php foreach ($kategori as $key => $value) { ?>
                  <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" class="form-control" name="lokasi" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Link URL</label>
              <input type="text" class="form-control" name="url" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Tanggal</label><br>
              <input type="text" class="datepicker" data-date-format="yyyy-mm-dd" placeholder="Tanggal" name="tanggal" required>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <textarea id="compose-textarea" name="isi" class="form-control ">

                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="foto" class="form-control">
                  </div>
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