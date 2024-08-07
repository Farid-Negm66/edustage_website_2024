<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Back\TablePrice;

class TablePricesMorningSchoolController extends Controller
{
    public function index()
    {
        $pageNameAr = 'التيرم داخل مصر / طلاب السفارة';
        return view('front.table_prices.morning_school.index', compact('pageNameAr'));
    }
    

    
    ///////////////////////////////////////////////// start primary_stage
        public function primary_stage(){
            return view('front.table_prices.morning_school.primary_stage.index');
        }
        
        public function primary_stage_one(){
            $find = TablePrice::where('id', 13)->first();
            if($find){
                return view('front.table_prices.morning_school.primary_stage.one', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_two(){
            $find = TablePrice::where('id', 14)->first();
            if($find){
                return view('front.table_prices.morning_school.primary_stage.two', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
        public function primary_stage_three(){
            $find = TablePrice::where('id', 15)->first();
            if($find){
                return view('front.table_prices.morning_school.primary_stage.three', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_four(){
            $find = TablePrice::where('id', 16)->first();
            if($find){
                return view('front.table_prices.morning_school.primary_stage.four', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
        public function primary_stage_five(){
            $find = TablePrice::where('id', 17)->first();
            if($find){
                return view('front.table_prices.morning_school.primary_stage.five', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_six(){
            $find = TablePrice::where('id', 18)->first();
            if($find){
                return view('front.table_prices.morning_school.primary_stage.six', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
    ///////////////////////////////////////////////// end primary_stage
    







    ///////////////////////////////////////////////// start middle_stage
        public function middle_stage(){
            return view('front.table_prices.morning_school.middle_stage.index');
        }
        
        public function middle_stage_one(){
            $find = TablePrice::where('id', 19)->first();
            if($find){
                return view('front.table_prices.morning_school.middle_stage.one', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/middle_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function middle_stage_two(){
            $find = TablePrice::where('id', 20)->first();
            if($find){
                return view('front.table_prices.morning_school.middle_stage.two', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/middle_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
        public function middle_stage_three(){
            $find = TablePrice::where('id', 21)->first();
            if($find){
                return view('front.table_prices.morning_school.middle_stage.three', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/middle_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
    ///////////////////////////////////////////////// end middle_stage
    







    ///////////////////////////////////////////////// start high_stage
        public function high_stage(){
            return view('front.table_prices.morning_school.high_stage.index');
        }
        
        public function high_stage_one(){
            $find = TablePrice::where('id', 22)->first();
            if($find){
                return view('front.table_prices.morning_school.high_stage.one', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/high_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
        public function high_stage_two(){
            $find = TablePrice::where('id', 23)->first();
            if($find){
                return view('front.table_prices.morning_school.high_stage.two', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/high_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
        public function high_stage_three(){
            $find = TablePrice::where('id', 24)->first();
            if($find){
                return view('front.table_prices.morning_school.high_stage.three', compact('find'));
            }else{
                return redirect()->to('table_prices/morning_school/high_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }

        }
        
    ///////////////////////////////////////////////// end high_stage

}
