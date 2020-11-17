(function () {

    var actualizarHora = function () { //Creamos la función

        //Declaración de variables para obtener datos de fecha y hora
        var fecha = new Date(),
            horas = fecha.getHours(),
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear(),
            ampm;

        //Declaración de variables para acceder a su información en HTML
        var pHoras = document.getElementById('horas'),
            pMinutos = document.getElementById('minutos'),
            pSegundos = document.getElementById('segundos'),
            pDiaSemana = document.getElementById('diaSemana'),
            pDia = document.getElementById('dia'),
            pMes = document.getElementById('mes'),
            pYear = document.getElementById('year'),
            pAmPm = document.getElementById('ampm');

        //Mostrar información en la pantalla
        //Arreglo con los días de la semana
        var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'];
        pDiaSemana.textContent = semana[diaSemana];
        pDia.textContent = dia;
        var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        pMes.textContent = meses[mes];
        pYear.textContent = year;

        if (horas >= 12) {
            horas = horas - 12;
            ampm = 'PM';
        } else {
            ampm = 'AM';
        }

        if (horas == 0) {
            horas = 12;
        };
        //Mostramos en pantalla la hora
        pHoras.textContent = horas;
        if(minutos < 10){
            minutos = "0" + minutos;
        };
        pMinutos.textContent = minutos;
        if(segundos < 10){
            segundos = "0" + segundos;
        };
        pSegundos.textContent = segundos;
        pAmPm.textContent = ampm;
    };

    //Llamar a la función actualizarHora para que se ejecute automáticamente
    actualizarHora();
    //Hacer que la función se ejecute vada segundo
    var intervalo = setInterval(actualizarHora, 1000);

}())