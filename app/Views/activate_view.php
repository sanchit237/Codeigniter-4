<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Activation</h1>

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
            
            <?php if(isset($success)): ?>
            <div class="alert alert-danger">
                <?= $success ?>
            </div> 
            <?php endif; ?>

            <?php if(isset($act_fail)): ?>
            <div class="alert alert-danger">
                <?= $act_fail ?>
            </div> 
            <?php endif; ?>
    
        </div>
    </div>
</div>

<?= $this->endSection() ?>