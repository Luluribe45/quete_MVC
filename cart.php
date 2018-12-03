<?php require 'inc/head.php';
if (!isset($_SESSION['loginname'])) {
    header('Location: login.php');
}
?>
    <section class="cookies container-fluid">
        <div class="row">
            <?php
            foreach ($_SESSION['panier'] as $key => $value) :
                if ($key == 46) {
                    echo 'mon panier comporte ' . $value . ' Pecan nuts' . '</br>';
                }
                if ($key == 36) {
                    echo 'mon panier comporte ' . $value . ' Chocolate chips' . '</br>';
                }
                if ($key == 58) {
                    echo 'mon panier comporte ' . $value . ' Chocolate cookie' . '</br>';
                }
                if ($key == 32) {
                    echo 'mon panier comporte ' . $value . ' M&M\'s cookie' . '</br>';
                }
            endforeach; ?>
        </div>
        <div>

        </div>
    </section>
<?php require 'inc/foot.php'; ?>