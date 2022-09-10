<div id="map"></div>
<div class="card d-none">
  <div class="card-body">
    <div id="floating-panel" class="row">
      <div class="form-group col-lg-4 mb-0">
        <label for="">Start</label>
        <input type="text" id="start" class="form-control" value="<?php echo e($payload->lr_details->originDetails->from_poi); ?>">
      </div>
      <div class="form-group col-lg-4 mb-0">
        <label for="">Waypoints</label>
        <input type="text" id="" class="form-control waypoints" value="">
      </div>
      <div class="form-group col-lg-4 mb-0">
        <label for="">End</label>
        <input type="text" id="end" class="form-control" value="<?php echo e($payload->lr_details->destinationDetails->to_poi); ?>">
      </div>
      <div class="col-12">
        <div class="form-group mt-3">
          <input id="btn" class="btn btn-primary" value="Get Directions" type="button" />
        </div>
      </div>
    </div>
  </div>
</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script> <?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/track/include/map.blade.php ENDPATH**/ ?>