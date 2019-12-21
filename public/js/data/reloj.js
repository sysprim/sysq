
$(document).ready(function () {
    
var $hands = $('#liveclock div.hand')
 
window.requestAnimationFrame = window.requestAnimationFrame
                               || window.mozRequestAnimationFrame
                               || window.webkitRequestAnimationFrame
                               || window.msRequestAnimationFrame
                               || function(f){setTimeout(f, 60)}
 
 
function updateclock(){
	var curdate = new Date()
	var hour_as_degree = ( curdate.getHours() + curdate.getMinutes()/60 ) / 12 * 360
	var minute_as_degree = curdate.getMinutes() / 60 * 360
	var second_as_degree = ( curdate.getSeconds() + curdate.getMilliseconds()/1000 ) /60 * 360
	$hands.filter('.hour').css({transform: 'rotate(' + hour_as_degree + 'deg)' })
	$hands.filter('.minute').css({transform: 'rotate(' + minute_as_degree + 'deg)' })
	$hands.filter('.second').css({transform: 'rotate(' + second_as_degree + 'deg)' })
	requestAnimationFrame(updateclock)
}
 
requestAnimationFrame(updateclock)
     
let currentDate = new Date(),

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

});