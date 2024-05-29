<?php
    include("../layout/header.php");
?>

<h1 class="mt-3"   >
    Create new user:
</h1>
<hr>
<form class="" action="" method="post">
    <div class="form-group pt-3">
      <label for="firstname">First name</label>
      <input type="text" name="firstname"  class="form-control">
    </div>
    <div class="form-group">
      <label for="lastname">Last name</label>
      <input type="text" name="lastname"  class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email"  class="form-control">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile</label>
      <input type="text" name="mobile"  class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group mt-3">
      <button type="submit" name="register" class="btn btn-success">Register</button>
      <button type="reset" name="reset" class="btn btn-info">Reset</button>
        <a href="index.php" class="btn btn-secondary">Home</a>
    </div>
</form>

<?php
include("../layout/footer.php");
?>