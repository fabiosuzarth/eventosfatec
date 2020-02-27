/* OS NOT IN SAO PALESTRANTES E USUARIOS TESTE */
select id, cpfcnpj, nome from pessoa where pessoa.cpfcnpj 
    not IN(	'11111111111',
            '77458969935',
            '001', '002', '003', '004', '005', '006', '007', '008', '009', '010', '011', '012', '013', '014',
            '33541768820',
            '47560646809',
            '33793611111',
            '02148771510',
            '41451283032')
    ORDER BY 1