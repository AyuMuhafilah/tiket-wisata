<?= $this->include('login/header') ?>
<div class="card">
    <div class="card-body login-card-body">
        <h3 class="login-box-msg">LOGIN</h3>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $success ?>
            </div>
        <?php endif ?>
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $errors ?>
            </div>
        <?php endif ?>
        <form action="<?= base_url('login') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="social-auth-links text-center mb-3">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-block btn-primary"> Login </button>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('register') ?>" class="btn btn-block btn-danger">Register</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->include('login/footer') ?>