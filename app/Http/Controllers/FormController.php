<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function showForm()
    {
        return view('welcome');
    }

    public function saveFormData(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($request->input('action') == 'save') {

        FormData::create($data);

        // You can customize how you want to print the form data.
        // For simplicity, we'll just return a view with the data.
        return view('save', compact('data'));

        }elseif ($request->input('action') == 'print') {

            FormData::create($data);

            // You can customize how you want to print the form data.
            // For simplicity, we'll just return a view with the data.
            return view('print', compact('data'));
        }
    }


}
