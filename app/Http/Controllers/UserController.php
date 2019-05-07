<?php

namespace App\Http\Controllers;

use App\Entities\ClassEntity;
use App\Entities\Role;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(): View
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::getRoles();
        $classes = ClassEntity::all();

        return view('users.create', compact('roles', 'classes'));
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new User(), trans('messages.store.users'));
    }

    public function edit(User $user): View
    {
        $roles = Role::getRoles();
        $classes = ClassEntity::all();

        return view('users.edit', compact('user', 'roles', 'classes'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        return $this->save($request, $user, trans('messages.update.users'));
    }

    private function save(Request $request, User $user, string $message): RedirectResponse
    {
        $request->validate(User::validations(false, $user));

        $isStudent = $request->get('role') === 'student';

        if($isStudent) {
            $request->validate(['class_id' => 'required']);
        }

        $user->fill($data = $request->all());

        if(!$isStudent) {
            $user->class_id = null;
        }

        $user->password = Hash::make($data['password']);
        $user->setRole($data['role']);
        $user->saveOrFail();

        return redirect()->route('users.index')->with('success', $message);
    }
}