@extends('layouts.master')

@section('content')
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Product</h1>
      <ol class="breadcrumb">
        <li><a href="#">Product</a></li>
        <li><i class="fa fa-angle-right"></i> list</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 
        <div class="row">
            <a class="btn btn-outline-success" href="{{ route('product.add') }}">Tambah Data</a>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Satuan</th>
                          <th scope="col">HPP</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$product->name}}</td>
                          <td>{{$product->satuan}}</td>
                          <td>Rp. {{number_format($product->harga,2)}}</td>
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
@endsection
