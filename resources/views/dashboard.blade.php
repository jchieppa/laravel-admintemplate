@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> 13436 </h3>
                        <p> Contacts </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-address-book" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View Contacts <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> ₹185358 </h3>
                        <p> Today’s Collection </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
{{--                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> 5464 </h3>
                        <p> New Admissions </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
{{--                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> 723 </h3>
                        <p> Faculty Strength </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
{{--                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
