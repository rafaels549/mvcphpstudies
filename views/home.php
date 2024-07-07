<!-- home.php -->
<?php include 'layouts/header.php'; ?>

<div class="container mx-auto mt-4">
    <h1 class="text-3xl font-bold">Usuários</h1>
   
    <!-- Conteúdo da página -->
    <?php foreach ($users as $user): ?>
        <div class="bg-gray-100 p-4 my-2 rounded-md">
            <h2 class="text-xl font-semibold"><?php echo $user->name; ?></h2>
            <p class="text-gray-600"><?php echo $user->email; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'layouts/footer.php'; ?>
