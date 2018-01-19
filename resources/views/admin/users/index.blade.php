@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Users</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Videos watched</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ \App\User::$lookupRole[ $user->role ] }}</td>
                                    <td>
                                        {{ $user->watched_count }}
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{ action( 'AdminUserController@show', [ 'user' => $user ] ) }}">
                                            View
                                        </a>
                                        <a class="btn btn-default" href="{{ action( 'AdminUserController@edit', [ 'user' => $user ] ) }}">
                                            Edit
                                        </a>
                                    </td>
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
