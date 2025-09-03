<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                toastr()->warning('Please check your form and try again!');
                return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator->errors());
            }

            $data = $request->all();
            // Hash the password before saving
            $data['password'] = Hash::make($request->password);

            User::create($data);

            toastr()->success('Registration Success.');
            DB::commit();
            return redirect()->route('login');
        } catch (Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
        }
    }
}
