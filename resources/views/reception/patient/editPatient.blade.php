@extends('layouts.master')
@section('content')
@include('reception.aside')
<script src="/js/jquery.min.js"> </script>
<script src="/js/sum.js"> </script>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('patient', [$patient->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">اسم مریض</label>
             <input type="text" name="patientName" value="{{$patient->patientName}}"  class="form-control"  placeholder="اسم مریض">
           </div>

           <div class="col-md-3">
             <label for="profession" style="color: black">OPD</label>
               <select class="form-control" name="OPD" >
                 <option>{{$patient->OPD}}</option>
                 @foreach($sections as $section)
                 <option>{{$section->name}}</option>
                 @endforeach
               </select>
           </div>

           <div class="col-md-3">
             <label for="fullName" style="color: black">اسم دکتر</label>
              <input type="text" name="docName" value="{{$patient->docName}}" class="form-control" placeholder="اسم دکتر" >
           </div>

           <div class="col-md-3">
             <label for="profession" style="color: black">فیس معاینات سراپا</label>
             <input type="text" name="fee" value="{{$patient->fee}}"  class="form-control txt"  placeholder="فیس معاینات سراپا">
           </div>

         </div>

         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">دواخانه</label>
             <input type="text" name="perscription" value="{{$patient->perscription}}"  class="form-control txt"  placeholder="دواخانه">
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">پرچون</label>
             <input type="text" name="retail" value="{{$patient->retail}}" class="form-control txt" placeholder="پرچون" >
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">عاجل</label>
             <input type="text" name="emergency" value="{{$patient->emergency}}" class="form-control txt" placeholder="عاجل" >
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">لابراتوار</label>
             <input type="text" name="lab" value="{{$patient->lab}}"  class="form-control txt" placeholder="لابراتوار">
           </div>
         </div>

         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">اکسری</label>
             <input type="text" name="xray" value="{{$patient->xray}}"  class="form-control txt"  placeholder="اکسری">
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">التراسوند</label>
             <input type="text" name="US" value="{{$patient->US}}" class="form-control txt" placeholder="التراسوند" >
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">دندان</label>
             <input type="text" name="dental" value="{{$patient->dental}}" class="form-control txt" placeholder="دندان" >
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">فزیوتراپی</label>
             <input type="text" name="physicalTherapy" value="{{$patient->physicalTherapy}}"  class="form-control txt" placeholder="فزیوتراپی">
           </div>
         </div>

         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">ایکو</label>
             <input type="text" name="echo" value="{{$patient->echo}}"  class="form-control txt"  placeholder="ایکو">
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">داپلر</label>
             <input type="text" name="doblar" value="{{$patient->doblar}}" class="form-control txt" placeholder="داپلر" >
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">PFT</label>
             <input type="text" name="pft" value="{{$patient->pft}}" class="form-control txt" placeholder="PFT" >
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">اندوسکوپی</label>
             <input type="text" name="endoscopy" value="{{$patient->endoscopy}}"  class="form-control txt" placeholder="اندوسکوپی">
           </div>
         </div>

         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">امبولانس</label>
             <input type="text" name="ambulance" value="{{$patient->ambulance}}"  class="form-control txt"  placeholder="امبولانس">
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">بستر</label>
             <input type="text" name="bed" value="{{$patient->bed}}" class="form-control txt" placeholder="بستر" >
           </div>

           <div class="col-md-3">
             <label for="profession" style="color: black">سایر</label>
             <input type="text" name="other" value="{{$patient->other}}"  class="form-control txt" placeholder="سایر">
           </div>

           <div class="col-md-3">
             <label for="profession" style="color: black">جمله</label>
             <input type="text" name="total" readonly value="{{$patient->total}}"  class="form-control" id="total" placeholder="مبلغ قابل پرداخت (جمله کل)">
           </div>
         </div>

         @include('layouts.errors')
         <button type="submit" class="btn btn-rounded btn-success">ویرایش رکورد</button>
         <button type="reset" class="btn btn-rounded btn-primary">لغو</button>
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
