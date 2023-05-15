<?= $this->extend('Layout/template') ?>

<?= $this->section('styles') ?>
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tabela de clientes</h4>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de clientes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Razão Social</th>
                                <th>Nome Fantasia</th>
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Razão Social</th>
                                <th>Nome Fantasia</th>
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
<script>
    $('#multi-filter-select').DataTable({
        "ajax": "<?= site_url('clients/getAllClients') ?>",
        "columns": [{
                "data": "company"
            },
            {
                "data": "company_name"
            },
            {
                "data": "cnpj_cpf"
            },
            {
                "data": "email"
            },
            {
                "data": "active"
            },
        ],
        "deferRender": true,
        "processing": true,
        "language": {
            "url": "<?= base_url('/assets/js/datatable-translate/pt_br.json') ?>",
        },
        "responsive": true,
        "pagingType": $(window).width() < 765 ? "simple" : "simple_numbers",
    });
</script>
<?= $this->endSection() ?>