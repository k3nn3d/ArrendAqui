@extends('layouts.admin.index') 
@section('conteudo')
<div class="pcoded-main-container">
  <div class="pcoded-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
          <div class="page-block">
              <div class="row align-items-center">
                  <div class="col-md-12">
                      <div class="page-header-title">
                          <h5 class="m-b-10">Dashboard Analytics</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
          <!-- table card-1 start -->
    <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-body">
        

        
      <div class="table-responsive">
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
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
 
  
 </div>

@endsection