<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Loading extends Component
{
	public string $uuid;

	public static int $counter = 0;

	public function __construct(
		public ?string $id = null,
	) {
		$this->uuid = "loading-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'HTML'
                <span {{ $attributes->class("loading") }}></span>
            HTML;
	}
}
