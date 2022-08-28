<div class="card mb-4">
    <div class="card-header"> <?= $title; ?></div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($data_content as $data) : 
                $date = date("d-m-Y", strtotime($data['create_date']));
            ?>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['title']; ?></h5>
                            <div class="text-truncate-container"><p><?= $data['content']; ?></p></div>
                            <p style="margin: 0px; font-size: 12px">Category: <?= $data['category']; ?></p>
                            <p style="margin: 0px; font-size: 12px">Publish Date: <?= $date; ?></p>
                            <a class="btn btn-outline-info" href="<?= base_url('preview/article/'.$data['id'])?>" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>