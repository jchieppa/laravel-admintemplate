@extends('layouts.app')
{{--{{ dd($parents->count()) }}--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> Sample Card </h3>

                    </div>
                    <div class="icon">
                        <i class="fas fa-address-book" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View Link1 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h4> Sample Wider Card</h4>
                        <p>
                           something here
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comment-dots"></i>
                    </div>
                    <a href="#" class="card-box-footer">View link2 <i class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div>

        </div>
    </div>
@endsection
