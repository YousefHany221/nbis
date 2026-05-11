<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baby;

class PoliceController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search_query');

        // البحث في قاعدة البيانات عن تطابق في أي خانة
        $results = Baby::where('father_national_id', 'LIKE', "%{$query}%")
                    ->orWhere('father_name', 'LIKE', "%{$query}%")
                    ->orWhere('mother_name', 'LIKE', "%{$query}%")
                    ->orWhere('baby_name', 'LIKE', "%{$query}%")
                    ->get();

        // هنرجع النتائج لصفحة الشرطة (اللي الـ Front هيعملها)
        return view('police.dashboard', compact('results'));
    }
}