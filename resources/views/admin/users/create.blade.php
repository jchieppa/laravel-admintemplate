@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Create User
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.users.store") }}" method="POST">
                            @csrf
                            <x-input name="first_name" label="First Name*" type="text" placeholder="John" required="true" :value="old('first_name')"></x-input>
                            <x-input name="last_name" label="Last Name*" type="text" placeholder="Doe" required="true" :value="old('last_name')"></x-input>

                            <x-input name="email" label="Email*" type="email" required="true" :value="old('email')"></x-input>

                            <x-input name="password" label="Password*" type="password" required="false" :value="old('password')"></x-input>

                            <x-roles :roles="$roles"></x-roles>

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
                $(this).select2({
                    placeholder: {
                        id: '-1', // the value of the option
                        text: 'Select one or more roles'
                    }
                })
            })
        });
    </script>

@endpush

