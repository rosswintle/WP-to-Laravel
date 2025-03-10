<li class="border-b border-b-white">
    <a
        href="{{ action( [\App\Http\Controllers\VideoController::class, 'show'], ['video' => $video->id] ) }}"
        class="
            block px-4 py-4 text-white
            {{ $watched ? 'bg-red-500' : 'bg-sky-700' }}
            {{ $current ? 'translate-x-4' : '' }}
            hover:translate-x-4
            transition
             ">
        <h3 class="font-bold uppercase text-md">
            {{ $video->name }}
        </h3>

        {{-- Video order --}}
        <p class="hidden" aria-hidden>
            {{ $index + 1 }}
        </p>

        {{-- Video meta --}}
        <p class="text-sm my-2">
            {{ intdiv( $video->duration, 60 ) }}:{{ sprintf('%02d', $video->duration % 60) }}
            @if ( $watchedVideos->contains( $video->id ) )
                (Watched)
            @endif
        </p>
        <p>
            {{ $video->description }}
        </p>
    </a>
</li>
