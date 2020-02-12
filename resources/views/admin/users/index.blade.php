@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User</li>
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
                <!-- /.box-header -->
                 @php $i=1; @endphp
                @if(isset($users))

                   <table class="table table-hover" id="example">
                                  <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>DOB</th>
                                            <th>address</th>
                                            <th>city</th>
                                            <th>state</th>
                                            <th>country</th>
                                            <th>pincode</th>
                                            <th>Phone</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                          @foreach($users as $value)
                                   <tr>
                                        <td>{{ $i++ }}</td>

                                        <td>
                                        {{ $value->name }}
                                        </td>
                                        <td>
                                        {{ $value->email }}
                                        </td>
                                        <td>
                                        {{ $value->dob }}
                                        </td>
                                        <td>
                                        {{ $value->address }}
                                        </td>
                                        <td>
                                        {{ $value->city }}
                                        </td>
                                        <td>
                                        {{ $value->state }}
                                        </td>
                                        <td>
                                        {{ $value->country }}
                                        </td>
                                        <td>
                                        {{ $value->pincode }}
                                        </td>
                                        <td>
                                        {{ $value->phoneno }}
                                        </td>



                                  </tr>
                                  @endforeach
                            </tbody>
                      </table>
                @endif
                @if(isset($message))
                <p style="font-size: 22px;text-align: -webkit-center;color: red;">{{ $message }}</p>
                @endif
                <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
  </div>
</section>
@endsection
