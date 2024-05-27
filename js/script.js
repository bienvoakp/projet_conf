// Fonction pour trier les conférences par date
function sortConferencesByDate(conferences) {
    return conferences.sort((a, b) => a.date - b.date);
}

// Fonction pour afficher les informations d'une conférence dans une liste
function displayConferenceInfo(conference, list) {
    /* Pour chaque conference */
    const card = document.createElement('div');
    card.classList.add('confe');
    card.classList.add('col-8'); //class pour system grid
    card.classList.add('col-lg-4'); //class pour grid

    //contenu
    card.innerHTML = `
    <div class="confe-image">
        <img src="${conference.urlImage}" alt="Conférence">
    </div>
    <div class="confe-info">
        <h3 class="text-success">${conference.subject}</h3>
        <div class="details">
            <h4>${conference.details}</h4>
            <p>Date : ${conference.date}</p>
            <p>Lieu : ${conference.location}</p>
            <p>Sujet : Sujet de la conférence</p>
            <p>Heure : ${conference.time} - ${conference.endTime}</p>
            <p>${conference.status === "upcoming" ? `<button nom="${conference.id}" class="badge  btn btn-success px-4 py-2 display-2">S\'inscrire</button>` : ''}</p>
        </div>
    </div>
    `;
    list.appendChild(card);
}

// Chargement de la liste des conférences
fetch('./js/conferences.json')
.then(response => response.json())
.then(data => {
    // Tu peux utiliser les données ici
    console.log(data);

    //Initialisation
    let conferences = data;
    const currentDate = new Date();

    // Filtrer les conférences passées et à venir
    const pastConferences = conferences.filter( (conference) => {
        //Ramener les dates au meme fornat que currentDate
        let formatedDate = new Date(conference.date +'T'+conference.time);    
        return formatedDate < currentDate;
    }
    );
    const upcomingConferences = conferences.filter((conference) => {
        //Ramener les dates au meme fornat que currentDate
        let formatedDate = new Date(conference.date +'T'+conference.time);
        return formatedDate >= currentDate;
    }
    );

    // Affichage des conférences à venir
    const upcomingConferencesCard = document.querySelector('#upcoming-conferences .row');
    upcomingConferences.forEach(conference => {
        displayConferenceInfo(conference, upcomingConferencesCard);
    });
    
    // Affichage des conférences passées
    const pastConferencesCard = document.querySelector('#past-conferences .row');
    pastConferences.forEach(conference => {
        displayConferenceInfo(conference, pastConferencesCard);
    });
    
// formulaire ic!!!
    //Info supplementaires au formulaire
    // on prend le formulaire
    const form = document.querySelector('#registration-form');
    // on cherche son enfant ou on veut injecter 
    const referenceElement = form.children[0];
    console.log(referenceElement);

    // boutouns qui affiche le formulaire
    const btnInscrires = document.querySelectorAll('.badge');
    //dialog
    const dialog = document.querySelector('dialog');


    //Partie pour inserer le titre correspondant a l'evenement sur lequel l'utilisateur a cliqué
    btnInscrires.forEach(btn => {
            btn.onclick= (e)=>{
                //id de la conférence selectionée
                const idElemt = e.srcElement.attributes[0].value;

                //creer un input additionnel aux formulaire contenant le titre de la conference choisi
                const titreConference = document.createElement('div');
                titreConference.classList.add('row');
                titreConference.innerHTML= `
                <fieldset>
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <textarea class="form-control" id="titre" name="titre" readonly>${conferences[idElemt].subject}</textarea>
                    </div>
                </fieldset>
                    `
                form.insertBefore( titreConference, referenceElement);

                //dialog opening
                dialog.showModal();

            }
                
        });
    // Fin de Partie pour inserer le titre correspondant a l'evenement sur lequel l'utilisateur a cliqué
        


          
        // document.getElementById('valider').onsubmit = ()=>{
        //     if(confirm("Avez-vous entré les informations sans erreurs ?")) dialog.close();
        // }

        // //fermer formulaire
        // document.querySelector('del').onclick = ()=>{
        //     dialog.close();
        // }

        //FORM SUBMISSION
        // a la soumission
        form.addEventListener('submit', function(event) {
            
            //s'il ya un soucis de validation pour un champ
            if (!form.checkValidity()) {
                event.preventDefault(); // Prevent default form submission
              return;
            }
          
            // Confirmation popup
            const confirmation = confirm("Avez-vous entré les informations sans erreurs ?");
            if (confirmation) {
              form.submit();
              //   const formData = new FormData(form); // Get form data
              
              //   // Send AJAX request to backend
              //   fetch('conferencesMain.php', {
            //     method: 'POST',
            //     body: formData
            //   });

              dialog.close();
            }
          });

    })

    .catch(error => {
        console.error('Erreur lors du chargement des données JSON :', error);
    });