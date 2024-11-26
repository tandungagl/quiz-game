<?php
namespace App\Repositories\Admin;

use App\Repositories\RepositoryInterface;

interface AdminRepositoryInterface extends RepositoryInterface
{

    /**
     * Summary of findByEmail
     * @param string $email
     * @return void
     */
    public function findByEmail(string $email);
}
