<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Login</h1>

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

            <?php if($page_session->getFlashdata('status_error')): ?>
            <div class="alert alert-danger">
                <?= $page_session->getFlashdata('status_error'); ?>
            </div> 
            <?php endif; ?>

            
            <?= form_open('Login'); ?>
            <div class="form-group">
                <?= form_label('Enter Email'); ?>
                <?= form_input(['name'=>'log_email','class'=>'form-control'],'','','email'); ?>
            </div>
            <div class="form-group">
                <?= form_label('Enter Password'); ?>
                <?= form_password(['name'=>'log_password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_submit('log_submit', 'Login',['class'=>'btn btn-primary']); ?>
                <a href="Dashboard/forgot_pass" class="btn btn-outline-success">Forgot Password ?</a>
            </div>
            <!-- <div class="form-group">
                <a href="#" class="btn btn-outline-success">Login with Google</a>
                <a href="#" class="btn btn-outline-success">Login with facebook</a>
            </div> -->
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>