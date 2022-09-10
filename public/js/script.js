function Buscar() {
    var city = document.querySelector("#city").value;
    var state = document.querySelector("#state").value;
    var country = document.querySelector("#country").value;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        const days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

        var resposta = JSON.parse(this.responseText);
        console.log(this.responseText);
        
        document.getElementById("temp").innerHTML = parseInt(resposta[0]['temp']);
        document.getElementById("status_sky").innerHTML = resposta[0]['status_sky'];
        document.getElementById("temp_min_and_max").innerHTML = parseInt(resposta[0]['temp_min']) + '°c / ' + parseInt(resposta[0]['temp_max']) + '°c';
        document.getElementById("icon").src = "http://openweathermap.org/img/wn/" + resposta[0]['icon'] + "@2x.png";
        document.getElementById("city_head").innerHTML = resposta[0]['city'] + ", " + resposta[0]['country'];
        
        const d = new Date();
        let day = d.getDate();
        let monthstring = month[d.getMonth()];
        let year = d.getFullYear();
        let daystring = days[ d.getDay() ];

        document.getElementById("fulldate").innerHTML = daystring + ", " + day + " " + monthstring + " " + year;

    }
    xhttp.open("GET", "/search?city=" + city + "&state=" + state + "&country=" + country);
    xhttp.send();
}