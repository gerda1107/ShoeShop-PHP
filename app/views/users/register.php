<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="d-flex justify-content-center align-items-center registerBg p-4">

    <div class="container">
        <?php flash('register_status'); ?>
        <h2 class="text-center mt-4"><strong>PLEASE REGISTER</strong></h2>
        <form action='' method='post' autocomplete="" class="p-2 mt-4">
            <div class="row mb-3">
                <label for='name' class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['nameErr'])) ? 'is-invalid' : ''; ?>" name='name' id='name' placeholder="ex. Jenny" value="<?php echo $data['name']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['nameErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='lastname' class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['lastnameErr'])) ? 'is-invalid' : ''; ?>" name='lastname' id='lastname' placeholder="ex. Smiths" value="<?php echo $data['lastname']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['lastnameErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='email' class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['emailErr'])) ? 'is-invalid' : ''; ?>" name='email' id='email' placeholder="ex. jenny@smith.com" value="<?php echo $data['email']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['emailErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='number' class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?php echo (!empty($data['errors']['phoneErr'])) ? 'is-invalid' : ''; ?>" name='phone' id='phone' placeholder="ex. 861234567" value="<?php echo $data['phone']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['phoneErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='password' class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control <?php echo (!empty($data['errors']['passwordErr'])) ? 'is-invalid' : ''; ?>" name='password' id='password' type="password" value="<?php echo $data['password']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['passwordErr']; ?></small>
                </div>
            </div>
            <div class="row mb-3">
                <label for='confirmPassword' class="col-sm-2 col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control <?php echo (!empty($data['errors']['confirmPasswordErr'])) ? 'is-invalid' : ''; ?>" name='confirmPassword' id='confirmPassword' value="<?php echo $data['confirmPassword']; ?>">
                    <small class="error-alert"><?php echo $data['errors']['confirmPasswordErr']; ?></small>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type='submit' name="btnName" class="btn btn-dark mt-3" value="register">REGISTER</button>
            </div>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>