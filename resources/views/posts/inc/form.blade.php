<!-- Feedback que se ha guardado correctamente -->
<x-session-status class="mb-4" :status="session('status')" />
<!-- Feedback que hubi errores -->
<x-validation-errors class="mb-4" :errors="$errors" />
<!-- action es el método o la ruta que queremos usar store será lo que usemos para salvar la información en la tabla. Colocamos el nombre que se le ha dado en la ruta -->
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <!-- csrf es el token de seguridad para que los formularios sean seguros -->
    <div class="m-t-4">
        <x-input-label for="body" :value="__('Body')" />
        <x-textarea id="body" class="block mt-1 w-full" type="text" name="body" required />
    </div>
    <!-- Botón de guardar -->
    <div class="flex justify-end mt-4">
        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>