<div class="side-slide">
    <div class="">
        <div class="card-header d-flex justify-content-between"style="background-color: #1a237e">
            <h3 class="text-white">Filter</h3>
            <button type="button" class="close off-canvas text-white" data-type="close">
                <span aria-hidden="true">&times;</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>From</label>
                        <input type="date" name="from" class="form-control" value="{{request()->get('from')}}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group"> 
                        <label>To</label>
                        <input type="date" name="to" class="form-control" value="{{ request()->get('to')}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehicle_number" placeholder="Enter..">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">LR No</label>
                        <input type="text" class="form-control" name="lr_no" placeholder="Enter..">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Invoice No</label>
                        <input type="text" class="form-control" name="lr_no" placeholder="Enter..">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Branch</label>
                        <input type="text" class="form-control" name="branch" placeholder="Enter..">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Party Name</label>
                        <input type="text" class="form-control" name="party_name" placeholder="Enter..">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Delay</label>
                        <input type="number" class="form-control" name="delay" placeholder="Enter..">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Trip Status</label>
                        <select name="trip_status" id="" class="form-control select2">.
                            <option value="" aria-readonly="true">Select Status</option>
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                    <button type="submit" class="btn btn-light ml-2">Reset</button>
                </div>
            </div>                               
        </div>
    </div>
</div>