@extends('layouts.master')
@section('style')
    <!-- form wizard -->
    <link rel="stylesheet" href="/assets/plugins/formwizard/jquery-steps.css">
    <!-- dropify -->
    <link rel="stylesheet" href="/assets/plugins/dropify/dropify.min.css">    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
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
    <div class="content"> 
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if ($errors->any())
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="col-lg-12">
                <div id="demo">
                    <div class="step-app">
                    <ul class="step-steps">
                        <li><a href="#step1"><span class="number">1</span> Data Portfolio</a></li>
                        <li><a href="#step2"><span class="number">2</span> Images</a></li>
                    </ul>
                    <div class="step-content">
                        <div class="step-tab-panel" id="step1">
                        <form action="{{ route('portfolio.store') }}" class="form-horizontal form-bordered" id="my_form" method="POST" enctype="multipart/form-data">@csrf
                            <div class="row m-t-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label text-right">Nama Project</label>
                                    <input name="project_name" placeholder="Nama Project" value="{{ old('project_name') }}" required class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label text-right">Nama Client</label>
                                        <input placeholder="Client" name="client" value="{{ old('client') }}" required class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label text-right">Mulai Project</label>
                                    <input name="start" value="{{ old('start') }}" required class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label text-right">URL Demo</label>
                                        <input placeholder="URL Demo" name="url" value="{{ old('url') }}" required class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label text-right">Project Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label text-right">Project Tags</label>
                                        <input placeholder="Tags" name="tags" value="{{ old('tags') }}" required class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label text-right">Project Deskripsi</label>
                                        <textarea placeholder="Project Deskripsi" required name="project_description" cols="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                            <div class="step-tab-panel" id="step2">
                                <div class="row m-t-2">
                                    <div class="col-md-6 m-b-2">
                                        <label>Select Main Image</label>
                                        {{-- <input type="file" id="input-file-now-custom-1" name="image1" class="dropify" data-default-file="/img/img13.jpg" /> --}}
                                        <input type="file" class="form-control" name="image1">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Select 2nd Image</label>
                                        {{-- <input type="file" id="input-file-now-custom-1" name="image2" class="dropify" data-default-file="/img/img13.jpg" /> --}}
                                        <input type="file" class="form-control" name="image2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Select 3rd Image</label>
                                        {{-- <input type="file" id="input-file-now-custom-1" name="image3" class="dropify" data-default-file="/img/img13.jpg" /> --}}
                                        <input type="file" class="form-control" name="image3">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Select 4rd Image</label>
                                        {{-- <input type="file" id="input-file-now-custom-1" name="image4" class="dropify" data-default-file="/img/img13.jpg" /> --}}
                                        <input type="file" class="form-control" name="image4">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="step-footer">
                        <button data-direction="prev" class="btn btn-light">Previous</button>
                        <button data-direction="next" class="btn btn-primary">Next</button>
                        <button data-direction="finish" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- form wizard --> 
<script src="/assets/plugins/formwizard/jquery-steps.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script src="{{ asset('assets/plugins/dropify/dropify.min.js')}}"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
</script> 
<script>
    $('#demo').steps({
        onFinish: function () {
            $("#my_form").submit()
        }
    });

    $(document).ready(function(){
        $('.js-example-basic-multiple').select2();
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
@endsection