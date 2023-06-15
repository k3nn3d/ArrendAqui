<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARREND'AQUI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            padding: 1rem;
            text-align: center;
        }

        h1, h2 {
            margin: 0;
        }
        h3{
            background-color: #5f5f5f;
            margin-left: 0.4rem;
            width: 98%;
        }

        hr {
            border: none;
            border-top: 2px solid black;
            margin: 1rem 0;
        }

        table {
            width: 98%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            margin-left: 0.4rem;
        }

        th, td {
            padding: 0.5rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

       

    </style>
</head>

<body>

    <div class="text-center"  style="text-align: center;">
        <img src="imagens/logo.png" alt="" style="width: 10%">
            <p>
                    <br>
                    <?php echo "República de Angola"; ?>
                    <br>
                    <?php echo "Ministerio das Telecomunicações e Tecnologias de Informação e Comunicação"; ?>
                    <br>
                    <?php echo "Instituto de Telecomunicações -ITEL"; ?><br>
                    <?php echo "Projecto de Aptidão Profissional-PAP"; ?> <br>
                    <?php echo "Sistema Intermediário de Arrendamentos"; ?> <br>
                </p>

            </div>
    
    <header>
        <h1>Relatório de Imóveis mais arrendados</h1>
        <p><b>Data:</b> {{date('d/m/Y')}}</p>
        <hr>
    </header>

    <center>
       
        <h3>Imóveis</h3>
        <table>
            <thead>
              
                <tr>
                    <th>Imóvel</th>
                    <th>Descrição</th>
                    <th>Localização</th>
                    <th>Proprietário</th>
                    <th>Preço</th>
                    <th>Plano</th>
                    <th>Registro no sistema</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imoveis_mais as $imovel)
                    
                
                <tr>
                    <td>{{ $imovel->id}}</td>
                    <td>{{ $imovel->descricao}}</td>
                    <td>{{ $imovel->provincia}}, {{ $imovel->municipio}}, {{ $imovel->bairro}}</td>
                    <td>{{ $imovel->username}} {{ $imovel->userlastname}}</td>
                    <td>{{ $imovel->preco}}</td>
                    <td>{{ $imovel->cat_name}}</td>
                    <td>{{ $imovel->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
           
        </table>
        

              </center>

</body>

</html>
