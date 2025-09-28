<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Kbd extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
	) {
		$this->uuid = "kbd-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'HTML'
                <kbd
                    wire:key="{{ $uuid }}"
                    {{ $attributes->merge(["class" => "kbd"]) }}
                >
                    {{ $slot }}
                </kbd>
            HTML;
	}
}
