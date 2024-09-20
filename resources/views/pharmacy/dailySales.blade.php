@extends('layouts.master')
@section('content')
@include('pharmacy.aside')
<div class="content-area py-1">
    <div class="container-fluid">
        @if($errors->any())
        <ul class="alert alert-danger alert-dismissible fade in" role="alert"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <!-- error area -->
        @if($success = session('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>{{$success}}</div>
        </div>
        @endif
        <!-- error area -->
        @if($failed = session('failed'))
        <div class="alert alert-danger alert-dismissible fade in" role="alert"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>{{$failed}}</div>
        </div>
        @endif

        <div class="box box-block bg-white">
            <h5>ثبت فروش جدید</h5>
            <!-- <p class="font-90 text-muted mb-1">مشخصات شرکت جدید را وارد کنید</p> -->
            <br>
            <form method="POST" action="{{ route('saveSale') }}">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام مریض</label>
                            <input type="text" name="patient_name" class="form-control" > 
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>نسخه</label>
                            <input type="text" name="prescript" class="form-control txt">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>پرچون</label>
                            <input type="text" name="retail" class="form-control txt">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>جمله</label>
                            <input type="text" name="total" id="total" class="form-control" readonly>
                        </div>
                    </div>

                    <br>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-edit"></i>
                            <span>ذخیره</span>
                        </button>
                        <button type="reset" class="btn btn-warning">
                            <i class="fa fa-undo"></i>
                            <span>لغو</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

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

@endsection

