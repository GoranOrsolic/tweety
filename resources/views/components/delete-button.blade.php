@unless ( auth()->user()->is($user))

	 <form method="POST" action="/tweets/{{ $tweet->id }}/destroy">

            @csrf
            @method('DELETE')
            <button type="submit"
            class="text-xs" 
            >
            <div class="flex items-center">
             Delete
             </div>
           </button> </form>    


@endunless