<?php
$path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/layout/header.php");
include $path;

    if (!isset($_GET['id'])) {
        header("location:index.php");
    }

    $user= $usersDB->getUserById($_GET['id']);
    $firstname = isset($user->Firstname) ? $user->Firstname : '';
    $lastname = isset($user->Lastname) ? $user->Lastname : '';
    $email = isset($user->Email) ? $user->Email : '';
    $mobile = isset($user->Mobile) ? $user->Mobile : '';
    $password = isset($user->Password) ? $user->Password : '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            list($flag, $msg) = $usersDB->updateUser($user->id, $_POST);
            if (!$flag){
                echo "<div class='alert alert-danger'>$msg</div>";
            }else{
                echo "<div class='alert alert-success'>$msg</div>";
            }
    }
?>

<h1 class="mt-3"   >
    Edit user:
</h1>
<hr>
    <form class="" action="" method="post">
        <div class="form-group pt-3">
            <label for="firstname">First name</label>
            <input type="text" name="firstname"  class="form-control" value="<?= $firstname; ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Last name</label>
            <input type="text" name="lastname"  class="form-control" value="<?= $lastname; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email"  class="form-control" value="<?= $email; ?>">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile"  class="form-control" value="<?= $mobile; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" value="<?= $password; ?>">
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