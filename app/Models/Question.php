<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Tên bảng trong database (nếu tên bảng không tuân theo quy tắc số nhiều của Laravel)
    protected $table = 'questions';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_option',
    ];

    // Quan hệ với model UserAnswer
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'question_id');
    }
}
