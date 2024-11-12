<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(ContactRequest $request)
    {
        Contact::create($request->all());
        return redirect()->back()->with('success','Your message has been sent to admin');
    }
}
