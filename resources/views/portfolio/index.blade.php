@extends('layouts.master')

@section('content')
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Portfolio</h1>
      <ol class="breadcrumb">
        <li><a href="#">Portfolio</a></li>
        <li><i class="fa fa-angle-right"></i> index</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Client</th>
                          <th scope="col">URL</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($portfolios as $portfolio)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$portfolio->title}}</td>
                          <td>{{$portfolio->kategori}}</td>
                          <td>{{$portfolio->client}}</td>
                          <td>{{$portfolio->url}}</td>
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
