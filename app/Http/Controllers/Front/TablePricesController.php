<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Back\TablePrice;
use Illuminate\Http\Request;

class TablePricesController extends Controller
{
    public function all_periods()
    {
        $pageNameAr = 'أنظمة الدراسة بالأكاديمية';
        return view('front.table_prices.all_periods', compact('pageNameAr'));
    }

    public function index()
    {
        $pageNameAr = 'التيرم داخل مصر / طلاب السفارة';
        return view('front.table_prices.term.index', compact('pageNameAr'));
    }
    

    
    ///////////////////////////////////////////////// start primary_stage
        public function primary_stage(){
            return view('front.table_prices.term.primary_stage.index');
        }
        
        public function primary_stage_one(){
            $find = TablePrice::where('id', 1)->first();
            if($find){
                return view('front.table_prices.term.primary_stage.one', compact('find'));
            }else{
                return redirect()->to('table_prices/term/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_two(){
            $find = TablePrice::where('id', 2)->first();
            if($find){
                return view('front.table_prices.term.primary_stage.two', compact('find'));
            }else{
                return redirect()->to('table_prices/term/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_three(){
            $find = TablePrice::where('id', 3)->first();
            if($find){
                return view('front.table_prices.term.primary_stage.three', compact('find'));
            }else{
                return redirect()->to('table_prices/term/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_four(){
            $find = TablePrice::where('id', 4)->first();
            if($find){
                return view('front.table_prices.term.primary_stage.four', compact('find'));
            }else{
                return redirect()->to('table_prices/term/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_five(){
            $find = TablePrice::where('id', 5)->first();
            if($find){
                return view('front.table_prices.term.primary_stage.five', compact('find'));
            }else{
                return redirect()->to('table_prices/term/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function primary_stage_six(){
            $find = TablePrice::where('id', 6)->first();
            if($find){
                return view('front.table_prices.term.primary_stage.six', compact('find'));
            }else{
                return redirect()->to('table_prices/term/primary_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
    ///////////////////////////////////////////////// end primary_stage
    







    ///////////////////////////////////////////////// start middle_stage
        public function middle_stage(){
            return view('front.table_prices.term.middle_stage.index');
        }
        
        public function middle_stage_one(){
            $find = TablePrice::where('id', 7)->first();
            if($find){
                return view('front.table_prices.term.middle_stage.one', compact('find'));
            }else{
                return redirect()->to('table_prices/term/middle_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function middle_stage_two(){
            $find = TablePrice::where('id', 8)->first();
            if($find){
                return view('front.table_prices.term.middle_stage.two', compact('find'));
            }else{
                return redirect()->to('table_prices/term/middle_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function middle_stage_three(){
            $find = TablePrice::where('id', 9)->first();
            if($find){
                return view('front.table_prices.term.middle_stage.three', compact('find'));
            }else{
                return redirect()->to('table_prices/term/middle_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
    ///////////////////////////////////////////////// end middle_stage
    







    ///////////////////////////////////////////////// start high_stage
        public function high_stage(){
            return view('front.table_prices.term.high_stage.index');
        }
        
        public function high_stage_one(){
            $find = TablePrice::where('id', 10)->first();
            if($find){
                return view('front.table_prices.term.high_stage.one', compact('find'));
            }else{
                return redirect()->to('table_prices/term/high_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function high_stage_two(){
            $find = TablePrice::where('id', 11)->first();
            if($find){
                return view('front.table_prices.term.high_stage.two', compact('find'));
            }else{
                return redirect()->to('table_prices/term/high_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
        public function high_stage_three(){
            $find = TablePrice::where('id', 12)->first();
            if($find){
                return view('front.table_prices.term.high_stage.three', compact('find'));
            }else{
                return redirect()->to('table_prices/term/high_stage')->with('findNull', 'عفوا هذة الصفحة جاري العمل عليها في الوقت الحالي');
            }
        }
        
    ///////////////////////////////////////////////// end high_stage
}
