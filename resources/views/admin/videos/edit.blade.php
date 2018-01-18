@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>{{ $video->title }}</h2>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Id</td>
                                <td>{{ $video->id }}</td>
                            </tr>
                            <tr>
                                <td>Order</td>
                                <td>{{ $video->order }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $video->name }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $video->description }}</td>
                            </tr>
                            <tr>
                                <td>URL</td>
                                <td>{{ $video->url }}</td>
                            </tr>
                            <tr>
                                <td>Video ID</td>
                                <td>{{ $video->videoId }}</td>
                            </tr>
                            <tr>
                                <td>Views</td>
                                <td>{{ $video->watched_count }}</td>
                            </tr>
                            <tr>
                                <td>Actions</td>
                                <td>
                                    <a class="btn btn-default" href="{{ action( 'AdminVideoController@edit', [ 'video' => $video ] ) }}">
                                        Edit
                                    </a>
                                </td>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


