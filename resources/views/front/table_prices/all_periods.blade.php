@extends('front.layouts.app')

@section('title')
    أنظمة الأكاديمية
@endsection

@section('header')
    <style>
        .rbt-service.rbt-service-2 .inner .thumbnail {
            flex-basis: 35%;
            margin: 0px auto;
        }
    </style>
@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper bg-gradient-11" style="padding: 60px 0px;">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                <h2 class="title">أنظمة الأكاديمية</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">الترم/مسار مصري - سفارة</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-service-area bg-color-extra2 rbt-section-gap" style="padding: 40px 0 100px !important;">
        <div class="container">
            <div class="row row--15 mt_dec--30">

                <div class="col-md-6 col-12 mt--30 text-center">
                    <div class="rbt-service rbt-service-2 rbt-hover-02">
                        <div class="inner">
                            <div class="content">
                                <h4 class="title"><a href="{{ url('table_prices/term/primary_stage') }}">المدرسة الصباحية</a></h4>
                                <a class="transparent-button" href="{{ url('table_prices/term/primary_stage') }}">
                                    المزيد<i class="feather-chevron-left" style="position: relative;top: 1px;margin: 0px 5px;"></i>
                                </a>
                            </div>
                            <div class="thumbnail">
                                <a href="{{ url('table_prices/term/primary_stage') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/sun3.png" alt="Education Images">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12 mt--30 text-center">
                    <div class="rbt-service rbt-service-2 rbt-hover-02 ">
                        <div class="inner">
                            <div class="content">
                                <h4 class="title"><a href="{{ url('table_prices/term/middle_stage') }}">الفصول المسائية</a></h4>
                                <a class="transparent-button" href="{{ url('table_prices/term/middle_stage') }}">
                                    المزيد<i class="feather-chevron-left" style="position: relative;top: 1px;margin: 0px 5px;"></i>
                                </a>
                            </div>
                            <div class="thumbnail">
                                <a href="{{ url('table_prices/term/middle_stage') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/moon1.png" alt="Education Images">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card Area -->
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
