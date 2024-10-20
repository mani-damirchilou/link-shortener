<?php

use Illuminate\Support\Str;
use Livewire\Livewire;

test('register page responds', function () {
    Livewire::test('pages.register')->assertStatus(200);
});

test('register page renders', function () {
    Livewire::test('pages.register')
        ->assertSee(__('validation.attributes.username'))
        ->assertSee(__('validation.attributes.password'))
        ->assertSee(__('validation.attributes.password_confirmation'))
        ->assertSee(__('forms.register.submit'));
});

test('register action works', function () {
    Livewire::test('pages.register')
        ->call('submit')
        ->assertStatus(200);
});

test('register page has errors', function () {
    Livewire::test('pages.register')
        ->call('submit')
        ->assertHasErrors();
});

test('user can register', function () {
    $str = Str::random();
    Livewire::test('pages.register')
        ->set('username', $str)
        ->set('password', $str)
        ->set('password_confirmation', $str)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect();

    expect(auth()->check())->toBeTrue();
});
