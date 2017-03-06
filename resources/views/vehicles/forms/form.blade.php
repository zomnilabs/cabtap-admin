<div class="col-sm-12 form-horizontal">
    @include('components.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="plate_number">Plate number</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="plate_number" required
                       value='{{ isset( $vehicle->plate_number ) ? $vehicle->plate_number : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="make">Make</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="make"
                       value='{{ isset( $vehicle->make ) ? $vehicle->make : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="model">Model</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="model" required
                       value='{{ isset( $vehicle->model ) ? $vehicle->model : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="year">Year</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="year" required
                       value='{{ isset( $vehicle->year ) ? $vehicle->year : "" }}'/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" style="text-align: right;">
            <a href="/vehicles" class="btn btn-primary">
                <i class="fa fa-arrow-left fa-lg"></i> Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check fa-lg"></i> Save
            </button>
        </div>
    </div>

</div>