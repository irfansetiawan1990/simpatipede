 @extends('adminlte::page')

@section('content')
 <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Visi dan Misi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

   <script src="https://cdn.tiny.cloud/1/qly7ft1kwgvykr6rvvnfqbgya7orou7ji03skp7zgxblivtw/tinymce/5/tinymce.min.js" referrerpolicy="origin">
 </script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('visimisi.store') }}" method="POST">
            @csrf
        <textarea id="visimisi" name="visimisi" rows="12" cols="6">
          
          {{ $visimisi->visimisi }}

        </textarea>
           <div class="form-group" >
                            <div class="col-md-12 col-md-offset-6 text-right" style="margin-top:20px">
                                <button type="submit" class="col-md-2 btn btn-primary"  >Simpan</button>
                                <button type="button" class="col-md-2 btn btn-danger" style="margin-left:10px" onclick="window.location='{{ url('/visimisi') }}'" >Kembali</button>
                            </div>
                        </div>
      </form>
          
   
      
    </div>
  </div>
  

</div>
<script>
  tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
     </div>
        <!-- /.card-body -->
        <div class="card-footer">
          SimPati PeDe 2020 @muhamad irfan setiawan - STMIK SUMEDANG 
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
     @endsection


