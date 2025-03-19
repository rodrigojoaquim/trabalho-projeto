-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para loja
CREATE DATABASE IF NOT EXISTS `loja` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `loja`;

-- A despejar estrutura para tabela loja.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `preco` float NOT NULL DEFAULT 0,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `descricao` text NOT NULL,
  `img` tinytext NOT NULL DEFAULT 'img/no_image.png',
  `class` tinytext DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela loja.produtos: ~54 rows (aproximadamente)
INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `quantidade`, `descricao`, `img`, `class`) VALUES
	(62, 'Arduino Uno', 22.99, 100, 'Placa de desenvolvimento Arduino Uno', 'img/no_image.png', 'novidade'),
	(63, 'Sensor de Temperatur', 5.5, 200, 'Sensor para medir a temperatura', 'img/no_image.png', 'novidade'),
	(64, 'Servo Motor', 15.99, 50, 'Motor de servo de 9g', 'img/no_image.png', 'novidade'),
	(65, 'Resistência 220Ω', 0.1, 1000, 'Resistência de 220 Ohms', 'img/no_image.png', NULL),
	(66, 'Sensor de Distância ', 3.99, 300, 'Sensor para medir distância com ultrassom', 'img/no_image.png', 'eletronicos'),
	(67, 'Arduino Mega', 45.99, 80, 'Placa de desenvolvimento Arduino Mega', 'img/no_image.png', NULL),
	(68, 'Sensor de Umidade', 6.5, 150, 'Sensor para medir a umidade do solo', 'img/no_image.png', NULL),
	(69, 'Motor de Passo', 10.99, 120, 'Motor de passo 28BYJ-48', 'img/no_image.png', 'eletronicos'),
	(70, 'Display LCD 16x2', 4.99, 250, 'Display LCD 16x2 com interface I2C', 'img/no_image.png', NULL),
	(71, 'Módulo Relé', 2.99, 500, 'Módulo de relé para controle de dispositivos', 'img/no_image.png', NULL),
	(72, 'Sensor de Movimento ', 3.49, 180, 'Sensor de movimento PIR para automação', 'img/no_image.png', 'novidade'),
	(73, 'Sensor de Gás', 8.99, 90, 'Sensor MQ-2 para detecção de gases', 'img/no_image.png', NULL),
	(74, 'Buzzer', 1.5, 400, 'Buzzer para alertas sonoros', 'img/no_image.png', NULL),
	(75, 'Joystick analógico', 7.99, 200, 'Joystick analógico para controle', 'img/no_image.png', 'eletronicos'),
	(76, 'Placa de Protótipo', 5, 300, 'Placa de protótipo para circuitos', 'img/no_image.png', NULL),
	(77, 'Placa de Expansão', 9.5, 120, 'Placa de expansão para Arduino', 'img/no_image.png', 'novidade'),
	(78, 'Módulo Bluetooth', 4, 350, 'Módulo Bluetooth HC-05 para comunicação sem fio', 'img/no_image.png', 'descontos'),
	(79, 'Módulo Wi-Fi ESP8266', 6, 220, 'Módulo Wi-Fi ESP8266 para conectividade internet', 'img/no_image.png', 'novidade'),
	(80, 'Sensor de Luminosida', 4.99, 180, 'Sensor para medir luminosidade', 'img/no_image.png', 'novidade'),
	(81, 'Sensor de Pressão', 12.99, 50, 'Sensor de pressão e temperatura BMP180', 'img/no_image.png', NULL),
	(82, 'Módulo GPS', 18.99, 60, 'Módulo GPS para localização', 'img/no_image.png', 'descontos'),
	(83, 'Motor DC', 5.99, 500, 'Motor DC para projetos robóticos', 'img/no_image.png', 'eletronicos'),
	(84, 'Fonte de Alimentação', 15.99, 80, 'Fonte de alimentação 12V para projetos', 'img/no_image.png', 'descontos'),
	(85, 'Placa Raspberry Pi 4', 55.99, 40, 'Placa Raspberry Pi 4 Modelo B', 'img/no_image.png', 'descontos'),
	(86, 'Módulo de Câmera par', 9, 150, 'Módulo de câmera para capturar imagens', 'img/no_image.png', 'eletronicos'),
	(87, 'Sensor de Som', 3.99, 300, 'Sensor de som para detectar ruídos', 'img/no_image.png', NULL),
	(88, 'Sensor de pH', 7.99, 130, 'Sensor de pH para monitoramento de qualidade da água', 'img/no_image.png', NULL),
	(89, 'Módulo de Relé 4 can', 10.99, 200, 'Módulo com 4 relés para controle de dispositivos', 'img/no_image.png', 'eletronicos'),
	(90, 'Sensor de Velocidade', 5.49, 220, 'Sensor para medir a velocidade em rotação', 'img/no_image.png', NULL),
	(91, 'Módulo de Câmera OV7', 8.49, 110, 'Câmera OV7670 para captura de imagens', 'img/no_image.png', 'eletronicos'),
	(92, 'Módulo de Temperatur', 2.99, 400, 'Sensor de temperatura digital DS18B20', 'img/no_image.png', 'descontos'),
	(93, 'Sensor de Corrente A', 11.99, 75, 'Sensor de corrente ACS712 para medições', 'img/no_image.png', 'eletronicos'),
	(94, 'Módulo de RFID', 7.99, 160, 'Módulo de leitura RFID para controle de acesso', 'img/no_image.png', NULL),
	(95, 'Sensor de Fumaça', 6.5, 200, 'Sensor para detecção de fumaça', 'img/no_image.png', NULL),
	(96, 'Sensor de Força', 9.99, 140, 'Sensor de força para medição de carga', 'img/no_image.png', NULL),
	(97, 'Sensor de Tensão', 4.5, 300, 'Sensor para medir a tensão elétrica', 'img/no_image.png', 'descontos'),
	(98, 'Sensor de Cor TCS320', 13.99, 80, 'Sensor para leitura de cores', 'img/no_image.png', NULL),
	(99, 'Placa de Relé 16 Can', 20, 50, 'Placa de relé com 16 canais de controle', 'img/no_image.png', NULL),
	(100, 'Sensor de Fluxo de Á', 11.5, 100, 'Sensor para medir o fluxo de água', 'img/no_image.png', 'descontos'),
	(101, 'Sensor de Tensão Cap', 4, 300, 'Sensor para detectar a tensão capacitiva', 'img/no_image.png', NULL),
	(102, 'Motor de Passo NEMA ', 28.99, 90, 'Motor de passo NEMA 17', 'img/no_image.png', NULL),
	(103, 'Alimentação 5V', 4.5, 400, 'Fonte de alimentação 5V para Arduino', 'img/no_image.png', NULL),
	(104, 'Módulo IR', 2.5, 350, 'Módulo de recepção IR para controle remoto', 'img/no_image.png', NULL),
	(105, 'Módulo de Reconhecim', 18, 70, 'Módulo para reconhecimento de voz', 'img/no_image.png', NULL),
	(106, 'Sensor de Lançamento', 9.5, 120, 'Sensor para detectar a posição de uma bola', 'img/no_image.png', NULL),
	(107, 'Resistência 10KΩ', 0.15, 1000, 'Resistência de 10K Ohms', 'img/no_image.png', NULL),
	(108, 'Placa de Circuito Fl', 12.5, 60, 'Placa de circuito flexível para projetos de protótipos', 'img/no_image.png', NULL),
	(109, 'Bateria Li-ion 18650', 4, 200, 'Bateria recarregável Li-ion 18650', 'img/no_image.png', NULL),
	(110, 'Bateria de Lítio 3.7', 6, 100, 'Bateria recarregável de lítio 3.7V', 'img/no_image.png', NULL),
	(111, 'Modulo de Carregamen', 3.99, 150, 'Módulo para carregamento de baterias via USB', 'img/no_image.png', NULL),
	(112, 'Placa de Desenvolvim', 12.99, 80, 'Placa de desenvolvimento ESP32 com Wi-Fi e Bluetooth', 'img/no_image.png', NULL),
	(113, 'Placa de Expansão pa', 14.5, 40, 'Placa de expansão para Raspberry Pi com GPIOs', 'img/no_image.png', NULL),
	(114, 'Módulo de Temperatur', 2.5, 350, 'Sensor de temperatura LM35', 'img/no_image.png', NULL),
	(115, 'Módulo de Nível de Á', 7, 200, 'Módulo para medir o nível de álcool em líquidos', 'img/no_image.png', NULL);

-- A despejar estrutura para tabela loja.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela loja.user: ~1 rows (aproximadamente)
INSERT INTO `user` (`id_user`, `nome`, `telefone`, `email`, `senha`) VALUES
	(1, 'Rex', '9231', 'rex@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
