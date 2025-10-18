<div class="modal fade" id="modalClone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title clone" id="exampleModalLabel">Clone</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="cloneForm"  class="is-alter">

      <div class="modal-body">
          <div class="mb-3">
            <label for="school_id" class="col-form-label school schoolna-title" style="font-weight: 600;">School:</label>
            <select id="school-id" class="form-select form-select-sm js-select2" data-placeholder="Select School" data-search="off" name="school_id" required data-msg="School is required">
              <option value=""></option>
            </select>
          </div>
      </div>
      
      <div class="modal-footer">
        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
         <li>
        <button type="submit" class="btn btn-md btn-primary clone"  id="clone-btn"  style="margin-right: 200px;">Clone</button>
      </li>
      </ul>
      </div>
      <input type="hidden" id="cur-school-id">
      </form>
    </div>
  </div>
</div>
