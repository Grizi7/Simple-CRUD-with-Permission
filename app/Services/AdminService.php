<?php

namespace App\Services;

use App\Models\User;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function getAdmins()
    {
        $query = User::query()
            ->where('type', UserTypeEnum::admin->value)
            ->orderBy('created_at', 'desc');

        return $query->paginate(10);
    }

    public function getRoles()
    {
        return \Spatie\Permission\Models\Role::all();
    }

    public function createAdmin(array $data)
    {
        $role = $data['role'];
        unset($data['role']);
        $data['type'] = UserTypeEnum::admin->value;
        $user = User::create($data);
        $user->assignRole($role);
    }

    public function updateAdmin(User $admin, array $data)
    {
        $role = $data['role'] ?? null;
        if ($role) {
            $admin->syncRoles([$role]);
        }
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $admin->update($data);
        return $admin;
    }

    public function deleteAdmin(User $admin)
    {
        $admin->delete();
    }
}
