@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sms Logs</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sent</th>
                                <th>Delivered</th>
                                <th>To</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Segments</th>
                                <th>price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key => $sms)
                                <tr>
                                    <td><a href="{{ route('admin.sms.show', $sms->id) }}">{{ $sms->id ?? '' }}</a></td>
                                    <td>{{ $sms->date_created }}</td>
                                    <td>{{ $sms->date_sent }}</td>
                                    <td>{{ $sms->to ?? '' }}</td>
                                    <td>{{ $sms->body ?? '' }}</td>
                                    <td>{{ $sms->status }}</td>
                                    <td>{{ $sms->segments }}</td>
                                    <td>{{ $sms->price ?? null }}</td>
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
                "order": [[ 0, "desc" ]],
                "columnDefs": [
                    {
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "width": "10%",
                        "targets": [1,2]
                    },
                    {
                        "width": "55%",
                        "targets": 4
                    },
                    {
                        "width": "5%",
                        "targets": [3,5,6,7]
                    },
                ]
            });
        });
    </script>

@endpush
