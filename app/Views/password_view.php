<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Change Password</h1>

            <?php if(isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div> 
            <?php endif; ?>

            <?php if($page_session->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= $page_session->getFlashdata('success'); ?>
            </div> 
            <?php endif; ?>

            <?php if($page_session->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $page_session->getFlashdata('error'); ?>
            </div> 
            <?php endif; ?>
            
            <?= form_open(); ?>
            <?= form_label('Enter Old Password'); ?>
                <?= form_password(['name'=>'old_password','class'=>'form-control']); ?>
            <div class="form-group">
                <?= form_label('Enter New Password'); ?>
                <?= form_password(['name'=>'new_password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Confirm New Password'); ?>
                <?= form_password(['name'=>'conf_password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_submit('pass_submit', 'Submit',['class'=>'btn btn-primary']); ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>