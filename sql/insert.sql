
/* ----------- TIPO PESSOA ----------- */
INSERT INTO tipopessoa(id, nome) VALUES(1, 'Aluno');
INSERT INTO tipopessoa(id, nome) VALUES(2, 'Ex-Aluno');
INSERT INTO tipopessoa(id, nome) VALUES(3, 'Professor');
INSERT INTO tipopessoa(id, nome) VALUES(4, 'Visitante');
INSERT INTO tipopessoa(id, nome) VALUES(5, 'Administrador');
INSERT INTO tipopessoa(id, nome) VALUES(6, 'Organizador');
INSERT INTO tipopessoa(id, nome) VALUES(7, 'Palestrante');

/* ----------- ESCOLARIDADE ----------- */
INSERT INTO escolaridade(id, nome) VALUES (1, 'N/A');
INSERT INTO escolaridade(id, nome) VALUES (2, 'Ensino Fundamental');
INSERT INTO escolaridade(id, nome) VALUES (3, 'Ensino Médio');
INSERT INTO escolaridade(id, nome) VALUES (4, 'Ensino Superior');
INSERT INTO escolaridade(id, nome) VALUES (5, 'Pos-Graduação');

/* ----------- CATEGORIA ATIVIDADE ----------- */
INSERT INTO categoria(id, nome) VALUES (1, 'Atividade');
INSERT INTO categoria(id, nome) VALUES (2, 'Mini Curso');
INSERT INTO categoria(id, nome) VALUES (3, 'Palestra');
INSERT INTO categoria(id, nome) VALUES (4, 'Avaliação');

/* ----------- STATUS EVENTO ----------- */
INSERT INTO statusevento(id, nome) VALUES (1, 'Aberto');
INSERT INTO statusevento(id, nome) VALUES (2, 'Fechado');

/* ----------- STATUS ATIVIDADE ----------- */
INSERT INTO statusatividade(id, nome) VALUES (1, 'Inscrições Abertas');
INSERT INTO statusatividade(id, nome) VALUES (2, 'Inscrições Encerradas');
INSERT INTO statusatividade(id, nome) VALUES (3, 'Vagas Esgotadas');
INSERT INTO statusatividade(id, nome) VALUES (4, 'Cancelado');

/* ----------- STATUS INSCRICAO ----------- */
INSERT INTO statusinscricao(id, nome) VALUES (1, 'Inscrito');
INSERT INTO statusinscricao(id, nome) VALUES (2, 'Inscrito Compareceu');
INSERT INTO statusinscricao(id, nome) VALUES (3, 'Inscrito Não Compareceu');
INSERT INTO statusinscricao(id, nome) VALUES (4, 'Inscrito Durante Evento');

/* ----------- INSERE PESSOA ----------- */

/* PARA SENHA HASHAR COM SHA512 */
/* EXEMPLO = 123 = 3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2 
/* PARA NASCIMENTO YYYY-MM-DD */

insert into pessoa (cpfcnpj, email, senha, tipo_id, nome, logradouro, telefone, data_nascimento, observacao, escolaridade_id, cep, cidade, bairro, numero, complemento, estado, pais)
VALUES('11111111111', 'fatec@fatec.sp.gov.br', '3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2',
       6, 'Fatec Araras', 'Avenida Jose Ometto', '1935566698', '2017-08-01', '', 1, '13600897', 'Araras', 'Jose Ometto', '1558', '', 'Sao Paulo', 'Brasil');
       
insert into pessoa (cpfcnpj, email, senha, tipo_id, nome, logradouro, telefone, data_nascimento, observacao, escolaridade_id, cep, cidade, bairro, numero, complemento, estado, pais)
VALUES('33541768819', 'denadai.sicari@gmail.com', '3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2',
       1, 'Danilo de Nadai Sicari', 'Rua Santa Cruz', '15997477091', '1990/05/04', '', 4, '13600010', 'Araras', 'Centro', '863', 'Apto 31', 'Sao Paulo', 'Brasil');     

