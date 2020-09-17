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
                        <form action="{{ route('admin.sms.index') }}" method="POST">
                            @csrf
                            @method('GET')

                            <!-- Sms Message Details -->

                            <x-input name="sid" label="Message Sid*" type="text" readonly required="true" :value="$sms->sid"></x-input>

                            <x-input name="phone_number" label="Phone Number*" type="text" readonly required="true" :value="$sms->to"></x-input>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Message*</label>
                                <textarea class="form-control" rows="6" id="message" name="message" readonly>{{ $sms->body }}</textarea>
                            </div>

                            <x-input name="status" label="Status*" type="text" readonly required="true" :value="$sms->status "></x-input>

                            <x-input name="segments" label="Segments*" type="number" readonly required="true" :value="$sms->segments "></x-input>

                            <x-input name="price" label="Price*" type="float" readonly required="true" :value=" $sms->price ??  0.00 "></x-input>

                            <x-input name="date_created" label="Message Sent*" type="text" readonly required="true" :value=" $sms->date_created "></x-input>

                            <x-input name="date_sent" label="Message Delivered*" type="text" readonly required="true" :value=" $sms->date_sent "></x-input>

                            <div>
                                <input class="btn btn-primary" type="submit" value="Back">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

