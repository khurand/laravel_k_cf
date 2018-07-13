$('document').ready(function(){

//select multiple dans input
    $('#labels').click(function(){
        event.preventDefault();
        var labelVal = $.map($("#labels option:selected"), function (el, i) {
            return $(el).text();
        });
        $('input[name="labelsInput"]').val(labelVal);
    });

    $('#tags').click(function(){
        event.preventDefault();

        //Mettre des séparateurs entre les options selectionnées dans les menu dropdowns
        var tagVal = $.map($('#tags option:selected'), function (el, i) {
            return $(el).text();
        });
        console.log(tagVal);
        $('.tagsInput').val(tagVal);
    });




// origine dans description
    $('#origin').click(function(){

        // on stock dans une variable le texte contenu dans l'élément "option" du dropdown-menu. Pour y accéder, on doit parcourir l'arbre du DOM de l'élément courant $(this) grâce à la méthode find() pour chercher l'option qui est sélectionnée.
        var originVal = $(this).find('option:selected').text();

        // On affiche la variable "originVal" dans le champ du textarea, grâce à une concaténation avec une chaine de caractères. On ajoute une condition, si la valeur equivaut à la chaine "Choisissez une origine...", on affiche aucune valeur dans le textarea. Sinon, on affiche la concaténation.
        if(originVal == "Choisissez une origine..."){
            $('.desc').val("");
        }else{
            $('input[name="originInput"]').val(originVal);
            $('.desc').val("Produit d'origine: " + originVal);
        }; 
    })



// Calcul prix_ht
    function calcul_ht(event){
        // On récupère en mémoire la valeur de la tva sélectionnée et la valeur du champ "prix"
        var value = $('#tva option:selected').text();
        var ttc = $('#price').val();

        
        // console.log(value + ' ' + ttc);
        
        // On fait une condition, si la tva de la checkbox est égale à 5,5%, le prix ttc est divisé par 1,055. Sinon, le prix ttc est divisé par 1,2 (ce qui correspond à prix ttc -5,5% ou prix ttc -20% pour connaitre le prix HT).
        if(value == "5,5%"){
            var value2 = (ttc/1.055).toFixed(2);
        }else{
            var value2 = (ttc/1.2).toFixed(2);
        }
        
        // Le résultat est affiché dans le champ insivible prix_ht
        // console.log(value2);
        $('input[name="prix_ht"]').val(value2);
    }
    // On appelle la fonction en cliquant sur le bouton "ajouter" du formulaire
    $('#ajout').click(function(){
        calcul_ht();
    });



// fonction de calcul
    function calcul_prix_detail(event){ 
        
        // On récupère les valeurs des champs
        var prix_ttc = $('#price').val();
        var val_grs = $('#weight').val();
        var unity = $('#unit option:selected').text();

        // console.log(prix_ttc + val_grs + unity);

        // Pour calculer le prix en gramme d'un prix de base en kg (connu), il nous faut faire une regle de 3. Pour ça, on crée une variable pour établir un ratio entre kg et g qui est de 1000.
        var ratio_g = 1000;
    
        // On applique la règle de 3 pour convertir le "prix au kg" en "prix aux grammes". Le résultat est arrondi à 2 chiffres après la virgule et est affiché dans le champ "Prix_unitaire_gram" du formulaire. On ajoute 2 conditions si "kg" ou "bouteille" sont sélectionnés, le prix s'affiche. Le champ "detailPrice" est grisé par défaut sauf avec kg et bouteille.
            // Fonction champ "prix grammes" grisé par défaut au chargement de la page sauf quand "kg" et "bouteille" sont sélectionnés.

        var new_prix = ((prix_ttc*val_grs)/ratio_g).toFixed(2);	
        // console.log(new_prix);	
        if(unity == "Kg"){
            $('#convertedPrix').val(new_prix);
            $('#converted').css('opacity',1);                      
        } else if(unity == "Bouteille" ){	
            $('#convertedPrix').val(new_prix);  
            $('#converted').css('opacity',1);          
        }else{
            $('#convertedPrix').val("");
            $('#converted').css("opacity", 0.3);          
        }
    }

    // appel de la fonction de calcul lors d'un événement 'keyup' sur le champ "weight", "price" et un clic sur "unit > Kg"
    $(function(){
        $('input[name="weight"]').bind('keyup', calcul_prix_detail); 
        $('input[name="price"]').bind('keyup', calcul_prix_detail); 

        // Permet d'executer la fonction calcul_prix_detail() quand on clic sur "Kg" du menu "unit" 
        $('#unit').change(function(){
            calcul_prix_detail();
        });
    });


    $('#modif').click(function(){

    var obj = $('.tagsInput').val();
    var myJSON = JSON.stringify(obj);
    console.log(myJSON);


    });



})