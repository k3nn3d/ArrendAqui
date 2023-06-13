@extends('layouts.site.index')
@section('conteudo')

<!-- [ Main Content ] start -->
<div class="pcoded-main-container" style="background: url('{{asset('tamplate/images/hero_bg_1.jpg')}}') no-repeat;" >
    <div class="pcoded-content" >
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
            
           
  
          
          <!-- seo start -->
          <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>3</h3>
                            <h6 class="text-muted m-b-0">{{$user->name}} {{$user->lastname}}</h6>
                        </div>
                        <div class="col-6">
                            <div id="#" class="d-flex align-items-end"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>2</h3>
                            <h6 class="text-muted m-b-0">Alugueis</h6>
                        </div>
                        <div class="col-6">
                            <div id="#" class="d-flex align-items-end"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>3</h3>
                            <h6 class="text-muted m-b-0">Casas</h6>
                        </div>
                        <div class="col-6">
                            <div id="#" class="d-flex align-items-end"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        
            <div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3>4</h3>
                                <h6 class="text-muted m-b-0">Pontos</h6>
                            </div>
                            <div class="col-6">
                                <div id="#" class="d-flex align-items-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3>11</h3>
                                <h6 class="text-muted m-b-0">Conversas</h6>
                            </div>
                            <div class="col-6">
                                <div id="#" class="d-flex align-items-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3>5</h3>
                                <h6 class="text-muted m-b-0">333</h6>
                            </div>
                            <div class="col-6">
                                <div id="#" class="d-flex align-items-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- seo end -->
  
          
        </div>
        <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->
  
@endsection