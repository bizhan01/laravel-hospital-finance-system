@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست فیصدی های پرداخت شده</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/percentages/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/percentages" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم دکتر</th>
            <th>پروسیجر</th>
            <th>فیس</th>
            <th>فیصدی دکتر</th>
            <th>فیصدی شفاخانه</th>
            <!-- <th>ویرایش</th>
            <th>حذف</th> -->
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum3=0; ?>
          @foreach($percentages as $percentage)
          <tr>
            <td>{{$percentage->id}}</td>
            <td>{{$percentage->docName}}</td>
            <td>{{$percentage->procedure}}</td>
            <td>{{$percentage->income}}</td>
            <td>{{$percentage->percentage}}</td>
            <td><b>{{$result = $percentage->income - $percentage->percentage}}</b></td>
            <!-- <td>
              <a href="{{ URL::to('percentage/' . $percentage->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('percentage', [$percentage->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td> -->
          </tr>
          <?php $sum1 += $percentage->income; $sum2 += $percentage->percentage; $sum3 += $result; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th colspan="1"><?php echo $sum1; ?></th>
              <th colspan="1"><?php echo $sum2; ?></th>
              <th colspan="3"><?php echo $sum3; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
