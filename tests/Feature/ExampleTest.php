<?php

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Context;

beforeEach(function() {
    $this->user = User::factory()->create();
    $this->account = Account::factory()->create([
        'name' => "Foo's Guitars"
    ]);

    $this->user->accounts()->save($this->account);
    $this->actingAs($this->user);
});


it('dashboard displays the account name using context', function() {
    Context::add('active_account', $this->account);

    $this->get('/dashboard')
        ->assertOk()
        ->assertSee("Foo's Guitars");
});

it('dashboard displays the account name using session', function() {
    Context::forget('active_account');
    
    $this->withSession(['active_account' => $this->account]);

    $this->get('/dashboard')
        ->assertOk()
        ->assertSee("Foo's Guitars");
});



// it('returns a successful response', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });
