DROP TABLE valida_usuario

CREATE TABLE valida_usuario (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, atividade_id INT NOT NULL, usuario_id INT NOT NULL, datahora TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3))

INSERT INTO valida_usuario (atividade_id, usuario_id) VALUES(1,3)

SELECT * FROM valida_usuario

