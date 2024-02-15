<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier des taches</title>
</head>
<body>
    <div>
        <ul>
            <li>
                <a href="<?php echo e(route('taches.index')); ?>"> List des taches </a>
            </li>
            <li>
                <a href="<?php echo e(route('taches.create')); ?>"> Ajouter une tache </a>
            </li>
        </ul>
    </div>
    <h3>Modifier une tache</h3>
    <form method="post" action="<?php echo e(route('taches.update',$tache->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <label for="titre">Titre:</label>
        <input type="text" name="titre" value="<?php echo e($tache->titre); ?>">
        <label for="description">Description:</label>
        <input type="text" name="description" value="<?php echo e($tache->description); ?>">
        
        <input type="radio" id="termine" name="etat" value="termine">
        <label for="Terminé">Terminé</label>
        <input type="radio" id="non termine" name="etat" value="non termine">
        <label for="Non terminé">Non terminé</label>

        <div>
            <input type="submit" value="Modifier la tache">
        </div>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\todoList\resources\views/modifier.blade.php ENDPATH**/ ?>