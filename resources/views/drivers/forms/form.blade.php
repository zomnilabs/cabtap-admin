<div class="col-sm-12 form-horizontal">
    @include('components.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="user_id">Select User</label>
            <div class="col-sm-10">
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value={{ $user->id }}>{{ $user->profile->getFullNameAttribute() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="vehicle_id">Select Vehicle</label>
            <div class="col-sm-10">
                <select name="vehicle_id" id="vehicle_id" class="form-control">
                    @foreach($vehicles as $vehicle)
                        <option value={{ $vehicle->id }}>
                            {{ $vehicle->getVehicleAttribute() }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" style="text-align: right;">
            <a href="/drivers" class="btn btn-primary">
                <i class="fa fa-arrow-left fa-lg"></i> Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check fa-lg"></i> Save
            </button>
        </div>
    </div>

</div>