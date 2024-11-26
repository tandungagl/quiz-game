<?php
namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Summary of getTopPlayers
     * @return
     */
    public function getTopPlayers();
}
