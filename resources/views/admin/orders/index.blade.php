@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Order Listing</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Order List</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
@endsection

@section('content')
<div class="modal fade bill-add" id="editstatusModal" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div id="my_modal_body" style="padding: 50px;">
               {!! Form::open(array('route' => 'order.admin.update', 'class' => 'form' ,'id' =>'createroomsform')) !!}
                <input type="hidden" name="popup_order_id" id="popup_order_id" value="" required="">
                <p>Change Order status</p>
                <select name='popup_order_status' id='popup_order_status' required="">
                  <option value=''>Select status</option>
                  <option value='1'>Confirm</option>
                  <option value='3'>Failed</option>
                </select>
                <p>Important Node</p>
                <textarea name="important_note" id="important_note"></textarea>
                <p>Payable Amount</p>
                <input type="tel" name="payable_amount" id="payable_amount">
                {!! Form::submit('Update Status', array('class'=>'add-acte-down')) !!}
                {!! Form::close() !!}
              
            </div>
            
        </div>
        
    </div>
</div>
<!-- Main content -->
<section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12 ">
                <!-- /.box-header -->
                 @php $i=1; @endphp
                @if(isset($orders))

                   <table class="table table-hover" id="example">
                      <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Vendor ID/Name</th>
                                <th>Price Range</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Place</th>
                                <th>Payable Price</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                      </thead>
                      <tbody>
                              @foreach($orders as $value)
                       <tr>
                            <td>
                            #{{ $value->order_id }}
                            </td>
                            <td>#{{$value->vendor_id}}<br>
                             @php 

                           
                               $vaedors_data = vendorimage($value->vendor_id);
                               $photos =array();
                               $img_path = '';
                               if( !empty($vaedors_data->profileimage))
                               {
                                 $photos = unserialize( $vaedors_data->profileimage);
                                  
                                  if(is_array($photos['image']))
                                  {
                                    $img_path=url('/uploadimages/'.$photos['image'][0]);
                                  }
                                  else{
                                    $img_path=url('/uploadimages/'.$photos['image']);
                                  }

                               }
                        
                            @endphp
                             <a href="#"><img src="{{ $img_path }}" alt="{{$vaedors_data->name}}" height="100px"></a>
                             <br>
                             {{$value->name}}

                           </td>
                            <td>
                            Rs. {{$value->price_min}} - {{$value->price_max}}
                            </td>
                            <td>
                            {{ $value->booking_date }}
                            </td>
                           
                            <td>
                           {{ $value->booking_time }}
                            </td>
                            <td>
                            {{ $value->booking_place }}
                            </td>
                            <td>
                            Rs.{{ $value->final_price }}
                            </td>
                            <td>
                             @if($value->payment_status==0)

                             <p> <span style="color: orange;">Pending</span></p>

                            @elseif($value->payment_status==1)

                             <p> <span style="color: green;">Confirm</span></p>
     
                            @elseif($value->payment_status==3)

                             <p> <span style="color: red;">Failed</span></p>

                            @endif
                            </td>
                            <td>
                             @if($value->order_status==0)
            
                              <p><span style="color: orange;">Pending</span></p>
                             
                              @elseif($value->order_status==1)
                              
                              <p><span style="color: green;">Approved</span></p>
                              
                              @elseif($value->order_status==3)
                              
                              <p><span style="color: red;">Cancelled</span></p>
                              
                              @endif
                            </td>

                            <td> 
                      
                                @if($value->vendor_status==3)
                                <p> <span style="color: red;font-weight: bold;">Artists cancel this order</span></p>
                                 @elseif($value->vendor_status==1)
                                <p> <span style="color: green;font-weight: bold;">Artists confirm this order</span></p>
                                 @endif

                                 @if($value->vendor_note)
                                   <p> <strong>Artists note: </strong> {{ $value->vendor_note }}</p>
                                @endif
                                @if($value->admin_status==3)
                                <p> <span style="color: red;font-weight: bold;">Admin cancel this order</span></p>
                                 @elseif($value->admin_status==1)
                                <p> <span style="color: green;font-weight: bold;">Admin confirm this order</span></p>
                                 @endif

                                 @if($value->vendor_note)
                                   <p> <strong>admin note: </strong> {{ $value->admin_note }}</p>
                                @endif

                              <p><button class="change-payment-status add-acte-down" order_id="{{ $value->id }}">Change Booking Status</button></p>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".change-payment-status").click(function(event) {
      var order_id = $(this).attr('order_id');
      $("#popup_order_id").val(order_id);
      $('#editstatusModal').modal();
    });
  });
</script>
@endsection
