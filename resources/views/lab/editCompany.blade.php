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
            <form method="POST" action="{{route('updateCompany')}}">
                @csrf
                @foreach($companies as $company)
                    <input type="hidden" name="id" value="{{$company->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>نام شرکت</label>
                                <input type="text" name="company_name" class="form-control" value="{{$company->name}}" required>
                                <span class="font-90 text-muted">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>شماره تماس شرکت</label>
                                <input type="text" name="company_phone" data-mask="(099) 999-9999" class="form-control" dir="ltr" value="{{$company->company_phone}}">
                                <span class="font-90 text-muted">&nbsp;</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>نام ویزیتور</label>
                                <input type="text" name="visitor_name" class="form-control" value="{{$company->visitor_name}}">
                                <span class="font-90 text-muted">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>شماره تماس ویزیتور</label>
                                <input type="text" name="visitor_phone" data-mask="(099) 999-9999" class="form-control" dir="ltr" value="{{$company->visitor_phone}}">
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
                                            <option value="کلدار" id="" >کلدار</option>
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
                                <a href="{{route('addCompany')}}" class="btn btn-default">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>برگشت</span>
                                </a>
                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </form>
        </div>

    </div>
</div>

@endsection
