$(function() {
    $('.skladniki ul li').click( function(e) {
        var element = e.target.innerText;
        var node = document.createElement("li");
        var textnode = document.createTextNode(element);
        node.appendChild(textnode)
        document.getElementById('lista_z_zakupami').appendChild(node);
        toggle_powiadomienie("Składnik został dodany do listy zakupów!")
    });
    
});


