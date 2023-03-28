@extends('layouts.perfil.index')
@section('conteudo')
<div class="pcoded-main-container">
    <div class="pcoded-content">
<!-- Latest Customers start -->
<div class="col-lg-12 col-md-12">
    <div class="card table-card review-card">
        <div class="card-header borderless ">
            <h5>Conversas</h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            @foreach($mensagem as $chat)
            <div class="review-block">
                <div class="row">
                    <div class="col-sm-auto p-r-0">
                        <img src="{{$chat->user_foto}}" alt="user image" class="img-radius profile-img cust-img m-b-15">
                    </div>
                    <div class="col">
                        <a href="{{ route('site.chat.index',$chat->user_id) }}">
                            <h6 class="m-b-15">{{$chat->user_name}} <span class="float-right f-13 text-muted"> a week ago</span></h6>
                            <i class="feather icon-star-on f-18 text-c-yellow"></i>
                            <i class="feather icon-star-on f-18 text-c-yellow"></i>
                            <i class="feather icon-star-on f-18 text-c-yellow"></i>
                            <i class="feather icon-star f-18 text-muted"></i>
                            <i class="feather icon-star f-18 text-muted"></i>
                            <hr>
                            <p class="m-t-15 m-b-15 text-muted">{{$chat->mensagem}}</p>
                            
                       </a>
                      
                    </div>
                    <hr>
                    
                </div>
            
            </div>
            
            @endforeach
        </div>
        
    </div>
   
<!-- Latest Customers end -->
</div>
</div>
@endsection