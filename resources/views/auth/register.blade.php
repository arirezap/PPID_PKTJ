<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-gray-800">Registrasi Akun Pemohon Informasi</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="email" value="Alamat Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="username" value="Username" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="mt-4 flex items-start">
            <input id="agree" name="agree" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>
            <label for="agree" class="ml-2 text-sm italic text-gray-600">Pastikan data yang diunggah telah sesuai dengan ketentuan yang berlaku.</label>
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="w-full justify-center">
                Simpan Pendaftaran
            </x-primary-button>
        </div>

        <div class="mt-4 text-center text-sm">
            Sudah memiliki akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
        </div>
    </form>
</x-guest-layout>