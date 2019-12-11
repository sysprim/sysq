document.querySelectorAll("button.btnNumber").forEach(function(elem) {
	elem.addEventListener('click', agregarTexto, false);
  });
  
  function agregarTexto() {
	var btnValor = this.value;
	var elInput = document.getElementById("ci");
	elInput.value += btnValor;
  }

  document.getElementById('borrar').addEventListener('click', () => {
    var texto = document.getElementById('ci');
    texto.value = texto.value.substring(0, texto.value.length - 1);
               // alternativa:
               // texto.value.slice(0, -1);
  });