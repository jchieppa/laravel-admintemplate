@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>

                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.profile.update", [ $user->id ]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <x-input name="name" label="Name*" type="text" required="true" :value="$user->name"></x-input>

                            <x-input name="email" label="Email*" type="email" required="true" :value="$user->email"></x-input>

                            <x-input name="password" label="Password*" type="password" required="false" :value="old('password')"></x-input>

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <img src="{{ asset("assets/avatars/$user->avatar") }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
                                        <h2>{{ $user->name }}'s Avatar</h2>
                                            <input type="file" class="btn btn-md " name="avatar">
                                    </div>
                                </div>
                                <div class="row">
                                    &nbsp
                                </div>

                            <div>
                                <input class="pull-right btn btn-sm btn-primary btn-radius:12:px" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
