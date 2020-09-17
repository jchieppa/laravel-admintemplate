@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Create Teacher
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.teachers.store") }}" method="POST">
                            @csrf
                            <x-input name="first_name" label="First Name*" type="text" placeholder="John" required="true" :value="old('first_name')"></x-input>
                            <x-input name="last_name" label="Last Name*" type="text" placeholder="Doe" required="true" :value="old('last_name')"></x-input>
                            <div>
                                <input class="pull-right btn btn-sm btn-primary btn-radius:12:px" type="submit" value="Save">
                                <a href="{{ route("admin.teachers.index") }}" class="pull-right btn btn-sm btn-light btn-radius:12:px">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
