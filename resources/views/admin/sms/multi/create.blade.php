@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        New Sms
                    </div>

                    <div class="card-body">
                        <form action="{{ route("admin.sms.store") }}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <input type="hidden" id="parent_count" value="{{ $parents->count() }}">
                            </div>
                            <!-- Sms Recipients -->
                            <div class="form-group {{ $errors->has('parents') ? 'has-error' : '' }}">
                                <label for="parents">Sms Recipients*</label>
                                <select name="parents[]" id="parents" rel="select2" class="form-control" multiple="multiple" required>
                                @foreach($parents as $id => $parent)
                                    <option value="{{ $parent->getTwilioFormattedNumber() }}" >{{ $parent->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <!-- Sms Message -->
                                <div class="row form-group">
                                    <label class="col-sm-2 control-label">Compose Message</label>

                                    <div class="col-lg-10 col-md-5 col-sm-4">
                                    <textarea class="form-control" rows="10" id="message" name="message" maxlength="1600"></textarea>
                                </div>
                                    <div class="col-auto" id="parents_count"><p></p></div>
                                    <div class="col-auto" id="segment_count"><p></p></div>
                                    <div class="col-auto" id="public_count"><p></p></div>
                                    <div class="col-auto" id="cost_estimate"><p></p></div>
                            </div>

                            <div>
                                <input class="btn btn-primary" type="submit" value="Send">
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

            var parents = 0;
            var segments = 0;
            var public_max = 1600;
            var message_cost = 0.0075;
            $('#parents_count').html(parents + '  Recipients');
            $('#public_count').html(public_max + '  characters remaining');
            $('#segment_count').html(segments + '  message segments');
            $('#cost_estimate').html('$0.00 Cost Estimate');

            $('#parents').select2();

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

            $("[rel=select2]").each(function() {
                $(this).select2({
                    placeholder: {
                        id: '-1', // the value of the option
                        text: 'Select one or more parents to message'
                    },
                    selectOnClose: true,
            })

            })


            function round(value, decimals) {
                return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
            }

        });


    </script>

@endpush
