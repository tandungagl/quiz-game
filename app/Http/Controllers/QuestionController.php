<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function startQuizPage(){
        return 'startQuizPage';
    }
    public function adminQuestionManager(){
        return 'adminQuestionManager';
    }
    public function adminQuestionList(){
        return 'adminQuestionList';
    }
}
