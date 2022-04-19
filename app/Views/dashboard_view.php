<?php $page_session = \Config\Services::session(); ?>

<?= $this->extend('layouts/bs_main') ?>


<?= $this->section('content') ?>

<?php if($page_session->has('unid')): ?>
    <div class="alert alert-success">
        <?= $page_session->get('unid'); ?>
    </div> 
<?php endif; ?>

<h1>Username :- <?= $dashcont['username']; ?></h1>
<h1>email :- <?= $dashcont['email']; ?></h1>
<h1>Mobile :- <?= $dashcont['mobile']; ?></h1>
<img src="<?= $dashcont['profile_pic'];?>" alt="">

<?= $this->endSection() ?>