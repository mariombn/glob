CREATE TABLE usuarios (
	usua_id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
	usua_email          VARCHAR(200) NOT NULL,
	usua_nome           VARCHAR(100) NOT NULL,
	usua_sobrenome      VARCHAR(250),
	usua_nickname       VARCHAR(100) NOT NULL,
	usua_data_cadastro  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	usua_data_alteracao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	usua_status         ENUM('pendente', 'ativo', 'inativo') DEFAULT 'pendente',
	PRIMARY KEY (usua_id),
	UNIQUE KEY uk_usua_email (usua_email),
	UNIQUE KEY uk_usua_nickname (usua_nickname)
) ENGINE=InnoDB;

CREATE TABLE categorias (
	cate_id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
	cate_nome      VARCHAR(100) NOT NULL,
	cate_descricao TEXT,
	cate_status    ENUM('ativo', 'inativo') DEFAULT 'ativo',
	PRIMARY KEY (cate_id)
) ENGINE=InnoDB;

CREATE TABLE posts (
	post_id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
	post_titulo         VARCHAR(250) NOT NULL,
	post_chamada        TEXT,
	post_corpo          TEXT NOT NULL,
	post_thumbnails     VARCHAR(250),
	post_data_cadastro  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	post_data_alteracao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	post_status         ENUM('rascunho', 'publicado', 'arquivado', 'inativado') DEFAULT 'rascunho',
	post_usua_id        INT UNSIGNED NOT NULL,
	post_cate_id        INT UNSIGNED NOT NULL,
	PRIMARY KEY (post_id),
	FOREIGN KEY fk_post_usua_id (post_usua_id) REFERENCES usuarios(usua_id) ON DELETE CASCADE,
	FOREIGN KEY fk_post_cate_id (post_cate_id) REFERENCES categorias(cate_id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE comentarios (
	come_id            INT UNSIGNED NOT NULL AUTO_INCREMENT,
	come_nome          VARCHAR(150),
	come_email         VARCHAR(250),
	come_corpo         TEXT,
	come_data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	come_status        ENUM('pendente', 'publicado', 'banido') DEFAULT 'publicado',
	come_come_id       INT UNSIGNED,
	come_usua_id       INT UNSIGNED,
	PRIMARY KEY (come_id),
	FOREIGN KEY fk_come_come_id (come_come_id) REFERENCES comentarios(come_id) ON DELETE CASCADE,
	FOREIGN KEY fk_come_usua_id (come_usua_id) REFERENCES usuarios(usua_id) ON DELETE SET NULL
) ENGINE=INNODB;

CREATE TABLE parametros (
	para_id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
	para_nome         VARCHAR(100) NOT NULL,
	para_chave        VARCHAR(100) NOT NULL,
	para_valor_texto  VARCHAR(100),
	para_valor_numero DOUBLE,
	para_valor_data   DATETIME,
	PRIMARY KEY (para_id)
) ENGINE=INNODB;

INSERT INTO parametros (para_nome, para_chave, para_valor_numero) VALUES ('Publicação Automatica', 'AUTO_PUBL', 1);
INSERT INTO parametros (para_nome, para_chave, para_valor_numero) VALUES ('Aprovação Automatica de Comentarios', 'AUTO_COME', 1);