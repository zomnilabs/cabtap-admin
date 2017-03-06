<div class="col-sm-12 form-horizontal">
    @include('components.errors')

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
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="name"
                       value='{{ isset( $maintenance->name ) ? $maintenance->name : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="price">Price</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="price" required
                       value='{{ isset( $maintenance->price ) ? $maintenance->price : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="scheduled_date">Scheduled Date</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" name="scheduled_date" required
                       value='{{ isset( $maintenance->scheduled_date ) ? $maintenance->scheduled_date : "" }}'/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" style="text-align: right;">
            <a href="/vehicle-maintenance" class="btn btn-primary">
                <i class="fa fa-arrow-left fa-lg"></i> Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check fa-lg"></i> Save
            </button>
        </div>
    </div>

</div>