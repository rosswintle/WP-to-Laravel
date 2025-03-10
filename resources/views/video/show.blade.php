@extends('layouts.video')

@section('title', $video->name)

@section('content')
    <main class="flex">

        <nav class="w-1/3 mr-14">

            <ul>
                <li class="mobile-toggle">
                    <a href="#0">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
                @foreach( $allVideos as $thisIndex => $thisVideo )
                    @include(
                        'components.video-nav-item',
                        [
                            'index' => $thisIndex,
                            'video' => $thisVideo,
                            'watched' => $watchedVideos->contains( $thisVideo->id ),
                            'current' => $thisVideo->id == $video->id,
                            ]
                            )
                @endforeach
            </ul>

        </nav>

        <article class="video-main">

            <h1 class="font-bold text-2xl my-6">
                {{ $video->name }}
            </h1>

            <p class="mb-6">
                {{ $video->description }}
            </p>

            <div class="mb-8">
                <iframe src="https://player.vimeo.com/video/{{ $video->videoVimeoId }}" width="640" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

            <div class="prose">
                {!! $video->notes !!}
            </div>

            <script>
                var iframe = document.querySelector('iframe');
                var player = new Vimeo.Player(iframe);

                player.on('ended', onPlayerEnded);

                // 4. The API will call this function when the video player is ready.
                function onPlayerReady(event) {
                    // event.target.playVideo();
                }

                function onPlayerEnded(event) {
                    axios.post( '{{ action( [\App\Http\Controllers\VideoApiController::class, 'markWatched'], ['video' => $video->id] ) }}' )
                    .then( function () {
                        const videoNavElem = document.querySelector('.video-nav .current-video');
                        const videoMetaElem = videoNavElem.querySelector('.video-meta');
                        videoMetaElem.innerHTML = videoMetaElem.innerHTML + " (Watched)";
                        videoNavElem.classList.add('watched');
                        console.log('Video {{ $video->id }} marked watched');
                    })
                    .catch( function( error ) {
                        console.log( error );
                    });
                }
                function stopVideo() {
                    player.stopVideo();
                }
            </script>

        </article>

    </main>
@endsection
