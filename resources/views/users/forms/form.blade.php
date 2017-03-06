<div class="col-sm-12 form-horizontal">
    @include('components.errors')

    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="profile[first_name]">First Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="profile[first_name]" required
                       value='{{ isset( $user->profile['first_name'] ) ? $user->profile['first_name'] : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="profile[middle_name]">Middle Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="profile[middle_name]"
                       value='{{ isset( $user->profile['middle_name'] ) ? $user->profile['middle_name'] : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="profile[last_name]">Last Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="profile[last_name]" required
                       value='{{ isset( $user->profile['last_name'] ) ? $user->profile['last_name'] : "" }}'/>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="profile[gender]">Gender</label>
            <div class="col-sm-10">
                <select name="profile[gender]" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="user_group">User Group</label>
            <div class="col-sm-10">
                <select name="user_group" id="user_group" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="driver">Driver</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">E-mail Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="email" name="email" placeholder="Name" required
                       value='{{ isset( $user->email ) ? $user->email : "" }}'/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" style="text-align: right;">
            <a href="/users" class="btn btn-primary">
                <i class="fa fa-arrow-left fa-lg"></i> Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check fa-lg"></i> Save
            </button>
        </div>
    </div>

</div>