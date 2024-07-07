CREATE TABLE IF NOT EXISTS `users` (
   `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
   `username` varchar(255) NOT NULL,
   `name` varchar(255) NOT NULL,
   `email` varchar(255) NOT NULL UNIQUE,  
   `password` varchar(255) NOT NULL,
   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
   
   PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `clientes` (
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    `cpf` varchar(14) DEFAULT NULL UNIQUE,  
    `cnpj` varchar(18) DEFAULT NULL UNIQUE,  
    `nome` varchar(255) NOT NULL,
    `telefone` varchar(20) DEFAULT NULL,
    `endereco` varchar(255) DEFAULT NULL,
    `user_id` int UNSIGNED NOT NULL, 
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);

CREATE TABLE IF NOT EXISTS `ordem_servico` (
   `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
   `descricao` varchar(255) NOT NULL,
   `orcamento` decimal(10,2) NOT NULL,
   `cliente_id` int UNSIGNED NOT NULL,
   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  
   PRIMARY KEY (`id`),
   FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
);
