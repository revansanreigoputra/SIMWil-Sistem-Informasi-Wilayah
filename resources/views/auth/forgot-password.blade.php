<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Lupa kata sandi? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan reset kata sandi agar Anda bisa membuat yang baru.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6 gap-2">
            <a href="{{ route('login') }}"
                class="inline-flex items-center px-4 py-2 text-gray-700 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-300 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Kembali ke login
            </a>

            <x-primary-button>
                {{ __('Reset Kata Sandi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
