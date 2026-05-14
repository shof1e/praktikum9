<div class="col-9">
    <!-- Main Content -->
    <?php
    // Page Request
    $hal = $_REQUEST['hal'];
    if (!empty($hal)) {
        include_once $hal.".php";
    } else {
        include_once "home.php";
    }
    ?>
    
</div>