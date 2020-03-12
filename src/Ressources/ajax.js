let els = document.getElementsByClassName('trigger');
let filter = document.getElementsByClassName('filter');

Array.from(els).forEach(el => 
    el.addEventListener('click', makeRequest)
);
Array.from(filter).forEach(el => 
    el.addEventListener('click', filterStatus)
);

let xhr = new XMLHttpRequest();
console.log(xhr);

function makeRequest(event){
    event.preventDefault();
    xhr.onreadystatechange = clik_link;
    let id = this.parentNode.parentNode.id    
    console.log('ID Full',id);
    id = id.replace('bug_', '');
    console.log('ID', id);
    
    let url = 'update/' + id;
    xhr.open('POST', url);
    
    let params = 'statut=1';
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(params);
}

function clik_link(){
    if(xhr.readyState === XMLHttpRequest.DONE){
        console.log('XHR', xhr.responseText);
        let obj = JSON.parse(xhr.responseText);
        
        var string = 'Terminer';
        if (obj.succes === true){
            document.querySelector('#bug_' + obj.id + ' .status').innerHTML = string;
        }        
    }
}
/**
 * Création du filtre
 * Etape 1: je récup toutes les données de la BDD
 * Etape 2: j'applique le filtre par rapport au status
 * Etape 3: si le filtre est coché, afficher la liste filtré sinon affiché la liste complète
 */
function filterStatus() {
    console.log('filter');
    let list_all = document.getElementsByClassName('rowBug');
    console.log(list_all);
    
}