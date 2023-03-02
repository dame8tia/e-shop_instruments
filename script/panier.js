

function actionQuantite(){
    console.log("dans la fonction du script") ; 
}

let eltsInputQtite = document.querySelectorAll('.InputQt');
for (var i = 0; i < eltsInputQtite.length; i++) {
    eltsInputQtite[i].addEventListener('change', actionQuantite);
    console.log(eltsInputQtite[i]) ; 
}





