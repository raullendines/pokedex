<?php if (isset($_SESSION['correcto'])) { ?>
    <div class="alert alert-danger alert-dismissable fade show d-flex" role="alert" id="alert">
        <p>
            <?php
            echo $_SESSION["correcto"];
            unset($_SESSION["correcto"]);
            ?>
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p>
        <i class="fas fa-exclamation-circle fa-lg"></i>

            <?php
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
            ?>
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


