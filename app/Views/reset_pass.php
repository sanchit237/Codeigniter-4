<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Reset Password</h1>

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

            <?php if($page_session->getFlashdata('pass_match')): ?>
            <div class="alert alert-success">
                <?= $page_session->getFlashdata('pass_match'); ?>
            </div> 
            <?php endif; ?>

            <?php if($page_session->getFlashdata('pass_not_match')): ?>
            <div class="alert alert-danger">
                <?= $page_session->getFlashdata('pass_not_match'); ?>
            </div> 
            <?php endif; ?>

            <?php if($page_session->getFlashdata('token_error')): ?>
            <div class="alert alert-danger">
                <?= $page_session->getFlashdata('token_error'); ?>
            </div> 
            <?php endif; ?>

            
            <?= form_open(); ?>

            <div class="form-group">
                <?= form_label('Enter Password'); ?>
                <?= form_password(['name'=>'res_password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_submit('submit', 'Submit',['class'=>'btn btn-primary']); ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>