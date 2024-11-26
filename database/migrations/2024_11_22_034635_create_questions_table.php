<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('question'); // Nội dung câu hỏi
            $table->string('option_a'); // Lựa chọn A
            $table->string('option_b'); // Lựa chọn B
            $table->string('option_c'); // Lựa chọn C
            $table->string('option_d'); // Lựa chọn D
            $table->char('correct_option', 1); // Đáp án đúng (A, B, C, D)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
