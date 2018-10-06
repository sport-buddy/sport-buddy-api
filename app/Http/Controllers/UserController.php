<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index(): Collection
    {
        return $this->users->findAll();
    }

    public function show(User $user): User
    {
        return $user;
    }
}
