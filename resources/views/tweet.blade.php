
<div class="details">
<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400' }}">
                    
    <div class="mr-2 flex-shrink-0">

        <a href="{{ $tweet->user->path() }}">

            <img src="{{ $tweet->user->avatar }}"
            class="rounded-full mr-2" width="50" height="50">
                   
        </a>                     
     </div>

                    
    <div class="w-full">
        <h5 class="font-bold mb-1">

            <a href="{{ $tweet->user->path() }}">

                {{ $tweet->user->name }}
            
            </a>
                
        </h5>
         <p class="text-xs mb-3">{{ $tweet->created_at->diffForHumans() }}</p>

        <p class="text-sm mb-3">
            {{ $tweet->body }}
        </p>
         
         @if( !empty($tweet->slika))
            <div> <img src="{{ asset('storage/' . $tweet->slika)}}" class="mb-3"> </div>
        
         @endif


        <x-like-buttons :tweet="$tweet"/>

        
        

        
        
     </div>
    
    
</div>

</div>