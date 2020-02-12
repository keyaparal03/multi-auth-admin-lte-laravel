@extends('admin.layouts.master')

@section('content-header')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Pages</li>
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
    @if(isset($cms))
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover" id="example">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Image1</th>
            <th>Image2</th>
            <th>Description1</th>
            <th>Description2</th>
            <th>Meta Title</th>
           <!--  <th>Meta Tags</th>
            <th>Meta Details</th> -->
            <th>Status</th>
            <th id="action_th">Action</th> 
        </thead>
        <tbody>
          @foreach($cms as $value)
          <tr> 
          <td style="">{{ $i++ }}</td>
        
          <td style="">
              {{ $value->title }}
          </td>   
            <td style="">
              {{ $value->slug }}
          </td>   
            <td>
           @php 
            $photos1 =array();
            if( !empty($value->image1))
            {
              $photos1 = unserialize( $value->image1);
              if(count($photos1)>0)
              {
                
                $img_path1=url('/logo/'.$photos1['image1']); 
                echo '<img src="'.$img_path1.'" width="100px">';
              }
              
            }                             
           @endphp
         </td> 
          <td>
           @php 
            $photos2 =array();
            if( !empty($value->image2))
            {
              $photos2 = unserialize( $value->image2);
              if(count($photos2)>0)
              {
                
                $img_path2=url('/logo/'.$photos2['image2']); 
                echo '<img src="'.$img_path2.'" width="100px">';
              }
              
            }                             
           @endphp
         </td> 
          <td style="">
            {{ str_limit(strip_tags( html_entity_decode(stripslashes($value->description1),ENT_QUOTES,"UTF-8")), $limit = 100, $end = '...') }}
          </td>   
           <td style="">
           {{ str_limit(strip_tags( html_entity_decode(stripslashes($value->description2),ENT_QUOTES,"UTF-8")), $limit = 100, $end = '...') }}
          </td>   
           <td style="">
              {{ $value->meta_title }}
          </td>  
          <!--  <td style="">
               {{ $value->meta_tags }}
          </td>    -->
          <!--  <td style="">
            {{ strip_tags( html_entity_decode(stripslashes($value->meta_details),ENT_QUOTES,"UTF-8") ) }}
          </td>   -->
          <td>
                @if ($value->status== 1)
                <span class="label label-success">Active</span>
                @elseif($value->status== 0)
                <span class="label label-danger">Inactive</span>
                @endif
          </td>
  <td class="action_box">
                                                
            <a href="<?php echo url('/admin/cms/'.$value->id.'/edit');?>" title="Edit" style="color: black;">
            <span class="pull-right-container">
              <i class="fa fa-edit"></i>
            </span>
            </a>                              
               
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
<!-- /.box -->
</div>
</section>
@endsection