insert into pessoa (cpfcnpj, email, senha, tipo_id, nome, logradouro, telefone, data_nascimento, observacao, escolaridade_id, cep, cidade, bairro, numero, complemento, estado, pais)
VALUES('55698715525', 'jeitomuleke@gmail.com', '3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2',
       1, 'Josias Josiel', 'Rua America', '19955866936', '2000-06-03', '', 4, '13600615', 'Araras', 'Parque das Arvores', '556', '', 'Sao Paulo', 'Brasil');     

insert into pessoa (cpfcnpj, email, senha, tipo_id, nome, logradouro, telefone, data_nascimento, observacao, escolaridade_id, cep, cidade, bairro, numero, complemento, estado, pais)
VALUES('88977452636', 'bonekinha@live.com', '3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2',
       1, 'Bruna Silvia dos Santos', 'Avenida da saudade', '1122569874', '1998-01-08', '', 4, '13600719', 'Araras', 'Cascata', '869', '', 'Sao Paulo', 'Brasil');
       
insert into pessoa (cpfcnpj, email, senha, tipo_id, nome, logradouro, telefone, data_nascimento, observacao, escolaridade_id, cep, cidade, bairro, numero, complemento, estado, pais)
VALUES('77458969935', 'niltinho@fatec.sp.gov.br', '3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2',
       5, 'Nilton Sacco', 'Rua Jose Farias', '19988563247', '1978-12-11', '', 5, '13600897', 'Araras', 'Jose Ometto', '1558', '', 'Sao Paulo', 'Brasil');

/* ----------- INSERE EVENTO ----------- */
INSERT INTO evento(nome, descricao, datahora_inicio, datahora_fim, localizacao, valor, status_id, pessoa_id, organizador_pessoa_id) 
VALUES ('Fatec Portas Abertas', 'Mostra de projetos dos alunos da Fatec Araras', '2019-05-29 00:00:00', '2019-05-29 23:59:59', 'Fatec Araras, salas de aula e laboratorios', 0, 1, 5, 1);

INSERT INTO evento(nome, descricao, datahora_inicio, datahora_fim, localizacao, valor, status_id, pessoa_id, organizador_pessoa_id) 
VALUES ('III Semana Tecnologia', 'Atividades de extensao e palestras sobre tecnologia', '2019-10-28 00:00:00', '2019-11-01 23:59:59', 'Fatec Araras, salas de aula e laboratorios', 0, 1, 5, 1);

/* ----------- INSERE ATIVIDADE ----------- */
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (1, 'Blogs', 'Blogs criados pelos alunos do primeiro semestre do curso Sistemas para Internet', 1, '2019-05-29 08:00:00', '2019-05-29 09:00:00', 'Sala 3', 50, 1, 1);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (1, 'Blogs', 'Blogs criados pelos alunos do primeiro semestre do curso Sistemas para Internet', 1, '2019-05-29 18:00:00', '2019-05-29 20:00:00', 'sala 3', 50, 2, 1);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (1, 'Jogos', 'Jogos criados peloas alunos do terceiro semestre do curso Sistemas para Internet', 1, '2019-05-29 18:00:00', '2019-05-29 22:00:00', 'sala 5', 50, 4, 1);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (1, 'Trabalhos academicos', 'Trabalhos dos alunos da Fatec Araras', 1, '2019-05-29 18:00:00', '2019-05-29 22:00:00', 'Sala 4, Laboratorio 3 e 4', 150, 4, 1);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'ARM CORTEX M3', 'Descubra RTOS com familia M3 ARM', 3, '2019-10-28 00:00:00', '2019-11-01 22:00:00', 'laboratorio 1', 15, 20, 3);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'Gestao de Politicas Publicas com Elastic Search', 'Entenda como o Elastic Search esta ajudando o governo Brasileiro a combater a corrupcao', 3, '2019-10-28 18:00:00', '2019-11-28 20:00:00', 'Sala 4', 2, 50, 3);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'Musica sintetica para todos', 'MIDI em seus projetos musicais', 1, '2019-10-28 20:30:00', '2019-11-28 22:00:00', 'Sala 5', 2, 50, 3);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'Trate seu Warning', 'Aprenda que Warnings na compilacao nao sao ao acaso', 1, '2019-10-29 18:00:00', '2019-11-29 20:00:00', 'Sala 2', 2, 50, 3);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'Torra de cafe Ararense', 'Descubra como o barao do cafe de araras preparava seu cafe', 1, '2019-10-29 21:00:00', '2019-11-29 22:00:00', 'Sala 6', 1, 100, 3);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'Contos infantis na era digital', 'Como as criancas estao ouvindo historias modernas em tempos modernos?', 1, '2019-10-29 20:00:00', '2019-11-29 22:00:00', 'Sala 1', 2, 100, 3);
INSERT INTO atividade(evento_id, nome, descricao, categoria_id, datahora_inicio, datahora_fim, localizacao, vagas, horas, status_id) VALUES (2, 'Dados Abertos', 'Como hackers estao ajudando o Brasil a ser um pais melhor', 3, '2019-10-30 18:00:00', '2019-11-30 23:00:00', 'Auditorio', 1, 100, 3);

