
  
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
  // excluir usuario
  let usuarioParaExcluir = null;
  document.querySelectorAll('.btn-excluir-usuario').forEach(function(btn) {
    btn.addEventListener('click', function() {
      usuarioParaExcluir = this.getAttribute('data-usuario');
    });
  });
  document.getElementById('confirmarExclusao').addEventListener('click', function() {
    if (usuarioParaExcluir !== null) {
      window.location.href = 'excluir_usuario.php?usuario=' + usuarioParaExcluir;
    }
  });
</script>


<script>
    //add usuario
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add').addEventListener('click', function () {
        document.querySelector('form').submit();
    });
});
</script>

<script>
  // Função para abrir o modal de edição do usuário
  function abrirModalEdicao(usuario) {
    // Limpar campos anteriores
    document.getElementById("editUsuario").value = usuario;
    document.getElementById("editAdmin").value = "";
    document.getElementById("editSenha").value = "";
    document.getElementById("editEmail").value = "";
    document.getElementById("editTelefone").value = "";
    document.getElementById("editPlano").value = "";
    document.getElementById("editValidade").value = "";
    document.getElementById("editStatus").value = "";
    document.getElementById("editTokens").value = "";


    // Abrir o modal
    var modalId = "modalEditarUsuario" + usuario;
    var modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();
  }

  // Função para enviar o formulário de edição
  function enviarFormularioEdicao() {
    // Valide os campos conforme necessário

    // Envie o formulário
    document.getElementById("formularioEdicao").submit();
  }
</script>
