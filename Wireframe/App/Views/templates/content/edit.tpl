<div class="modal fade" id="editContentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit_content">
        <div class="modal-body">
            <div class="alert alert-warning d-none" id="errormessage"></div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <lable class="input-group-text">Content Title</lable>
              </div>
              <input type="text" required name="content_title" class="form-control" id="content_title">
              <input type="hidden" name="id" id="id">
            </div>

            <div>
                <div class="input-group-prepend">
                    <lable class="input-group-text">Content</lable>
                </div>
                <div name="editor" id="editor"></div>
            </div>

            <div class="input-group mb-3">
                <input type="hidden" name="content" id="content">
            </div>

            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                    </div>
                    <select required class="custom-select" name="category_id" id="category_id">
                    </select>
            </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="enabled" id="customCheck1" checked>
            <label class="custom-control-label" for="customCheck1" checked>Enable</label>
        </div>
      </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary" id="submit">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
