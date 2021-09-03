@extends('layouts.master')

@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1>Category</h1>
    <ol class="breadcrumb">
      <li><a href="#">Setting</a></li>
      <li><i class="fa fa-angle-right"></i> Category</li>
    </ol>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-kategori" style="font-family: Poppins">Tambah Kategori</button> 
      <div class="row">
          <div class="col-md-12">
              <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                          <a href="#"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil"></i></button></a>
                          <a href="#"><button type="button" data-record-id="1" data-toggle="modal" data-target="#confirm-delete" class="btn btn-secondary"><i class="fa fa-trash"></i></button></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <!-- /.content --> 
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="vcenter">Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
              <p>Anda yakin ingin menghapus data ini?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger btn-ok">Delete</button>
          </div>
      </div>
  </div>
</div>
<div class="modal fade" id="add-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="vcenter">Tambah Data Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
              <form action="{{ route('setting.category.add') }}" method="POST" enctype="multipart/form-data">@csrf
                  <fieldset class="form-group">
                      <label>Nama Kategori</label>
                      <input class="form-control" id="basicInput" type="text" name="nama_kategori">
                    </fieldset>
                  <button class="btn btn-success" type="submit">Tambah!</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