/* ----------- INSERE INSCRICAO ----------- */
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(2, 1, 2);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(2, 3, 3);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(3, 4, 3);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(4, 3, 3);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(2, 5, 2);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(2, 6, 3);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(3, 6, 3);
INSERT INTO inscricao(pessoa_id, atividade_id, status_id) VALUES(4, 7, 3);

/* ----------- INSERE PAIS ----------- */
INSERT INTO `pais` VALUES (1,'AFEGANISTÃO','AFGHANISTAN'),(2,'ACROTÍRI E DECELIA','AKROTIRI E DEKÉLIA'),(3,'ÁFRICA DO SUL','SOUTH AFRICA'),(4,'ALBÂNIA','ALBANIA'),(5,'ALEMANHA','GERMANY'),(6,'AMERICAN SAMOA','AMERICAN SAMOA'),(7,'ANDORRA','ANDORRA'),(8,'ANGOLA','ANGOLA'),(9,'ANGUILLA','ANGUILLA'),(10,'ANTÍGUA E BARBUDA','ANTIGUA AND BARBUDA'),(11,'ANTILHAS NEERLANDESAS','NETHERLANDS ANTILLES'),(12,'ARÁBIA SAUDITA','SAUDI ARABIA'),(13,'ARGÉLIA','ALGERIA'),(14,'ARGENTINA','ARGENTINA'),(15,'ARMÉNIA','ARMENIA'),(16,'ARUBA','ARUBA'),(17,'AUSTRÁLIA','AUSTRALIA'),(18,'ÁUSTRIA','AUSTRIA'),(19,'AZERBAIJÃO','AZERBAIJAN'),(20,'BAHAMAS','BAHAMAS, THE'),(21,'BANGLADECHE','BANGLADESH'),(22,'BARBADOS','BARBADOS'),(23,'BARÉM','BAHRAIN'),(24,'BASSAS DA ÍNDIA','BASSAS DA INDIA'),(25,'BÉLGICA','BELGIUM'),(26,'BELIZE','BELIZE'),(27,'BENIM','BENIN'),(28,'BERMUDAS','BERMUDA'),(29,'BIELORRÚSSIA','BELARUS'),(30,'BOLÍVIA','BOLIVIA'),(31,'BÓSNIA E HERZEGOVINA','BOSNIA AND HERZEGOVINA'),(32,'BOTSUANA','BOTSWANA'),(33,'BRASIL','BRAZIL'),(34,'BRUNEI DARUSSALAM','BRUNEI DARUSSALAM'),(35,'BULGÁRIA','BULGARIA'),(36,'BURQUINA FASO','BURKINA FASO'),(37,'BURUNDI','BURUNDI'),(38,'BUTÃO','BHUTAN'),(39,'CABO VERDE','CAPE VERDE'),(40,'CAMARÕES','CAMEROON'),(41,'CAMBOJA','CAMBODIA'),(42,'CANADÁ','CANADA'),(43,'CATAR','QATAR'),(44,'CAZAQUISTÃO','KAZAKHSTAN'),(45,'CENTRO-AFRICANA REPÚBLICA','CENTRAL AFRICAN REPUBLIC'),(46,'CHADE','CHAD'),(47,'CHILE','CHILE'),(48,'CHINA','CHINA'),(49,'CHIPRE','CYPRUS'),(50,'COLÔMBIA','COLOMBIA'),(51,'COMORES','COMOROS'),(52,'CONGO','CONGO'),(53,'CONGO REPÚBLICA DEMOCRÁTICA','CONGO DEMOCRATIC 
REPUBLIC'),(54,'COREIA DO NORTE','KOREA NORTH'),(55,'COREIA DO SUL','KOREA SOUTH'),(56,'COSTA DO MARFIM','IVORY COAST'),(57,'COSTA RICA','COSTA RICA'),(58,'CROÁCIA','CROATIA'),(59,'CUBA','CUBA'),(60,'DINAMARCA','DENMARK'),(61,'DOMÍNICA','DOMINICA'),(62,'EGIPTO','EGYPT'),(63,'EMIRADOS ÁRABES UNIDOS','UNITED ARAB EMIRATES'),(64,'EQUADOR','ECUADOR'),(65,'ERITREIA','ERITREA'),(66,'ESLOVÁQUIA','SLOVAKIA'),(67,'ESLOVÉNIA','SLOVENIA'),(68,'ESPANHA','SPAIN'),(69,'ESTADOS UNIDOS','UNITED STATES'),(70,'ESTÓNIA','ESTONIA'),(71,'ETIÓPIA','ETHIOPIA'),(72,'FAIXA DE GAZA','GAZA STRIP'),(73,'FIJI','FIJI'),(74,'FILIPINAS','PHILIPPINES'),(75,'FINLÂNDIA','FINLAND'),(76,'FRANÇA','FRANCE'),(77,'GABÃO','GABON'),(78,'GÂMBIA','GAMBIA'),(79,'GANA','GHANA'),(80,'GEÓRGIA','GEORGIA'),(81,'GIBRALTAR','GIBRALTAR'),(82,'GRANADA','GRENADA'),(83,'GRÉCIA','GREECE'),(84,'GRONELÂNDIA','GREENLAND'),(85,'GUADALUPE','GUADELOUPE'),(86,'GUAM','GUAM'),(87,'GUATEMALA','GUATEMALA'),(88,'GUERNSEY','GUERNSEY'),(89,'GUIANA','GUYANA'),(90,'GUIANA FRANCESA','FRENCH GUIANA'),(91,'GUINÉ','GUINEA'),(92,'GUINÉ EQUATORIAL','EQUATORIAL GUINEA'),(93,'GUINÉ-BISSAU','GUINEA-BISSAU'),(94,'HAITI','HAITI'),(95,'HONDURAS','HONDURAS'),(96,'HONG KONG','HONG KONG'),(97,'HUNGRIA','HUNGARY'),(98,'IÉMEN','YEMEN'),(99,'ILHA BOUVET','BOUVET ISLAND'),(100,'ILHA CHRISTMAS','CHRISTMAS ISLAND'),(101,'ILHA DE CLIPPERTON','CLIPPERTON ISLAND'),(102,'ILHA DE JOÃO DA NOVA','JUAN DE NOVA ISLAND'),(103,'ILHA DE MAN','ISLE OF MAN'),(104,'ILHA DE NAVASSA','NAVASSA ISLAND'),(105,'ILHA EUROPA','EUROPA ISLAND'),(106,'ILHA NORFOLK','NORFOLK ISLAND'),(107,'ILHA TROMELIN','TROMELIN ISLAND'),(108,'ILHAS ASHMORE E CARTIER','ASHMORE AND CARTIER ISLANDS'),(109,'ILHAS CAIMAN','CAYMAN ISLANDS'),(110,'ILHAS COCOS (KEELING)','COCOS (KEELING) ISLANDS'),(111,'ILHAS COOK','COOK ISLANDS'),(112,'ILHAS DO MAR DE CORAL','CORAL SEA ISLANDS'),(113,'ILHAS FALKLANDS (ILHAS MALVINAS)','FALKLAND ISLANDS (ISLAS MALVINAS)'),(114,'ILHAS FEROE','FAROE ISLANDS'),(115,'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),(116,'ILHAS MARIANAS DO NORTE','NORTHERN MARIANA ISLANDS'),(117,'ILHAS MARSHALL','MARSHALL ISLANDS'),(118,'ILHAS PARACEL','PARACEL ISLANDS'),(119,'ILHAS PITCAIRN','PITCAIRN ISLANDS'),(120,'ILHAS SALOMÃO','SOLOMON ISLANDS'),(121,'ILHAS SPRATLY','SPRATLY ISLANDS'),(122,'ILHAS VIRGENS AMERICANAS','UNITED STATES VIRGIN ISLANDS'),(123,'ILHAS VIRGENS BRITÂNICAS','BRITISH VIRGIN ISLANDS'),(124,'ÍNDIA','INDIA'),(125,'INDONÉSIA','INDONESIA'),(126,'IRÃO','IRAN'),(127,'IRAQUE','IRAQ'),(128,'IRLANDA','IRELAND'),(129,'ISLÂNDIA','ICELAND'),(130,'ISRAEL','ISRAEL'),(131,'ITÁLIA','ITALY'),(132,'JAMAICA','JAMAICA'),(133,'JAN MAYEN','JAN MAYEN'),(134,'JAPÃO','JAPAN'),(135,'JERSEY','JERSEY'),(136,'JIBUTI','DJIBOUTI'),(137,'JORDÂNIA','JORDAN'),(138,'KIRIBATI','KIRIBATI'),(139,'KOWEIT','KUWAIT'),(140,'LAOS','LAOS'),(141,'LESOTO','LESOTHO'),(142,'LETÓNIA','LATVIA'),(143,'LÍBANO','LEBANON'),(144,'LIBÉRIA','LIBERIA'),(145,'LÍBIA','LIBYAN ARAB JAMAHIRIYA'),(146,'LISTENSTAINE','LIECHTENSTEIN'),(147,'LITUÂNIA','LITHUANIA'),(148,'LUXEMBURGO','LUXEMBOURG'),(149,'MACAU','MACAO'),(150,'MACEDÓNIA','MACEDONIA'),(151,'MADAGÁSCAR','MADAGASCAR'),(152,'MALÁSIA','MALAYSIA'),(153,'MALAVI','MALAWI'),(154,'MALDIVAS','MALDIVES'),(155,'MALI','MALI'),(156,'MALTA','MALTA'),(157,'MARROCOS','MOROCCO'),(158,'MARTINICA','MARTINIQUE'),(159,'MAURÍCIA','MAURITIUS'),(160,'MAURITÂNIA','MAURITANIA'),(161,'MAYOTTE','MAYOTTE'),(162,'MÉXICO','MEXICO'),(163,'MIANMAR','MYANMAR BURMA'),(164,'MICRONÉSIA','MICRONESIA'),(165,'MOÇAMBIQUE','MOZAMBIQUE'),(166,'MOLDÁVIA','MOLDOVA'),(167,'MÓNACO','MONACO'),(168,'MONGÓLIA','MONGOLIA'),(169,'MONTENEGRO','MONTENEGRO'),(170,'MONTSERRAT','MONTSERRAT'),(171,'NAMÍBIA','NAMIBIA'),(172,'NAURU','NAURU'),(173,'NEPAL','NEPAL'),(174,'NICARÁGUA','NICARAGUA'),(175,'NÍGER','NIGER'),(176,'NIGÉRIA','NIGERIA'),(177,'NIUE','NIUE'),(178,'NORUEGA','NORWAY'),(179,'NOVA CALEDÓNIA','NEW CALEDONIA'),(180,'NOVA ZELÂNDIA','NEW ZEALAND'),(181,'OMÃ','OMAN'),(182,'PAÍSES BAIXOS','NETHERLANDS'),(183,'PALAU','PALAU'),(184,'PALESTINA','PALESTINE'),(185,'PANAMÁ','PANAMA'),(186,'PAPUÁSIA-NOVA GUINÉ','PAPUA NEW GUINEA'),(187,'PAQUISTÃO','PAKISTAN'),(188,'PARAGUAI','PARAGUAY'),(189,'PERU','PERU'),(190,'POLINÉSIA FRANCESA','FRENCH POLYNESIA'),(191,'POLÓNIA','POLAND'),(192,'PORTO RICO','PUERTO RICO'),(193,'PORTUGAL','PORTUGAL'),(194,'QUÉNIA','KENYA'),(195,'QUIRGUIZISTÃO','KYRGYZSTAN'),(196,'REINO UNIDO','UNITED KINGDOM'),(197,'REPÚBLICA CHECA','CZECH REPUBLIC'),(198,'REPÚBLICA DOMINICANA','DOMINICAN REPUBLIC'),(199,'ROMÉNIA','ROMANIA'),(200,'RUANDA','RWANDA'),(201,'RÚSSIA','RUSSIAN FEDERATION'),(202,'SAHARA OCCIDENTAL','WESTERN SAHARA'),(203,'SALVADOR','EL SALVADOR'),(204,'SAMOA','SAMOA'),(205,'SANTA HELENA','SAINT HELENA'),(206,'SANTA LÚCIA','SAINT LUCIA'),(207,'SANTA SÉ','HOLY SEE'),(208,'SÃO CRISTÓVÃO E NEVES','SAINT KITTS AND NEVIS'),(209,'SÃO MARINO','SAN MARINO'),(210,'SÃO PEDRO E MIQUELÃO','SAINT PIERRE AND MIQUELON'),(211,'SÃO TOMÉ E PRÍNCIPE','SAO TOME AND PRINCIPE'),(212,'SÃO VICENTE E GRANADINAS','SAINT VINCENT AND THE GRENADINES'),(213,'SEICHELES','SEYCHELLES'),(214,'SENEGAL','SENEGAL'),(215,'SERRA LEOA','SIERRA LEONE'),(216,'SÉRVIA','SERBIA'),(217,'SINGAPURA','SINGAPORE'),(218,'SÍRIA','SYRIA'),(219,'SOMÁLIA','SOMALIA'),(220,'SRI LANCA','SRI LANKA'),(221,'SUAZILÂNDIA','SWAZILAND'),(222,'SUDÃO','SUDAN'),(223,'SUÉCIA','SWEDEN'),(224,'SUÍÇA','SWITZERLAND'),(225,'SURINAME','SURINAME'),(226,'SVALBARD','SVALBARD'),(227,'TAILÂNDIA','THAILAND'),(228,'TAIWAN','TAIWAN'),(229,'TAJIQUISTÃO','TAJIKISTAN'),(230,'TANZÂNIA','TANZANIA'),(231,'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO','BRITISH INDIAN OCEAN TERRITORY'),(232,'TERRITÓRIO DAS ILHAS HEARD E MCDONALD','HEARD ISLAND AND MCDONALD ISLANDS'),(233,'TIMOR-LESTE','TIMOR-LESTE'),(234,'TOGO','TOGO'),(235,'TOKELAU','TOKELAU'),(236,'TONGA','TONGA'),(237,'TRINDADE E TOBAGO','TRINIDAD AND TOBAGO'),(238,'TUNÍSIA','TUNISIA'),(239,'TURKS E CAICOS','TURKS AND CAICOS ISLANDS'),(240,'TURQUEMENISTÃO','TURKMENISTAN'),(241,'TURQUIA','TURKEY'),(242,'TUVALU','TUVALU'),(243,'UCRÂNIA','UKRAINE'),(244,'UGANDA','UGANDA'),(245,'URUGUAI','URUGUAY'),(246,'USBEQUISTÃO','UZBEKISTAN'),(247,'VANUATU','VANUATU'),(248,'VENEZUELA','VENEZUELA'),(249,'VIETNAME','VIETNAM'),(250,'WALLIS E FUTUNA','WALLIS AND FUTUNA'),(251,'ZÂMBIA','ZAMBIA'),(252,'ZIMBABUÉ','ZIMBABWE');


