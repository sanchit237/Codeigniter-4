<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<?php if($page_session->has('unid')): ?>
    <div class="alert alert-success">
        <?= $page_session->get('unid'); ?>
    </div> 
<?php endif; ?>

<?= $this->endSection() ?>