<?php
    include("../layout/header.php");
?>

<h1 class="mt-3">
    User management system
</h1>

<div class="d-flex flex-row-reverse">
    <a href="adduser.php" class="btn btn-success">Add new user</a>
</div>

<?php
    $allUsers=$usersDB->getAllUsers();
    if(!$allUsers){
        echo "<h5 class='text-center mt-4'>No users have been registered in the database yet.</h5>";
    }else{
 ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach($allUsers as $user){
            ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $user->Firstname ?></td>
                    <td><?= $user->Lastname ?></td>
                    <td><?= $user->Email ?></td>
                    <td><?= $user->Mobile ?></td>
                    <td>
                        <a href="viewuser.php?id=<?= $user->id ?>" class="btn btn-sm btn-success" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="edituser.php?id=<?= $user->id ?>"" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="deleteuser.php?id=<?= $user->id ?>"" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php
            }
            }
            ?>
    </tbody>
</table>

<?php
    include("../layout/footer.php");
?>
