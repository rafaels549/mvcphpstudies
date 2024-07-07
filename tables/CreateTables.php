<?php

$database = new Database();


$sql_users = "CREATE TABLE IF NOT EXISTS `users` (
   `id` integer NOT NULL AUTO_INCREMENT,
   `username` varchar(255) NOT NULL,
   `name` varchar(255) NOT NULL,
   `email` varchar(255) NOT NULL,
   `password` varchar(255) NOT NULL,
   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
   `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   PRIMARY KEY (`id`)
)";






$sql_clientes = "CREATE TABLE IF NOT EXISTS `clientes` (
    `id` integer NOT NULL AUTO_INCREMENT,
    `cpf` varchar(14) DEFAULT NULL,
    `cnpj` varchar(18) DEFAULT NULL,
    `nome` varchar(255) NOT NULL,
    `telefone` varchar(20) DEFAULT NULL,
    `endereco` varchar(255) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
)";

$sql_ordem_servico = "CREATE TABLE IF NOT EXISTS `ordem_servico` (
   `id` integer UNSIGNED NOT NULL AUTO_INCREMENT,
   `descricao` varchar(255) NOT NULL,
   `preco_total` decimal(10,2) NOT NULL,
   `cliente_id` bigint(20) UNSIGNED NOT NULL,
   `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
   `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   PRIMARY KEY (`id`),
   FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
)";

$database->getQuery($sql_users);
$database->getQuery($sql_clientes);
$database->getQuery($sql_ordem_servico);
