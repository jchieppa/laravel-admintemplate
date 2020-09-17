@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Teachers</h4>

                        <div class="card-options">
                            <a href="{{ route('admin.teachers.create') }}" class="btn btn-xs btn-outline-primary">Create
                                Teacher</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter ">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $key => $teacher)
                                <tr>
                                    <td>{{ $teacher->name ?? '' }}</td>

                                    @can('teachers_manage')
                                    <td>
                                        <a class="icon" href="{{ route('admin.teachers.edit', $teacher->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </td>
                                    @endcan
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

@push('javascript')

    <script type="text/javascript">
        $(document).ready(function () {
            $('.dataTable').DataTable({
                "pageLength": 25,
                "columnDefs": [
                    {
                        "width": "10%",
                        "targets": 1
                    },
                    {
                        "width": "15%",
                        "targets": 1
                    },
                    {
                        "orderable": false,
                        "orderCellsTop": true,
                        "targets": 1
                    }
                ]
            });
        });
    </script>

@endpush
