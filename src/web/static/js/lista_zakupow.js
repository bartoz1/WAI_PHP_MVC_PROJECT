document.getElementById('lista_z_zakupami').innerText='';
var dodaj_do_zakupow = () => {
    var element = document.getElementById("lista_input").value;
    if (element){
        var node = document.createElement("li");
        var textnode = document.createTextNode(element);
        node.appendChild(textnode)
        document.getElementById('lista_z_zakupami').appendChild(node);
        document.getElementById("lista_input").value = "";
    }
}

var wyczysc = () => {
    document.getElementById('lista_z_zakupami').innerHTML = "";
}
var usun_ostatni = () => {
    var ostatni = document.querySelector('#lista_z_zakupami').lastChild;
    if (ostatni){
        ostatni.remove()
    }
}



