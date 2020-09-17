@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Parents</h4>

                        <div class="card-options">
                            <a href="{{ route('admin.parents.create') }}" class="btn btn-xs btn-outline-primary">Create
                                Parent</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Confirmed</th>
                                <th>Opted Out</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parents as $key => $parent)
                                <tr>
                                    <td>{{ $parent->id ?? '' }}</td>
                                    <td>{{ $parent->name ?? '' }}</td>
                                    <td>{{ $parent->phone_number ?? '' }}</td>
                                    <td>{{ $parent->confirmed ? 'True' : 'False' }}</td>
                                    <td>{{ $parent->opted_out ? 'True' : 'False' }}</td>

                                    @can('parents_manage')
                                    <td>
                                        <a class="icon" href="{{ route('admin.parents.edit', $parent->id) }}">
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
                        "targets": 0
                    },
                    {
                        "width": "15%",
                        "targets": 3
                    },
                    {
                        targets: [ 1 ],
                        orderData: [ 1, 2 ]
                    }, {
                        targets: [ 2 ],
                        orderData: [ 2, 1 ]
                    }, {
                        targets: [ 4 ],
                        orderData: [ 1, 2 ]
                    }
                ]
            });
        });
    </script>

@endpush
