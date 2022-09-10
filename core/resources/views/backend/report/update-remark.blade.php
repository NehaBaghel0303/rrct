<!-- Modal -->
<div class="modal fade" id="updateRemark" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Remark</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="RemarkForm" action="{{route('panel.report.remark.store')}}" method="post">
            @csrf
            <div class="modal-body">
                <input type="hidden" value="{{ $type }}" name="type"> 
                <input type="hidden" value="0" name="id" id="remarkId"> 
                <input type="hidden" name="lorry_receipt_id" id="remarkLrId"> 
                <div class="form-group">
                  <label for="">Remark</label>
                  <textarea class="form-control " rows="5" name="remark" type="textarea" id="remarkText" placeholder="Enter remark here..." ></textarea>
                  {{-- <textarea name="remark" class="form-control" id="remarkText" cols="30" rows="3" placeholder="Enter Remark"></textarea> --}}
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
      </div>
    </div>
  </div>