<?php

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;

test('login page responds', function () {
    Livewire::test('pages.login')->assertStatus(200);
});

test('login page renders', function () {
    Livewire::test('pages.login')
        ->assertSee(__('validation.attributes.username'))
        ->assertSee(__('validation.attributes.password'))
        ->assertSee(__('validation.attributes.remember'))
        ->assertSee(__('forms.login.submit'));
});

test('login action works', function () {
    Livewire::test('pages.login')
        ->call('submit')
        ->assertStatus(200);
});

test('login action has errors', function () {
    Livewire::test('pages.login')
        ->call('submit')
        ->assertHasErrors();
});

test('login action limits attempts', function () {
    $page = Livewire::test('pages.login');
    $password = '1234';
    $user = User::factory()->create(compact('password'));
    $page->set('username',$user->username);
    $page->set('password',Str::random());
        for ($i = 1; $i <= 6; $i++)
        {
            $page->call('submit');
        }
    $page->set('username',$user->username);
    $page->set('password',$password);
    $page->call('submit');
    $page->assertHasErrors(['username']);
});

test('user can\'t login with wrong credentials', function () {
    $user = User::factory()->create();
    Livewire::test('pages.login')
        ->set('username',$user->username)
        ->set('password',Str::random())
        ->call('submit')
        ->assertHasErrors(['username']);
});

test('user can login with correct credentials', function () {
    $password = '1234';
    $user = User::factory()->create(compact('password'));
    Livewire::test('pages.login')
        ->set('username',$user->username)
        ->set('password',$password)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect();

    expect(auth()->check())->toBeTrue();
});
