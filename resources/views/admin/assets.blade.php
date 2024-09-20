@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box bg-white box-block ">
       <center><h3>لیست وسایل خریداری شده (سرمایه های ثابت)</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/assets/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/assets" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-info table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>سریال نمبر</th>
            <th>اسم محصول</th>
            <th>تاریخ خرید</th>
            <th>موقیعت</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>واحد</th>
            <th>جمله</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->item}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->consumer}}</td>
            <td>{{$product->billNumber}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->unit}}</td>
            <td>{{$product->total }}</td>
          </tr>
            <?php $sum += $product->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="6">جمله</th>
              <th colspan="2" style="text-align: center"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
