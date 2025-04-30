function addComment(thisElement) {
    // element utilise
    thisElement = thisElement.parentNode
    let commentUL = thisElement.closest("article").getElementsByClassName("comment-output")[0].getElementsByTagName("ul")[0];
    let textArea = thisElement.parentNode.querySelector("div").querySelector("textarea")

    if (textArea.value != "" || textArea.value != null)
    {
        // element cree afin de faire un nouveau commentaire
        let comment = document.createElement("li");
        let pseudo = document.createElement("h1");
        let content = document.createElement("pre");

        // ajout des valeurs dans les differents champ
        pseudo.appendChild(document.createTextNode("Pseudo a ajouter"));
        content.appendChild(document.createTextNode(textArea.value));

        //construire l'element, l'ajouter dans les commentaire et vider la valeur du textarea afin de prevenir le spam
        comment.appendChild(pseudo);
        comment.appendChild(content);
        commentUL.appendChild(comment);

        textArea.value = ""
    }
}

function addComment2(thisElement){
    let commentUL = thisElement.closest("article").getElementsByClassName("comment-output")[0].getElementsByTagName("ul")[0];
    let textArea = thisElement.parentNode.querySelector("div").querySelector("textarea")


}