@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                <img 
                    src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                    alt=""
                    width="40"
                    height="40"
                    class="rounded-full">
                    
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <x-form.textarea name="body" />

            <x-form.field>
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Quick, think of something to say!"
                    required></textarea>

                <x-form.error name="body" />
            </x-form.field>

            <div class="flex justify-end mt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a class="hover:underline" href="/register">Register</a> or <a class="hover:underline" href="/login">Log in</a> to leave a comment.
    </p>
@endauth