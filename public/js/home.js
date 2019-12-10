document.querySelectorAll("button.btnNumber").forEach(function(elem) {
	elem.addEventListener('click', agregarTexto, false);
  });
  
  function agregarTexto() {
	var btnValor = this.value;
	var elInput = document.getElementById("inputext");
	elInput.value += btnValor;
  }