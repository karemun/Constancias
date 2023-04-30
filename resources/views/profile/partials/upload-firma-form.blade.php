<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Firma Electronica') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Sube un archivo .jpg o .png de tu firma electronica.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.firma') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <x-input-label for="imagen" :value="__('Firma Electronica')" />
        <input id="imagen" name="imagen" type="file" accept=".jpg, .jpeg, .png" class="mt-1 block w-full border p-3 rounded-lg" required/>
        <x-input-error class="mt-2" :messages="$errors->get('imagen')" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'firma-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
