<?php

namespace App\Repositories\UserAnswer;

use App\Repositories\RepositoryInterface;

interface UserAnswerRepositoryInterface extends RepositoryInterface
{
    /**
     * Summary of updateOrCreate
     * @param array $attributes
     * @param array $values
     * @return
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Summary of getUserAnswer
     * @param mixed $id
     * @return
     */
    public function getUserAnswer($id);
}
