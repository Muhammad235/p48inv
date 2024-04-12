<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-70 inline-flex items-center px-12 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }} style='background-color:#009933;'>
    {{ $slot }}
</button>
