<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    #[Validate('required|string|max:255')]
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate();

        auth()->user()->chirps()->create($validated);

        $this->message = '';

        $this->dispatch('chirp-created');
    }

    public function updateCharacterCount(): void
    {
    }

    public function getCharacterCount(): int
    {
        return mb_strlen($this->message);
    }

    //
}; ?>

<div x-data="{ message: @entangle('message'), showMessage: false }">
    <form wire:submit.prevent="store">
        <textarea x-model="message" @input="message = $event.target.value; showMessage = message.length > 20 ? true : false"
            placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            rows="4"></textarea>

        <div class="flex justify-between">
            <span x-text="message.length + ' / 255 characters'" class="text-sm text-gray-500"></span>
            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
        </div>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />

        <!-- <span x-cloak x-show="showMessage" class="text-red-500" x-on:enter="console.log('Span displayed'); setTimeout(() => { console.log('Timer started'); showMessage = false; console.log('Timer ended'); }, 3000)">You're writing too much</span> -->

        <span x-cloak x-show="showMessage" class="text-red-400">🐿️Hold on buddy, you're writing too much </span>

    </form>
</div>
