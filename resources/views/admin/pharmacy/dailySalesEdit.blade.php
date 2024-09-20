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
            <h5>ویرایش فروش</h5>
            <!-- <p class="font-90 text-muted mb-1">مشخصات شرکت جدید را وارد کنید</p> -->
            <br>
            <form method="POST" action="{{ route('dailySalesUpdate') }}">
                @csrf
                @foreach($sales as $sale)
                    <div class="row">

                        <input type="hidden" name="id" value="{{$sale->id}}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>نام مریض</label>
                                <input type="text" name="patient_name" class="form-control" value="{{$sale->patient_name}}" >
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>نسخه</label>
                                <input type="text" name="prescript" class="form-control txt" value="{{$sale->prescript}}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>پرچون</label>
                                <input type="text" name="retail" class="form-control txt" value="{{$sale->trail}}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>جمله</label>
                                <input type="text" name="total" id="total" class="form-control" value="{{$sale->prescript + $sale->trail}}"readonly>
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
                            <a href="{{route('dailySales')}}" class="btn btn-default">
                                <i class="fa fa-arrow-right"></i>
                                <span>برگشت</span>
                            </a>
                        </div>

                    </div>
                @endforeach
            </form>
        </div>

    </div>
</div>

@endsection

