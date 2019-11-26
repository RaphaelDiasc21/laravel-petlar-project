
function bootCidade(){
    let cidades = [
        "Campinas",
        "Jaguariúna",
        "Hortolandia",
        "Sumaré"
    ];

    let options = "---";
    cidades.forEach(function(cidade){
        options += "<option value="+ cidade +">"+ cidade + "</option>";
    });

    document.getElementById("cidades").innerHTML = options;
}


bootCidade();
