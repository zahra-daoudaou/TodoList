<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List des taches</title>
    <!--<style>
        .pagination {
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>-->
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

    <!--<input type="search" name="search" id="search" value="<?php echo e(request('search')); ?>">

    <ul>
        <?php $__empty_1 = true; $__currentLoopData = $taches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tache): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li><?php echo e($tache->titre); ?></li>
        <li><?php echo e($tache->description); ?></li>
        <li><?php echo e($tache->etat); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li>Tache non trouvable!</li>
        <?php endif; ?>
    </ul>-->

    <form action="<?php echo e(route('taches.index')); ?>" method="get">

        <label for="filter">Filtrer par état :</label>

        <select name="filter" id="filter">
            <option value="">Tous</option>
            <option value="terminé" <?php echo e($filter === 'termine' ? 'selected' : ''); ?>>Terminées</option>
            <option value="not_completed" <?php echo e($filter === 'non termine' ? 'selected' : ''); ?>>Non terminées</option>
        </select>

        <button type="submit">Filtrer</button>
    </form>

    <div>
        <?php if(session()->has('success')): ?>
        <div>
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
    </div>

    <h3>List des Taches</h3>

    <table rules="all" border="1" >
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>état</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $taches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tache): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td> <?php echo e($tache->id); ?> </td>
        <td><?php echo e($tache->titre); ?></td>
        <td><?php echo e($tache->description); ?></td>
        <td><?php echo e($tache->etat); ?></td>
        <td>
        <a href="<?php echo e(route('taches.edit', $tache->id)); ?>">modifier</a>
        </td>
        <td>
        <form method="post" action="<?php echo e(route('taches.destroy',$tache->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input type="submit" value="supprimer">
        </form>
        </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <td>tache non trouvable!</td>
        </tr>
    <?php endif; ?>
    </table>
    <form action="<?php echo e(route('taches.create')); ?>">
        <input type="submit" value="Ajouter une tache">
    </form>

    <?php echo e($taches->links()); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\todoList\resources\views/index.blade.php ENDPATH**/ ?>