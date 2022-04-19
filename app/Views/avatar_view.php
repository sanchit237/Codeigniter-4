<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Profile Uploading</h1>

            <?php if(isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div> 
            <?php endif; ?>

            
            <?= form_open_multipart(); ?>
            <div class="form-group">
                <?= form_label('Upload File'); ?>
                <?= form_input(['name'=>'upload','class'=>'form-control'],'','','file'); ?>
            </div>
            <div class="form-group">
                <?= form_submit('upload_submit', 'Upload',['class'=>'btn btn-primary']); ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>