@extends('layouts.master')
@section('content')
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">لست فروشات روزانه</h5>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>اسم مریض</th>
                        <th>تاریخ</th>
                        <th>نسخه</th>
                        <th>پرچون</th>
                        <th>جمله</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0;?>
                    @foreach($sales as $row => $sale)
                        <tr>
                            <td>{{ $row+1 }}</td>
                            <td>{{ $sale->patient_name }}</td>
                            <td>
                                <?php $date = strtotime($sale->created_at) ?>
                                {{
                                    date('Y-M-d', $date)
                                }}
                            </td>
                            <td>{{ $sale->prescript }}</td>
                            <td>{{ $sale->retail }}</td>
                            <td>{{ $sum = $sale->prescript + $sale->retail }} <?php $total += $sum; ?> </td>
                            <td>
                                <a href="" class="delete" data-msg="حذف شود ؟" data-url="deleteSale/{{$sale->id}}" data-toggle="tooltip" data-placement="top" title="حدف">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                                <a href="{{url('dailySalesEdit').'/'.$sale->id}}" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                    <i class="fa fa-edit text-primary"></i>
                                </a>
                                <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="بیشتر">
                                    <i class="fa fa-info text-info"></i>
                                </a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><strong class="label label-error">{{ $total }}</strong></th>
                    <th></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!--  revenue start -->
<div class="container">
<div class="row row-md">
  <h3>عواید ماهوار دواخانه</h3>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-success mb-2">
      <div class="t-icon right"><i class="fa fa-bar-chart-o"></i></div>
      <div class="t-content">
        <h1 class="mb-1">{{$sales = $perscription + $retails}}</h1>
        <h6 class="text-uppercase">جمله فروشات ماه جاری</h6>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-info mb-2">
      <div class="t-icon right"><i class="fa  fa-line-chart"></i></div>
      <div class="t-content">
        <h1 class="mb-1">
          <?php
              $percent = ($sales * 0.2);
              echo $sales - $percent;
          ?>
        </h1>
        <h6 class="text-uppercase">جمله دوای مصرف شده ماه جاری</h6>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="box box-block tile tile-2 bg-primary mb-2">
      <div class="t-icon right"><i class="fa fa-area-chart"></i></div>
      <div class="t-content">
        <h1 class="mb-1">
          <?php
              $percent = ($sales * 0.8);
              echo $sales - $percent;
          ?>
        </h1>
        <h6 class="text-uppercase">عاید حالض ماه جاری</h6>
      </div>
    </div>
  </div>
</div>
</div>
<!--  revenue end -->

@endsection
