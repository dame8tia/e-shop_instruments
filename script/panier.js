
function payment(){
    alert("En cours de réalisation ; Merci de passer commande ultérieurement"); 
}

function actionQuantite(event){
    console.log(event.currentTarget) ; 
    let $val= event.currentTarget.value;
    let $id = event.currentTarget.id;
    console.log("Id Clicked :"+event.currentTarget.id+" / Valeur :"+event.currentTarget.value) ; 
    console.log(document.cookie);
    modifyQuantite($id, $val);

}

function modifyQuantite($id, $val){
    let requete = new XMLHttpRequest();
        $url = "index.php?action=panierModify&id="+$id+"&value="+$val
        console.log("url : "+$url)

        requete.open("GET", $url, false); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
        
        requete.onreadystatechange = function()
        {
            if (requete.readyState===4 && requete.status === 200){

                console.log($id,$val);
                //requete_actualiser.open("GET", )
            }  
        } 
        requete.send();
}

document.querySelectorAll('.InputQt').forEach(eltInputQtite =>
    {
        eltInputQtite.addEventListener('click', actionQuantite)
    });







