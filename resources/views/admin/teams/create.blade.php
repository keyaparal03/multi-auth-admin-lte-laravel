@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New teams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New teams</li>
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
                {!! Form::open(array('route' => 'team.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}

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
                    {!! Form::label('Designation') !!}
                    {!! Form::text('designation', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Designation')) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('Description') !!}
                    <br>
                    {!! Form::textarea('description', null, 
                        array('class'=>'form-control', 'cols' => 135,
                              'placeholder'=>'Description','class' => 'ckeditor')) !!}
                </div>  
                <div class="form-group">
                    {{Form::label('image', 'Image', ['class' => 'control-label'])}}
                    {{Form::file('image', ['accept'=>"image/*"])}}
                </div>

                <div class="form-group">
                    {!! Form::label('Facebook link') !!}
                    {!! Form::text('fblink', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Facebook link')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('G+ link') !!}
                    {!! Form::text('glink', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'G+ link')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Twiter link') !!}
                    {!! Form::text('twiterlink', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Twiter link')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('LinkedIn link') !!}
                    {!! Form::text('linkedinlink', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'LinkedIn link')) !!}
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
