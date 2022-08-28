<div class="card mb-4">
    <div class="card-header"> <?= $title; ?></div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <?php echo validation_errors(); ?>
                <?php
                    if($this->session->flashdata('success')){
                        echo $this->session->flashdata('success');
                    }else if($this->session->flashdata('error')){
                        echo $this->session->flashdata('error');
                    }
                ?>
            </div>
        </div>
        <?php echo form_open('add_new/addPost'); ?>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="add_title" size="20" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea class="form-control" rows="3" name="add_content" size="200" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="add_category" size="3" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-info" name="add_status" value="Publish">Publish</button>
                    <button type="submit" class="btn btn-outline-danger" name="add_status" value="Draft">Draft</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    </div>
</div>