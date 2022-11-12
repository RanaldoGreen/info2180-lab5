document.addEventListener('DOMContentLoaded',function(){
    var  btn = document.getElementById("lookup");
    btn.addEventListener('click', function(f){
        f.preventDefault();
        var name = document.getElementById('country').value;                
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "world.php?country="+name, false);
        xhttp.send();
        response = xhttp.responseText;
        document.getElementById("result").innerHTML = response;
    });
    var  btn = document.getElementById("lookup-city");
    btn.addEventListener('click', function(f){
        f.preventDefault();
        var name = document.getElementById('country').value;                
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "world.php?country="+name+'&lookup=cities', false);
        xhttp.send();
        response = xhttp.responseText;
        document.getElementById("result").innerHTML = response;
    });
})

