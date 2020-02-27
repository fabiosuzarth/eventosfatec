#
#   DEVE PRODUZIR O JSON A SEGUIR, CONTEMPLANDO TODOS OS ARQUIVOS PASSADOS PARA PARSE
#
    # jsonData={
    #     "entradaEvento": 
    #     [
    #         {
    #             "eventoId": 2,
    #             "pessoaId": 909,
    #             "authorizationCode": "kjncSACsacasiojc123iojaosd"
    #         },
    #         {
    #             "eventoId": 2,
    #             "pessoaId": 910,
    #             "authorizationCode": "kjncSACsacasiojc123iojaosd"
    #         }
    #     ],
    #     "confirmarPresencaApp": 
    #     [
    #         {
    #             "atividadeId": 26,
    #             "pessoaId": 909,
    #             "authorizationCode": "kjncSACsacasiojc123iojaosd"
    #         },
    #         {
    #             "atividadeId": 27,
    #             "pessoaId": 910,
    #             "authorizationCode": "kjncSACsacasiojc123iojaosd"
    #         }
    #     ]
    # }


#   VERIFICADO EM 29/10/2019, um pouco incoerente pois incricao com sign_cert <> '' = 362, mas lembrar que possuimos duplicados
#       entradaEvento validados=240 de total=261
#       confirmarPresencaApp validados=405 de total=410

import json
import mysql.connector

def confrontarJsonComBanco(jsonData, confronto):
    db = mysql.connector.connect(   host="eventosfatec.dsicari.com.br",
                                    user="eventosfatec",
                                    port=6033,
                                    password="Fatec2019!",
                                    database="eventosfatec")
    cursor = db.cursor()

    if(confronto=="entradaEvento"):
        lenEntradaEvento=len(jsonData['entradaEvento'])
        print("entradaEvento records=" + str(lenEntradaEvento))
        count=0
        progress=0
        for j in jsonData['entradaEvento']:
            query = ("SELECT * FROM entradaevento where DAY(datahora) = DAY('"+ j['datahoraEnvio'] +"') AND pessoa_id="+j['pessoaId'])
            cursor.execute(query)
            rslt = cursor.fetchall()
            if(len(rslt) > 0):
                j['validado']=True
            count=count+1
            progress=progress+1
            if(count>20):
                print("entradaEvento progress="+str(progress)+"/"+str(lenEntradaEvento))
                count=0
        progress=0
    elif(confronto=="confirmarPresencaApp"):
        lenConfirmarPresencaApp=len(jsonData['confirmarPresencaApp'])
        print("confirmarPresencaApp records=" + str(lenConfirmarPresencaApp))
        count=0
        progress=0
        for j in jsonData['confirmarPresencaApp']:
            query = ("SELECT * FROM inscricao where atividade_id="+ j['atividadeId'] +" AND pessoa_id="+j['pessoaId'])
            cursor.execute(query)
            rslt = cursor.fetchall()
            if(len(rslt) > 0):
                j['validado']=True
            count=count+1
            progress=progress+1
            if(count>20):
                print("confirmarPresencaApp progress="+str(progress)+"/"+str(lenConfirmarPresencaApp))
                count=0
        progress=0
    cursor.close()
    db.close()

def saveList2File(list2Save, file):
    with open(file, 'w') as f:
        for item in list2Save:
            f.write("%s" % item)

def saveJson2File(json2Save, file, prettify):
    with open(file, 'w') as f:
        if(prettify == False):
            json.dump(json2Save, f)
        else:
            json.dump(json2Save, f, indent=4, sort_keys=False)

def file2List(file2open, key):
    lines=[]
    num=0
    lastLineHot=False
    with open(file2open, "r", encoding="utf8") as fileSrc:
        for line in fileSrc:      

            if(lastLineHot):
                lastLineHot = False
                lines[-1] = lines[-1] + line
                continue

            if(line.find(key) != -1):
                lastLineHot=True
                lines.append(line.replace('\n', ''))
            else:
                lines.append(line)

            num=num+1

    return lines

if __name__ == '__main__':
    files=[
        "moedor\\danilo\\log_2019-10-21.txt",
        "moedor\\danilo\\log_2019-10-22.txt",
        "moedor\\fabio\\log_2019-10-21 (1).txt",
        "moedor\\fabio\\log_2019-10-22 (1).txt",
        "moedor\\fabio\\log_2019-10-23 (1).txt",
        "moedor\\fabio_pai\\log_2019-10-21.txt",
        "moedor\\fabio_pai\\log_2019-10-22.txt",
        "moedor\\fabio_pai\\log_2019-10-28.txt",
        "moedor\\paulo\\log_2019-10-21.txt",
        "moedor\\paulo\\log_2019-10-22.txt",
        "moedor\\paulo\\log_2019-10-23.txt"        
    ]
    jsonData={}
    listaLog=[]
    listaEntradaEvento=[]
    listaConfirmarPresencaApp=[]

    for f in files:
        listaLog.extend(file2List(f, "Validacao enviada"))
        #saveList2File(listaLog, "your_file.txt")
    
    for l in listaLog:
        # Linhas a capturar
        # 2019-10-21 07:03:07.153 Validacao enviada, Result=20Validar=https://eventosfatec.dsicari.com.br/entradaevento/2/20/310c77f27d6313bf3223e5ce03d61e0c
        # 2019-10-22 09:58:12.617 Validacao enviada, Result=956Validar=https://eventosfatec.dsicari.com.br/inscricao/confirmarpresencaapp/29/956/310c77f27d6313bf3223e5ce03d61e0c
        if("Validacao enviada" in l):

            index=l.find("entradaevento/")
            if(index != -1):
                index=index+len("entradaevento/")
                token=l[index:len(l)].split('/')
                tmp_dict={'eventoId':token[0], 'pessoaId':token[1], 'auth':token[2].replace('\n', ''), 'datahoraEnvio': l[:19],'validado': False}
                listaEntradaEvento.append(tmp_dict)
                continue

            index=l.find("confirmarpresencaapp/")
            if(index != -1):
                index=index+len("confirmarpresencaapp/")
                token=l[index:len(l)].split('/')
                tmp_dict={'atividadeId':token[0], 'pessoaId':token[1], 'auth':token[2].replace('\n', ''), 'datahoraEnvio': l[:19], 'validado': False}
                listaConfirmarPresencaApp.append(tmp_dict)
                continue

    jsonData['entradaEvento']=listaEntradaEvento
    jsonData['confirmarPresencaApp']=listaConfirmarPresencaApp

    saveJson2File(jsonData, "moedor\\out_raw.json", True)
    confrontarJsonComBanco(jsonData, "entradaEvento")
    confrontarJsonComBanco(jsonData, "confirmarPresencaApp")
    saveJson2File(jsonData, "moedor\\out.json", True)
    
    total=0
    validados=0
    for j in jsonData['entradaEvento']:
        if(j['validado']==True):
            validados=validados+1
        total=total+1
    print("entradaEvento validados="+str(validados)+" de total="+str(total))

    total=0
    validados=0
    for j in jsonData['confirmarPresencaApp']:
        if(j['validado']==True):
            validados=validados+1
        total=total+1
    print("confirmarPresencaApp validados="+str(validados)+" de total="+str(total))