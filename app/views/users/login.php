<?php
require ROOT . '/views/includes/head.php';
?>

<div class="container">
  <div class="row justify-content-md-center">
  <div class="col-md-5 my-4 py-5 px-5 border bg-light shadow">
      <h2 class="text-center">
      <?php foreach($data['company'] as $row)
            {
                if ($row->image_path) {
                    echo '<img src="'.PATH.'/public/img/'. $row->image_path .'" class="img-fluid" width="200"/>';
                } else {
                    echo $row->name;
                }
            }
            ?>
      </h2>
      <hr>
      <form action="<?php echo PATH; ?>/users/login" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
          <span>
              <?php echo $data['usernameError']; ?>
          </span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          <span>
              <?php echo $data['passwordError']; ?>
          </span>
        </div>

        <button type="submit" class="btn btn-secondary form-control">Submit</button>
      </form>
      <br>
      <p>
          Register <a href="<?php echo PATH; ?>/users/register">Here</a>
      </p>
    </div>
  </div>
</div>

</body>
</html>
