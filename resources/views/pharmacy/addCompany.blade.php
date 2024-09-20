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
            <h5>ثبت شرکت جدید</h5>
            <p class="font-90 text-muted mb-1">مشخصات شرکت جدید را وارد کنید</p>
            <form method="POST" action="{{route('saveCompany')}}">
                @csrf
                <input type="hidden" name="type" value="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام شرکت</label>
                            <input type="text" name="company_name" class="form-control" required>
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                        <div class="form-group">
                            <label>شماره تماس شرکت</label>
                            <input type="text" name="company_phone" data-mask="(099) 999-9999" class="form-control" dir="ltr">
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام ویزیتور</label>
                            <input type="text" name="visitor_name" class="form-control">
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                        <div class="form-group">
                            <label>نوع دوا (محصول)</label>
                            <input type="text" name="visitor_phone"  class="form-control">
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <select name="exchange_type" id="" class="form-control" style="padding: 0px" required>
                                        <option value="">نوعیت اسعار</option>
                                        <option value="افغانی" id="">افغانی</option>
                                        <option value="دالر" id="">دالر</option>
                                        <option value="کلدار" id="">کلدار</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <select name="deal_type" id="deal_select" class="form-control" style="padding: 0px" required>
                                        <option value="">نوعیت معامله</option>
                                        <option value="discount" id="discount">تخفیف</option>
                                        <option value="activity" id="activity">اکتیویتی</option>
                                        <option value="other" id="other">سایر</option>
                                    </select>
                                </div>
                            </div>
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="deal_type_desc" style="display: none">
                            <label></label>
                            <input type="text" name="deal_type_desc" class="form-control">
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
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
                </div>

            </form>
        </div>

    </div>
</div>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">لست شرکت های ثبت شده</h5>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>نام شرکت</th>
                        <th>تلفن شرکت</th>
                        <th>نام ویزیتور</th>
                        <th>نوع دوا (محصول)</th>
                        <th>نوعیت معامله</th>
                        <th>نوعیت اسعار</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Companies as $row => $company)
                        <tr>
                            <td>{{ $row + 1 }}</td>
                            <td>{{ $company->name }}</td>
                            <td style="direction: ltr; text-align: center">{{ $company->company_phone }}</td>
                            <td>{{ $company->visitor_name }}</td>
                            <td style="direction: ltr; text-align: center">{{ $company->visitor_phone }}</td>
                            <td>{{ $company->deal_type_desc }}</td>
                            <td>{{ $company->exchange_type }}</td>
                            <td>
                                <a href="" class="delete" data-msg="شرکت حذف شود ؟" data-url="deleteCompany/{{$company->id}}" data-toggle="tooltip" data-placement="top" title="حدف">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                                <a href="{{url('editCompany').'/'.$company->id}}" data-toggle="tooltip" data-placement="top" title="ویرایش">
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
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
