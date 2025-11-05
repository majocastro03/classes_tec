<?php
require_once __DIR__ . '/../Models/User.php';

class UserRepository
{
    public function all(): array
    {
        return User::all();
    }

    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        $user = new User($data);
        $user->save();
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = User::find($id);
        return $user ? $user->delete() : false;
    }
}
