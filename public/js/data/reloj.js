
$(document).ready(function () {
    // const url = "http://localhost/sysq/public/";
    // function tiempoReal()
	// 	{
	// 	// 	var tabla = $.ajax({
	// 	// 		url:url+'/Turn',
	// 	// 		dataType:'text',
	// 	// 		async:false
	// 	// 	}).responseText;

	// 	// 	document.getElementById("slide-out").innerHTML = tabla;
	// 	// }
	// 	// setInterval(tiempoReal, 1000);
    
    var udateTime = function() {
        let currentDate = new Date(),
            hours = currentDate.getHours(),
            minutes = currentDate.getMinutes(), 
            seconds = currentDate.getSeconds(),
            weekDay = currentDate.getDay(), 

            month = currentDate.getMonth(), 
            year = currentDate.getFullYear();
     
        const weekDays = [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sabado'
        ];
     
        document.getElementById('weekDay').textContent = weekDays[weekDay];

     
        const months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
     
        document.getElementById('month').textContent = months[month];
        document.getElementById('year').textContent = year;
     
        document.getElementById('hours').textContent = hours;
     
        if (minutes < 10) {
            minutes = "0" + minutes
        }
     
        if (seconds < 10) {
            seconds = "0" + seconds
        }
     
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
    };
     
    udateTime();

    function turnCall(){
        var code = $('#codeTurn').val();

            if(code == 0){
                $('#ticket').modal('open');
                $('.audio')[0].play();
            }
        
    }
     
    setInterval(udateTime, 1000);
    // setInterval(turnCall, 1000);
});