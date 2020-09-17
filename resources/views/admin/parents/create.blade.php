@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Create Parent
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.parents.store") }}" method="POST">
                            @csrf
                            <x-input name="first_name" label="First Name*" type="text" placeholder="John" required="true" :value="$parent->first_name ?? old('first_name')"></x-input>
                            <x-input name="last_name" label="Last Name*" type="text" placeholder="Doe" required="true" :value="$parent->last_name ?? old('last_name')"></x-input>

                            <x-input name="phone_number" label="Mobile Number*" type="phone" placeholder="707-555-1212" required="true" :value="old('phone_number')"></x-input>

                            <!-- Teachers -->

                            <div class="form-group {{ $errors->has('teachers') ? 'has-error' : '' }}">
                                <label for="teachers">Teachers</label>
                                <select name="teachers[]" id="teachers" rel="select2" class="form-control" multiple="multiple">
                                    @foreach($teachers as $item)
                                        <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <input class="pull-right btn btn-sm btn-primary btn-radius:12:px" type="submit" value="Save">
                                <a href="{{ route("admin.parents.index") }}" class="pull-right btn btn-sm btn-light btn-radius:12:px">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push ('javascript')

    <script type='text/javascript'>

        $(document).ready(function() {
            $('#teachers').select2();
            $("[rel=select2]").each(function() {
                $(this).select2({
                    placeholder: {
                        id: '-1', // the value of the option
                        text: 'Select one or more teachers that has a student of this parent'
                    },
                    selectOnClose: false,
                    allowClear: true,
                })
            })
        });

    </script>

@endpush
