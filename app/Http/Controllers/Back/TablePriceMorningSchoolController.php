<?php

namespace App\Http\Controllers\Back;

use DB;
use Carbon\Carbon;
use App\Models\Back\TablePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;


class TablePriceMorningSchoolController extends Controller
{
    public function index()
    {
        $pageNameAr = 'جداول وباقات الاشتراكات في المدرسة الصباحية';
        return view('back.table_prices_morning_school.index', compact('pageNameAr'));
    }

    public function create()
    {
        $pageNameAr = 'اضافة باقة اشتراك في المدرسة الصباحية';
        return view('back.table_prices_morning_school.add', compact('pageNameAr'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'class_room_name' => 'required|unique:table_prices,class_room_name',
            // 'one_mat_table_prices' => 'required',
            // 'arabic_lessons_time' => 'required',
            // 'one_mat_body_desc' => 'required',
            // 'one_mat_heading_desc' => 'required',
            // 'all_mat_img_desc'=> 'mimes:jpeg,jpg,png,gif',
            // 'all_mat_video_desc'=> 'mimes:mp4,3gp',
            
        ],[
            'class_room_name.required' => 'قيمة الصف الدراسي مطلوبة',
            'class_room_name.unique' => 'قيمة الصف الدراسي مستخدمة من قبل',
            // 'one_mat_table_prices.required' => 'قيمة الإشتراك مطلوبة',
            // 'arabic_lessons_time.required' => 'قيمة جدول الحصص مطلوبة',
            // 'one_mat_heading_desc.required' => 'قيمة وصف عنوان الباقة مطلوبة',
            // 'one_mat_body_desc.required' => 'قيمة وصف الباقة مطلوبة',
            // 'all_mat_img_desc.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg ، jpg ، png ، gif',
            // 'all_mat_video_desc.mimes' => 'يجب أن يكون الملف عبارة عن فديو من نوع : mp4 ، 3gp',
        ]);

        // if(request('all_mat_img_desc') == ""){
        //     $name = null;
        // }else{
        //     $file = request('all_mat_img_desc');
        //     $name = time() . '.' .$file->getClientOriginalName();
        //     $path = public_path('back/images/table_prices');
        //     $file->move($path , $name);
        // }
        
        // if(request('all_mat_video_desc') == ""){
        //     $name_video = null;
        // }else{
        //     $file = request('all_mat_video_desc');
        //     $name_video = time() . '.' .$file->getClientOriginalName();
        //     $path = public_path('back/images/table_prices');
        //     $file->move($path , $name_video);
        // }



        // one_mat_table_prices_image
        // arabic_lessons_time_image

        if(request('one_mat_table_prices_image') == ""){
            $one_mat_table_prices = request('one_mat_table_prices');
        }else{
            $file = request('one_mat_table_prices_image');
            $one_mat_table_prices = rand(1,1000).$file->getClientOriginalName();
            $path = public_path('back/images/table_price_morning');
            $file->move($path , $one_mat_table_prices);

            $one_mat_table_prices_type = 'img';
        }

        if(request('arabic_lessons_time_image') == ""){
            $arabic_lessons_time = request('arabic_lessons_time');
        }else{
            $file = request('arabic_lessons_time_image');
            $arabic_lessons_time = rand(1,1000).$file->getClientOriginalName();
            $path = public_path('back/images/table_price_morning');
            $file->move($path , $arabic_lessons_time);

            $arabic_lessons_time_type = 'img';
        }

        $data = [
            // 'all_mat_heading_desc' => request("all_mat_heading_desc"),
            // 'all_mat_body_desc' => request("all_mat_body_desc"),
            // 'all_mat_body_desc_status' => request('all_mat_body_desc_status') == null ? 0 : 1,
            // 'all_mat_img_desc' => $name,
            // 'all_mat_img_desc_status' => request('all_mat_img_desc_status') == null ? 0 : 1,
            // 'all_mat_video_desc' => $name_video,
            // 'all_mat_video_desc_status' => request('all_mat_video_desc_status') == null ? 0 : 1,
            // 'all_mat_footer_desc' => request('all_mat_footer_desc'),
            // 'all_mat_counter_heading' => request('all_mat_counter_heading'),
            // 'all_mat_counter_from' => request('all_mat_counter_from'),
            // 'all_mat_counter_to' => request('all_mat_counter_to'),
            // 'one_mat_heading_desc' => request('one_mat_heading_desc'),
            // 'one_mat_body_desc' => request('one_mat_body_desc'),
            'class_room_name' => request('class_room_name'),
            'one_mat_table_prices' => $one_mat_table_prices,
            'one_mat_table_prices_type' => request('one_mat_table_prices_image') == null ? null : 'img',
            'one_mat_counter_heading' => request('one_mat_counter_heading'),
            'one_mat_counter_from' => request('one_mat_counter_from'),
            'one_mat_counter_to' => request('one_mat_counter_to'),
            'arabic_lessons_time' => $arabic_lessons_time,
            'arabic_lessons_time_type' => request('arabic_lessons_time_image') == null ? null : 'img',
        ];

        TablePrice::create($data);

        return redirect()->to('admin/table_prices_morning_school');
    }

    public function show($id)
    {
        $find = TablePrice::where('id' , $id)->first();
        return view('back.table_prices_morning_school.show', compact('find'));
    }

