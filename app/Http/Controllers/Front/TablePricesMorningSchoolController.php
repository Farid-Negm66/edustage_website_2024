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
            $find = TablePrice::where('id', 1)->first();
            return view('front.table_prices.morning_school.primary_stage.one', compact('find'));
        }
        
        public function primary_stage_two(){
            $find = TablePrice::where('id', 2)->first();
            return view('front.table_prices.morning_school.primary_stage.two', compact('find'));
        }
        
        public function primary_stage_three(){
            $find = TablePrice::where('id', 3)->first();
            return view('front.table_prices.morning_school.primary_stage.three', compact('find'));
        }
        
        public function primary_stage_four(){
            $find = TablePrice::where('id', 4)->first();
            return view('front.table_prices.morning_school.primary_stage.four', compact('find'));
        }
        
        public function primary_stage_five(){
            $find = TablePrice::where('id', 5)->first();
            return view('front.table_prices.morning_school.primary_stage.five', compact('find'));
        }
        
        public function primary_stage_six(){
            $find = TablePrice::where('id', 6)->first();
            return view('front.table_prices.morning_school.primary_stage.six', compact('find'));
        }
    ///////////////////////////////////////////////// end primary_stage
    







    ///////////////////////////////////////////////// start middle_stage
        public function middle_stage(){
            return view('front.table_prices.morning_school.middle_stage.index');
        }
        
        public function middle_stage_one(){
            $find = TablePrice::where('id', 7)->first();
            return view('front.table_prices.morning_school.middle_stage.one', compact('find'));
        }
        
        public function middle_stage_two(){
            $find = TablePrice::where('id', 8)->first();
            return view('front.table_prices.morning_school.middle_stage.two', compact('find'));
        }
        
        public function middle_stage_three(){
            $find = TablePrice::where('id', 9)->first();
            return view('front.table_prices.morning_school.middle_stage.three', compact('find'));
        }
        
    ///////////////////////////////////////////////// end middle_stage
    







    ///////////////////////////////////////////////// start high_stage
        public function high_stage(){
            return view('front.table_prices.morning_school.high_stage.index');
        }
        
        public function high_stage_one(){
            $find = TablePrice::where('id', 10)->first();
            return view('front.table_prices.morning_school.high_stage.one', compact('find'));
        }
        
        public function high_stage_two(){
            $find = TablePrice::where('id', 11)->first();
            return view('front.table_prices.morning_school.high_stage.two', compact('find'));
        }
        
        public function high_stage_three(){
            $find = TablePrice::where('id', 12)->first();
            return view('front.table_prices.morning_school.high_stage.three', compact('find'));
        }
        
    ///////////////////////////////////////////////// end high_stage

}
