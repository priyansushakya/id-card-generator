<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IDCard;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function create(){
        return view('admin.create_id');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:55|regex:/^[A-Za-z\s]+$/', 
            'email' => 'required|string|max:255|email', 
            'date_of_birth' => 'required|date|before:today', 
            'address' => 'required|string|max:55|regex:/^[A-Za-z0-9\s,.-]+$/', 
            'phone' => 'required|string|regex:/^[0-9]{10}$/', 
            'issue_date' => 'nullable|date|after:date_of_birth|before:today',
            'expiry_date' => 'nullable|date|after:issue_date'
        ]);

         if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validator->errors());
        }


        $data = $request->all();
        if ($request->photo) {
            $imagePath = $request->file('photo')->store('images', 'public');
            unset($data['photo']);
            $data['photo'] = 'storage/' . $imagePath;
        }

        $user = IDCard::create($data);

        return redirect()->route('show', ['id' => $user->id]);
    }

    public function show($id) {
        $user = IDCard::findOrFail($id);
        return view('admin.show_id', compact('user'));
    }
}
