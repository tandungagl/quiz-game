<?php

namespace App\Services;

use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        protected AdminRepositoryInterface $adminRepository
    ) {
        //
    }

    /**
     * Summary of login
     *
     * @param array $data
     * @return bool|string
     */
    public function login(array $data): bool|string
    {
        $admin = $this->adminRepository->findByEmail($data['email']);

        if (!$admin || !Hash::check($data['password'], $admin->password) || !auth()->login($admin)) {
            return false;
        }

        return true;
    }

    /**
     * Summary of login
     *
     * @return bool
     */
    public function logout(): bool
    {
        Auth::logout();

        request()->session()->invalidate();

        return true;
    }
}
