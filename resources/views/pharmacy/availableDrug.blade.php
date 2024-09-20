@extends('layouts.master')
@section('content')
@include('pharmacy.aside')
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">دوای موجود (ارزش دواخانه)</h5>
            <table class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <!-- <th>شماره</th> -->
                        <!-- <th>نام شرکت</th> -->
                        <th style="direction: ltr; text-align: center">جمله خرید</th>
                        <th style="direction: ltr; text-align: center">جمله پرداخت</th>
                        <th style="direction: ltr; text-align: center">قرضداری</th>
                        <th style="direction: ltr; text-align: center">جمله فروش</th>
                        <th style="direction: ltr; text-align: center">دوای موجود</th>
                        <!-- <th>عملیات</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $row => $transaction)
                        <tr>
                            <!-- <td>شماره</td> -->
                            <!-- <td>نام شرکت</td> -->
                            <td style="direction: ltr; text-align: center">{{ $transaction->buy_tot }}</td>
                            <td style="direction: ltr; text-align: center">{{ $transaction->pay_tot }}</td>
                            <td style="direction: ltr; text-align: center">
                                <?php 
                                    $buy_tot = $transaction->buy_tot;
                                    $pay_tot = $transaction->pay_tot;
                                    $sub = $buy_tot - $pay_tot;
                                    echo $sub;
                                ?>
                            </td>
                            <td style="direction: ltr; text-align: center">{{ $sales }}</td>
                            <td style="direction: ltr; text-align: center">
                                <?php
                                    $percent = ($sales * 0.8);
                                    echo $transaction->buy_tot - $percent;
                                ?>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <!-- <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="حدف">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="بیشتر">
                                <i class="fa fa-info text-info"></i>
                            </a>
                        </th>
                    </tr> -->
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
