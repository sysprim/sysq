
$(document).ready(function () {
    
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
        var code = $('#CallMe').val();

            if(code == 0){
                $('#ticket').modal('open');
                $('.audio')[0].play();
            }
        
    }
     
    setInterval(udateTime, 1000);
    turnCall();
});