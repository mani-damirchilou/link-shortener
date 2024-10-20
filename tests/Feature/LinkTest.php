<?php

use App\Models\Link;
use App\Models\User;
use Livewire\Livewire;

test('home page responds', function () {
    Livewire::test('pages.home')->assertStatus(200);
});

test('home page renders', function () {
    Livewire::test('pages.home')
        ->assertSee(__('pages.home.header'));
});

test('unauthenticated user can\'t submit a link', function () {
    Livewire::test('pages.home')
        ->set('url',fake()->url())
        ->call('create')
        ->assertStatus(401);
});

test('authenticated user can submit a link', function () {
    $this->actingAs(User::factory()->create());
    Livewire::test('pages.home')
        ->set('url',fake()->url())
        ->call('create')
        ->assertStatus(200)
        ->assertHasNoErrors();
});

test('user can see links related to itself ', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    Livewire::test('my-links')
        ->assertStatus(200)
        ->assertSee(__('components.my-links.title'));
});

test('user can delete links related to itself', function () {
    $user = User::factory()->hasLinks(5)->create();
    $this->actingAs($user);
    Livewire::test('link-item',['link' => $user->links()->first()])
        ->call('delete')
        ->assertStatus(200);
});

test('user can\'t delete links not related to itself', function () {
    $user = User::factory()->create();
    $notUser = User::factory()->hasLinks(5)->create();
    $this->actingAs($user);
    Livewire::test('link-item',['link' => $notUser->links()->first()])
        ->call('delete')
        ->assertStatus(403);
});
