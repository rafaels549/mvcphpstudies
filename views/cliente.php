<?php include 'layouts/header.php'; ?>
<!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->


<a href="/mvcphp/clientes" class=" flex justify-center p-5 font-medium text-blue-600 dark:text-blue-500 hover:underline">Voltar para a Tela de Clientes</a>


<form class="max-w-2xl p-10 flex flex-col   mx-auto" id="formulario">
 
  
  

    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="nome" value ="<?php echo $cliente->nome?>" id="nome" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="nome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nome</label>
    </div>
  


    <div class="relative z-0 w-full mb-5 group">
        <input type="tel"  value="<?php echo $cliente->telefone ?>" name="telefone" id="telefone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="telefone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefone</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="cpf_cnpj" value="<?php echo isset($cliente->cpf) ? $cliente->cpf : (isset($cliente->cnpj) ? $cliente->cnpj : ''); ?>" id="cpf_cnpj" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="cpf_cnpj" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CPF/CNPJ</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="endereco" value="<?php echo $cliente->endereco; ?>" id="endereco" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="endereco" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Endereço</label>
    </div>

  <button type="submit" id="editar_cliente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar Cliente</button>
</form>






<?php include 'layouts/footer.php'; ?>

<script>
  $(document).ready(function() {
    $('#editar_cliente').click(function(event) {
      event.preventDefault();

      var formData = $('#formulario').serialize();
      var idCliente = <?php echo $cliente->id; ?>; 
      
      $.ajax({
        url: '/mvcphp/editCliente/' + idCliente,
        type: 'PUT',
        data: formData,
        success: function(response) {
          console.log(response)
          
        },
        error: function(xhr, status, error) {
          console.error('Erro ao editar cliente:', error);
          alert('Erro ao editar cliente. Verifique o console para mais detalhes.');
        }
      });
    });
  });
</script>
