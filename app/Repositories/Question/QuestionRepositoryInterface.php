<?php
namespace App\Repositories\Question;

use App\Repositories\RepositoryInterface;

interface QuestionRepositoryInterface extends RepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getRandomQuestion();
}