    public function edit($id)
    {
        $find = TablePrice::where('id' , $id)->first();
        $pageNameAr = 'تعديل باقة اشتراك في المدرسة الصباحية';
        return view('back.table_prices_morning_school.edit', compact('find', 'pageNameAr'));
    }

    public function update(Request $request, $id)
    {
        $find = TablePrice::where('id', $id)->first();
        
        $this->validate($request , [
            'class_room_name' => 'required|unique:table_prices,class_room_name,'.$id,
            'one_mat_table_prices' => 'required',
            'arabic_lessons_time' => 'required',
            // 'one_mat_body_desc' => 'required',
            // 'one_mat_heading_desc' => 'required',
            // 'all_mat_img_desc'=> 'mimes:jpeg,jpg,png,gif',
            // 'all_mat_video_desc'=> 'mimes:mp4,3gp',
            
        ],[
            'class_room_name.required' => 'قيمة الصف الدراسي مطلوبة',
            'class_room_name.unique' => 'قيمة الصف الدراسي مستخدمة من قبل',
            'one_mat_table_prices.required' => 'قيمة الإشتراك مطلوبة',
            'arabic_lessons_time.required' => 'قيمة جدول الحصص مطلوبة',
            // 'one_mat_heading_desc.required' => 'قيمة وصف عنوان الباقة مطلوبة',
            // 'one_mat_body_desc.required' => 'قيمة وصف الباقة مطلوبة',
            // 'all_mat_img_desc.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg ، jpg ، png ، gif',
            // 'all_mat_video_desc.mimes' => 'يجب أن يكون الملف عبارة عن فديو من نوع : mp4 ، 3gp',
        ]);

        // if(request('all_mat_img_desc') == ""){
        //     $name = request('all_mat_img_desc_hidden');
        // }else{
        //     $file = request('all_mat_img_desc');
        //     $name = time() . '.' .$file->getClientOriginalName();
        //     $path = public_path('back/images/table_prices');
        //     $file->move($path , $name);

        //     File::delete(public_path('back/images/table_prices/'.$find['all_mat_img_desc']));
        // }
        
        // if(request('all_mat_video_desc') == ""){
        //     $name_video = request('all_mat_video_desc_hidden');
        // }else{
        //     $file = request('all_mat_video_desc');
        //     $name_video = time() . '.' .$file->getClientOriginalName();
        //     $path = public_path('back/images/table_prices');
        //     $file->move($path , $name_video);

        //     File::delete(public_path('back/images/table_prices/'.$find['all_mat_video_desc']));    
        // }

        $data = [
            // 'all_mat_heading_desc' => request("all_mat_heading_desc"),
            // 'all_mat_body_desc' => request("all_mat_body_desc"),
            // 'all_mat_body_desc_status' => request('all_mat_body_desc_status') == null ? 0 : 1,
            // 'all_mat_img_desc' => $name,
            // 'all_mat_img_desc_status' => request('all_mat_img_desc_status') == null ? 0 : 1,
            // 'all_mat_video_desc' => $name_video,
            // 'all_mat_video_desc_status' => request('all_mat_video_desc_status') == null ? 0 : 1,
            // 'all_mat_footer_desc' => request('all_mat_footer_desc'),
            // 'all_mat_counter_heading' => request('all_mat_counter_heading'),
            // 'all_mat_counter_from' => request('all_mat_counter_from'),
            // 'all_mat_counter_to' => request('all_mat_counter_to'),
            // 'one_mat_heading_desc' => request('one_mat_heading_desc'),
            // 'one_mat_body_desc' => request('one_mat_body_desc'),
            'class_room_name' => request('class_room_name'),
            'one_mat_table_prices' => request('one_mat_table_prices'),
            'one_mat_counter_heading' => request('one_mat_counter_heading'),
            'one_mat_counter_from' => request('one_mat_counter_from'),
            'one_mat_counter_to' => request('one_mat_counter_to'),
            'arabic_lessons_time' => request('arabic_lessons_time'),
            'english_lessons_time' => null,
        ];

        $find->update($data);

        return redirect()->to('admin/table_prices_morning_school');
    }








    ///////////////////////////////////////////////  datatable_table_prices  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_table_prices()
    {
        $all = TablePrice::where('id', '>', 12)->get();
        return DataTables::of($all)
        // ->addColumn('id', function($res){
        //     return '<form class"form_delete_selected">
        //                 <div class="form-check font-size-16">
        //                     <input class="form-check-input" type="checkbox" id="" name="delete_selected[]" value="'.$res->id.'">
        //                     <label class="form-check-label" for=""></label>
        //                 </div>
        //             </form>';
        // })
        ->addColumn('class_room_name', function($res){
            return "
                <div style='padding:2px;'>
                    <a style='color:#24ABF2;margin: 0px 5px;font-weight: bold;font-size: 15px;'>"
                        .$res->class_room_name.
                    "</a>
                </div>";
        })
        ->addColumn('action', function($res){
            $buttons = '<a href="'.url('admin/table_prices_morning_school/edit/'.$res->id).'" class="btn btn-outline-success btn-sm" title="Edit">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            
            // $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
            //     <i class="fas fa-trash-alt"></i>
            // </a>';

            // $buttons .= '<a href="'.url('admin/table_prices_morning_school/show/'.$res->id).'" class="btn btn-outline-info btn-sm" style="margin: 0px 5px;">
            //     <i class="fas fa-eye"></i>
            // </a>';

            return $buttons;
        })
        ->rawColumns(['class_room_name', 'action'])
        ->make(true);
    }
}
