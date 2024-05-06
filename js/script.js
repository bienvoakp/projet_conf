// // Structure de données des conférences
// const conferences = [
//     {
//         date: new Date('2024-03-15'),
//         subject: "Titre de la première conférence",
//         location: "Lieu de la première conférence"
//     },
//     {
//         date: new Date('2024-06-20'),
//         subject: "Titre de la deuxième conférence",
//         location: "Lieu de la deuxième conférence"
//     },
//     // Ajouter d'autres conférences ici...
// ];

// Fonction pour trier les conférences par date
function sortConferencesByDate(conferences) {
    return conferences.sort((a, b) => a.date - b.date);
}

// Fonction pour afficher les informations d'une conférence dans une liste
function displayConferenceInfo(conference, list) {
    /* Pour chaque conference */
    const card = document.createElement('div');
    card.classList.add('conference');

    card.innerHTML = `
    <div class="conference-image">
        <img src="${conference.urlImage}" alt="Conférence">
    </div>
    <div class="conference-info">
        <h3>${conference.details}</h3>
        <div class="details">
            <h4>${conference.subject}</h4>
            <p>Date : ${conference.date}</p>
            <p>Lieu : ${conference.location}</p>
            <p>Sujet : Sujet de la conférence</p>
            <p>Heure : ${conference.time} - ${conference.endTime}</p>
            <p>${conference.status === "upcoming" ? '<button class="badge btn-outline-success">S\'inscrire</button>' : ''}</p>
        </div>
    </div>
    `;
    list.appendChild(card);
    // const listItem = document.createElement("li");
    // listItem.innerHTML = `
    //     <strong>${conference.subject}</strong><br>
    //     Date : ${conference.date}<br>
    //     Lieu : ${conference.location}<br>
    //     Heure : ${conference.time}<br>
    //     Détails : ${conference.details}<br>
    //     ${conference.status === "upcoming" ? '<span class="badge badge-primary">À venir</span>' : ''}
    // `;
    // list.appendChild(listItem);
}

// Chargement de la liste des conférences
fetch('js/conferences.json')
.then(response => response.json())
.then(data => {
    // Tu peux utiliser les données ici
    console.log(data);

    let conferences = data;
    const currentDate = new Date();

    // Filtrer les conférences passées et à venir
    const pastConferences = conferences.filter( (conference) => {
        //Ramener les dates au meme fornat que currentDate
        let formatedDate = new Date(conference.date +'T'+conference.time);

        console.log(formatedDate);        
        return formatedDate < currentDate;
    }
    );
    const upcomingConferences = conferences.filter((conference) => {
        //Ramener les dates au meme fornat que currentDate
        let formatedDate = new Date(conference.date +'T'+conference.time);

        return formatedDate >= currentDate;
    }
    );
    
    // Affichage des conférences passées
    const pastConferencesCard = document.querySelector('#past-conferences .container');
    pastConferences.forEach(conference => {
        displayConferenceInfo(conference, pastConferencesCard);
    });
    
    // Affichage des conférences à venir
    const upcomingConferencesCard = document.querySelector('#upcoming-conferences .container');
    upcomingConferences.forEach(conference => {
        displayConferenceInfo(conference, upcomingConferencesCard);
    });
    })

    .catch(error => {
        console.error('Erreur lors du chargement des données JSON :', error);
    });
