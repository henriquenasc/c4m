<?= $this->extend('Layout/template') ?>

<?= $this->section('title') ?><?= $title ?><?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="page-inner">
    <h4 class="page-title">Seu Perfil</h4>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Perfil</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#files" role="tab" aria-selected="false">Arquivos</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tab" aria-labelledby="tab">
                        <form action="<?= site_url('user/update') ?>" method="post" class="card-body">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $user->name ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="email" placeholder="Name" value="<?= $user->email ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="datepicker" value="<?= date('Y-m-d', strtotime($user->date_of_birth)) ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Gênero</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="">Selecione</option>
                                            <option value="1" <?= $user->gender == 1 ? 'selected' : '' ?>>Masculino</option>
                                            <option value="2" <?= $user->gender == 2 ? 'selected' : '' ?>>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" value="<?= $user->phone ?>" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Senha</label>
                                        <input id="password" type="password" class="form-control" value="" placeholder="Nova senha..." name="password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Confirmar senha</label>
                                        <input id="confirmPassword" type="password" class="form-control" value="" placeholder="Confirmar nova senha...">
                                    </div>
                                    <div id="msg" class="badge badge-ligh font-weight-bold"></div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                <button class="btn btn-success">salvar alterações</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="files" role="tab" aria-labelledby="tab">
                        <div class="card" id="dropzone">
                            <div class="card-body">
                                <form action="user/test" method="post" class="dropzone dz-clickable" id="dropzonewidget" enctype="multipart/form-data">
                                    <div class="dz-message" data-dz-message="">
                                        <div class="icon">
                                            <i class="flaticon-file"></i>
                                        </div>
                                        <h4 class="message">Arraste e solte arquivos aqui!</h4>
                                        <div class="note">(Selecione arquivos que ainda <strong>não</strong> foram enviados...)</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile card-secondary">
                <div class="card-header" style="background-image: url('<?= base_url() ?>/assets/img/blogpost.jpg')">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url() . 'uploads/users/images/' ?><?= $user->avatar ?>" alt="image de perfil" class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name"><?= $user->name ?></div>
                        <div class="email"><?= $user->email ?></div>
                    </div>
                    <br>
                    <div class="view-profile">
                        <?php if (session()->has('errors')) : ?>
                            <div class="text-danger">
                                <?= session()->get('errors')['profile_image'] ?>
                            </div>
                        <?php endif; ?>
                        <span><?= session()->getFlashdata('success') ?></span>
                        <form action="<?= site_url('user/uploadImage/') ?><?= $user->id ?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="profile_image" class="file">
                            <button class="btn btn-secondary btn-block">Alterar foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/plugin/dropzone/dropzone.min.js')?>"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
<script>
    // $('#userUpdate').submit(function(e) {
    //     e.preventDefault();
    //     const formData = $("#userUpdate").serialize();
    //     $.ajax({
    //         url: '',
    //         method: 'post',
    //         data: formData,
    //         success: function(response) {
    //                 const message = 'Informações atualizadas com sucesso!';
    //                 const state = 'success';
    //                 getNotify(message, state);
    //             },
    //             error: function(response) {
    //                 const message = 'Erro ao atualizar as informações! Tente novamente...';
    //                 const state = 'danger';
    //                 getNotify(message, state);
    //         }
    //     });
    // });

    <?php if (session()->has('success_update')) : ?>
        getNotify("<?= session()->get('success_update') ?>", "primary");
    <?php elseif (session()->has('success_update')) : ?>
        getNotify("<?= session()->get('error_update') ?>", "danger");
    <?php elseif (session()->has('success_password_update')) : ?>
        getNotify("<?= session()->get('success_password_update') ?>", "primary");
    <?php endif; ?>

    function getNotify(message, state) {
        var content = {};
        content.title = 'Notificação';
        content.message = message;
        content.icon = 'fa fa-bell';

        $.notify(content, {
            type: state,
            placement: {
                from: 'top',
                align: 'center'
            },
            time: 1000,
            delay: 2000,
        });
    }

    $(document).ready(function() {
        $("#confirmPassword").keyup(function() {
            if ($("#password").val() !== "") {
                $("#password").val() == $("#confirmPassword").val() ?
                    $("#msg").html("As senha são iguais!").css("color", "green") :
                    $("#msg").html("As senha não são iguais!").css("color", "red");
            } else {
                $("#msg").html("");
            }
        });
    });
</script>
<?= $this->endSection() ?>