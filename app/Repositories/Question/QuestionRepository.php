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
     * Get 5 questions hot in a month the last
     * @return mixed
     */
    public function getRandomQuestion()
    {
        // Code
        return $this->model->inRandomOrder()->take(5)->get();
    }
}
