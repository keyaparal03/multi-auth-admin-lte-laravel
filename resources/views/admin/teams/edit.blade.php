@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Team</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">team</a></li>
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
                              <h3 class="box-title">Edit Team</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                                {{ Form::model($team,['route' => ['team.update' , $team->id ],'method' => 'PUT','class' => 'form' ,'id' =>'createteamform','files' => true] ) }}
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
                                @php
                                $photos =array();
                                if( !empty($value->image))
                                {
                                  $photos = unserialize( $value->image);
                                  if(count($photos)>0)
                                  {

                                    $img_path=url('/team/'.$photos['image']);
                                    echo '<img src="'.$img_path.'" width="100px">';
                                  }

                                }
                               @endphp
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
                         {!!  Html::linkRoute('team.show','Cancel',array($team->id),array('class' => 'btn btn-primary' )) !!}
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
