
function Filtrer(){

    var meridien = document.getElementById("MeridienInput");
    
    var meridienArray = [];

    for (i=0; i<meridien.options.length; i++) { 
        if (meridien.options[i].selected) {
            meridienArray.push(meridien.options[i].value);
            console.log(meridien.options[i].value);

        }
    } 
    
    
    var Patho = document.getElementById("PathoInput");
    
    var PathoArray = [];
    for (i=0; i<Patho.options.length; i++) { 
        if (Patho.options[i].selected) {
            PathoArray.push(Patho.options[i].value);
            console.log(Patho.options[i].value);

        }
    } 

    var Cara = document.getElementById("CaraInput");
    
    var CaraArray = [];
    for (i=0; i<Cara.options.length; i++) { 
        if (Cara.options[i].selected) {
            CaraArray.push(Cara.options[i].value);
            console.log(Cara.options[i].value);

        }
    } 

    var KeywordInput = document.getElementById("Keyword");
    var Keyword = KeywordInput.value;

    $(function(){

        

    if(CaraArray.length == 0){
        CaraArray = [""];
    }

    if(meridienArray.length == 0){
        meridienArray = [""];
    }

    if(PathoArray.length == 0){
        PathoArray = [""];
    }


    $.post('model/script_query.php', {
        meridiens : meridienArray,
        pathologies : PathoArray,
        caracteristiques : CaraArray,
        motclef : Keyword
      }).done(function(data, textStatus, jqXHR){

        //Effacement de l'ancienne table
        var noeud = document.getElementById('tableToDisplay');
        while(noeud.firstChild){
            noeud.removeChild(noeud.firstChild);
        }
        
        noeud = document.getElementById('noResults');
        while(noeud.firstChild){
            noeud.removeChild(noeud.firstChild);
        }
        //Affichage de la table
        
        var arrayTable = JSON.parse(data);
        if(arrayTable.length == 0){
            $('#noResults').append("<h3 style='margin-left: 20vw;margin-top:10vh;'>Pas de résultats</h3>");
        }

        for(var i = 0 ; i<arrayTable.length; i++){
            $('#tableToDisplay').append("<tr><th scope='row'>"+arrayTable[i][0]+"</th><td>"+arrayTable[i][1]+"</td><td>"+arrayTable[i][2]+"</td><td>"+arrayTable[i][3]+"</td></tr>");
        }
    });

    
    });
}


function Rechercher(){

    $(function(){
        
        $.post('model/CheckAuth.php').done(function(data, textStatus, jqXHR){
            if(data == 'false'){
                window.location.replace("/projet/index.php?Connexion=true");
            }
            else{
                Filtrer();
            }
        }
        );
        
    });
    
    
}

