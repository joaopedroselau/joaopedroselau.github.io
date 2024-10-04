

CREATE TABLE `cadastro` (
  `nome` varchar(60) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

