<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuTitle extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
		public ?string $title = null,
		public ?string $icon = null,
		public ?string $iconClasses = null,
	) {
		$this->uuid = "menutitle-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'BLADE'
                <li {{ $attributes->class(["menu-title"]) }}>
                    <div class="flex items-center gap-2">

                        @if($icon)
                            <x-mary-icon :name="$icon" @class([$iconClasses]) />
                        @endif

                        {{ $title }}
                    </div>
                </li>
            BLADE;
	}
}
