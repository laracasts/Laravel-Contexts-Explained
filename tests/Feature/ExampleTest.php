<?php

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Context;

beforeEach(function() {
    $user = User::factory()->create();
    $account = Account::factory()->create([
        'name' => "Foo's Guitars"
    ]);

    $user->accounts()->save($account);

    // Context::add('active_account', $account);
    $this->actingAs($user)->withSession(['active_account' => $account]);
});


it('dashboard displays the account name', function() {
    $this->get('/dashboard')
        ->assertOk()
        ->assertSee("Foo's Guitars");
});



// it('returns a successful response', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });
