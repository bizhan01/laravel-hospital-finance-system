@extends('layouts.master')
@section('content')
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
            <h5>اجرای معامله جدید</h5>
            <!-- <p class="font-90 text-muted mb-1">مشخصات شرکت جدید را وارد کنید</p> -->
            <br>
            <form method="POST" action="{{route('updateDeal')}}">
                @csrf

                @foreach($transactions as $transaction)
                <input type="hidden" name="id" value="{{$transaction->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام شرکت</label>
                            <select name="company_name" id="select2-demo-1" class="form-control" data-plugin="select2" style="padding: 0px">
                                @foreach($company as $comp)
                                    <option
                                        <?php
                                            if ($comp->name == $transaction->company_name) {
                                                echo 'selected';
                                            }
                                        ?>
                                    >{{ $comp->name }}</option>
                                @endforeach
                            </select>
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>تاریخ</label>
                            <input type="date" name="transaction_date" class="form-control" required value="{{$transaction->transaction_date}}">
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">مبلغ خرید</span>
                            <input type="number" name="buy_tot" class="form-control" value="{{$transaction->buy_tot}}">
                            <span class="input-group-addon">نمبر بل</span>
                            <input type="number" name="buy_invice_no" min="0" class="form-control" value="{{$transaction->buy_invice_no}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">مبلغ پرداخت</span>
                            <input type="number" name="pay_tot" class="form-control" value="{{$transaction->pay_tot}}">
                            <span class="input-group-addon">نمبر بل</span>
                            <input type="number" name="pay_invice_no" min="0" class="form-control" value="{{$transaction->pay_invice_no}}">
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                                <span>ذخیره</span>
                            </button>
                            <button type="reset" class="btn btn-warning">
                                <i class="fa fa-undo"></i>
                                <span>لغو</span>
                            </button>
                            <a href="{{route('doDeals')}}" class="btn btn-default">
                                <i class="fa fa-arrow-right"></i>
                                <span>برگشت</span>
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
