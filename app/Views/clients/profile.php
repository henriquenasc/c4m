<?= $this->extend('Layout/template') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $client->company_name ?>
<?= $this->endSection() ?>
