<?= $this->include('login/header') ?>
<div class="card">
    <div class="card-body login-card-body">
        <h3 class="login-box-msg">REGISTER</h3>
        <form action="<?= base_url('register/store') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= old('username') ?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <?= (isset($errors['username'])) ? "<p class=error-message>$errors[username]</p>" : '' ?>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?= old('password') ?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <?= (isset($errors['password'])) ? "<p class=error-message>$errors[password]</p>" : '' ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= old('nama') ?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-address-card"></span>
                    </div>
                </div>
            </div>
            <?= (isset($errors['nama'])) ? "<p class=error-message>$errors[nama]</p>" : '' ?>
            <div class="input-group mb-3">
                <input type="number" min='0' maxlength="15" name="no_hp" class="form-control" value="<?= old('no_hp') ?>" placeholder="No Hp" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>
            <?= (isset($errors['no_hp'])) ? "<p class=error-message>$errors[no_hp]</p>" : '' ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?= old('email') ?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <?= (isset($errors['email'])) ? "<p class=error-message>$errors[email]</p>" : '' ?>
            <div class="social-auth-links text-center mb-3">
                <button type="submit" class="btn btn-block btn-primary"> Register </button>
            </div>
        </form>
    </div>
</div>

<?= $this->include('login/footer') ?>