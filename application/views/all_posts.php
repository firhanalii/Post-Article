<div class="card mb-4">
    <div class="card-header"> <?= $title; ?></div>
    <div class="card-body">
        <div class="row">
            <div class="tab-content rounded-bottom">
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1077">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="published-tab" data-coreui-toggle="tab" data-coreui-target="#published" type="button" role="tab" aria-controls="published" aria-selected="true">Published (<?=$count_publish;?>)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="drafts-tab" data-coreui-toggle="tab" data-coreui-target="#drafts" type="button" role="tab" aria-controls="drafts" aria-selected="false">Drafts (<?=$count_draft;?>)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="trashed-tab" data-coreui-toggle="tab" data-coreui-target="#trashed" type="button" role="tab" aria-controls="trashed" aria-selected="false">Trashed (<?=$count_thrash;?>)</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="published" role="tabpanel" aria-labelledby="published-tab">
                        <table id="dt_publish" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="drafts" role="tabpanel" aria-labelledby="drafts-tab">
                        <table id="dt_draft" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="trashed" role="tabpanel" aria-labelledby="trashed-tab">
                        <table id="dt_thrash" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal Publish -->
<div class="modal fade" id="idModalEditPublish" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="statiidModalEditPublish" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="idModalEditPublishLabel">Edit</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                <input type="hidden" id="idEditModal" name="nameEditModal">
            </div>
            <div class="modal-body" id="dataEditPublish"></div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-coreui-dismiss="modal">Close</button>
                <button class="btn btn-outline-info" type="button">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="idModalDeletePublish" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="idModalDeletePublish" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('all_posts/action_publish/delete'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="idModalDeletePublishLabel">Delete</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" id="valDelPublish" name="nameDeletePublish">
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this data?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-outline-info" type="submit">Yas!</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- Modal Draft -->
<div class="modal fade" id="idModalEditDraft" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="statiidModalEditDraft" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="idModalEditDraftLabel">Edit</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                <input type="hidden" id="idEditModal" name="nameEditModal">
            </div>
            <div class="modal-body" id="dataEditDraft"></div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-coreui-dismiss="modal">Close</button>
                <button class="btn btn-outline-info" type="button">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="idModalDeleteDraft" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="idModalDeleteDraft" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="idModalDeleteDraftLabel">Delete</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                <input type="hidden" id="valDelDraft" name="nameDeleteDraft">
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data?
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-coreui-dismiss="modal">Close</button>
                <button class="btn btn-outline-info" type="button">Yas!</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thrash -->
<div class="modal fade" id="idModalEditThrash" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="statiidModalEditThrash" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="idModalEditThrashLabel">Edit</h5>
                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                <input type="hidden" id="idEditModal" name="nameEditModal">
            </div>
            <div class="modal-body" id="dataEditThrash"></div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-coreui-dismiss="modal">Close</button>
                <button class="btn btn-outline-info" type="button">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="idModalDeleteThrash" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="idModalDeleteThrash" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('all_posts/action_thrash/delete'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="idModalDeleteThrashLabel">Delete</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" id="valDelThrash" name="nameDeleteThrash">
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this data?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" type="button" data-coreui-dismiss="modal">Close</button>
                    <button class="btn btn-outline-info" type="button">Yas!</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>