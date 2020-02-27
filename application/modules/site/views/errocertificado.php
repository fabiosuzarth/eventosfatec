<style>
body{
    font-family: fantasy;
    background-color: #FAC934;
    text-align: center;
}

#opa{    
    margin-top: 5%;
    font-size: 200px;
}

#msg{
    margin-top: -10%;
    font-size:80px;
}

a{
    font-size:50px;
}

@media screen and (max-width : 600px) {
    #opa{    
        margin-top: 35%;
        font-size: 100px;
    }

    #msg{
        margin-top: -10%;
        font-size:20px;
    }

    a{
        font-size:20px;
    }
}



a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: nome;
}

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eventos Fatec</title>

<body>
    <p id="opa"><b><u>OPA!</u></b></p>
    <p id="msg">Este certificado não é válido<p>
    <a href="<?php echo(base_url() . 'site');?>">Retornar Eventos Fatec</a>
    
</body>