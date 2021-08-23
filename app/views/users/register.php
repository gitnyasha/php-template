<?php
require ROOT . '/views/includes/head.php';
?>

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-5 my-5 py-5">
        <h2>Register</h2>
        <form action="<?php echo PATH; ?>/users/register" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
            <span class="text-danger">
                <?php echo $data['usernameError']; ?>
            </span>
          </div>
          <div class="mb-3 form-email">
            <label class="email" for="exampleemail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleemail1">
            <span class="text-danger">
                <?php echo $data['emailError']; ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <span class="text-danger">
                <?php echo $data['usernameError']; ?>
            </span>
          </div>
          <div class="mb-3">
            <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" id="exampleInputConfirmPassword1">
            <span class="text-danger">
                <?php echo $data['confirmPasswordError']; ?>
            </span>
          </div>
          <button type="submit" class="btn btn-secondary form-control">Submit</button>
        </form>
        <br>
        <p>
            Login <a href="<?php echo PATH; ?>/users/login">Here</a>
        </p>
      </div>
    </div>
  </body>
</html>