@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Teacher</h4>

                        <div class="card-options">
                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you wish to delete this teacher?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>


                    <div class="card-body">
                        <form action="{{ route("admin.teachers.update", [ $teacher->id ]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input name="first_name" label="First Name*" type="text" required="true" :value="$teacher->first_name ?? old('first_name')"></x-input>
                            <x-input name="last_name" label="Last Name*" type="text" required="true" :value="$teacher->last_name ?? old('last_name')"></x-input>

                            <!-- Parents -->
                            <div class="form-group {{ $errors->has('parents') ? 'has-error' : '' }}">
                                <label for="parents">Parents</label>
                                <select name="parents[]" id="parents" rel="select2" class="form-control" multiple="multiple">
                                    <?php $selected = isset($teacher) ? $teacher->parents->pluck('id', 'id')->toArray() : old('parents', []); ?>
                                    @foreach($parents as $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id, $selected) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

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

@push ('javascript')

    <script type='text/javascript'>

        $(document).ready(function() {
            $('#parents').select2();
            $("[rel=select2]").each(function() {
                $(this).select2({
                    placeholder: {
                        id: '-1', // the value of the option
                        text: 'Select one or more parents that has a student with this teacher'
                    },
                    selectOnClose: false,
                    allowClear: true,
                })
            })
        });

    </script>

@endpush
