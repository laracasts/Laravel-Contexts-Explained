<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\SetActiveAccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index() : View {
        return view('contact.index');
    }

    public function store(ContactUsRequest $request) {
        
        
        return redirect(route('dashboard'));
    }
}
