// Fonction pour afficher les informations d'une conférence dans une liste
function displayConferenceInfo(conference, list) {
    /* Pour chaque conference */
    const card = document.createElement('div');
    card.classList.add('conference');
    card.classList.add('col-8'); //class pour system grid
    card.classList.add('col-lg-4'); //class pour grid

    //contenu
    card.innerHTML = `
    <div class="conference-image">
        <img src="${conference.urlImage}" alt="Conférence">
    </div>
    <div class="conference-info">
        <div class="details text-white">
            <h4>${conference.subject}</h4>
            <p>Date : ${conference.date}</p>
            <p>Lieu : ${conference.location}</p>
            <p>Heure : ${conference.time} - ${conference.endTime}</p>
            <a href="conferences.html#upcoming-conferences" nom="${conference.id}" class="badge  btn btn-success px-4 py-2 display-2">S\'inscrire</a>
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

    //Initialisation
    let conferences = data;
    const currentDate = new Date();

    // Filtrer les conférences à venir
    const upcomingConferences = conferences.filter((conference) => {
        //Ramener les dates au meme fornat que currentDate
        let formatedDate = new Date(conference.date +'T'+conference.time);
        return formatedDate >= currentDate;
    });
    
    // Affichage des conférences à venir
    const upcomingConferencesCard = document.querySelector('.row.confer');
    upcomingConferences.forEach(conference => {
        displayConferenceInfo(conference, upcomingConferencesCard);
    });
})