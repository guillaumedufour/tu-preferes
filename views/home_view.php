<!doctype html>
<html lang="en">
<?php require_once 'views/_includes/head.php' ?>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <?php require_once 'views/_includes/header.php' ?>

    <main role="main" class="inner cover">
        <h1 class="cover-heading mb-5">Oseras-tu répondre ?</h1>
        <p class="lead">tu-préfères va te proposer des dilemmes aléatoires.</p>
        <p class="lead">
            <a href="<?php echo('?page=play');?>" class="btn btn-lg btn-primary">Jouer</a>
        </p>
    </main>
    <p>ou</p>
    <p class="">
        <a href="<?php echo('?page=add');?>" class="btn btn-lg btn-secondary">Je veux ajouter mes propres dilemmes</a>
    </p>

    <?php require_once 'views/_includes/footer.php' ?>
</div>

</body>
</html>