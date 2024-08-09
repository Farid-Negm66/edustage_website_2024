@extends('back.layouts.app')

@section('title')
    {{ $pageNameAr }}
    ( {{ $find['class_room_name'] }} )
@endsection

@section('header')
	{{-- spotlight --}}
    <link href="{{ url('back') }}/assets/css/spotlight.min.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function () {
            const one_mat_table_prices = $("#one_mat_table_prices");
            const one_mat_table_prices_image = $("#one_mat_table_prices_image");

            const arabic_lessons_time = $("#arabic_lessons_time");
            const arabic_lessons_time_image = $("#arabic_lessons_time_image");

            $("#save").click(function(e){
                if(one_mat_table_prices_image.val() == '' && CKEDITOR.instances.one_mat_table_prices.getData() == ''){
                    alert("يجب ملأ قيمه واحدة لقيمة الإشتراك سواء صورة او من خلال المحرر");
                    e.preventDefault();
                }

                if(arabic_lessons_time_image.val() == '' && CKEDITOR.instances.arabic_lessons_time.getData() == ''){
                    alert("يجب ملأ قيمه واحدة ل جدول الحصص سواء صورة او من خلال المحرر");
                    e.preventDefault();
                }
            });
        });
    </script>
    
    <style>
        #counter{
            background: rgb(94, 94, 255);
            padding: 20px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
@endsection

@section('footer')
    {{-- Count Down Timer --}}
    <script src="{{ asset('/back/assets/js') }}/yscountdown.min.js"></script> 
    <!-- spotlight -->
	<script src="{{ url('back') }}/assets/js/spotlight.bundle.js"></script>
	<script src="{{ url('back') }}/assets/js/spotlight.min.js"></script>


    <script>
        $(function(){
                var endDate = @json($find['one_mat_counter_to']);
                // var endDate = $("#end_time").text();
                var counterElement = document.querySelector("#counter");

                var myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                var message = "";
                if (finished) {
                    message = "تم انتهاء العرض";
                } else {
                    message = remaining.totalDays + " يوم - ";
                    message += remaining.hours + " ساعة - ";
                    message += remaining.minutes + " دقيقة - ";
                    message += remaining.seconds + " ثانية ";
                }
                counterElement.textContent = message;
            });
        });
    </script>

    @include('back.table_prices_morning_school.delete')
@endsection

@section('content')

    <div class="main-content">  

        <div class="page-content">
            @if (auth()->user()->role_relation->table_prices_update == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">
                                    {{ $pageNameAr }}
                                    <span style="color: red;">( {{ $find['class_room_name'] }} )</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/table_prices_morning_school/update/'.$find['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- basic_information --}}
                                {{-- <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <h4 class="card-title">باقة الاشتراك في كل المواد</h4>
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                

                                                <div class="col-md-10">
                                                    <label for="all_mat_heading_desc">وصف قبل صوره باقة كل المواد</label>
                                                    
                                                    <input id="all_mat_heading_desc" name="all_mat_heading_desc" type="text" class="form-control" placeholder="وصف قبل صوره باقة كل المواد" value="{{ old('all_mat_heading_desc', $find['all_mat_heading_desc']) }}">
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="all_mat_body_desc">وصف باقة كل المواد</label>
                                                <input type="checkbox" class="small_unit_checkbox" name="all_mat_body_desc_status" id="all_mat_body_desc" {{ $find['all_mat_body_desc_status'] == 1 ? "checked" : "" }} value="{{ old('all_mat_body_desc_status', $find['all_mat_body_desc_status']) }}">

                                                <textarea class="ckeditor form-control" name="all_mat_body_desc" >{{ old('all_mat_body_desc', $find['all_mat_body_desc']) }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-6">
                                                    <label for="all_mat_img_desc_status">صورة وصف باقة كل المواد</label>
                                                    <input type="checkbox" class="small_unit_checkbox" name="all_mat_img_desc_status" id="all_mat_img_desc_status" {{ $find['all_mat_img_desc_status'] == 1 ? "checked" : "" }} value="{{ old('all_mat_img_desc_status', $find['all_mat_img_desc_status']) }}">
                                                    
                                                    <input id="all_mat_img_desc" name="all_mat_img_desc" type="file" class="form-control" value="{{ old('all_mat_img_desc', $find['all_mat_img_desc']) }}">

                                                    <input name="all_mat_img_desc_hidden" type="hidden" value="{{ $find['all_mat_img_desc'] }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="all_mat_video_desc_status">فديو وصف باقة كل المواد</label>
                                                    <input type="checkbox" class="small_unit_checkbox" name="all_mat_video_desc_status" id="all_mat_video_desc_status" {{ $find['all_mat_video_desc_status'] == 1 ? "checked" : "" }}  value="{{ old('all_mat_video_desc_status', $find['all_mat_video_desc_status']) }}">
                                                    
                                                    <input id="all_mat_video_desc" name="all_mat_video_desc" type="file" class="form-control" value="{{ old('all_mat_video_desc', $find['all_mat_video_desc']) }}">

                                                    <input name="all_mat_video_desc_hidden" type="hidden" value="{{ $find['all_mat_video_desc'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-6">
                                                    <label for="all_mat_counter_heading">وصف ما قبل مدة باقة كل المواد</label>
                                                    <input id="all_mat_counter_heading" name="all_mat_counter_heading" type="text" class="form-control" placeholder="وصف ما قبل مدة الباقة" value="{{ old('all_mat_counter_heading', $find['all_mat_counter_heading']) }}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="all_mat_counter_from">مدة الباقة من</label>
                                                    <input id="all_mat_counter_from" name="all_mat_counter_from" type="datetime-local" class="form-control" value="{{ old('all_mat_counter_from', $find['all_mat_counter_from']) }}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="all_mat_counter_to">مدة الباقة إلي</label>
                                                    <input id="all_mat_counter_to" name="all_mat_counter_to" type="datetime-local" class="form-control" value="{{ old('all_mat_counter_to', $find['all_mat_counter_to']) }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <br>
                                <hr>
                                <br>
                                --}}
                            
                                <div class="card" style="background: #dfe6eb;">
                                    <div class="card-body">
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="class_room_name">الصف الدراسي</label>
                                            <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                            <input id="class_room_name" name="class_room_name" type="text" class="form-control" placeholder="الصف الدراسي" value="{{ old('class_room_name', $find['class_room_name']) }}">

                                            @if ($errors->has('class_room_name'))
                                                <span class="text-danger text-bold">{{ $errors->first('class_room_name') }}</span>
                                            @endif
                                        </div>
    {{-- 
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_heading_desc">وصف قبل جدول باقة مادة واحدة</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>
                                                
                                                <input id="one_mat_heading_desc" name="one_mat_heading_desc" type="text" class="form-control" placeholder="وصف قبل صوره باقة كل المواد" value="{{ old('one_mat_heading_desc', $find['one_mat_heading_desc']) }}">

                                                @if ($errors->has('one_mat_heading_desc'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_heading_desc') }}</span>
                                                @endif

                                            </div>
                                        </div> --}}
    {{--                                         
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_body_desc">وصف باقة مادة واحدة</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="one_mat_body_desc" >{{ old('one_mat_body_desc', $find['one_mat_body_desc']) }}</textarea>

                                                @if ($errors->has('one_mat_body_desc'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_body_desc') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}
                                            

                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_table_prices">قيمة الاشتراك</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="one_mat_table_prices" id="one_mat_table_prices">
                                                    @if($find['one_mat_table_prices_type'] != 'img')
                                                        {{ old('one_mat_table_prices', $find['one_mat_table_prices']) }}
                                                    @endif
                                                </textarea>

                                                @if ($errors->has('one_mat_table_prices'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_table_prices') }}</span>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="one_mat_table_prices_image">قيمة الاشتراك صورة</label>
                                                    <input type="file" class="one_mat_table_prices_image form-control" name="one_mat_table_prices_image" id="one_mat_table_prices_image" value="{{ old('one_mat_table_prices_image') }}">

                                                    @if ($find['one_mat_table_prices_type'] != 'img')                                                
                                                        <input type="hidden" class="one_mat_table_prices_image_hidden" name="one_mat_table_prices_image_hidden"         id="one_mat_table_prices_image_hidden" value="{{  $find['one_mat_table_prices'] }}">
                                                    @endif
                                                </div>

                                                @if($find['one_mat_table_prices_type'] == 'img')
                                                    <div class="col-md-4">
                                                        <a class="spotlight" href="{{ url('back/images/table_price_morning/'.$find['one_mat_table_prices']) }}">
                                                            <img class="img-thumbnail img-responsive" src="{{ url('back/images/table_price_morning/'.$find['one_mat_table_prices']) }}" style="height: 160px !important;">
                                                        </a>            
                                                    </div>                                                    
                                                @endif
                                            </div>

                                        </div>
                                    
                                        <br> <hr> <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-9">
                                                    <label for="one_mat_counter_heading">وصف لتاريخ انتهاء العرض</label>
                                                    <input id="one_mat_counter_heading" name="one_mat_counter_heading" type="text" class="form-control" placeholder="وصف لتاريخ انتهاء العرض" value="{{ old('one_mat_counter_heading', $find['one_mat_counter_heading']) }}">
                                                </div>

                                                {{-- <div class="col-md-3">
                                                    <label for="one_mat_counter_from">مدة الباقة من</label>
                                                    <input id="one_mat_counter_from" name="one_mat_counter_from" type="datetime-local" class="form-control" value="{{ old('one_mat_counter_from', $find['one_mat_counter_from']) }}">
                                                </div> --}}
                                                
                                                <div class="col-md-3">
                                                    <label for="one_mat_counter_to">تاريخ إنتهاء الباقة</label>
                                                    <input id="one_mat_counter_to" name="one_mat_counter_to" type="datetime-local" class="form-control" value="{{ old('one_mat_counter_to', $find['one_mat_counter_to']) }}">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @if ($find['one_mat_counter_to'])                                            
                                            <br>
                                            <div id="counter" class="text-center"></div>
                                            
                                            <p id="end_time" style="display: none;">
                                                {{ \Carbon\Carbon::parse($find['one_mat_counter_to'])->format('Y-m-d H:i') }}
                                            </p>
                                        @endif


                                        <br><br><hr><br><br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="arabic_lessons_time">جدول الحصص</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="arabic_lessons_time" id="arabic_lessons_time">
                                                    @if($find['arabic_lessons_time_type'] != 'img')
                                                        {{ old('arabic_lessons_time', $find['arabic_lessons_time']) }}
                                                    @endif
                                                </textarea>

                                                @if ($errors->has('arabic_lessons_time'))
                                                    <span class="text-danger text-bold">{{ $errors->first('arabic_lessons_time') }}</span>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="arabic_lessons_time_image">جدول الحصص صورة</label>
                                                    <input type="file" class="arabic_lessons_time_image form-control" name="arabic_lessons_time_image" id="arabic_lessons_time_image" value="{{ old('arabic_lessons_time_image') }}">

                                                    @if ($find['arabic_lessons_time_type'] != 'img')                                                
                                                        <input type="hidden" class="arabic_lessons_time_image_hidden" name="arabic_lessons_time_image_hidden"         id="arabic_lessons_time_image_hidden" value="{{  $find['arabic_lessons_time'] }}">
                                                    @endif
                                                </div>

                                                @if($find['arabic_lessons_time_type'] == 'img')
                                                    <div class="col-md-4">
                                                        <a class="spotlight" href="{{ url('back/images/table_price_morning/'.$find['arabic_lessons_time']) }}">
                                                            <img class="img-thumbnail img-responsive" src="{{ url('back/images/table_price_morning/'.$find['arabic_lessons_time']) }}" style="height: 160px !important;">
                                                        </a>            
                                                    </div>                                                    
                                                @endif
                                            </div>
                                        </div>


                                        <br><br>

                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-success waves-effect waves-light" id="save" style="display: block;width: 100%;height: 50px;">تعديل</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <h4 class="text-center" style="margin: 100px auto;">
                    لاتمتلك الصلاحيات لرؤيه محتوي الصفحة
                    <img src="{{ url('back/images/rej2.png') }}" style="width: 80px;height: 78px;position: relative;bottom: 7px;bo"/>
                </h4>
            @endif    
        </div>

        {{-- Include Footer --}}
        @include('back.layouts.footer')
    </div>
@endsection
