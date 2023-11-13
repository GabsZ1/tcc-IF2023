-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/11/2023 às 16:24
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(13) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`, `arquivo`, `status`) VALUES
(1, 'Ana Laura', 'analauracabral603@gmail.com', '12345', NULL, 1),
(2, 'Gabrielle Bonini', 'gabrielleboninibarbosa@gmail.com', '1432', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(13) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`, `status`) VALUES
(1, 'TAHEREH MAFI', 1),
(3, 'JENNA EVANS WELCH', 1),
(4, 'VICTORIA AVEYARD', 1),
(5, 'C.C.HUNTER', 1),
(6, 'TAYLOR JENKINS REID', 1),
(7, 'C.J.TUDOR', 1),
(8, 'TORI TELFER', 1),
(9, 'EMILY HENRY', 1),
(10, 'STEPHENIE MEYER', 1),
(11, 'SHEA ERNSHAW', 1),
(12, 'AGATHA CRISTIE', 1),
(13, 'JANE AUSTEN', 1),
(14, 'LOUISE ONEILL', 1),
(15, 'RICK RIORDAN', 1),
(16, 'HOLLY BLACK', 1),
(17, 'ANA BEATRIZ BRANDÃO', 1),
(18, 'COLLEEN HOUCK ', 1),
(19, 'TILLIE COLE ', 1),
(20, 'ALICE OSEMAN', 1),
(21, 'KIERA CASS', 1),
(22, 'ELAYNE BAETA', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `livros_id` int(11) NOT NULL,
  `quantidade` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(13) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`, `status`) VALUES
(20, 'UNIVERSO DOS LIVROS', 1),
(21, 'INTRINSECA', 1),
(22, 'SEGUINTE', 1),
(23, 'JANGADA', 1),
(24, 'DARKSIDE', 1),
(25, 'VERUS', 1),
(26, 'GALERA', 1),
(27, 'GLOBO LIVROS', 1),
(28, 'ARQUEIRO', 1),
(29, 'PLANETA', 1),
(30, 'CAMELOT', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(13) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`, `status`) VALUES
(1, 'ROMANCE', 1),
(2, 'DISTOPIA', 1),
(3, 'SUSPENSE', 1),
(4, 'FICÇÃO', 1),
(5, 'FANTASIA', 1),
(6, 'CRIME REAL', 1),
(7, 'BIOGRAFIA', 1),
(8, 'DRAMA', 1),
(9, 'MISTÉRIO', 1),
(10, 'AVENTURA', 1),
(11, 'TERROR', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livrogenero`
--

CREATE TABLE `livrogenero` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livrogenero`
--

INSERT INTO `livrogenero` (`id`, `livro_id`, `genero_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 1),
(4, 3, 2),
(5, 3, 4),
(6, 4, 1),
(7, 4, 5),
(8, 5, 1),
(9, 5, 4),
(10, 6, 9),
(11, 6, 3),
(12, 7, 7),
(13, 7, 6),
(14, 8, 1),
(15, 8, 4),
(16, 9, 1),
(17, 9, 8),
(18, 10, 4),
(19, 10, 5),
(20, 11, 9),
(21, 11, 3),
(22, 12, 1),
(23, 12, 4),
(26, 13, 5),
(27, 13, 11),
(28, 14, 5),
(29, 14, 10),
(30, 15, 5),
(31, 15, 1),
(32, 16, 4),
(33, 16, 1),
(34, 17, 5),
(35, 17, 10),
(36, 18, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(13) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `subtitulo` varchar(200) NOT NULL,
  `sinopse` varchar(1000) NOT NULL,
  `valor` int(11) NOT NULL,
  `capa` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `livrosAutor_id` int(11) DEFAULT NULL,
  `livrosEditora_id` int(11) DEFAULT NULL,
  `heartstopper` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `subtitulo`, `sinopse`, `valor`, `capa`, `class`, `status`, `livrosAutor_id`, `livrosEditora_id`, `heartstopper`) VALUES
(1, 'ACEITA-ME', 'o glorioso e devastadoramente emocionante último volume da série Estilhaça-me!', 'Juliette e Warner lutaram muito para derrubar o Restabelecimento de uma vez por todas. Mas as coisas não estão tão fáceis, pois eles e seus amigos do Santuário trabalham com recursos limitados para estabilizar o mundo.Warner está de olho em mais do que apenas política. Desde que pediu Juliette em casamento, há duas semanas, ele não vê a hora de finalmente se casar com ela – a pessoa que ele ama mais do que tudo e ao lado de quem sofreu tanto para estar. Mas, com tanto caos ao redor, é quase impossível haver um casamento. E até Juliette se distrai com tudo o que precisam fazer.Definitivamente, o futuro de Warner e Juliette juntos está em suas próprias mãos, porém o mundo continua tentando separá-los. Será que eles finalmente poderão ser felizes, oficialmente, juntos?', 32, 'capa1.webp', 'class16.png', 1, 1, 20, 0),
(2, 'AMOR & GELATO', 'Um verão na Itália, uma antiga história de amor e um segredo de família', 'Depois da morte da mãe, Lina fica com a missão de realizar um último pedido: ir até a Itália para conhecer o pai. Do dia para a noite, ela se vê na famosa paisagem da Toscana, morando em uma casa localizada no mesmo terreno de um cemitério memorial de soldados americanos da Segunda Guerra Mundial, com um homem que nunca tinha ouvido falar. Apesar das belezas arquitetônicas, da história da cidade e das comidas maravilhosas, o que Lina mais quer é ir embora correndo dali.Mas as coisas começam a mudar quando ela recebe um antigo diário da mãe. Nele, a menina embarca em uma misteriosa história de amor, que pode explicar suas próprias origens. No meio desse turbilhão de emoções, Lina ainda conhece Ren e Thomas, dois meninos lindos que vão mexer ainda mais com seu coração.Uma trajetória que fará Lina descobrir o amor, a si mesma e também aprender a lidar com a perda. Amor & gelato é uma deliciosa viagem pelos mais românticos pontos turísticos italianos, com direito a tudo de mais int', 38, 'capa2.jpg', 'class12.png', 1, 3, 21, 0),
(3, 'A RAINHA VERMELHA', 'uma sociedade dividida pelo sangue, um jogo definido pelo poder.', 'O mundo de Mare Barrow é dividido pelo sangue: vermelho ou prateado. Mare e sua família são vermelhos: plebeus, humildes, destinados a servir uma elite prateada cujos poderes sobrenaturais os tornam quase deuses. Mare rouba o que pode para ajudar sua família a sobreviver e não tem esperanças de escapar do vilarejo miserável onde mora. Entretanto, numa reviravolta do destino, ela consegue um emprego no palácio real, onde, em frente ao rei e a toda a nobreza, descobre que tem um poder misterioso… Mas como isso seria possível, se seu sangue é vermelho? Em meio às intrigas dos nobres prateados, as ações da garota vão desencadear uma dança violenta e fatal, que colocará príncipe contra príncipe - e Mare contra seu próprio coração.', 37, 'capa3.jpg', 'class16.png', 1, 4, 22, 0),
(4, 'EU E ESSE MEU CORAÇÃO', 'Leah MacKenzie, de 17 anos, não tem coração. O que a mantém viva é um coração artificial que ela carrega dentro de uma mochila.', 'Com seu tipo sanguíneo raro, um transplante é como um sonho distante. Conformada, ela tenta se esquecer de que está com os dias contados, criando uma lista de “coisas para fazer antes de morrer”.\r\n\r\nDe repente, Leah recebe uma segunda chance: há um coração disponível! O problema é quando ela descobre que o doador é um garoto da sua escola – e que supostamente se matou!\r\n\r\nMatt, o irmão gêmeo do doador, se recusa a acreditar que Eric se suicidou. Quando Leah o procura, eles descobrem que ambos têm sonhos semelhantes que podem ter pistas do que realmente aconteceu a Eric.\r\n\r\nEnquanto tentam desvendar esse mistério, Matt e Leah se apaixonam e não querem correr o risco de perder um ao outro. Mas nem a vida nem um coração transplantado vem com garantias.\r\n\r\nQuem diria que viver exige mais coragem do que morrer?', 33, 'capa4.jpg', 'class12.png', 1, 5, 23, 0),
(5, 'OS SETE MARIDOS DE EVELYN HUGO', 'Com todo o esplendor que só a Hollywood do século passado pode oferecer, esta é uma narrativa inesquecível sobre os sacrifícios que fazemos por amor, o perigo dos segredos e o preço da fama.', 'Lendária estrela de Hollywood, Evelyn Hugo sempre esteve sob os holofotes ― seja estrelando uma produção vencedora do Oscar, protagonizando algum escândalo ou aparecendo com um novo marido… pela sétima vez. Agora, prestes a completar oitenta anos e reclusa em seu apartamento no Upper East Side, a famigerada atriz decide contar a própria história ― ou sua “verdadeira história” ―, mas com uma condição: que Monique Grant, jornalista iniciante e até então desconhecida, seja a entrevistadora. Ao embarcar nessa misteriosa empreitada, a jovem repórter começa a se dar conta de que nada é por acaso ― e que suas trajetórias podem estar profunda e irreversivelmente conectadas.\r\n\r\n“Evelyn Hugo faz Elizabeth Taylor parecer sem graça. Você vai rir com ela, chorar, sofrer, e então voltar para a primeira página e fazer tudo de novo.” ― Heather Cocks e Jessica Morgan, autoras de The Royal We.', 32, 'capa5.jfif', 'class16.png', 1, 6, 21, 0),
(6, 'O HOMEM DE GIZ', 'Assassinato e sinais misteriosos em uma trama para fãs de Stranger Things e Stephen King', 'Em 1986, Eddie e os amigos passam a maior parte dos dias andando de bicicleta pela pacata vizinhança em busca de aventuras. Os desenhos a giz são seu código secreto: homenzinhos rabiscados no asfalto; mensagens que só eles entendem. Mas um desenho misterioso leva o grupo de crianças até um corpo desmembrado e espalhado em um bosque. Depois disso, nada mais é como antes.\r\n\r\nEm 2016, Eddie se esforça para superar o passado, até que um dia ele e os amigos de infância recebem um mesmo aviso: o desenho de um homem de giz enforcado. Quando um dos amigos aparece morto, Eddie tem certeza de que precisa descobrir o que de fato aconteceu trinta anos atrás.\r\n\r\nAlternando habilidosamente entre presente e passado, O Homem de Giz traz o melhor do suspense: personagens maravilhosamente construídos, mistérios de prender o fôlego e reviravoltas que vão impressionar até os leitores mais escaldados.', 44, 'capa6.jpg', 'class16.png', 1, 7, 21, 0),
(7, 'LADY KILLERS', '“Telfer prova que você pode esfaquear, envenenar e sufocar os arquétipos previsíveis sobre assassinas e escrever algo lascivo e divertido.” — Caitlin Doughty, autora de Confissões do Crematório.', 'Quando pensamos em assassinos em série, pensamos em homens. Mais precisamente, em homens matando mulheres inocentes, vítimas de um apetite atroz por sangue e uma vontade irrefreável de carnificina. As mulheres podem ser tão letais quanto os homens e deixar um rastro de corpos por onde passam ― então o que acontece quando as pessoas são confrontadas com uma assassina em série? Quando as ideias de “sexo frágil” se quebram e fitamos os desconcertantes olhos de uma mulher com sangue seco sob as unhas?', 48, 'capa7.webp', 'class18.png', 1, 8, 24, 0),
(8, 'LEITURA DE VERÃO', 'Dois escritores e uma temporada na praia.', 'Augustus Everett é um aclamado autor de ficção literária. January Andrews escreve romances best-seller. Enquanto ela cria seus “felizes para sempre”, ele mata todos os seus personagens.\r\n\r\nEles definitivamente são polos opostos.\r\n\r\nA única coisa que têm em comum é que, durante três meses, vão morar em casas de praia vizinhas, ambos falidos e paralisados por um bloqueio criativo.\r\n\r\nAté que, em uma noite nebulosa, uma coisa leva à outra e eles fazem um acordo que tem o objetivo de arrancá-los da zona de conforto: Augustus vai passar o verão redigindo um livro com final feliz, e January vai escrever o próximo clássico da literatura. Ela vai levá-lo a viagens de campo dignas de uma comédia romântica, e ele a acompanhará em entrevistas com sobreviventes de um culto de suicídio (obviamente).\r\n\r\nCada um vai finalizar um livro e ninguém vai se apaixonar. Será?', 34, 'capa8.jpg', 'class16.png', 1, 9, 25, 0),
(9, 'LUA NOVA', 'O segundo livro da série que vendeu mais de 15 milhões de exemplares em todo o mundo, Lua nova alcançou o primeiro lugar na lista de mais vendidos do The New York Times.', 'Para Bella Swan, há um coisa mais importante do que a própria vida: Edward Cullen. Mas estar apaixonada por um vampiro é ainda mais perigoso do que ela poderia ter imaginado. Edward já resgatara Bella das garras de um monstro cruel, mas agora, quando o relacionamento ousado do casal ameaça tudo o que lhes é próximo e querido, eles percebem que seus problemas podem estar apenas começando...\r\n\r\nLegiões de leitores que ficaram em transe com o best-seller Crepúsculo estão ávidos pela sequência da história de amor de Bella e Edward. Em Lua nova, Stephenie Meyer nos dá outra combinação irresistível de romance e suspense com um toque sobrenatural. Apaixonante e cheia de reviravoltas surpreendentes, essa saga de amor e vampiros segue rumo à imortalidade literária.', 34, 'capa9.jpg', 'class16.png', 1, 10, 21, 0),
(10, 'A MALDIÇÃO DO MAR', 'Quando corpos de garotos começam a aparecer no litoral da cidade de Sparrow, alguns moradores se perguntam se a antiga lenda sobre as bruxas vingativas seria verdade. Mas até onde essa caça às bruxas ', 'Há dois séculos, três irmãs foram condenadas à morte por, supostamente, cometerem bruxaria. Pedras foram amarradas em seus tornozelos, e elas morreram afogadas nas águas profundas que margeiam a cidade.\r\n\r\nAgora, por um breve período de tempo – a cada dia primeiro de junho até o solstício de verão –, diz a lenda que as irmãs retornam, roubando os corpos de três meninas para que, por meio deles, possam buscar sua vingança, seduzindo e afogando meninos até a morte.\r\n\r\nComo muitos habitantes locais, Penny Talbot, conhece a lenda de cor. Mas, neste ano, quando a cidade se prepara para o anual retorno das irmãs, um rapaz desconhecido, Bo Carter, chega à cidade buscando suas próprias respostas. E Penny o acolhe.\r\n\r\nMas quando corpos de meninos locais começam a aparecer no litoral, o clima de desconfiança e medo atinge a cidade, dando início a uma verdadeira caça às bruxas.\r\n\r\nA narrativa alterna, os eletrizantes eventos do presente com relatos do diário das jovens condenadas por bruxaria, re', 30, 'capa10.jpg', 'class12.png', 1, 11, 26, 0),
(11, 'E NÃO SOBROU NENHUM', 'Dez soldadinhos saem para jantar, a fome os move; Um deles se engasgou, e então sobraram nove.', 'Uma ilha misteriosa, um poema infantil, dez soldadinhos de porcelana e muito suspense são os ingredientes com que Agatha Christie constrói seu romance mais importante. Na ilha do Soldado, antiga propriedade de um milionário norte-americano, dez pessoas sem nenhuma ligação aparente são confrontadas por uma voz misteriosa com fatos marcantes de seus passados.\r\n\r\nConvidados pelo misterioso mr. Owen, nenhum dos presentes tem muita certeza de por que estão ali, a despeito de conjecturas pouco convincentes que os leva a crer que passariam um agradável período de descanso em mordomia. Entretanto, já na primeira noite, o mistério e o suspense se abatem sobre eles e, num instante, todos são suspeitos, todos são vítimas e todos são culpados.\r\n\r\nÉ neste clima de tensão e desconforto que as mortes inexplicáveis começam e, sem comunicação com o continente devido a uma forte tempestade, a estadia transforma-se em um pesadelo. Todos se perguntam: quem é o misterioso anfitrião, mr. Owen? Existe mais a', 42, 'capa11.jpg', 'classL.png', 1, 12, 27, 0),
(12, 'ORGULHO E PRECONCEITO', 'O orgulho está mais ligado à opinião que temos de nós mesmos, e a vaidade, ao que os outros pensam de nós.', 'Orgulho e preconceito é o livro mais famoso de Jane Austen e possui uma série de personagens inesquecíveis e um enredo memorável. Austen nos apresenta Elizabeth Bennet como heroína irresistível e seu pretendente aristocrático, o sr. Darcy. Nesse livro, aspectos diferentes são abordados: orgulho encontra preconceito, ascendência social confronta desprezo social, equívocos e julgamentos antecipados conduzem alguns personagens ao sofrimento e ao escândalo. O livro pode ser considerado a obra-prima da escritora, que equilibra comédia com seriedade, observação meticulosa das atitudes humanas e sua ironia refinada. A nova coleção possui capa dura e estilo inspirado nos bullet journals.', 35, 'capa12.jpg', 'class16.png', 1, 13, 30, 0),
(13, 'A PEQUENA SEREIA', 'Clássicos inesquecíveis.', 'A caçula das sereiazinhas se apaixonou pelo príncipe de olhos negros que ela salvou do naufrágio. Mas como declarar seu amor a quem caminha sobre o seco? Somente a velha feiticeira pode lhe arranjar o par de pernas que a levarão aos braços do amado. O preço, no entanto, é altíssimo: sua linda voz. Além disso, terá de deixar para sempre o fundo do mar, podendo até morrer, caso não seja correspondida. Embora o trato pareça bem pouco vantajoso, como esperar sensatez de quem ama? Recriação do célebre conto de Andersen, ambientado pelo ilustrador Quentin Gréban em cenário oriental.\r\n', 31, 'capa13.jpg', 'class16.png', 1, 14, 24, 0),
(14, 'O LADRÃO DE RAIOS', 'Primeiro volume da saga Percy Jackson e os olimpianos, O ladrão de raios esteve entre os primeiros lugares na lista das séries mais vendidas do The New York Times.', 'O autor conjuga lendas da mitologia grega com aventuras no século XXI. Nelas, os deuses do Olimpo continuam vivos, ainda se apaixonam por mortais e geram filhos metade deuses, metade humanos, como os heróis da Grécia antiga. Marcados pelo destino, eles dificilmente passam da adolescência. Poucos conseguem descobrir sua identidade.\r\n\r\nO garoto-problema Percy Jackson é um deles. Tem experiências estranhas em que deuses e monstros mitológicos parecem saltar das páginas dos livros direto para a sua vida. Pior que isso: algumas dessas criaturas estão bastante irritadas. Um artefato precioso foi roubado do Monte Olimpo e Percy é o principal suspeito. Para restaurar a paz, ele e seus amigos – jovens heróis modernos – terão de fazer mais do que capturar o verdadeiro ladrão: precisam elucidar uma traição mais ameaçadora que fúria dos deuses.', 37, 'capa14.jpg', 'class12.png', 1, 15, 21, 0),
(15, 'PRÍNCIPE CRUEL', 'O prínicipe cruel é o primeiro livro da envolvente série O Povo do Ar sobre uma garota mortal que se vê presa em uma teia de intrigas de fadas reais.', 'Jude tinha apenas sete anos quando seus pais foram brutalmente assasinados e ela e as irmãs levadas para viver no traiçoeiro Reino das Fadas. Dez anos depois, tudo o que Jude quer é se encaixar, mesmo sendo uma garota mortal. Mas todos os feéricos parecem desprezar os humanos... Especialmente o príncipe Cardan, o mais jovem e mais perverso dos filhos do Grande Rei de Elfhame.\r\n\r\nPara conquistar o tão desejado lugar na Corte, Jude precisa desafiar o príncipe - e enfrentar as consequências do ato.\r\n\r\nA garota passa, então, a se envolver cada vez mais nos jogos e intrigas do palácio, e acaba descobrindo a própria vocação para trapaças e derramamento de sangue. Mas quando uma traição ameaça afogar o Reindo das Fadas em violência, Jude precisará arriscar tudo em uma perigosa aliança para salvar suas irmãs - e a própria Elfhame.\r\n\r\nCercada por mentiras e pessoas que desejam destruí-la , Jude terá que descobrir o verdadeiro significado da palavra poder antes que seja tarde demais.', 31, 'capa15.jpg', 'class16.png', 1, 16, 26, 0),
(16, 'A GAROTA DAS SAPATILHAS BRANCAS', 'O pior sentimento do mundo é o da impotência diante do sofrimento de uma pessoa que amamos.', 'Em A garota das sapatilhas brancas, vamos conhecer mais um pouco da história de Melissa e Daniel. Melissa era uma garota nada fácil, dona de uma personalidade complicada e com questões pessoais que sozinha ela jamais seria capaz de resolver.\r\n\r\nMas teve a rota de sua vida alterada completamente quando conheceu Daniel, o garoto que finalmente daria sentido à sua vida. Ele foi o farol que a salvou da escuridão. E ela devolveu as cores ao mundo dele. Às vezes, as pessoas não percebem que não são capazes de resolver ou aguentar tudo sozinhas e, nessa história, fica claro que com a ajuda de um parceiro todos os problemas e pesares ficam mais leves. Aumentamos a nossa capacidade de enfrentar os obstáculos da vida quando temos com quem contar e com quem dividir.\r\n\r\nDaniel Lobos vive a vida plenamente. Dono de um coração enorme, o jovem divide seu tempo entre duas paixões: a música e as causas sociais. Até que seu caminho cruza o de Melissa, uma bailarina preconceituosa e mesquinha, que põe à ', 25, 'capa16.jpg', 'classL.png', 1, 17, 25, 0),
(17, 'A MALDIÇÃO DO TIGRE', '\"Um romance delicado e uma aventura capaz de deixar o coração a mil por hora. Eu vibrei e roí as unhas. A maldição do tigre é mágico!\" – Becca Fitzpatrick, autora da série Sussurro.\r\n\r\n', 'Kelsey Hayes perdeu os pais recentemente e precisa arranjar um emprego para custear a faculdade. Contratada por um circo, ela é arrebatada pela principal atração: um lindo tigre branco.\r\n\r\nKelsey sente uma forte conexão com o misterioso animal de olhos azuis e, tocada por sua solidão, passa a maior parte do seu tempo livre ao lado dele.\r\n\r\nO que a jovem órfã ainda não sabe é que seu tigre Ren é na verdade Alagan Dhiren Rajaram, um príncipe indiano que foi amaldiçoado por um mago há mais de 300 anos, e que ela pode ser a única pessoa capaz de ajudá-lo a quebrar esse feitiço.\r\n\r\nDeterminada a devolver a Ren sua humanidade, Kelsey embarca em uma perigosa jornada pela Índia, onde enfrenta forças sombrias, criaturas imortais e mundos místicos, tentando decifrar uma antiga profecia. Ao mesmo tempo, se apaixona perdidamente tanto pelo tigre quanto pelo homem.', 31, 'capa17.jpg', 'class12.png', 1, 18, 28, 0),
(18, 'MIL BEIJOS DE GAROTO', 'Talvez porque às vezes tudo que temos são momentos. Porque não há repetições; o que acontece em um momento define a vida – talvez seja a vida.', 'Um beijo dura um instante.\r\nMas mil beijos podem durar uma vida inteira.\r\nUm garoto.\r\nUma garota.\r\nUm vínculo que é definido num momento e se prolonga por uma década.\r\nUm vínculo que nem o tempo nem a distância podem romper.\r\nUm vínculo que vai durar para sempre.\r\nAo menos era o que eles imaginavam. Quando, aos dezessete anos, Rune Kristiansen retorna da Noruega para o lugar onde passou a infância, a cidade americana de Blossom Grove, na Geórgia , ele só tem uma coisa em mente: reencontrar Poppy Litchfield, a garota que era sua cara-metade e que tinha prometido esperar fielmente por seu retorno. E ele quer descobrir por que, nos dois anos em que esteve fora, ela o deletou de sua vida sem dar nenhuma explicação.', 22, 'capa18.jpg', 'class16.png', 1, 19, 29, 0),
(20, 'Heartstopper: Dois garotos, um encontro \r\n', 'O primeiro volume da adorada série em quadrinhos finalmente chega ao Brasil.', 'Charlie Spring e Nick Nelson não têm quase nada em comum. Charlie é um aluno dedicado e bastante inseguro por conta do bullying que sofre no colégio desde que se assumiu gay. Já Nick é superpopular, especialmente querido por ser um ótimo jogador de rúgbi. Quando os dois passam a sentar um ao lado do outro toda manhã, uma amizade intensa se desenvolve, e eles ficam cada vez mais próximos.\r\nCharlie logo começa a se sentir diferente a respeito do novo amigo, apesar de saber que se apaixonar por um garoto hétero só vai gerar frustrações. Mas o próprio Nick está em dúvida sobre o que sente ― e talvez os garotos estejam prestes a descobrir que, quando menos se espera, o amor pode funcionar das formas mais incríveis e surpreendentes.', 38, 'heartstopper.jpg', 'class12.png', 1, 20, 22, 1),
(21, 'A SELEÇÃO', 'Muitas garotas sonham em ser princesas, mas este não é o caso de America Singer. Ela topa se inscrever na Seleção só para agradar a mãe, certa de que não será sorteada para participar da competição em', 'Para trinta e cinco garotas, a Seleção é a chance de uma vida. É a oportunidade de ser alçada a um mundo de vestidos deslumbrantes e joias valiosas. De morar em um palácio, conquistar o coração do belo príncipe Maxon e um dia ser a rainha.\r\nAmerica Singer, no entanto, estar entre as Selecionadas é um pesadelo. Significa deixar para trás o rapaz que ama. Abandonar sua família e seu lar para entrar em uma disputa ferrenha por uma coroa que ela não quer. E viver em um palácio sob a ameaça constante de ataques rebeldes.\r\nEntão America conhece pessoalmente o príncipe - e percebe que a vida com que sempre sonhou talvez não seja nada comparada ao futuro que nunca tinha ousado imaginar.', 28, 'capa19.jpg', 'class12.png', 1, 21, 22, 0),
(22, 'O AMOR NÃO É OBVIO', 'Amores platônicos, segredos inconfessáveis, perseguições pela cidade, traição... poderia ser um roteiro de novela, mas é só a vida real de uma adolescente comum. ', 'O amor não é óbvio. Ele está presente quando você se senta com a sua vizinha idosa para assistir a um novo capítulo da sua novela favorita. Ele é posto à prova quando você escuta as histórias mirabolantes da sua melhor amiga, ainda que nenhuma delas lhe interesse. E, às vezes, ele aparece quando você menos espera e te leva a fazer experimentos científicos munida de binóculos e uma bicicleta amarela.\r\n<br>\r\n<br>\r\nÍris tem 17 anos e está viciada na novela Amor em atos. Ela e sua vizinha, Dona Símia, de 68 anos, não perdem um episódio. Na escola, parece que todo mundo só pensa em duas coisas: na festa de formatura e em perder a virgindade. Só que a vida de Íris está prestes a mudar: Cadu Sena, sua paixão platônica desde a oitava série, está solteiro. Essa é a chance de Íris.', 28, 'capa20.jpg', 'class16.png', 1, 22, 26, 0);
-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(13) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `dataNascimento`, `cpf`, `cidade`, `UF`, `telefone`, `status`) VALUES
(1, 'Gabrielle', 'gabrielle@gmail.com', '1234', '', '0', 'Umuarama', 'PR', '44 8825 939', 1),
(2, 'Gabrielle', 'gabrielle@gmail.com', '1234', '', '0', 'Umuarama', 'PR', '44 8825 939', 1),
(3, 'Gabrielle', 'gabrielle@gmail.com', '1234', '', '0', 'Umuarama', 'PR', '44 8825 939', 1),
(4, 'Ana Laura Dias de Cabral', 'Nalauraaa@gmail.com', '56789', '10/03/20', '153246', 'Cafezal', 'AL', '(44)98535-3', 1),
(5, 'Ana Laura Dias de Cabral', 'Nalauraaa@gmail.com', '56789', '10/03/20', '153246', 'Cafezal', 'AL', '(44)98535-3', 1),
(6, 'Batista', 'Batistaaa@gmail.com', '4134321', '30/08/20', '243517', 'Cruzeiro', 'MT', '(44)87263-5', 1),
(7, 'Gustavo Antonio', 'guuuuA@gmail.com', '243534645', '21/12/20', '084.709.149', 'Icaraíma', 'PE', '(44)87392-0223', 1),
(8, 'Gustavo Antonio', 'guuuuA@gmail.com', '23214124', '21/02/23', '111.111.111', 'Umuarama', 'PI', '(43)23424-4323', 1),
(25, 'ebfrenfdrenfde', 'favgd@bfrbfrn', '33213123', '2001-03-', '08470914901', 'Abadia dos Dourados', 'MG', '(22)22222-2222', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livrosCarrinho_livros` (`livros_id`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livrogenero`
--
ALTER TABLE `livrogenero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livrosGeneros_Livros` (`livro_id`),
  ADD KEY `fk_livrosGeneros_Generos` (`genero_id`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livrosAutor_Livros` (`livrosAutor_id`),
  ADD KEY `fk_livrosEditora_Livros` (`livrosEditora_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `livrogenero`
--
ALTER TABLE `livrogenero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_livrosCarrinho_livros` FOREIGN KEY (`livros_id`) REFERENCES `livros` (`id`);

--
-- Restrições para tabelas `livrogenero`
--
ALTER TABLE `livrogenero`
  ADD CONSTRAINT `fk_livrosGeneros_Generos` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `fk_livrosGeneros_Livros` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`);

--
-- Restrições para tabelas `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_livrosAutor_Livros` FOREIGN KEY (`livrosAutor_id`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `fk_livrosEditora_Livros` FOREIGN KEY (`livrosEditora_id`) REFERENCES `editora` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
