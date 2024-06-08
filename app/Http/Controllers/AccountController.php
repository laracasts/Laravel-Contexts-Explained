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
        $activeAccount = session('active_account_id');

        return view('accounts.index', compact('accounts', 'activeAccount'));
    }

    public function setActiveAccount(SetActiveAccountRequest $request) {
        $accountId = $request->input('active_account_id');

        $account = $request->user()->accounts()->where('account_id', $accountId)->first();

        if ($account) {
            session([
                'active_account_id' => $account->id,
                'active_account_number' => $account->account_number,
                'active_account_name' => $account->name,
            ]);
        }

        return redirect(route('accounts.index'));
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
