<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong database
    protected $table = 'user_answers';

    // Các cột có thể được gán giá trị hàng loạt
    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
    ];

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với model Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
