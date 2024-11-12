<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data['contacts'] = Contact::paginate(20);
        return view('admin.contact.index', $data);
    }
}
