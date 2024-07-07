<?php include 'layouts/header.php'; ?>

<a href="/mvcphp/home" class="flex justify-center font-medium text-blue-600 dark:text-blue-500 hover:underline">Voltar</a>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Editar Ordem de Serviço</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Quer fazer alguma alteração na ordem de serviço? Adicionar mais detalhes ou ajustar informações importantes? Sinta-se à vontade para editar conforme necessário.</p>
        <form id="editOrdemForm" class="space-y-8">
            <div>
                <label for="cliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione um Cliente</label>
                <select id="cliente" name="cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Selecione um Cliente</option>
                    <?php foreach ($clientes as $cliente) { ?>
                        <option value="<?= htmlspecialchars($cliente->id); ?>" <?= $cliente->id === $ordemServico->cliente_id ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($cliente->nome); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="orcamento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Orçamento</label>
                <input type="number" id="orcamento" name="orcamento" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" value="<?php echo $ordemServico->orcamento; ?>" required>
            </div>
            <div class="sm:col-span-2">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descrição</label>
                <textarea id="descricao" name="descricao" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."><?php echo $ordemServico->descricao; ?></textarea>
            </div>
            <button type="submit" class="py-3 px-5 text-sm w-full font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">Editar Ordem</button>
        </form>
    </div>
</section>

<?php include 'layouts/footer.php'; ?>

<script>
   
    $('#editOrdemForm').submit(function(event) {
        event.preventDefault(); 

     
        var formData = $(this).serialize();

       
        $.ajax({
            type: 'POST',
            url: '/mvcphp/editOrdem/<?php echo $ordemServico->id; ?>',
            data: formData,
            dataType: 'json', 
            success: function(response) {
                console.log('Resposta do servidor:', response);

                
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição:', error);
             
            }
        });
    });
</script>
