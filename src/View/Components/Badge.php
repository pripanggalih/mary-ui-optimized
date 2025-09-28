<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
		public ?string $value = null,

	) {
		$this->uuid = "badge-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'HTML'
                <div {{ $attributes->class(["badge"])}}>
                    {{ $value }}
                </div>
            HTML;
	}
}
