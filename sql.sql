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

-- A despejar estrutura para tabela loja.carrinho
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela loja.carrinho: ~2 rows (aproximadamente)
INSERT INTO `carrinho` (`id`, `user_id`, `product_id`, `quantidade`) VALUES
	(62, 1, 1, 6),
	(65, 1, 35, 6);

-- A despejar estrutura para tabela loja.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `preco` float NOT NULL DEFAULT 0,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `descricao` text NOT NULL,
  `img` tinytext NOT NULL DEFAULT 'img/no_image.png',
  `class` tinytext DEFAULT NULL,
  `descricao_comp` text DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela loja.produtos: ~54 rows (aproximadamente)
INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `quantidade`, `descricao`, `img`, `class`, `descricao_comp`) VALUES
	(1, 'Arduino Uno', 22.99, 100, 'Placa de desenvolvimento Arduino Uno', 'img/no_image.png', 'novidade', '<h1>Arduino Uno: Tudo o Que Precisas de Saber</h1><br>\n\n<p>O <b>Arduino Uno</b> é uma das placas de microcontrolador mais populares e utilizadas no mundo da eletrónica e programação. Baseado no <b>ATmega328P</b>, esta placa é ideal tanto para iniciantes como para profissionais que desejam desenvolver projetos interativos.</p><br>\n\n<h2>Características Principais</h2><br>\n\n<ul>\n    <li>Microcontrolador: ATmega328P</li>\n    <li>Voltagem de operação: 5V</li>\n    <li>Entrada de voltagem recomendada: 7-12V</li>\n    <li>Pinos de entrada/saída digitais: 14 (dos quais 6 são PWM)</li>\n    <li>Entradas analógicas: 6</li>\n    <li>Memória Flash: 32 KB (0.5 KB usados pelo bootloader)</li>\n    <li>SRAM: 2 KB</li>\n    <li>EEPROM: 1 KB</li>\n    <li>Velocidade do relógio: 16 MHz</li>\n</ul><br>\n\n<h2>Como Funciona?</h2><br>\n\n<p>O Arduino Uno é programado através da <b>IDE do Arduino</b>, um software simples que permite escrever código em <b>C/C++</b> e carregá-lo diretamente para a placa via cabo USB. O código é compilado e enviado para o microcontrolador, que executa as instruções automaticamente.</p><br>\n\n<h2>Conectividade e Expansão</h2><br>\n\n<p>Uma das grandes vantagens do Arduino Uno é a sua flexibilidade para adicionar componentes e módulos adicionais, como sensores, motores, LEDs e displays. Além disso, suporta a comunicação com outros dispositivos através de diversos protocolos, incluindo:</p><br>\n\n<ul>\n    <li><b>I2C</b>: Comunicação com múltiplos dispositivos através de apenas dois fios.</li>\n    <li><b>SPI</b>: Protocolo de comunicação rápido usado em módulos de memória, sensores e displays.</li>\n    <li><b>UART (Serial)</b>: Permite a comunicação com computadores, módulos Bluetooth, GSM, entre outros.</li>\n</ul><br>\n\n<h2>Aplicações do Arduino Uno</h2><br>\n\n<p>O Arduino Uno é utilizado em diversas áreas, incluindo:</p><br>\n\n<ul>\n    <li><b>Automação residencial</b>: Controle de luzes, temperatura e segurança.</li>\n    <li><b>Robótica</b>: Construção de pequenos robôs autônomos.</li>\n    <li><b>Monitorização de ambiente</b>: Sensores de temperatura, humidade e gases.</li>\n    <li><b>Projetos de arte interativa</b>: Instalações audiovisuais e musicais.</li>\n    <li><b>Educação</b>: Ensino de eletrónica e programação em escolas e universidades.</li>\n</ul><br>\n\n<h2>Vantagens e Desvantagens</h2><br>\n\n<h3>Vantagens</h3><br>\n<ul>\n    <li>Fácil de programar e utilizar.</li>\n    <li>Grande comunidade de suporte e tutoriais.</li>\n    <li>Compatível com diversos sensores e módulos.</li>\n    <li>Preço acessível.</li>\n</ul><br>\n\n<h3>Desvantagens</h3><br>\n<ul>\n    <li>Poder de processamento limitado para projetos mais complexos.</li>\n    <li>Não possui conectividade Wi-Fi ou Bluetooth integrada.</li>\n</ul><br>\n\n<h2>Conclusão</h2><br>\n\n<p>O Arduino Uno é uma ferramenta poderosa e versátil para quem deseja explorar o mundo da eletrónica e programação. Seja para aprender, criar protótipos ou desenvolver projetos inovadores, esta placa oferece uma solução prática e acessível.</p><br>\n'),
	(2, 'Sensor de Temperatura', 5.5, 200, 'Sensor para medir a temperatura', 'img/no_image.png', NULL, '<h1>Sensor de Temperatura: Tudo o Que Precisas de Saber</h1><br>\n\n<p>O <b>Sensor de Temperatura</b> é um componente essencial para medir variações térmicas em diversos tipos de projetos eletrónicos. Pode ser utilizado em sistemas de climatização, monitorização ambiental e automação residencial.</p><br>\n\n<h2>Características Principais</h2><br>\n\n<ul>\n    <li>Precisão: Varia conforme o modelo.</li>\n    <li>Faixa de medição: Normalmente entre -40°C e 125°C.</li>\n    <li>Alimentação: 3.3V ou 5V, dependendo do modelo.</li>\n    <li>Saída: Digital ou analógica, dependendo do tipo.</li>\n</ul><br>\n\n<h2>Como Funciona?</h2><br>\n\n<p>O sensor capta a temperatura ambiente e converte-a num sinal elétrico, que pode ser lido por um microcontrolador como o Arduino ou Raspberry Pi. Dependendo do modelo, a leitura pode ser feita através de um pino analógico ou comunicação digital (I2C, SPI, 1-Wire).</p><br>\n\n<h2>Conectividade e Expansão</h2><br>\n\n<ul>\n    <li><b>Analógico:</b> Conectado diretamente a um pino analógico do microcontrolador.</li>\n    <li><b>Digital:</b> Comunicação via I2C, SPI ou 1-Wire.</li>\n</ul><br>\n\n<h2>Aplicações do Sensor de Temperatura</h2><br>\n\n<ul>\n    <li><b>Monitorização ambiental</b>: Medição da temperatura em ambientes internos e externos.</li>\n    <li><b>Automação residencial</b>: Controlo de aquecimento e refrigeração.</li>\n    <li><b>Projetos eletrónicos</b>: Desenvolvimento de dispositivos térmicos inteligentes.</li>\n</ul><br>\n\n<h2>Vantagens e Desvantagens</h2><br>\n\n<h3>Vantagens</h3><br>\n<ul>\n    <li>Fácil de integrar em projetos eletrónicos.</li>\n    <li>Consumo energético reduzido.</li>\n    <li>Disponível em diversos modelos para diferentes aplicações.</li>\n</ul><br>\n\n<h3>Desvantagens</h3><br>\n<ul>\n    <li>A precisão pode variar conforme o modelo.</li>\n \n'),
	(3, 'Servo Motor', 15.99, 50, 'Motor de servo de 9g', 'img/no_image.png', 'descontos', NULL),
	(4, 'Resistência 220Ω', 0.1, 1000, 'Resistência de 220 Ohms', 'img/no_image.png', 'descontos', NULL),
	(5, 'Sensor de Distância ', 3.99, 300, 'Sensor para medir distância com ultrassom', 'img/no_image.png', 'novidade', NULL),
	(6, 'Arduino Mega', 45.99, 80, 'Placa de desenvolvimento Arduino Mega', 'img/no_image.png', 'descontos', NULL),
	(7, 'Sensor de Umidade', 6.5, 150, 'Sensor para medir a umidade do solo', 'img/no_image.png', NULL, NULL),
	(8, 'Motor de Passo', 10.99, 120, 'Motor de passo 28BYJ-48', 'img/no_image.png', NULL, NULL),
	(9, 'Display LCD 16x2', 4.99, 250, 'Display LCD 16x2 com interface I2C', 'img/no_image.png', 'novidade', NULL),
	(10, 'Módulo Relé', 2.99, 500, 'Módulo de relé para controle de dispositivos', 'img/no_image.png', NULL, NULL),
	(11, 'Sensor de Movimento ', 3.49, 180, 'Sensor de movimento PIR para automação', 'img/no_image.png', NULL, NULL),
	(12, 'Sensor de Gás MQ-2', 8.99, 90, 'Sensor MQ-2 para detecção de gases', 'img/no_image.png', NULL, NULL),
	(13, 'Buzzer', 1.5, 400, 'Buzzer para alertas sonoros', 'img/no_image.png', 'novidade', NULL),
	(14, 'Joystick analógico', 7.99, 200, 'Joystick analógico para controle', 'img/no_image.png', NULL, NULL),
	(15, 'Placa de Protótipo', 5, 300, 'Placa de protótipo para circuitos', 'img/no_image.png', NULL, NULL),
	(16, 'Placa de Expansão pa', 9.5, 120, 'Placa de expansão para Arduino', 'img/no_image.png', 'descontos', NULL),
	(17, 'Módulo Bluetooth HC-', 4, 350, 'Módulo Bluetooth HC-05 para comunicação sem fio', 'img/no_image.png', 'descontos', NULL),
	(18, 'Módulo Wi-Fi ESP8266', 6, 220, 'Módulo Wi-Fi ESP8266 para conectividade internet', 'img/no_image.png', 'descontos', NULL),
	(19, 'Sensor de Luminosida', 4.99, 180, 'Sensor para medir luminosidade', 'img/no_image.png', 'eletronicos', NULL),
	(20, 'Sensor de Pressão BM', 12.99, 50, 'Sensor de pressão e temperatura BMP180', 'img/no_image.png', NULL, NULL),
	(21, 'Módulo GPS', 18.99, 60, 'Módulo GPS para localização', 'img/no_image.png', 'novidade', NULL),
	(22, 'Motor DC', 5.99, 500, 'Motor DC para projetos robóticos', 'img/no_image.png', 'eletronicos', NULL),
	(23, 'Fonte de Alimentação', 15.99, 80, 'Fonte de alimentação 12V para projetos', 'img/no_image.png', 'eletronicos', NULL),
	(24, 'Placa Raspberry Pi 4', 55.99, 40, 'Placa Raspberry Pi 4 Modelo B', 'img/no_image.png', NULL, NULL),
	(25, 'Módulo de Câmera par', 9, 150, 'Módulo de câmera para capturar imagens', 'img/no_image.png', NULL, NULL),
	(26, 'Sensor de Som', 3.99, 300, 'Sensor de som para detectar ruídos', 'img/no_image.png', NULL, NULL),
	(27, 'Sensor de pH', 7.99, 130, 'Sensor de pH para monitoramento de qualidade da água', 'img/no_image.png', NULL, NULL),
	(28, 'Módulo de Relé 4 can', 10.99, 200, 'Módulo com 4 relés para controle de dispositivos', 'img/no_image.png', NULL, NULL),
	(29, 'Sensor de Velocidade', 5.49, 220, 'Sensor para medir a velocidade em rotação', 'img/no_image.png', NULL, NULL),
	(30, 'Módulo de Câmera OV7', 8.49, 110, 'Câmera OV7670 para captura de imagens', 'img/no_image.png', NULL, NULL),
	(31, 'Módulo de Temperatur', 2.99, 400, 'Sensor de temperatura digital DS18B20', 'img/no_image.png', NULL, NULL),
	(32, 'Sensor de Corrente A', 11.99, 75, 'Sensor de corrente ACS712 para medições', 'img/no_image.png', NULL, NULL),
	(33, 'Módulo de RFID', 7.99, 160, 'Módulo de leitura RFID para controle de acesso', 'img/no_image.png', NULL, NULL),
	(34, 'Sensor de Fumaça', 6.5, 200, 'Sensor para detecção de fumaça', 'img/no_image.png', 'novidade', NULL),
	(35, 'Sensor de Força', 9.99, 140, 'Sensor de força para medição de carga', 'img/no_image.png', 'eletronicos', NULL),
	(36, 'Sensor de Tensão', 4.5, 300, 'Sensor para medir a tensão elétrica', 'img/no_image.png', NULL, NULL),
	(37, 'Sensor de Cor TCS320', 13.99, 80, 'Sensor para leitura de cores', 'img/no_image.png', NULL, NULL),
	(38, 'Placa de Relé 16 Can', 20, 50, 'Placa de relé com 16 canais de controle', 'img/no_image.png', NULL, NULL),
	(39, 'Sensor de Fluxo de Á', 11.5, 100, 'Sensor para medir o fluxo de água', 'img/no_image.png', NULL, NULL),
	(40, 'Sensor de Tensão Cap', 4, 300, 'Sensor para detectar a tensão capacitiva', 'img/no_image.png', NULL, NULL),
	(41, 'Motor de Passo NEMA ', 28.99, 90, 'Motor de passo NEMA 17', 'img/no_image.png', NULL, NULL),
	(42, 'Alimentação 5V', 4.5, 400, 'Fonte de alimentação 5V para Arduino', 'img/no_image.png', 'eletronicos', NULL),
	(43, 'Módulo IR', 2.5, 350, 'Módulo de recepção IR para controle remoto', 'img/no_image.png', NULL, NULL),
	(44, 'Módulo de Reconhecim', 18, 70, 'Módulo para reconhecimento de voz', 'img/no_image.png', 'eletronicos', NULL),
	(45, 'Sensor de Lançamento', 9.5, 120, 'Sensor para detectar a posição de uma bola', 'img/no_image.png', NULL, NULL),
	(46, 'Resistência 10KΩ', 0.15, 1000, 'Resistência de 10K Ohms', 'img/no_image.png', NULL, NULL),
	(47, 'Placa de Circuito Fl', 12.5, 60, 'Placa de circuito flexível para projetos de protótipos', 'img/no_image.png', NULL, NULL),
	(48, 'Bateria Li-ion 18650', 4, 200, 'Bateria recarregável Li-ion 18650', 'img/no_image.png', NULL, NULL),
	(49, 'Bateria de Lítio 3.7', 6, 100, 'Bateria recarregável de lítio 3.7V', 'img/no_image.png', NULL, NULL),
	(50, 'Modulo de Carregamen', 3.99, 150, 'Módulo para carregamento de baterias via USB', 'img/no_image.png', NULL, NULL),
	(51, 'Placa de Desenvolvim', 12.99, 80, 'Placa de desenvolvimento ESP32 com Wi-Fi e Bluetooth', 'img/no_image.png', NULL, NULL),
	(52, 'Placa de Expansão pa', 14.5, 40, 'Placa de expansão para Raspberry Pi com GPIOs', 'img/no_image.png', NULL, NULL),
	(53, 'Módulo de Temperatur', 2.5, 350, 'Sensor de temperatura LM35', 'img/no_image.png', NULL, NULL),
	(54, 'Módulo de Nível de Á', 7, 200, 'Módulo para medir o nível de álcool em líquidos', 'img/no_image.png', NULL, NULL);

-- A despejar estrutura para tabela loja.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela loja.user: ~1 rows (aproximadamente)
INSERT INTO `user` (`id_user`, `nome`, `telefone`, `email`, `senha`) VALUES
	(1, 'Rex', '9231', 'rex@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
	(8, 'teste', '213123', 'teste@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
