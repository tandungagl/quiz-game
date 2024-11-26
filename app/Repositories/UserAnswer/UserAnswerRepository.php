<?php

namespace App\Repositories\UserAnswer;

use App\Models\Question;
use App\Models\UserAnswer;
use App\Repositories\BaseRepository;

class UserAnswerRepository extends BaseRepository implements UserAnswerRepositoryInterface
{

    public function __construct(UserAnswer $userAnswer){
        parent::__construct($userAnswer);
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    public function getUserAnswer($id){
        return $this->model->where('user_id', $id)->get();
    }
}
