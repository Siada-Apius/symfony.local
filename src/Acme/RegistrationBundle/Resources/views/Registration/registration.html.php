<?php
    $view->extend('::base.html.php')
?>
<div class="navbar nav-tabs">
    <div class="container border">
        <ul>
            <li><a href="/">Index</a></li>
            <li><a href="admin">Admin</a></li>
        </ul>
    </div>
</div>

<div class="well span3">
    <?php echo $view['form']->form($form) ?>
</div>
