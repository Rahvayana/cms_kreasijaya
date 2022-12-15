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
            <div class="col-md-12">
                <form action="{{ route('product.save') }}" method="POST">@csrf
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" name="name" id="basicInput" type="text">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label>Satuan Barang</label>
                                <select name="satuan" id="satuan" class="form-control">
                                    <option value="lembar">Lembar</option>
                                    <option value="meter">Meter</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label>Harga Barang</label>
                                <input class="form-control" name="harga" id="basicInput" type="text">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content --> 
  </div>
@endsection
