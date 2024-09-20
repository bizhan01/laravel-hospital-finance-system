@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست عملیات ها</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/operations/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/operations" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم مریض</th>
            <th>اسم دکتر</th>
            <th>نوع علمیات</th>
            <th>فیس</th>
            <th>فیصدی جراح</th>
            <th>فیصدی اسیستانت</th>
            <th>فیصدی انستیزی لوگ</th>
            <th>فیصدی قابله</th>
            <th>فیصدی شفاخانه</th>
            <!-- <th>ویرایش</th>
            <th>حذف</th> -->
          </tr>
        </thead>
        <tbody>
            <?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0; $sum6=0; ?>
          @foreach($operations as $operation)
          <tr>
            <td>{{$operation->id}}</td>
            <td>{{$operation->patientName}}</td>
            <td>{{$operation->docName}}</td>
            <td>{{$operation->operationType}}</td>
            <td>{{$operation->fee}}</td>
            <td>{{$operation->docPercentage}}</td>
            <td>{{$operation->assistantPercentage}}</td>
            <td>{{$operation->anesthesiaPercentage}}</td>
            <td>{{$operation->midwifePercentage}}</td>
            <td><b>{{$result = $operation->fee-$operation->docPercentage-$operation->assistantPercentage-$operation->anesthesiaPercentage-$operation->midwifePercentage}}</b></td>
            <!-- <td>
              <a href="{{ URL::to('operation/' . $operation->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('operation', [$operation->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td> -->
          </tr>
          <?php $sum1 += $operation->fee; $sum2 += $operation->docPercentage; $sum3 += $operation->assistantPercentage; $sum4 += $operation->anesthesiaPercentage; $sum5 += $operation->midwifePercentage; $sum6 += $result; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله عواید</th>
              <th><?php echo $sum1; ?></th>
              <th ><?php echo $sum2; ?></th>
              <th><?php echo $sum3; ?></th>
              <th><?php echo $sum4; ?></th>
              <th><?php echo $sum5; ?></th>
              <th colspan="3"><?php echo $sum6; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
