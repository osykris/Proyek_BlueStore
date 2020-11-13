<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.customers.index', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        alert()->error('Your customer has been successfully deleted', 'Deleted');
        return redirect('customers');
    }
}
