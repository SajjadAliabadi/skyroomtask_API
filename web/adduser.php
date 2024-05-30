<?php
    $path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/layout/header.php";
    include $path;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        list($flag, $msg) = $usersDB->createUser($_POST);
        if (!$flag){
            echo "<div class='alert alert-danger'>$msg</div>";
        }else{
            echo "<div class='alert alert-success'>$msg</div>";
        }
    }

    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
?>

<h1 class="mt-3"   >
    Create new user:
</h1>
<hr>
<form class="" action="" method="post">
    <div class="form-group pt-3">
      <label for="firstname">First name</label>
      <input type="text" name="firstname"  class="form-control" value="<?= htmlspecialchars($firstname); ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last name</label>
      <input type="text" name="lastname"  class="form-control" value="<?= htmlspecialchars($lastname); ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email"  class="form-control" value="<?= htmlspecialchars($email); ?>">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile</label>
      <input type="text" name="mobile"  class="form-control" value="<?= htmlspecialchars($mobile); ?>">
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