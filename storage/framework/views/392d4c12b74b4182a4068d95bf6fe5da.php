<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des taches</title>
</head>
<body>
<div>
        <ul>
            <li>
                <a href="<?php echo e(route('taches.index')); ?>"> List des taches </a>
            </li>
        </ul>
    </div>

    <h3>Ajouter une tache</h3>

    <form method="post" action="<?php echo e(route('taches.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
        <label for="titre">Titre:</label>
        <input type="text" name="titre">
        <label for="description">Description:</label>
        <input type="text" name="description">

        <input type="radio" id="termine" name="etat" value="termine">
        <label for="Terminé">Terminé</label>
        <input type="radio" id="non termine" name="etat" value="non termine">
        <label for="Non terminé">Non terminé</label>

        <div>
            <input type="submit" value="Ajouter la tache">
        </div>

        <div>
            <?php if($errors->all()): ?>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <?php echo e($error); ?> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </div>

    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\todoList\resources\views/create.blade.php ENDPATH**/ ?>