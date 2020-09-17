@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>

                        <div class="card-options">
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you wish to delete this user?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.users.update", [ $user->id ]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <x-input name="name" label="Name*" type="text" required="true" :value="$user->name"></x-input>

                            <x-input name="email" label="Email*" type="email" required="true" :value="$user->email"></x-input>

                            <x-input name="password" label="Password*" type="password" required="false" :value="old('password')"></x-input>

                            <x-roles :roles="$roles" rel="select2" :user="$user"></x-roles>

                            @if(Auth()->user()->id == $user->id)
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
                            @endif
                            <div>
                                <input class="pull-right btn btn-sm btn-primary btn-radius:12:px" type="submit" value="Save">
                                <a href="{{ route("admin.users.index") }}" class="pull-right btn btn-sm btn-light btn-radius:12:px">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('javascript')

    <!-- Initialize the plugin: -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("[rel=select2]").each(function() {
                $(this).select2()
            })
        });
    </script>

@endpush

