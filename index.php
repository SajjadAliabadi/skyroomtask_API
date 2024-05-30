<?php
    $path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/layout/header.php";
    include $path;
?>

    <div class="d-flex justify-content-center mt-5">
        <div class="col-4">
            <div class="card p-3">
                <img src="./public/images/usermange.jfif" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title mb-5"> User management system</h5>
                </div>
                <a href="web" class="btn btn-primary btn-block ">WEB</a>
                <a href="api" class="btn btn-secondary  btn-block mt-1">API</a>
            </div>
        </div>
    </div>


<?php
    include "layout/footer.php";
?>