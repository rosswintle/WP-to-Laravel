@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @component('components.messages')
                @endcomponent

                <div class="panel-body">
                    <h2>{{ $video->title }}</h2>
                    <table class="table">
                        {!! Form::open(['method' => 'PATCH', 'action' => [ 'AdminVideoController@update', $video ]]) !!}
                            <tbody>
                                <tr>
                                    <td>
                                        {{ Form::label( 'id', 'ID' ) }}
                                    </td>
                                    <td>
                                        {{ $video->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'order', 'Order' ) }}
                                    </td>
                                    <td>
                                        {{ Form::number( 'order', $video->order ) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'name', 'Name' ) }}
                                    </td>
                                    <td>
                                        {{ Form::text( 'name', $video->name ) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'description', 'Description' ) }}
                                    </td>
                                    <td>
                                        {{ Form::textarea( 'description', $video->description ) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'notes', 'Notes' ) }}
                                    </td>
                                    <td>
                                        {{ Form::textarea( 'notes', $video->notes ) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'url', 'URL' ) }}
                                    </td>
                                    <td>
                                        {{ Form::text( 'url', $video->url ) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'videoId', 'Video ID' ) }}
                                    </td>
                                    <td>
                                        {{ Form::text( 'videoId', $video->videoId ) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ Form::label( 'submit', 'Actions' ) }}
                                    </td>
                                    <td>
                                        {{ Form::submit('Save', [ 'class' => 'btn btn-default' ]) }}
                                    </td>
                                <tr>
                            </tbody>
                        {!! Form::close() !!}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
