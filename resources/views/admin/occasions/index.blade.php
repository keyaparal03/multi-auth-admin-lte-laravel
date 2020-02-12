@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Occasions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">occasions</li>
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
                    @php $i=1; @endphp

                    @if(isset($occasions))

                    <div class="box-body table-responsive no-padding">

                          <table class="table table-hover" id="example">
                          <thead>

                                <th>Id</th>

                                <th>Name</th>

                                <th>Slug</th>
                                <th>Status</th>

                                <th id="action_th">Action</th>
                          </thead>
                        <tbody>






                                @foreach($occasions as $value)

                                <tr>

                              <td style="">{{ $i++ }}</td>



                              <td style="">

                                  {{ $value->name }}

                              </td>

                              <td style="">

                                  {{ $value->slug }}

                              </td>

                              <td>

                                    @if ($value->status== 1)

                                    <span class="label label-success">Active</span>

                                    @elseif($value->status== 0)

                                    <span class="label label-danger">Inactive</span>

                                    @endif

                              </td>

                              <td class="action_box">


                                    <a href="<?php echo url('/admin/occasion/'.$value->id.'/edit');?>" title="Edit" style="color: black;">

                                    <span class="pull-right-container">

                                      <i class="fa fa-edit"></i>

                                    </span>

                                    </a>

                                    <form action="{{ route('occasion.destroy', $value->id ) }}" method="POST">

                                        {{ method_field('DELETE') }}

                                        {{ csrf_field() }}

                                        <button><i class="fa fa-trash"></i> </button>

                                    </form>






                              </td>

                        </tr>

                        @endforeach

                  </tbody>

            </table>

            @endif
            </div>
            <!-- ./col -->
          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection
