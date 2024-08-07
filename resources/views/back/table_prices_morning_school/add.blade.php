@extends('back.layouts.app')

@section('title')
    {{ $pageNameAr }}
 
@endsection

@section('header')
    
    
@endsection

@section('footer')
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

    @include('back.table_prices.delete')
@endsection

@section('content')

    <div class="main-content">

        <div class="page-content">
            @if (auth()->user()->role_relation->table_prices_create == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">{{ $pageNameAr }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/table_prices_morning_school/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <h4 class="card-title">باقة الاشتراك في كل المواد</h4>
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-2">
                                                    <label for="class_room_name">الصف الدراسي</label>
                                                    <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                    <input id="class_room_name" name="class_room_name" type="text" class="form-control" placeholder="الصف الدراسي" value="{{ old('class_room_name') }}">

                                                    @if ($errors->has('class_room_name'))
                                                        <span class="text-danger text-bold">{{ $errors->first('class_room_name') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-md-10">
                                                    <label for="all_mat_heading_desc">وصف قبل صوره باقة كل المواد</label>
                                                    
                                                    <input id="all_mat_heading_desc" name="all_mat_heading_desc" type="text" class="form-control" placeholder="وصف قبل صوره باقة كل المواد" value="{{ old('all_mat_heading_desc') }}">
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="all_mat_body_desc_status">وصف باقة كل المواد</label>
                                                <input type="checkbox" class="small_unit_checkbox" name="all_mat_body_desc_status" id="all_mat_body_desc_status">

                                                <textarea class="ckeditor form-control cke_rtl" name="all_mat_body_desc" >{{ old('all_mat_body_desc') }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-6">
                                                    <label for="all_mat_img_desc_status">صورة وصف باقة كل المواد</label>
                                                    <input type="checkbox" class="small_unit_checkbox" name="all_mat_img_desc_status" id="all_mat_img_desc_status" >
                                                    
                                                    <input id="all_mat_img_desc" name="all_mat_img_desc" type="file" class="form-control" value="{{ old('all_mat_img_desc') }}">

                                                    @if ($errors->has('all_mat_img_desc'))
                                                        <span class="text-danger text-bold">{{ $errors->first('all_mat_img_desc') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="all_mat_video_desc_status">فديو وصف باقة كل المواد</label>
                                                    <input type="checkbox" class="small_unit_checkbox" name="all_mat_video_desc_status" id="all_mat_video_desc_status" >
                                                    
                                                    <input id="all_mat_video_desc" name="all_mat_video_desc" type="file" class="form-control" value="{{ old('all_mat_video_desc') }}">

                                                    @if ($errors->has('all_mat_video_desc'))
                                                        <span class="text-danger text-bold">{{ $errors->first('all_mat_video_desc') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-6">
                                                    <label for="all_mat_counter_heading">وصف ما قبل مدة باقة كل المواد</label>
                                                    <input id="all_mat_counter_heading" name="all_mat_counter_heading" type="text" class="form-control" placeholder="وصف ما قبل مدة الباقة" value="{{ old('all_mat_counter_heading') }}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="all_mat_counter_from">مدة الباقة من</label>
                                                    <input id="all_mat_counter_from" name="all_mat_counter_from" type="datetime-local" class="form-control" value="{{ old('all_mat_counter_from') }}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="all_mat_counter_to">مدة الباقة إلي</label>
                                                    <input id="all_mat_counter_to" name="all_mat_counter_to" type="datetime-local" class="form-control" value="{{ old('all_mat_counter_to') }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <br>
                                <hr>
                                <br> --}}

                                <div class="card" style="background: #dfe6eb;">
                                    <div class="card-body">
                                        <br>
                                        <div class="">
                                            <label for="class_room_name">الصف الدراسي</label>
                                            <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                            <input id="class_room_name" name="class_room_name" type="text" class="form-control" placeholder="الصف الدراسي" value="{{ old('class_room_name') }}">

                                            @if ($errors->has('class_room_name'))
                                                <span class="text-danger text-bold">{{ $errors->first('class_room_name') }}</span>
                                            @endif
                                        </div>
    {{--                                         
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_body_desc">وصف الباقات</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="one_mat_body_desc" >{{ old('one_mat_body_desc') }}</textarea>

                                                @if ($errors->has('one_mat_body_desc'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_body_desc') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}
                                            
                                        <br>
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_table_prices">قيمة الاشتراك</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="one_mat_table_prices" id="one_mat_table_prices">{{ old('one_mat_table_prices') }}</textarea>

                                                @if ($errors->has('one_mat_table_prices'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_table_prices') }}</span>
                                                @endif
                                            </div>

                                            <div>
                                                <label for="one_mat_table_prices_image">قيمة الاشتراك صورة</label>
                                                <input type="file" class="one_mat_table_prices_image form-control" name="one_mat_table_prices_image" id="one_mat_table_prices_image" value="{{ old('one_mat_table_prices_image') }}">
                                            </div>
                                        </div>
                                    
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-9">
                                                    <label for="one_mat_counter_heading	">وصف لتاريخ انتهاء العرض</label>
                                                    <input id="one_mat_counter_heading" name="one_mat_counter_heading	" type="text" class="form-control" placeholder="وصف ما قبل مدة الباقة" value="{{ old('one_mat_counter_heading') }}">
                                                </div>

                                                {{-- <div class="col-md-3">
                                                    <label for="one_mat_counter_from">مدة الباقة من</label>
                                                    <input id="one_mat_counter_from" name="one_mat_counter_from" type="datetime-local" class="form-control" value="{{ old('one_mat_counter_from') }}">
                                                </div> --}}

                                                <div class="col-md-3">
                                                    <label for="one_mat_counter_to">تاريخ إنتهاء الباقة</label>
                                                    <input id="one_mat_counter_to" name="one_mat_counter_to" type="datetime-local" class="form-control" value="{{ old('one_mat_counter_to') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <br><br><hr><br><br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="arabic_lessons_time">جدول الحصص</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="arabic_lessons_time" id="arabic_lessons_time">{{ old('arabic_lessons_time') }}</textarea>

                                                @if ($errors->has('arabic_lessons_time'))
                                                    <span class="text-danger text-bold">{{ $errors->first('arabic_lessons_time') }}</span>
                                                @endif
                                            </div>

                                            <div>
                                                <label for="arabic_lessons_time_image">جدول الحصص صورة</label>
                                                <input type="file" class="arabic_lessons_time_image form-control" name="arabic_lessons_time_image" id="arabic_lessons_time_image" value="{{ old('arabic_lessons_time_image') }}">
                                            </div>

                                        </div>

                                        <br><br>

                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="save" style="display: block;width: 100%;height: 50px;">حفظ</button>
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
