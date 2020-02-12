@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New occasions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New occasions</li>
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
            <div class="col-md-12">
                {!! Form::open(array('route' => 'occasion.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}

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
                    {!! Form::submit('Add New!!',
                        array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}
                </div>
            </div>
      <!--/.col (right) -->
      </div>
<!-- /.row -->
    </div>
 </section>

<!-- /.content -->
@endsection
