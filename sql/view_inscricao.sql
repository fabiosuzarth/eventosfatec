	SELECT 	/*inscricao.id,
				inscricao.pessoa_id,
				pessoa.nome AS pessoa_nome,
				inscricao.status_id AS status_inscricao_id,
				statusinscricao.nome AS status_inscricao_nome,*/
				inscricao.atividade_id,
				atividade.nome AS atividade_nome,
				atividade.status_id AS status_atividade_id,	
				statusatividade.nome AS status_atividade_nome,
				atividade.evento_id AS evento_id,
				evento.nome AS evento_nome,
				evento.status_id AS status_evento_id,	
				statusevento.nome AS status_evento_nome,
				atividade.vagas AS vagas_ofertadas, 
				COALESCE(A.total,0) as total_inscritos,
				(atividade.vagas - COALESCE(A.total,0)) as vagas_restantes
				/*inscricao.datahora_sign,
				inscricao.sign_cert	*/							
			FROM inscricao
			INNER JOIN pessoa ON inscricao.pessoa_id=pessoa.id
			INNER JOIN atividade ON inscricao.atividade_id=atividade.id
			INNER JOIN evento ON atividade.evento_id=evento.id
			INNER JOIN statusinscricao ON inscricao.status_id=statusinscricao.id
			INNER JOIN statusevento ON evento.status_id=statusevento.id
			INNER JOIN statusatividade ON atividade.status_id=statusatividade.id
			LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                           FROM inscricao
                           WHERE status_id IN (1, 2, 3)
                           GROUP BY 2 ) A ON A.atividade_id = atividade.id
         GROUP BY atividade_id
			ORDER BY atividade_nome
			 