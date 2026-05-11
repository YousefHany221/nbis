<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;

    // دي الخانات اللي مسموح لارفيل يضيف فيها بيانات (Mass Assignment)
    protected $fillable = [
        'baby_name',
        'mother_name',
        'father_name',
        'father_phone',
        'father_national_id',
        'footprint_path',
        'user_id',
    ];
    protected $appends = ['footprint_url'];
    // علاقة الطفل بالممرضة (المستخدم)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * دالة للحصول على رابط الصورة المباشر
     */
    public function getFootprintUrlAttribute()
    {
        // لو الصورة موجودة هيرجع الرابط الكامل، لو مش موجودة ممكن ترجع صورة افتراضية
        return $this->footprint_path
            ? asset('storage/' . $this->footprint_path)
            : asset('images/default-footprint.png');
    }
}