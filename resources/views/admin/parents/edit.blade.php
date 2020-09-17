@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Parent</h4>

                        <div class="card-options">
                            <form action="{{ route('admin.parents.destroy', $parent->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you wish to delete this parent?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>


                    <div class="card-body">
                        <form action="{{ route("admin.parents.update", [ $parent->id ]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <x-input name="first_name" label="First Name*" type="text" required="true" :value="$parent->first_name ?? old('first_name')"></x-input>
                            <x-input name="last_name" label="Last Name*" type="text" required="true" :value="$parent->last_name ?? old('last_name')"></x-input>

                            <x-input name="phone_number" label="Mobile Number*" type="text" required="true" :value="$parent->phone_number ?? old('phone_number')"></x-input>

                            <!-- Confirmed -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="confirmed" value="{{ $parent->confirmed }}" disabled="disabled" @if($parent->confirmed) checked @endif id="required">
                                <label class="form-check-label" for="confirmed">
                                    Confirmed
                                </label>
                            </div>

                            <!-- Opted Out -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="opted_out" value="{{ $parent->opted_out }}" disabled="disabled" @if($parent->opted_out) checked @endif id="required">
                                <label class="form-check-label" for="opted_out">
                                    Opted Out
                                </label>
                            </div>

                            <!-- Teachers -->

                            <div class="form-group {{ $errors->has('teachers') ? 'has-error' : '' }}">
                                <label for="teachers">Teachers</label>
                                <select name="teachers[]" id="teachers" rel="select2" class="form-control" multiple="multiple">
                                <?php $selected = isset($parent) ? $parent->teachers->pluck('id', 'id')->toArray() : old('teachers', []); ?>
                                @foreach($teachers as $item)
                                    <option value="{{ $item->id }}" {{ in_array($item->id, $selected) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                           <div class="row">
                               <br>
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
