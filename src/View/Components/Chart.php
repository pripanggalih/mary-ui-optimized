<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chart extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
	) {
		$this->uuid = "chart-" . ++self::$counter;
	}

	public function render(): View|Closure|string
	{
		return <<<'HTML'
                <div
                    wire:key="{{ $uuid }}-{{ rand() }}"
                    x-data="{
                        settings: @entangle($attributes->wire('model')),
                        init(){
                            new Chart($refs.chart, this.settings);
                        }
                    }"

                    {{ $attributes->class(["relative"]) }}
                >
                    <canvas x-ref="chart"></canvas>
                </div>
            HTML;
	}
}
