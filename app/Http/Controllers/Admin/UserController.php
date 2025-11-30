<?php
// app/Http/Controllers/Admin/UserController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index(){
        $users = User::orderBy('created_at','desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user) {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back()->with('success','Updated user role');
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success','User deleted');
    }
}
