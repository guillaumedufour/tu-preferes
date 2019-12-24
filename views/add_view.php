<!doctype html>
<html lang="en">
<?php require_once 'views/_includes/head.php' ?>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <?php require_once 'views/_includes/header.php' ?>

    <h1>Tu préfères </h1>
    <form id="add_dilemma" action="<?php echo('?page=add'); ?>" method="post">

        <div class="form-group">
            <input type="text" class="form-control" id="verb" placeholder="(ex: manger)" name="verb">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="...un cornet de glace ?" name="name">
        </div>

        <h1>Ou...</h1>

        <div class="form-group">
            <input type="text" class="form-control" id="verb2" placeholder="(ex: boire)" name="verb2">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="name2" placeholder="...du champagne ?" name="name2">
        </div>

        <button type="submit" class="btn btn-primary mb-2" name="new_dilemma" value="1">Je soumet</button>
    </form>
    <?php require_once 'views/_includes/footer.php' ?>
</div>

</body>
</html>