<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baby;
use Illuminate\Support\Facades\Auth;

class BabyController extends Controller
{
    public function store(Request $request)
    {
        // 1. التأكد من صحة البيانات المرسلة (Validation)
        $request->validate([
            'baby_name'          => 'required|string|max:255',
            'mother_name'        => 'required|string|max:255',
            'father_name'        => 'required|string|max:255',
            'father_phone'       => 'required|string|max:15',
            'father_national_id' => 'required|string|size:14', // رقم قومي مصري 14 رقم
            'footprint_image'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. معالجة وحفظ صورة بصمة القدم في فولدر (storage/app/public/footprints)
        $imagePath = $request->file('footprint_image')->store('footprints', 'public');

        // 3. حفظ كل البيانات (بما فيها بيانات الأب) في الجدول
        Baby::create([
            'baby_name'          => $request->baby_name,
            'mother_name'        => $request->mother_name,
            'father_name'        => $request->father_name,
            'father_phone'       => $request->father_phone,
            'father_national_id' => $request->father_national_id,
            'footprint_path'     => $imagePath,
            'user_id'            => Auth::id(), // الممرضة اللي عاملة Login حالياً
        ]);

        // 4. الرد على الممرضة برسالة نجاح
        return redirect()->back()->with('success', 'تم تسجيل المولود وربطه ببيانات الأب بنجاح!');
    }
}