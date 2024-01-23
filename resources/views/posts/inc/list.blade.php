@foreach ( $posts as $post )
<div class="mt-4">
    <!-- Si se va a Post hay un método que se llama user y con eso se trae el nombre del usuario -->
    <a href="#" class="text-lg font-semibold" >{{ $post->user->name }}</a>
    <p class="mt-1 text-xs">
        <em>
            {{ $post->created_at->format('d/m/Y') }}
        </em>
        {{ $post->body }}
    </p>
</div>
@endforeach
<div class="mt-4">
    {{ $posts->links() }}
</div>