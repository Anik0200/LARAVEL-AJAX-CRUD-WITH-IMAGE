<div class="modal fade" id="upModal" tabindex="-1" aria-labelledby="upModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="upModal">Update Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card shadow">
                            <div class="card-body">
                                <form id="update_form">
                                    <input type="hidden" name="upId" value="" id="upId">
                                    <div class="mb-3">
                                        <label for="upName" class="form-label">Name</label>
                                        <input type="text" name="upName" class="form-control" id="upName">

                                        <div class="upName text-danger" style="font-weight: bold; margin-top: 5px">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="upDesc" class="form-label">Description</label>
                                        <input type="text" name="upDesc" class="form-control" id="upDesc">

                                        <div class="upDesc text-danger" style="font-weight: bold; margin-top: 5px">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="upImage" class="form-label">Image</label>
                                        <input type="file" name="upImage" class="form-control" id="upImage">

                                        <div class="upImage text-danger" style="font-weight: bold; margin-top: 5px">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="update_btn">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
