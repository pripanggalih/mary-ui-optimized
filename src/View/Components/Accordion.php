<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
		public ?bool $noJoin = false,
	) {
		$this->uuid = "accordion-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'BLADE'
                <div
                    x-data="{ model: @entangle($attributes->wire('model')) }"
                    {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => ($noJoin ? '' : 'join join-vertical w-full')]) }}
                    wire:key="accordion-{{ $uuid }}"
                >
                        {{ $slot }}
                </div>
            BLADE;
	}
}
