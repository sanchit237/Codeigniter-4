<?= $this->extend('layouts/bs_main') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="pb-3">Contact Form</h1>
            <?= form_open(); ?>
            <div class="form-group">
                <?= form_label('Enter Name'); ?>
                <?= form_input(['name'=>'username','class'=>'form-control'],'','','text'); ?>
            </div>
            <div class="form-group">
                <?= form_label('Enter Password'); ?>
                <?= form_password(['name'=>'password','class'=>'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Enter Mobile no.'); ?>
                <?= form_input(['name'=>'mobile','class'=>'form-control'],'','','number'); ?>
            </div>
            <div class="form-group">
                <?= form_submit('submit', 'Submit',['class'=>'btn btn-primary']); ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>