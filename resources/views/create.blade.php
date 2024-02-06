<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModal">Create Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card shadow">
                            <div class="card-body">
                                <form id="create_form">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name">

                                        <div class="cName text-danger" style="font-weight: bold; margin-top: 5px"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="desc" class="form-label">Description</label>
                                        <input type="text" name="desc" class="form-control" id="desc">

                                        <div class="cDesc text-danger" style="font-weight: bold; margin-top: 5px"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">

                                        <div class="cImage text-danger" style="font-weight: bold; margin-top: 5px">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="create_btn">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
