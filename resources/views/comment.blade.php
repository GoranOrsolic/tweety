<div class="border border-gray-300 rounded-lg">
    @forelse ($comments as $comment)
        @include('tweet')
    @empty
    	<p class="p-4">No comments yet.</p>    

    @endforelse 

    {{$comments->links()}}


    


</div>