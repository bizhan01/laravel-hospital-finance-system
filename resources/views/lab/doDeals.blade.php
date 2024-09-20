@extends('layouts.master')
@section('content')
@include('lab.aside')
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
            <form method="POST" action="{{route('saveDeals')}}">
                @csrf
                  <input type="hidden" name="type" value="1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام شرکت</label>
                            <select name="company_name" id="select2-demo-1" class="form-control" data-plugin="select2" style="padding: 0px" required oninvalid="this.setCustomValidity('نام شرکت را انتخاب کنید')">
                                @foreach($company as $comp)
                                    <option value="{{ $comp->name }}">{{ $comp->name }}</option>
                                @endforeach
                            </select>
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>تاریخ</label>
                            <input type="date" name="transaction_date" class="form-control" >
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">مبلغ خرید</span>
                            <input type="number" name="buy_tot" class="form-control">
                            <span class="input-group-addon">نمبر بل</span>
                            <input type="number" name="buy_invice_no" min="0" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">مبلغ پرداخت</span>
                            <input type="number" name="pay_tot" class="form-control">
                            <span class="input-group-addon">نمبر بل</span>
                            <input type="number" name="pay_invice_no" min="0" class="form-control">
                        </div>
                    </div>
                </div>
                <br>

                <div class="row form-group">
                  <div class="col-md-12" >
                    <label for="">توضیحات معامله (خرید)</label>
                    <textarea name="description" class="form-control" id="exampleTextarea" rows="3" placeholder="در اینجا میتوانید در حداکثر چند کلمه در مورد توضیحات اضافی معامله (خرید محصول) بنوسید." ></textarea>
                  </div>
                </div>

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
                        <th>تاریخ</th>
                        <th>نام شرکت</th>
                        <th>مبلغ خرید</th>
                        <th>بل خرید</th>
                        <th>مبلغ پرداخت</th>
                        <th>بل پرداخت</th>
                        <th>توضیحات</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $row => $transaction)
                        <tr>
                            <td>{{ $row + 1 }}</td>
                            <td style="direction: ltr; text-align: center">
                                <?php $date = strtotime($transaction->transaction_date)?>
                                {{ date('Y-M-d', $date) }}
                            </td>
                            <td>{{ $transaction->company_name }}</td>
                            <td>{{ $transaction->buy_tot }}</td>
                            <td style="direction: ltr; text-align: center">{{ $transaction->buy_invice_no }}</td>
                            <td>{{ $transaction->pay_tot }}</td>
                            <td style="direction: ltr; text-align: center">{{ $transaction->pay_invice_no }}</td>
                            <td>{{ $transaction->description}}</td>
                            <td>
                                <a href="" class="delete" data-url="deleteDeal/{{$transaction->id}}" data-msg="حدف شود ؟" data-toggle="tooltip" data-placement="top" title="حدف">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                                <a href="{{url('editDeal').'/'.$transaction->id}}" data-toggle="tooltip" data-placement="top" title="ویرایش">
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
