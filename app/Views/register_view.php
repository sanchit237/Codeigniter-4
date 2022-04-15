<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Register Form</h1>

            <?php if(isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div> 
            <?php endif; ?>

            <?php if($page_session->getFlashdata('reg_success')): ?>
            <div class="alert alert-success">
                <?= $page_session->getFlashdata('reg_success'); ?>
            </div> 
            <?php endif; ?>

            <?php if($page_session->getFlashdata('reg_failure')): ?>
            <div class="alert alert-danger">
                <?= $page_session->getFlashdata('reg_failure'); ?>
            </div> 
            <?php endif; ?>
            
            <?= form_open('Register'); ?>
            <div class="form-group">
                <?= form_label('Enter Name'); ?>
                <?= form_input(['name'=>'reg_username','class'=>'form-control'],'','','text'); ?>
            </div>
            <div class="form-group">
                <?= form_label('Enter Email'); ?>
                <?= form_input(['name'=>'reg_email','class'=>'form-control'],'','','email'); ?>
            </div>
            <div class="form-group">
                <?= form_label('Enter Password'); ?>
                <?= form_password(['name'=>'reg_password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Confirm Password'); ?>
                <?= form_password(['name'=>'reg_Conf_password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Enter Mobile no.'); ?>
                <?= form_input(['name'=>'reg_mobile','class'=>'form-control'],'','','number'); ?>
            </div>
            <div class="form-group">
                <?= form_submit('reg_submit', 'Submit',['class'=>'btn btn-primary']); ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>