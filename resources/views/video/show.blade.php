@extends('layouts.video')

@section('title', $video->name)

@section('video-nav')
    
    <ul>
        @foreach( $allVideos as $thisIndex => $thisVideo )
            <li>
                <a 
                    href="{{ action( 'VideoController@show', ['video' => $thisVideo->id] ) }}"
                    class="{{ $watchedVideos->contains( $thisVideo->id ) ? 'watched' : 'unwatched' }} {{ $thisVideo->id == $video->id ? 'current-video' : '' }}">
                    <h3>
                        {{ $thisVideo->name }}
                    </h3>
                    <p class="video-order">
                        {{ $thisIndex }}
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

@endsection

@section('video-main')

    <h1>
        {{ $video->name }}
    </h1>

    <p>
        {{ $video->description }}
    </p>

    <div class="videoWrapper">
        <div id="player"></div>
    </div>

    <script>
        // This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // This function creates an <iframe> (and YouTube player)
        // after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '400',
                width: '640',
                videoId: '{{ $video->videoId }}',
                playerVars: {
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                },
                events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
                }
            });
        }
        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            // event.target.playVideo();
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
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
        }
        function stopVideo() {
            player.stopVideo();
        }
    </script>

@endsection

