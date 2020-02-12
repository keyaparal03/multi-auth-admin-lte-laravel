@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit occasion</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">occasion</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
      <!-- right column -->
            <div class="col-md-12">
                  <div class="box box-warning">
                        <div class="box-header with-border">
                              <h3 class="box-title">Edit category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                                {{ Form::model($occasion,['route' => ['occasion.update' , $occasion->id ],'method' => 'PUT','class' => 'form' ,'id' =>'createoccasionform','files' => true] ) }}
                           <div class="form-group">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Name')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Slug') !!}
                            {!! Form::text('slug', null,
                                array('required',
                                      'class'=>'form-control',
                                      'placeholder'=>'Slug')) !!}
                        </div>
                        <div class="form-group">
                         {!!  Html::linkRoute('occasion.show','Cancel',array($occasion->id),array('class' => 'btn btn-primary' )) !!}
                            {!! Form::submit('Save Changes',
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                         </div>
                        <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
            </div>
      <!--/.col (right) -->
      </div>
<!-- /.row -->
    </div>
<!-- /.content -->
 </section>
<!-- /.content -->
@endsection
