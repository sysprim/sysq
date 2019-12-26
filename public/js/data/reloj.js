
$(document).ready(function () {
    
function Actulizar_Hora(){
    var Fecha = new Date(), // Constructor
      Horas = Fecha.getHours(),
      Minutos = Fecha.getMinutes(),
      Segundos = Fecha.getSeconds(),
      AMPM,
      DiaSemana = Fecha.getDay(),
      Dia = Fecha.getDate(),
      Mes = Fecha.getMonth(),
      Anio = Fecha.getFullYear();

    var p_Horas = document.getElementById('Horas'),
      p_Minutos = document.getElementById('Minutos'),
      p_Segundos = document.getElementById('Segundos'),
      p_AMPM = document.getElementById('AM-PM'),
      p_DiaSemana = document.getElementById('DiaSemana'),
      p_Dia = document.getElementById('Dia'),
      p_Mes = document.getElementById('Mes'),
      p_Anio = document.getElementById('Anio');

    /* Arreglo - Dias de la Semana. */ 
    var Semana = ['Domingo,','Lunes,','Martes,','Miercoles,','Jueves,','Viernes,','Sabado,'];
    p_DiaSemana.textContent = Semana[DiaSemana];

    p_Dia.textContent = Dia;

    /* Arreglo - Meses del Año. */
    var Meses = ['Enero','Febrero','Merzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    p_Mes.textContent = Meses[Mes];

    p_Anio.textContent = Anio;


    /* Reloj */

    if(Horas>=12){
      Horas = Horas - 12;
      AMPM = 'PM';
    }
    else{
      AMPM = 'AM';
    }

    if(Horas == 0){
      Horas = 12;
    }

    p_Horas.textContent = Horas;
    p_AMPM.textContent = AMPM;

    if(Minutos < 10){
      Minutos = "0" + Minutos;
    }

    if(Segundos < 10){
      Segundos = "0" + Segundos;
    }

    p_Minutos.textContent = Minutos;
    p_Segundos.textContent = Segundos;
  }
  
  Actulizar_Hora();
  var Intervalo = setInterval(Actulizar_Hora,1000);

});