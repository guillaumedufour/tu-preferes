<!doctype html>
<html lang="fr">
<?php require_once 'views/_includes/head.php' ?>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <?php require_once 'views/_includes/header.php' ?>

    <h1 class="mb-5"> Alors alors ... tu préfères </h1>
    <div class="form">
        <form action="" method="post">
            <input type="hidden" name="id_verb_choice1" value="<?php echo($dilemma1->id_verb) ?>">
            <input type="hidden" name="id_name_choice1" value="<?php echo($dilemma1->id_name) ?>">
            <button class="btn btn-primary" id="choice_1" type="submit"
                    name="submit_choice_1"><?php echo($dilemma1->verb.' '.$dilemma1->name); ?></button>
        </form>
    </div>

    <p class="mt-5 mb-5">Ou alors...</p>

    <div class="form">
        <form id="choice_2" action="" method="post">
            <input type="hidden" name="id_verb_choice2" value="<?php echo($dilemma2->id_verb) ?>">
            <input type="hidden" name="id_name_choice2" value="<?php echo($dilemma2->id_name) ?>">
            <button class="btn btn-secondary" type="submit"
                    name="submit_choice_2"><?php echo($dilemma2->verb.' '.$dilemma2->name); ?></button>
        </form>
    </div>

    <?php require_once 'views/_includes/footer.php' ?>
</div>

</body>
</html>