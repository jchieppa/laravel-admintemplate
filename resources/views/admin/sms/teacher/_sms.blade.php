
<!-- Sms Card -->
<div class="row">

    <div class="card">
        @if($parents->isEmpty())
            <div class="card-body">
                <div class="row form-group {{ $errors->has('parents') ? 'has-error' : '' }}">
                    <div class="col-lg-5 col-md-5 col-sm-4 align-content-center">
                        No Parents Found for {{ $teacher->name }}
                    </div>
                </div>
            </div>
        @else
        <div class="card-header">
            New Sms
        </div>
        <div class="card-body">
            <form action="{{ route("admin.sms.store") }}" method="POST">
                @csrf
                <div class="row form-group">
                    <input type="hidden" id="parent_count" value="{{ $parents->count() ?? ''}}">
                </div>
                <!-- Sms Recipients -->
                <div class="row form-group {{ $errors->has('parents') ? 'has-error' : '' }}">
                    <div class="col-lg-10 col-md-5 col-sm-4">
                        <label for="parents">Sms Recipients*</label>
                        <select name="parents[]" id="parents" rel="parents-select2" class="form-control" multiple="multiple" required>
                            @foreach($parents as $id => $parent)
                                <option value="{{ $parent->getTwilioFormattedNumber() }}" >{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <input class="btn btn-primary" id="submitButton" type="submit" value="Send">
                </div>
            </form>
                @endif

        </div>
    </div>
</div>
