<div class="container">
<div class="row">
 <div class="form-group col-md-6">
    <label for="vc_path">Nome</label>
       <input type="text" id="name" class="form-control" name="name"
           placeholder="Nome" >

 </div>

 <div class="col-md-6 ">
    <div class="form-group">
        <label for="vc_path">Imagem</label>
        <input type="file" id="vc_path" class="form-control" name="vc_path"
            placeholder="Imagem" value="{{ isset($galeria->vc_path) ? $galeria->vc_path : "" }}">
    </div>
</div>


 
 
 

<div class="form-group col-md-6">
    <label for="inputState">Subcategoria</label>
    <select id="nivel_acesso" class="form-control" name="sub_categoria_id" >
        <option name="sub_categoria_id" value="1">Selecione uma subcategoria</option>
        <option name="sub_categoria_id" value="1">dffdfdf</option>
        
    </select>
  </div>
  <div class="col-md-6 ">
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" id="descricão" class="form-control" name="descricao"
            placeholder="Descrição">
    </div>
</div>



</div>
</div>



