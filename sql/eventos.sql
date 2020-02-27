SELECT a.evento_id, a.id, a.nome, a.descricao, c.nome AS categoria, a.datahora_inicio, a.datahora_fim, a.localizacao, a.vagas, a.horas, a.status 
	FROM atividade a 
	INNER JOIN categoria c ON a.categoria_id=c.id 
	ORDER BY a.evento_id, c.nome ASC