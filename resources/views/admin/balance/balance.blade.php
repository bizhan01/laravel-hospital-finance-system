@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script>
<center> <h1>صورت حساب ماهوار (بیلانس)</h1> </center>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center> <h4>عواید عمومی</h4> </center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives1 as $stats)
               <li>
                 <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/balance" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-info table-responsive table-striped table-bordered dataTable" id="table-2">
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
      <center style="color: #3ee415"><h5><?php echo $sum17; ?></h5></center>
    </div>
  </div>
</div>


<!-- Operations -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center> <h4>علمیات ها</h4> </center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives2 as $stats)
               <li>
                 <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/balance" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-info table-striped table-bordered dataTable" id="table-2">
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
      <center style="color: #3ee415"><h5><?php echo $sum6; ?></h5></center>
    </div>
  </div>
</div>

<!-- Revenues -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center> <h4>عواید متفرقه</h4> </center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives3 as $stats)
               <li>
                 <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/balance" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-info table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ</th>
            <th>منبع</th>
            <th>مبلغ</th>
            <th>توضیحات</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($revenues as $revenue)
          <tr>
            <td>{{$revenue->date}}</td>
            <td>{{$revenue->source}}</td>
            <td>{{$revenue->amount}}</td>
            <td>{{$revenue->description}}</td>
          </tr>
          <?php $sum += $revenue->amount; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
      <center style="color: #3ee415"><h5><?php echo $sum; ?></h5></center>
    </div>
  </div>
</div>


<!-- Student Fee Start-->
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست محصلین</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives4 as $stats)
               <li>
                 <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/balance" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-success table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم محصل</th>
            <th>نهاد تحصلی</th>
            <th>رشته</th>
            <th>زمان</th>
            <th>فیس</th>
          </tr>
        </thead>
        <tbody>
          <?php $feeTotal=0; ?>
          @foreach($students as $student)
          <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->stdName}}</td>
            <td>{{$student->schoolName}}</td>
            <td>{{$student->department}}</td>
            <td>{{$student->shift}}</td>
            <td>{{$student->fee}}</td>
          </tr>
          <?php $feeTotal += $student->fee; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله عواید</th>
              <th colspan="3"><?php echo $feeTotal; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div> <?php $revenues = $sum + $sum6 +$sum17 + $feeTotal;   ?>
<!-- Student Fee End-->

<!-- Expenses  -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box col-lg-12 box-block bg-white">
      <center> <h4>مصارف عمومی</h4> </center>
     <!-- Archive Start -->
      <div class="dropdown pull-right">
          <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
              انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              @foreach($archives5 as $stats)
              <li>
                <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                  {{$stats['month']. ' ' .$stats['year']}}
                </a>
               </li>
              @endforeach
             <a href="/balance" class="dropdown-item form-control">همه</a>
          </div>
      </div><br>
      <!-- Archive End -->
      <table class=" table table-danger   table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>جنس</th>
            <th>کتگوری</th>
            <th>مصرف کننده</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>واحد</th>
            <th>قیمت کلی</th>
            <th>توضیحات</th>
          </tr>
        </thead>
        <tbody>
          <?php $sumExp=0; ?>
          @foreach($expenses as $expenses)
          <tr>
            <td>{{$expenses->id}}</td>
            <td>{{$expenses->item}}</td>
            <td>{{$expenses->category}}</td>
            <td>{{$expenses->consumer}}</td>
            <td>{{$expenses->billNumber}}</td>
            <td>{{$expenses->price}}</td>
            <td>{{$expenses->quantity}}</td>
            <td>{{$expenses->unit}}</td>
            <td>{{$expenses->total}}</td>
            <td>{{$expenses->description}}</td>
          </tr>
          <?php $sumExp += $expenses->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="8">جمله مصارف</th>
              <th colspan="3"><?php echo $sumExp; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
      <center style="color: red"><h5><?php echo $sumExp; ?></h5></center>
    </div>
  </div>
</div>


<!-- percentages  -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center> <h4>فیصدی های اخذ شده</h4> </center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives6 as $stats)
               <li>
                 <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/balance" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-warning table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم دکتر</th>
            <th>پروسیجر</th>
            <th>فیس</th>
            <th>فیصدی دکتر</th>
            <th>فیصدی شفاخانه</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum33=0; ?>
          @foreach($percentages as $percentage)
          <tr>
            <td>{{$percentage->id}}</td>
            <td>{{$percentage->docName}}</td>
            <td>{{$percentage->procedure}}</td>
            <td>{{$percentage->income}}</td>
            <td>{{$percentage->percentage}}</td>
            <td><b>{{$result = $percentage->income - $percentage->percentage}}</b></td>
          </tr>
          <?php $sum1 += $percentage->income; $sum2 += $percentage->percentage; $sum33 += $result; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th colspan="1"><?php echo $sum1; ?></th>
              <th colspan="1"><?php echo $sum2; ?></th>
              <th colspan="3"><?php echo $sum33; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
      <center style="color: red"><h5><?php echo $sum33; ?></h5></center>
    </div> <?php $expenses = $sumExp + $sum33;?>
  </div>
</div>


<div class="container">
<div class="row row-md">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-success mb-2">
      <div class="t-icon right"><i class="ti-bar-chart"></i></div>
      <div class="t-content">
        <h1 class="mb-1"><?php echo $revenues; ?></h1>
        <h6 class="text-uppercase">عواید</h6>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-danger mb-2">
      <div class="t-icon right"><i class="fa fa-money"></i></div>
      <div class="t-content">
        <h1 class="mb-1"><?php echo $expenses; ?></h1>
        <h6 class="text-uppercase">مصارف</h6>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-primary mb-2">
      <div class="t-icon right"><i class="fa  fa-balance-scale"></i></div>
      <div class="t-content">
        <h1 class="mb-1" dir="ltr" style="text-align: right">
          <?php
          $balance = $revenues - $expenses;
          echo $balance;
           ?>
        </h1>
        <h6 class="text-uppercase">بیلانس</h6>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
