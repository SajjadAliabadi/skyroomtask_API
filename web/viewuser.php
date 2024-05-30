<?php
    $path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/layout/header.php";
    include $path;

    if (!isset($_GET['id'])) {
        header("Location: index.php");
    }

    $user=$usersDB->getUserById($_GET['id']);
?>

<h1 class="mt-3"   >
    View user info:
</h1>
<hr>
<form class="" action="" method="post">
    <div class="form-group pt-3">
      <label for="firstname">First name</label>
      <input type="text" name="firstname"  class="form-control" readonly value="<?= $user->Firstname ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last name</label>
      <input type="text" name="lastname"  class="form-control" readonly value="<?= $user->Lastname ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email"  class="form-control" readonly value="<?= $user->Email ?>">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile</label>
      <input type="text" name="mobile"  class="form-control" readonly value="<?= $user->Mobile ?>">
    </div>
    <div class="form-group mt-3">
        <a href="index.php" class="btn btn-secondary">Home</a>
    </div>
</form>

<?php
include("../layout/footer.php");
?>