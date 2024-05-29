<?php
    include("../layout/header.php");
?>


<h1 class="mt-3">
    User management system
</h1>

<div class="d-flex flex-row-reverse">
    <a href="adduser.php" class="btn btn-success">Add new user</a>
</div>

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
        <tr>
            <th scope="row">1</th>
            <td>first</td>
            <td>last</td>
            <td>email</td>
            <td>mobile</td>
            <td>
                <a href="viewuser.php" class="btn btn-sm btn-success" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="edituser.php" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="deleteuser.php" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
    </tbody>
</table>

<?php
    include("../layout/footer.php");
?>
