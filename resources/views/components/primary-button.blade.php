<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amarillo  border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amarillo focus:bg-amarillo  active:bg-amarillo  focus:outline-none focus:ring-2 focus:ring-claro focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
