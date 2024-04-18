<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\Chirp;

new class extends Component {
    public $chirp;

    public function mount(Chirp $chirp)
    {
        $this->chirp = $chirp;
    }

    public function getChirps(): void
    {
        $this->chirps = Chirp::with('user')->latest()->get();
    }

    public function clap(Chirp $chirp)
    {
        if ($chirp->claps()->where('user_id', auth()->id())->count() > 50) {
            session()->flash('error', 'You have already clapped for this chirp.');
            return;
        }

        $chirp->claps()->create(['user_id' => auth()->id()]);

        $this->getChirps();

        session()->flash('success', 'Clap added successfully.');
    }
}; ?>


<button wire:click="clap({{ $chirp->id }})" @click="triggerConfetti(event)"
    class="flex items-center mt-2 justify-center rounded-full bg-[#EBF4FE] h-10 w-24 px-4">
    <span class="mr-1 -ml-2 text-lg text-gray-600">👏</span>
    <span class="text-sm text-gray-600">
        {{ $chirp->clapCount() }}
    </span>
</button>

<script>
    function triggerConfetti(event) {
        const rect = event.target.getBoundingClientRect();
        const origin = {
            y: rect.bottom / window.innerHeight,
            x: rect.left / window.innerWidth
        };
        confetti({
            particleCount: 30,
            spread: 70,
            startVelocity: 24,
            origin: origin
        });
    }
</script>
