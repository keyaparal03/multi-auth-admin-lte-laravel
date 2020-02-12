@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
  <!-- right column -->
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Page</h3>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
            {{ Form::model($cms,['route' => ['cms.update' , $cms->id ],'method' => 'PUT','class' => 'form' ,'id' =>'createroomsform','files' => true] ) }}
       
        
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
            {!! Form::textarea('description1', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'Description1','class' => 'ckeditor')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Description2') !!}
            {!! Form::textarea('description2', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'Description2','class' => 'ckeditor')) !!}
        </div>  
        <div class="form-group">
        
             @php 
              $photos =array();
              if( !empty($cms->image1))
              {
                $photos = unserialize( $cms->image1);
                if(count($photos)>0)
                {
                  
                  $img_path=url('/logo/'.$photos['image1']); 
                  echo '<img src="'.$img_path.'" width="100px">';
                }
                
              }                             
             @endphp
             <input type="file" name="image1">
        </div>   
         <div class="form-group">
        
             @php 
              $photos =array();
              if( !empty($cms->image2))
              {
                $photos = unserialize( $cms->image2);
                if(count($photos)>0)
                {
                  
                  $img_path=url('/logo/'.$photos['image2']); 
                  echo '<img src="'.$img_path.'" width="100px">';
                }
                
              }                             
             @endphp
             <input type="file" name="image2">
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
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Meta Tags')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Meta Details') !!}
            {!! Form::text('meta_details', null, 
                array('class'=>'form-control', 
                'placeholder'=>'Meta Details')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update!!', 
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

<!-- /.content -->
@endsection