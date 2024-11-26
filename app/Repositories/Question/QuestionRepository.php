<?php

namespace App\Repositories\Question;

use App\Models\Question;
use App\Repositories\BaseRepository;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{

    public function __construct(protected Question $question)
    {
        parent::__construct($question);
    }

    /**
     * Summary of getRandomQuestion
     * @return mixed
     */
    public function getRandomQuestion()
    {
        return $this->model->inRandomOrder()->take(5)->get();
    }
}
