<!-- home.php -->
<?php include 'layouts/header.php'; ?>

<div class="container mx-auto mt-4">
    <h1 class="text-4xl font-extrabold dark:text-white p-5"><?php echo $title; ?></h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="tableClientes" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CPF/CNPJ
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Telefone
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Endereço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ação
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Simulação de dados de clientes (substitua com sua lógica real)
              
                foreach ($clientes as $cliente) {
                    echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                    echo '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $cliente->nome . '</td>';
                    
                    // Verifica se o CPF ou CNPJ está presente e exibe o correto
                    if ($cliente->cpf !== null) {
                        echo '<td class="px-6 py-4">' . $cliente->cpf . '</td>';
                    } elseif ($cliente->cnpj !== null) {
                        echo '<td class="px-6 py-4">' . $cliente->cnpj . '</td>';
                    } else {
                        echo '<td class="px-6 py-4"></td>'; // Tratamento para caso não haja CPF/CNPJ definido
                    }
        
                    echo '<td class="px-6 py-4">' . $cliente->telefone . '</td>';
                    echo '<td class="px-6 py-4">' . $cliente->endereco . '</td>';
                    echo '<td class="px-6 py-4">';
                    echo '<a href="/mvcphp/edit/' . $cliente->id . '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center p-10">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Adicionar Cliente
        </button>
    </div>

 
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
      
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Criar Cliente
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Fechar modal</span>
                    </button>
                </div>
                <!-- Corpo do modal -->
                <div class="p-4 md:p-5 space-y-4">
                    <form id="formCriarCliente" class="w-full mx-auto">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="nome" id="nome" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="nome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nome do Cliente</label>
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="cpf_cnpj" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CPF ou CNPJ do Cliente</label>
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="tel"  name="telefone" id="telefone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="telefone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefone do Cliente (123-456-7890)</label>
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="endereco" id="endereco" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="endereco" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Endereço do Cliente</label>
                        </div>

                        <!-- Botões de ação -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</button>
                            <button type="button" id="julio" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="default-modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'layouts/footer.php'; ?>

<script>
$(document).ready(function() {

    function carregarClientes() {
        $.ajax({
            type: 'GET',
            url: '/mvcphp/getclientes',
            success: function(response) {
                console.log(response)
                if (response.success) {
                    var clientes = response.clientes;
                    var tbody = $('#tableClientes tbody');
                    tbody.empty(); 

                 
                    clientes.forEach(function(cliente) {
                        var tr = '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                        tr += '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' + cliente.nome + '</td>';
                        if (cliente.cpf) {
                            tr += '<td class="px-6 py-4">' + cliente.cpf + '</td>';
                        } else {
                            tr += '<td class="px-6 py-4">' + cliente.cnpj + '</td>';
                        }
                        tr += '<td class="px-6 py-4">' + cliente.telefone + '</td>';
                        tr += '<td class="px-6 py-4">' + cliente.endereco + '</td>';
                        tr += '<td class="px-6 py-4">';
                        tr += '<a href="/mvcphp/edit/' + cliente.id + '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>';
                        tr += '</td>';
                        tr += '</tr>';
                        tbody.append(tr); 
                    });
                } else {
                    console.error('Erro ao carregar clientes:', response.clientes);
                   
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText)
                console.error('Erro na requisição:', error);
            }
        });
    }




    $('#formCriarCliente').submit(function(event) {
        event.preventDefault(); 
        
        var formData = $(this).serialize(); 
        
        $.ajax({
            type: 'POST',
            url: '/mvcphp/create/cliente',
            data: formData,
            success: function(response) {
                console.log('Resposta do servidor:', response);
              
                carregarClientes();
                $('#formCriarCliente')[0].reset();
                $('#julio').click();
                
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição:', error);
            }
        });
    });
});
</script>
