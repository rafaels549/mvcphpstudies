
<?php include 'layouts/header.php'; ?>

<div class="container mx-auto mt-4">
<h1 class="text-4xl font-extrabold dark:text-white p-5"><?php echo $title; ?></h1>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="tableOrdens" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Descrição
            </th>
            <th scope="col" class="px-6 py-3">
                CPF/CNPJ
            </th>
            <th scope="col" class="px-6 py-3">
                Nome 
            </th>
            <th scope="col" class="px-6 py-3">
                Telefone 
            </th>
            <th scope="col" class="px-6 py-3">
                Orçamento
            </th>
            <th scope="col" class="px-6 py-3">
                Ação
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ordens_servico as $ordem_servico) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $ordem_servico->descricao_ordem_servico ?>
                </td>
                <td class="px-6 py-4">
                    <?php
                    // Verifica se é pessoa física (CPF) ou pessoa jurídica (CNPJ)
                    if ($ordem_servico->cliente_cpf !== null) {
                        echo $ordem_servico->cliente_cpf;
                    } elseif ($ordem_servico->cliente_cnpj !== null) {
                        echo $ordem_servico->cliente_cnpj;
                    } else {
                        echo ''; // Tratamento para caso não haja CPF/CNPJ definido
                    }
                    ?>
                </td>
                <td class="px-6 py-4">
                    <?= $ordem_servico->nome_cliente ?>
                </td>
                <td class="px-6 py-4">
                    <?= $ordem_servico->cliente_telefone ?>
                </td>
                <td class="px-6 py-4">
                    <?= $ordem_servico->orcamento ?>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                    <a href="/mvcphp/ordem/<?= $ordem_servico->id ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    <button type="button"  data-ordem-id="<?= $ordem_servico->id ?>"   class="font-medium text-red-600 dark:text-red-500 hover:underline delete-btn">Deletar</button>
                    </div>
                    

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>


    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Você tem certeza que quer deletar essa ordem de serviço?</h3>
                <button type="button" id="confirmDeleteBtn"  class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Deletar</button>
                <button id="triggerDeleteModal2" data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Não, cancelar</button>
            </div>
        </div>
    </div>
</div>

<button type="button"  id="triggerDeleteModal3" data-modal-target="popup-modal" data-modal-toggle="popup-modal"  class="sr-only font-medium text-red-600 dark:text-red-500 hover:underline"></button>
    <div class="flex justify-center p-10">
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Adicionar Ordem de Serviço
    </button>
    </div>

    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
       
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
         
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Criar Nova Ordem de Serviço
                    </h3>
                    <button id="triggerDeleteModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="formulario" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione um cliente</label>
                            <select id="countries" name="cliente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Selecione um Cliente</option>
                                <?php foreach ($clientes as $cliente) { ?>
        <option value="<?php echo htmlspecialchars($cliente->id); ?>">
            <?php echo htmlspecialchars($cliente->nome); ?>
        </option>
    <?php } ?>
                            </select>
                        </div>
                        <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orçamento</label>
                        <input type="number" name="orcamento" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                    </div>
                       
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                            <textarea id="description" name="descricao" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descrição da Ordem de Serviço"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Adicionar Ordem de Serviço
                    </button>
                </form>
            </div>
        </div>
    </div>


</div>

<?php include 'layouts/footer.php'; ?>

<script>
 

 $(document).ready(function() {
    carregarOrdemServico();

    // Delegação de eventos para botões de deletar
    $(document).on('click', '.delete-btn', function() {
        $('#triggerDeleteModal3').click();
        var ordemId = $(this).data('ordem-id');
        $('#confirmDeleteBtn').data('ordem-id', ordemId);
    });

    $('#confirmDeleteBtn').on('click', function() {
        var ordemId = $(this).data('ordem-id'); // Obtém o ID da ordem de serviço a ser deletada

        $.ajax({
            type: 'DELETE',
            url: '/mvcphp/deleteOrdem/' + ordemId,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#triggerDeleteModal2').click();
                    carregarOrdemServico();
                } else {
                    alert('Erro ao deletar ordem de serviço.'); // Exibe mensagem de erro, se houver
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição:', error);
                alert('Erro ao processar a requisição.');
            }
        });
    });

    $('#formulario').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/mvcphp/create/ordem_servico',
            data: formData,
            success: function(response) {
                console.log('Resposta do servidor:', response);

                $('#formulario')[0].reset();
                $('#triggerDeleteModal').click();
                carregarOrdemServico();
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição:', error);
            }
        });
    });
});

function carregarOrdemServico() {
    $.ajax({
        type: 'GET',
        url: '/mvcphp/getordensServico',
        success: function(response) {
            if (response.success) {
                var ordens = response.ordensServico;
                var tbody = $('#tableOrdens tbody');
                tbody.empty();

                ordens.forEach(function(ordem) {
                    var tr = '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                    tr += '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + ordem.descricao_ordem_servico + '</td>';

                    // Verifica se é pessoa física (CPF) ou pessoa jurídica (CNPJ)
                    if (ordem.cliente_cpf !== null) {
                        tr += '<td class="px-6 py-4">' + ordem.cliente_cpf + '</td>';
                    } else if (ordem.cliente_cnpj !== null) {
                        tr += '<td class="px-6 py-4">' + ordem.cliente_cnpj + '</td>';
                    } else {
                        tr += '<td class="px-6 py-4"></td>'; // Tratamento para caso não haja CPF/CNPJ definido
                    }

                    tr += '<td class="px-6 py-4">' + ordem.nome_cliente + '</td>';
                    tr += '<td class="px-6 py-4">' + ordem.cliente_telefone + '</td>';
                    tr += '<td class="px-6 py-4">' + ordem.orcamento + '</td>';
                    tr += '<td class="px-6 py-4">';
                    tr += '<div class="flex gap-2">';
                    tr += '<a href="/mvcphp/ordem/' + ordem.id + '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>';
                    tr += '<button type="button" data-ordem-id="' + ordem.id + '" class="font-medium text-red-600 dark:text-red-500 hover:underline delete-btn">Deletar</button>';
                    tr += '</div>';
                    tr += '</td>';
                    tr += '</tr>';
                    tbody.append(tr);
                });
            } else {
                console.log(response);
                console.error('Erro ao carregar ordens de serviço:', response.ordensServico);
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição:', error);
        }
    });
}


</script>