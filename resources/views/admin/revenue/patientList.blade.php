@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست عمومی مراجعین</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/patients/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/patients" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-responsive table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th data-priority="1">شماره</th>
            <th data-priority="1">اسم مریض</th>
            <th data-priority="3">OPD</th>
            <th data-priority="1">دکتر</th>
            <th data-priority="1">فیس</th>
            <th data-priority="3">دواخانه </th>
            <th data-priority="3">پرچون</th>
            <th data-priority="6">عاجل</th>
            <th data-priority="6">لابراتوار</th>
            <th data-priority="6">اکسری</th>
            <th data-priority="6">التراسوند</th>
            <th data-priority="6">دندان</th>
            <th data-priority="6">فزیوتراپی</th>
            <th data-priority="6">ایکو</th>
            <th data-priority="6">داپلر</th>
            <th data-priority="6">PFT</th>
            <th data-priority="6">اندوسکوپی</th>
            <th data-priority="6">امبولانس</th>
            <th data-priority="6">بستر</th>
            <th data-priority="6">سایر</th>
            <th data-priority="6">جمله</th>
            <!-- <th data-priority="6">ویرایش</th>
            <th data-priority="6">حذف</th> -->
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0; $sum6=0; $sum7=0; $sum8=0; $sum9=0; $sum10=0; $sum11=0; $sum12=0; $sum13=0; $sum14=0; $sum15=0; $sum16=0; $sum17=0;   ?>
          @foreach($patients as $patient)
           <tr>
             <td><a href="{{ URL::to('patient/' . $patient->id . '/edit') }}">{{$patient->id}}</a></td>
             <td><a href="{{ URL::to('patient/' . $patient->id . '/edit') }}">{{$patient->patientName}}</a></td>
             <td>{{$patient->OPD}}</td>
             <td>{{$patient->docName}}</td>
             <td>{{$patient->fee}}</td>
             <td>{{$patient->perscription}}</td>
             <td>{{$patient->retail}}</td>
             <td>{{$patient->emergency}}</td>
             <td>{{$patient->lab}}</td>
             <td>{{$patient->xray}}</td>
             <td>{{$patient->US}}</td>
             <td>{{$patient->dental}}</td>
             <td>{{$patient->physicalTherapy}}</td>
             <td>{{$patient->echo}}</td>
             <td>{{$patient->doblar}}</td>
             <td>{{$patient->pft}}</td>
             <td>{{$patient->endoscopy}}</td>
             <td>{{$patient->ambulance}}</td>
             <td>{{$patient->bed}}</td>
             <td>{{$patient->other}}</td>
             <td><b>{{$patient->total}}</b></td>
             <!-- <td>
               <a href="{{ URL::to('patient/' . $patient->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
              </td>
              <td>
                <form action="{{url('patient', [$patient->id])}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
                </form>
               </td> -->
           </tr>
           <?php $sum1 += $patient->fee; $sum2 += $patient->perscription; $sum3 += $patient->retail; $sum4 += $patient->emergency; $sum5 += $patient->lab; $sum6 += $patient->xray; $sum7 += $patient->US; $sum8 += $patient->dental; $sum9 += $patient->physicalTherapy;  ?>
           <?php $sum10 += $patient->echo; $sum11 += $patient->doblar;  $sum12 += $patient->pft; $sum13 += $patient->endoscopy; $sum14 += $patient->ambulance; $sum15 += $patient->bed; $sum16 += $patient->other; $sum17 += $patient->total; ?>
           @endforeach
           <tfoot>
             <tr>
               <th colspan="4">جمله عواید</th>
               <th colspan="1"><?php echo $sum1; ?></th>
               <th colspan="1"><?php echo $sum2; ?></th>
               <th colspan="1"><?php echo $sum3; ?></th>
               <th colspan="1"><?php echo $sum4; ?></th>
               <th colspan="1"><?php echo $sum5; ?></th>
               <th colspan="1"><?php echo $sum6; ?></th>
               <th colspan="1"><?php echo $sum7; ?></th>
               <th colspan="1"><?php echo $sum8; ?></th>
               <th colspan="1"><?php echo $sum9; ?></th>
               <th colspan="1"><?php echo $sum10; ?></th>
               <th colspan="1"><?php echo $sum11; ?></th>
               <th colspan="1"><?php echo $sum12; ?></th>
               <th colspan="1"><?php echo $sum13; ?></th>
               <th colspan="1"><?php echo $sum14; ?></th>
               <th colspan="1"><?php echo $sum15; ?></th>
               <th colspan="1"><?php echo $sum16; ?></th>
               <th colspan="3"><?php echo $sum17; ?></th>
             </tr>
           </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
