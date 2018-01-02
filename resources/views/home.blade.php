@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Videos</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Order</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>URL</td>
                                <td>Watched</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->order }}</td>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>{{ $video->url }}</td>
                                    <td>{{ $watched->contains($video->id) ? 'Yes' : 'No' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection