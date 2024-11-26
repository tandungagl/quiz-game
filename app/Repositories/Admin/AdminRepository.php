<?php
namespace App\Repositories\Admin;

use App\Models\Admin;
use App\Models\User;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\BaseRepository;
use Eloquent;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{

    public function __construct(Admin $admin)
    {
        parent::__construct($admin);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }
}
