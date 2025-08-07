<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $admins = $this->service->getAdmins();
        return view('dashboard.admins.index', compact('admins'));
    }

    public function create()
    {
        $roles = $this->service->getRoles();
        return view('dashboard.admins.create', compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $this->service->createAdmin($data);
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function edit(User $admin)
    {
        $roles = $this->service->getRoles();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    public function update(AdminRequest $request, User $admin)
    {
        $data = $request->validated();
        $this->service->updateAdmin($admin, $data);
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy(User $admin)
    {
        $this->service->deleteAdmin($admin);
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
