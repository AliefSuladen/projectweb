@extends('layouts.backend')
@section('headcontent')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Kelurahan</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header"></div>
        <form action="{{route('postnope')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nomor </label>
                            <input type="text" class="form-control" name="nope" required>
                        </div>
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