@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Create Permission
                    </div>
                    <div class="card-body">
                        <form action="{{ route("admin.permissions.store") }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="name" label="Title*" type="text" required="true" value="{{ old('name') }}"></input>
                            <div>
                                <br>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        All Permissions
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $key => $permission)
                                <tr>
                                    <td>
                                        {{ $permission->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $permission->name ?? '' }}
                                    </td>
                                    <td>
                                        <a class="icon" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                            <i class="fas fa-edit"></i> Edit
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
