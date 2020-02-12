@extends('admin.app')

@section('page_title','Edit Order') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Order</a></li>
      <li class="active">Edit</li>
</ol>
@endsection
@section('main-content')
<!-- Main content -->
  <div class="row">
  <!-- right column -->
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Order</h3>
        </div>
          Order id :  {{ $order->order_id  }}
         
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
           
               {{ Form::model($order,['route' => ['order.statusupdate' , $order->id ],'method' => 'POST'] ) }}
       
            <td>
              <select name="shipping_status" id="shipping_status" class="form-control">
                <option value="">Select shipping status</option>
                  <option value="Yes"  @php if($order->shipping_status=='Yes') echo "selected=selected"; @endphp >Yes</option>
                <option value="No"  @php if($order->shipping_status=='No') echo "selected=selected"; @endphp >No</option>
              </select>
            </td>
             <td>
                 {!! Form::text('tracking_no', null, array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Tracking no')) !!}
                        {!! Form::hidden('id',  $order->id) !!}                    
              </td>
               <td>

                 {!! Form::text('courier_name', null, array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Courier Name')) !!}
                

               <br>
              </td>
              <td>
                {!! Form::submit('Update Order', array('class'=>'add-acte')) !!}
                                         {!! Form::close() !!}
              </td>
       
       
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