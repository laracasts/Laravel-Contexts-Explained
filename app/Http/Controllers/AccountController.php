<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\SetActiveAccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index() : View {
        $accounts = request()->user()->accounts()->get();
        $activeAccount = session('active_account');

        return view('accounts.index', compact('accounts', 'activeAccount'));
    }

    public function setActiveAccount(SetActiveAccountRequest $request) {
        $accountId = $request->input('active_account_id');

        $account = $request->user()->accounts()->where('account_id', $accountId)->first();

        if ($account) {
            session(['active_account' => $account]);
        }

        return redirect(route('accounts.index'));
    }
}
