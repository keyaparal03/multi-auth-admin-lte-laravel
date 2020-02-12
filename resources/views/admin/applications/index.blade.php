@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Application</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Application</li>
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

                    @if(isset($applications))

                          <table class="table table-hover" id="example">
                          <thead>

<!-- 'id','name', 'email','father_name', 'mother_name', 'country', 'dob', 'phone', 'address', 'city', 'state'] -->


                                <th>Name</th>
                                <th>email</th>
                                <th>dob</th>
                                <th>blood_group</th>
                                <th>phone</th>
                                <th>address</th>

                                <th>city</th>
                                <th>state</th>

                                <th>country</th>

                                <th>about</th>
                                <th>cv</th>
                                <th id="action_th">Action</th>
                          </thead>
                        <tbody>






                                @foreach($applications as $value)

                                <tr>


                              <td style="">

                                  {{ $value->name }}

                              </td>

                              <td style="">

                                  {{ $value->email }}

                              </td>
                              <td style="">

                                  {{ $value->dob }}

                              </td>

                              <td style="">

                                  {{ $value->blood_group }}

                              </td>
                              <td style="">

                                  {{ $value->phone }}

                              </td>

                              <td style="">

                                  {{ $value->address }}

                              </td>
                              <td style="">

                                  {{ $value->city }}

                              </td>

                              <td style="">

                                  {{ $value->state }}

                              </td>
                               <td style="">

                                  {{ $value->country }}

                              </td>

                              <td style="">

                                  {{ $value->about }}

                              </td>



                              <td style="">

                                  {{ $value->about }}

                              </td>


                              <td class="action_box">




                                    <form action="{{ route('applications.destroy', $value->id ) }}" method="POST">

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
