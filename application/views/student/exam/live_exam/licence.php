<div class="modal fade" id="modalLicence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Examination</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="examinationForm"  class="is-alter">

      <div class="modal-body">
          <div class="mb-3">
            <label for="licence" class="col-form-label" style="font-weight: 600;">License Type:</label>
            <select id="licence" class="form-select js-select2 select2-hidden-accessible" name="licence_id" required data-msg="License type is required"></select>
          </div>
          <div class="mb-3">
            <label for="sub-licence"  class="col-form-label" style="font-weight: 600;">Sub License Type:</label>
             <select class="form-select js-select2 select2-hidden-accessible" name="sub-licence" id="sub-license" required data-msg="Sub License type is required">
            </select>
          </div>
      </div>
      <input type="hidden" id="language-id">
      <input type="hidden" id="language-code">
      <div class="modal-footer">
        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
         <li>
        <button type= "submit" class="btn btn-md btn-primary" onclick="attendExam();"  id="attend-btn"  style="margin-right: 200px;">Next</button>
      </li>
      </ul>
      </div>
      </form>

    </div>
  </div>
</div>
