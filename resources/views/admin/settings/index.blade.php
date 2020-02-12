@extends('admin.app')

@section('page_title','Settings') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      {{-- <li><a href="javascript:void('0');">Settings</a></li> --}}
      <li class="active">Settings</li>
</ol>
@endsection
@section('main-content')
<!-- Main content -->
  <div class="row">
  <!-- right column -->
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
              <h3 class="box-title">Password change</h3>
              @if(Session::has('valid_pass'))

                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        <h4><i class="icon fa fa-ban"></i> Errors!</h4>
                        {{ Session::get('valid_pass') }}
                  </div>
              @endif
              @if(Session::has('valid_pass_old'))

                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        <h4><i class="icon fa fa-ban"></i> Errors!</h4>
                        {{ Session::get('valid_pass_old') }}
                  </div>
              @endif
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(array('url' => 'admin/settings', 'class' => 'form' ,'id' =>'createroomsform')) !!}
        
        <div class="form-group">
            {!! Form::label('Old Password') !!}
            {!! Form::password('old_password', 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Old Password')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('New Password') !!}
            {!! Form::password('new_password', 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'New Password')) !!}
        </div> 
        <div class="form-group">
            {!! Form::label('Confirm Password') !!}
            {!! Form::password('confirm_password',
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Confirm Password')) !!}
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

<!-- /.content -->
@endsection