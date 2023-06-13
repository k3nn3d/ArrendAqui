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
                          <h5 class="m-b-10">Relatório reservas carros</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#!">Relatório reservas carros</a></li>
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
                <form action="{{ route('reservas.carros.pdf') }}" method="GET">
                <div class="row">
                    <div class="col-6" style="display: flex;">
                        <div class="col-6" style="">
                            <label for="" class="">De:</label>  
                            <input type="date" name="inico" class="form-control" required> 
                        </div>
                        <div class="col-6">
                            <label for="" class="">Até:</label>
                            <input type="date" name="fim" class="form-control"required>
                        </div> 
                    </div>

                    <div class="col-6">
                        <div class="col-6">
                            <label for="">.</label>
                            <br>
                            <button class="btn btn-primary">Gerar Relatório</button>
                        </div>
                    </div>
                </div>
            
                 
               
          </div>
        </form>
          <!-- Latest Customers end -->
      </div>
    </div>
    <!-- Latest Customers end -->
</div>



<!-- [ Main Content ] end -->

@endsection

