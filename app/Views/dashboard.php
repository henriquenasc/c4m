<?= $this->extend('Layout/template') ?>

<?php $this->section('title') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
    </div>
</div>
<?= $this->endSection() ?>