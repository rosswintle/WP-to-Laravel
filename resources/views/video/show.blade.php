@extends('layouts.video')

@section('title', $video->name)

@section('content')
    <main>

        <nav class="video-nav mobile-closed">

            <ul>
                <li class="mobile-toggle">
                    <a href="#0">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
                @foreach( $allVideos as $thisIndex => $thisVideo )
                    <li>
                        <a 
                            href="{{ action( 'VideoController@show', ['video' => $thisVideo->id] ) }}"
                            class="{{ $watchedVideos->contains( $thisVideo->id ) ? 'watched' : 'unwatched' }} {{ $thisVideo->id == $video->id ? 'current-video' : '' }}">
                            <h3>
                                {{ $thisVideo->name }}
                            </h3>
                            <p class="video-order">
                                {{ $thisIndex + 1 }}
                            </p>
                            <p class="video-meta">
                                {{ intdiv( $thisVideo->duration, 60 ) }}:{{ sprintf('%02d', $thisVideo->duration % 60) }}
                                @if ( $watchedVideos->contains( $thisVideo->id ) )
                                    (Watched)
                                @endif
                            </p>
                            <p>
                                {{ $thisVideo->description }}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>    

        </nav>

        <article class="video-main">

            <h1>
                {{ $video->name }}
            </h1>

            <p>
                {{ $video->description }}
            </p>

            <div class="videoWrapper">
                <iframe src="https://player.vimeo.com/video/{{ $video->videoVimeoId }}" width="640" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

            {!! $video->notes !!}

            <script>
                var iframe = document.querySelector('iframe');
                var player = new Vimeo.Player(iframe);

                player.on('ended', onPlayerEnded);

                // 4. The API will call this function when the video player is ready.
                function onPlayerReady(event) {
                    // event.target.playVideo();
                }

                function onPlayerEnded(event) {
                    axios.post( '{{ action( 'VideoApiController@markWatched', ['video' => $video->id] ) }}' )
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

