@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Vendor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Vendor</li>
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
                {!! Form::open(array('route' => 'vendors.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}

                <div class="form-group">
                    {!! Form::label('Name') !!}
                    {!! Form::text('name', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Name')) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('Email') !!}
                        {!! Form::text('email', null,
                            array('required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Email')) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('DOB') !!}
                        {!! Form::date('dob', null,
                            array('required',
                                    'class'=>'form-control',
                                    'placeholder'=>'DOB')) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('Address') !!}
                    {!! Form::text('address', null,
                        array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Address')) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('Choose Categories') !!}

                        <ul>
                        @foreach($categories as $category)
                        <li>
                            <input type="checkbox" name="category[]" value="{{ $category->id }}">
                            <label for="scales">{{ $category->name }}</label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                 <div class="form-group">
                    {!! Form::label('city') !!}
                    {!! Form::text('city', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'city')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('state') !!}
                    {!! Form::text('state', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'state')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country') !!}
                    {!! Form::text('country', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'country')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('pincode') !!}
                    {!! Form::text('pincode', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'pincode')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phoneno') !!}
                    {!! Form::text('phoneno', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'phoneno')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('blood_group') !!}
                    {!! Form::text('blood_group', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'blood_group')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('about') !!}
                    {!! Form::textarea('about', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'about')) !!}
                </div>
                <div class="form-group">
                    {{Form::label('profileimage', 'profileimage', ['class' => 'control-label'])}}
                    {{Form::file('profileimage', ['accept'=>"image/*"])}}
                </div>
                <div class="form-group">
                        {{Form::label('resume', 'Your Resume', ['class' => 'control-label'])}}
                        {{Form::file('resume')}}
                </div>
                <div class="form-group">
                        {!! Form::label('password') !!}
                        {!! Form::password('password', null,
                        array('required',
                        'class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add Vendor!!',
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
