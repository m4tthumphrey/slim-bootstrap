<?php include_once TEMPLATE_DIR.'/head.php'; ?>

<body>

    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <ul class="nav">
                    <li><a href="/route1">Route 1</a></li>
                    <li><a href="/route2">Route 2</a></li>
                    <li><a href="/route3">Route 3</a></li>
                </ul>
            </div>
        </div>

    <div class="container-fluid">

    <?php if (isset($flash['error'])) : ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
      <?php echo $flash['error'] ?>
    </div>
    <?php endif;?>

<?php if (isset($flash['ok'])) : ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
      <?php echo $flash['ok'] ?>
    </div>
<?php endif;?>