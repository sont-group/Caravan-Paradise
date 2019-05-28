<div class="form-group">
    <div class="form-label-group ">
        <label for="telefone">Telefone</label>
        <input name='telefone' type="tel" id="telefone" class="form-control" placeholder="Telefone" required="required" onkeypress="mascara(this, '## ########')" pattern="[0-9 -]+" maxlength="12" minlength="10">

    </div>
    <div class="form-label-group ">
        <label for="cpf">CPF</label>
        <input name='cpf' type="cpf" id="cpf" class="form-control" placeholder="CPF" required="required" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" minlength="14" pattern="[0-9 -.]+">

    </div>
</div>
<div class="form-group">
    <div class="form-label-group ">
        <label for="senha">Senha</label>
        <input name='senha' type="password" id="senha" class="form-control" placeholder="Senha" required="required" minlength="4">

    </div>
</div>

<!-- mascaras -->
<script src="js/validar/cpf.js"></script>
<script src="js/validar/mascara.js"></script>