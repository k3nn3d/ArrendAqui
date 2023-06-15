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
        <h1>Relatório de Logs</h1>
        <p><b>Data:</b> {{date('d/m/Y')}}</p>
        <hr>
    </header>

    <center>
        <h3>Logs</h3>
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Atividade </th>
                <th>Rota</th>
                <th>Data  </th>
                <th>Navegador </th>
                <th>Erro</th>
                <th>ip</th>
                <th>Localização</th>
              
              </tr>
            </thead>
            <tbody>
          
                  
              @foreach ($logs as $log)
                  
           
              <tr>
                <td> {{ $log->mensagem }}</td>
                <td> {{ $log->rota }}</td>
                <td>  {{ $log->created_at->format('d/m/y h:i') }}</td>
                <td> {{ $log->navegador}}</td>
                <td> {{ $log->erro }}</td>
                <td> {{ $log->ip }}</td>
                <td> {{ $log->localização }}</td>
              </tr> 
              @endforeach
             
              

             @empty($log)
                 
            
              
              <tr>
                <td colspan="6" style="text-align: center"> Não há logs disponíveis</td>
              </tr>
              @endempty
                  
            
             
              
                  
              
            </tbody>
          </table>

    
        </center>

</body>

</html>
