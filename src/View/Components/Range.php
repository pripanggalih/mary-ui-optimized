<?php

namespace Mary\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Range extends Component
{
	public string $uuid;

	private static int $counter = 0;

	public function __construct(
		public ?string $id = null,
		public ?string $label = null,
		public ?string $hint = null,
		public ?string $hintClass = 'fieldset-label',
		public ?int $min = 0,
		public ?int $max = 100,

		// Validations
		public ?string $errorField = null,
		public ?string $errorClass = 'text-error',
		public ?bool $omitError = false,
		public ?bool $firstErrorOnly = false,
	) {
		$this->uuid = "range-" . ++self::$counter;
	}

	public function modelName(): ?string
	{
		return $this->attributes->whereStartsWith('wire:model')->first();
	}

	public function errorFieldName(): ?string
	{
		return $this->errorField ?? $this->modelName();
	}

	public function render(): View|Closure|string
	{
		return <<<'BLADE'
            <div>
                <fieldset class="fieldset py-0">
                    {{-- STANDARD LABEL --}}
                    @if($label)
                        <legend class="fieldset-legend mb-0.5">
                            {{ $label }}

                            @if($attributes->get('required'))
                                <span class="text-error">*</span>
                            @endif
                        </legend>
                    @endif

                    {{-- RANGE --}}
                    <input
                        type="range"
                        min="{{ $min }}"
                        max="{{ $max }}"
                        {{ $attributes->merge(["class" => "range w-full", "id" => $uuid])->except('label', 'hint', 'min', 'max') }}
                    />

                    {{-- ERROR --}}
                    @if(!$omitError && $errors->has($errorFieldName()))
                        @foreach($errors->get($errorFieldName()) as $message)
                            @foreach(Arr::wrap($message) as $line)
                                <div class="{{ $errorClass }}" x-class="text-error">{{ $line }}</div>
                                @break($firstErrorOnly)
                            @endforeach
                            @break($firstErrorOnly)
                        @endforeach
                    @endif

                    {{-- HINT --}}
                    @if($hint)
                        <div class="{{ $hintClass }}" x-classes="fieldset-label">{{ $hint }}</div>
                    @endif
                </fieldset>
            </div>
            BLADE;
	}
}
