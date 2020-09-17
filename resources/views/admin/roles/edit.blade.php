@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Role</h4>

                        <div class="card-options">
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');" style="display: inline-block;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-xs btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input name="name" label="Title*" type="text" required="true" :value="$role->name"></x-input>

                            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                <label for="permission">Permissions*</label>
                                <select name="permission[]" id="permission" rel="select2" class="form-control"
                                        multiple="multiple" required>
                                    @foreach($permissions as $id => $permissions)
                                        <option value="{{ $id }}"
                                            {{ $role->permissions()->pluck('name', 'id')->contains($id) ? 'selected' : '' }}
                                        >{{ $permissions }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="Save">
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
