@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">

                <!-- Teacher Select Card -->
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            Select Class to message
                        </div>
                        <div class="card-body">
                            <!-- Teacher Select -->
                            <div class="row">
                                <div class="col-lg-10 col-md-5 col-sm-4">
                                    <div class="form-group">
                                            <select name="teachers" id="teachers" rel="teacher-select2" class="form-control" data-placeholder="Select teachers class to message" required>
                                                <option></option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" >{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sms Recipeints -->
                <div id="sms-table"></div>

            </div>
        </div>
    </div>
@endsection

@push ('javascript')

    <script type='text/javascript'>

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#teachers").on('change', function() {
                var teacher = $("#teachers").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.parents.by.teachers.post') }}",
                    data: {teacher: teacher},
                }).done(function (data){
                    $("#sms-table").html(data);

                    $("#teachers").select2({
                        allowClear: true
                    });

                    $("#parents").select2({
                        allowClear: true
                    });

                    $("#parents").trigger('change');

                    var parents = 0;
                    var segments = 0;
                    var public_max = 1600;
                    var message_cost = 0.0075;
                    $('#parents_count').html(parents + '  Recipients');
                    $('#public_count').html(public_max + '  characters remaining');
                    $('#segment_count').html(segments + '  message segments');
                    $('#cost_estimate').html('$0.00 Cost Estimate');

                    $('#parents').on('select2:close', function (evt) {
                        var uldiv = $(this).siblings('span.select2').find('ul')
                        var count = uldiv.find('li').length - 1;
                        parents = count;
                        $('#parents_count').html(count + ' Recipients');
                        var text_length = $('#message').val().length;
                        var text_remaining = public_max - text_length;
                        var total_segments = Math.ceil(text_length / 160);
                        var price_per_sms = Number(total_segments * message_cost).toFixed(2);
                        var cost = Number(price_per_sms * count).toFixed(2);
                        $('#public_count').html(text_remaining + ' / ' + public_max + ' Characters remaining');
                        $('#segment_count').html(total_segments + ' Message segments');
                        $('#cost_estimate').html('$' + cost + ' Estimated Cost')
                    });


                    $('#message').keyup(function() {
                        var text_length = $('#message').val().length;
                        var text_remaining = public_max - text_length;
                        var total_segments = Math.ceil(text_length / 160);
                        var price_per_sms = Number(total_segments * message_cost).toFixed(2);
                        var cost = Number(price_per_sms * parents).toFixed(2);

                        $('#public_count').html(text_remaining + ' / ' + public_max + ' Characters remaining');
                        $('#segment_count').html(total_segments + ' Message segments');
                        $('#cost_estimate').html('$' + cost + ' Estimated Cost')
                    });

                    $("[rel=parents-select2]").each(function() {
                        $("#parents > option").prop("selected","selected");
                        $("#parents").trigger("change")
                        var uldiv = $(this).siblings('span.select2').find('ul')
                        var count = uldiv.find('li').length - 1;
                        parents = count;
                        $('#parents_count').html(count + ' Recipients');
                        $(this).select2({
                            placeholder: {
                                id: '-1', // the value of the option
                                text: 'Select one or more parents to message'
                            },
                            selectOnClose: true,
                            allowClear: true
                        })

                    })

                    function round(value, decimals) {
                        return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
                    }

                });
            });



        });


    </script>

@endpush
