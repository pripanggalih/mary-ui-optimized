<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
		public ?string $title = null,
		public ?string $icon = null,
		public ?string $iconClasses = 'w-4 h-4',
		public ?bool $separator = false,
		public ?bool $activateByRoute = false,
		public ?string $activeBgColor = 'bg-base-300',
	) {
		$this->uuid = "menu-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'BLADE'
                <ul {{ $attributes->class(["menu w-full"]) }} >
                    @if($title)
                        <li class="menu-title text-inherit uppercase">
                            <div class="flex items-center gap-2">

                                @if($icon)
                                    <x-mary-icon :name="$icon" @class(['inline-flex', $iconClasses])  />
                                @endif

                                {{ $title }}
                            </div>
                        </li>
                    @endif

                    @if($separator)
                        <hr class="mb-3 border-t-[length:var(--border)] border-base-content/10" />
                    @endif

                    {{ $slot }}
                </ul>
            BLADE;
	}
}
