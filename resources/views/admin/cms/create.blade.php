@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
 <!-- Main content -->
 <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12 ">
        {!! Form::open(array('route' => 'cms.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
        
        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Title')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Slug') !!}
            {!! Form::text('slug', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Slug')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Description1') !!}
            <br>
            {!! Form::textarea('description1', null, 
                array('class'=>'form-control', 'cols' => 135,
                      'placeholder'=>'Description1','class' => 'ckeditor')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Description2') !!}
             <br>
            {!! Form::textarea('description2', null, 
                array('class'=>'form-control', 'cols' => 135,
                      'placeholder'=>'Description2','class' => 'ckeditor')) !!}
        </div>  
        <div class="form-group">
           {{Form::label('image1', 'Image1', ['class' => 'control-label'])}}
            {{Form::file('image1', ['accept'=>"image/*"])}}
        </div>  
         <div class="form-group">
           {{Form::label('image2', 'Image2', ['class' => 'control-label'])}}
            {{Form::file('image2', ['accept'=>"image/*"])}}
        </div>   
        <div class="form-group">
            {!! Form::label('Meta Title') !!}
            {!! Form::text('meta_title', null, 
                array(
                      'class'=>'form-control', 
                      'placeholder'=>'Meta Title')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Meta Tags') !!}
            {!! Form::text('meta_tags', null, 
                array( 'class'=>'form-control', 
                      'placeholder'=>'Meta Tags')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Meta Details') !!}
            {!! Form::text('meta_details', null, 
                array('class'=>'form-control', 
                'placeholder'=>'Meta Details')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add New!!', 
              array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
        </div>
      </div>
      <!-- /.box -->
    </div>
<!--/.col (right) -->
  </div>
<!-- /.row -->
</section>
<!-- /.content -->
@endsection