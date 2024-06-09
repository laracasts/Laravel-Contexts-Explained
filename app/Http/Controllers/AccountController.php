<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\SetActiveAccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index() : View {
        $accounts = Context::get('user')->accounts()->get();
        
        return view('accounts.index', compact('accounts'));
    }

    public function setActiveAccount(SetActiveAccountRequest $request) {
        $accountId = $request->input('active_account_id');

        $account = Context::get('user')->accounts()->where('account_id', $accountId)->first();

        if ($account) {
            session(['active_account' => $account]);

            Log::info('User changed account', [
                'user_id' => $request->user()->id,
                'account_id' => $account->id,
            ]);
        }
        
        return redirect(route('accounts.index'));
    }
}
