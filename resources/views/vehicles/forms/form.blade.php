<div class="col-sm-12 form-horizontal">
    @include('components.errors')

    <div class="col-sm-12">
        <div class="form-group{{ $errors->has('plate_number') ? ' has-error' : '' }}">
            <label class="control-label col-sm-2" for="plate_number">Plate number</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="plate_number"
                       value='{{ isset( $vehicle->plate_number ) ? $vehicle->plate_number : "" }}'/>
                @if ($errors->has('plate_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('plate_number') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group{{ $errors->has('make') ? ' has-error' : '' }}">
            <label class="control-label col-sm-2" for="make">Make</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="make"
                       value='{{ isset( $vehicle->make ) ? $vehicle->make : "" }}'/>
                @if ($errors->has('make'))
                    <span class="help-block">
                        <strong>{{ $errors->first('make') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
            <label class="control-label col-sm-2" for="model">Model</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="model"
                       value='{{ isset( $vehicle->model ) ? $vehicle->model : "" }}'/>
                @if ($errors->has('model'))
                    <span class="help-block">
                        <strong>{{ $errors->first('model') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
            <label class="control-label col-sm-2" for="year">Year</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="year"
                       value='{{ isset( $vehicle->year ) ? $vehicle->year : "" }}'/>
                @if ($errors->has('year'))
                    <span class="help-block">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
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