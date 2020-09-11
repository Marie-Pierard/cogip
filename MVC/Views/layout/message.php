<?php 
if(isset($_SESSION['success'])) :
    foreach ($_SESSION['success'] as $success) :
?>
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <?= $success ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    endforeach;
    unset($_SESSION['success']);
endif; 
?>

<?php 
if(isset($_SESSION['error'])) :
    foreach ($_SESSION['error'] as $error) :
?>
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <?= $error ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    endforeach;
    unset($_SESSION['error']);
endif; 
?>

<?php 
if(isset($_SESSION['warning'])) :
    foreach ($_SESSION['warning'] as $warning) :
?>
    <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
        <?= $warning ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    endforeach;
    unset($_SESSION['warning']);
endif; 
?>