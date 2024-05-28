@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-700 bg-oscuro text-white focus:border-amarillo focus:ring-amarillo  rounded-md shadow-sm']) !!}>
