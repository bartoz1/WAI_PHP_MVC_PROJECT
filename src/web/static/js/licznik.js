var seconds = 0;
const dania = ["Naleśniki", "Jajecznica na ostro", "Zupa grzybowa", "Spagetti po bolońsku "];

function dodajSec(){
    var czas_na_stronie = parseInt(window.sessionStorage.getItem('czas_na_stronie') || 0);
    
    // if (czas_na_stronie == 180){
        
    //     var odp =prompt("Jeżeli masz problem ze zdecydowaniem się który przepis wybrac wpisz 'TAK'", "")
    //     if (odp=="TAK"|| odp=="tak"){
    //         var losowe = Math.floor(Math.random() * (dania.length-1));
    //         alert("Dzisiaj powinieneś zrobić: \n"+dania[losowe])
    //     }
    // }
    if(document.getElementById("zegarek")){
        document.getElementById("zegarek").innerText = czas_na_stronie;
    }
    window.sessionStorage.setItem('czas_na_stronie', czas_na_stronie + 1) 
}

setInterval(dodajSec, 1000);
