<?= $this->extend('Layout/template') ?>

<?= $this->section('title') ?> $title <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php foreach($clients as $client): ?>
        <li><?= $client->name ?></li>    
    <?php endforeach; ?>
<?= $this->endSection() ?>