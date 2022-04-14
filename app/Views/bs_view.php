<?= $this->extend('layouts/bs_main') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Hello, world!</h1>
                <ul>
                    <?php /*
                    <?php foreach($mod_result as $result): ?>
                        <li><?php echo $result; ?></li> 
                        <?php 
                    endforeach;
                    ?> 
                    */?>
                </ul>
                <ul>
                    <?php foreach($display as $result1): ?>
                        <li><?php echo $result1->id; ?></li>
                        <li><?php echo $result1->name; ?></li>
                        <li><?php echo $result1->age; ?></li>
                    <?php 
                    endforeach;
                    ?>    
                </ul>
            </div>
        </div>
    </div>
    
<?= $this->endSection() ?>
