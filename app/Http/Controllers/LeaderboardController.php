<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function leaderboardPage()
    {
        $data = $this->userRepository->getTopPlayers();
        return view('leader-board', compact('data'));
    }
}
