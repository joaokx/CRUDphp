SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `joaopedro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `joaopedro`;



CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `caracteristicas` (`id`, `nome`) VALUES
(1, 'esporte'),
(2, 'classico'),
(3, 'turbo'),
(4, 'economico'),
(5, 'para cidade'),
(6, 'para longas viagens');



CREATE TABLE `caracteristicas_veiculos` (
  `idCaracteristica` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `nroChassi` varchar(17) NOT NULL,
  `marca` varchar(1000) NOT NULL,
  `modelo` varchar(1000) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `cor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `caracteristicas_veiculos`
  ADD PRIMARY KEY (`idCaracteristica`,`idVeiculo`),
  ADD KEY `fk_veiculo` (`idVeiculo`);


ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `caracteristicas_veiculos`
  ADD CONSTRAINT `fk_caracteristica` FOREIGN KEY (`idCaracteristica`) REFERENCES `caracteristicas` (`id`),
  ADD CONSTRAINT `fk_veiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `veiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;