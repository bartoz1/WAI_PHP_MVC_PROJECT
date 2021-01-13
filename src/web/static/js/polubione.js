var polubione = JSON.parse(localStorage.getItem('polubione')) || [];


polubione.forEach(function(el){
    document.getElementById(el).style.opacity="100%";
})

window.onload = () => {
    var polubiles = parseInt(window.sessionStorage.getItem('polubiles') || 0);
    document.getElementById('licznik_polubien').innerText = polubiles;

    var przestales_lubic = parseInt(window.sessionStorage.getItem('przestales_lubic') || 0);
    document.getElementById("licznik_przestales_lubic").innerText = przestales_lubic;
}

var klikniecie = (e) => {

        var id = e.target.id,
            item = e.target,
            index = polubione.indexOf(id);
        // gdy przepis jeszcze nie w polubionych
        if (index == -1) {
            polubione.push(id);
            item.style.opacity="100%";

            var polubiles = parseInt(window.sessionStorage.getItem('polubiles') || 0);

            document.getElementById('licznik_polubien').innerText = polubiles+1;
            window.sessionStorage.setItem('polubiles', polubiles + 1) 
            
            toggle_powiadomienie("Przepis został dodany do ulubionych!")

        // gdy przepis w ulubionych - przestajesz lubic
        } else {
            var przestales_lubic = parseInt(window.sessionStorage.getItem('przestales_lubic') || 0);
            window.sessionStorage.setItem('przestales_lubic', przestales_lubic + 1) 
            document.getElementById("licznik_przestales_lubic").innerText = przestales_lubic+1;
            polubione.splice(index, 1);
            item.style.opacity="40%";
            toggle_powiadomienie("Przepis został usunięty z ulubionych!")
        }
        
        localStorage.setItem('polubione', JSON.stringify(polubione));
      
}

var toggle_powiadomienie = (text) => {
    var pow = document.getElementById("powiadomienie");
    pow.innerHTML = text;
    pow.style.display="block";

    setTimeout(function(){
        pow.style.display="none";
    }, 1000)
}

