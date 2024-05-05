// Structure de données des conférences
const conferences = [
    {
        date: new Date('2024-03-15'),
        subject: "Titre de la première conférence",
        location: "Lieu de la première conférence"
    },
    {
        date: new Date('2024-06-20'),
        subject: "Titre de la deuxième conférence",
        location: "Lieu de la deuxième conférence"
    },
    // Ajouter d'autres conférences ici...
];

// Fonction pour trier les conférences par date
function sortConferencesByDate(conferences) {
    return conferences.sort((a, b) => a.date - b.date);
}

// Fonction pour afficher les informations d'une conférence dans une liste
function displayConferenceInfo(conference, list) {
    const listItem = document.createElement("li");
    listItem.innerHTML = `
        <strong>${conference.subject}</strong><br>
        Date : ${conference.date.toLocaleDateString()}<br>
        Lieu : ${conference.location}<br>
        Heure : ${conference.time}<br>
        Détails : ${conference.details}<br>
        ${conference.status === "upcoming" ? '<span class="badge badge-primary">À venir</span>' : ''}
    `;
    list.appendChild(listItem);
}

// Filtrer les conférences passées et à venir
const currentDate = new Date();
const pastConferences = conferences.filter(conference => conference.date < currentDate);
const upcomingConferences = conferences.filter(conference => conference.date >= currentDate);

// Affichage des conférences passées
const pastConferencesList = document.getElementById("past-conferences-list");
pastConferences.forEach(conference => {
    displayConferenceInfo(conference, pastConferencesList);
});

// Affichage des conférences à venir
const upcomingConferencesList = document.getElementById("upcoming-conferences-list");
upcomingConferences.forEach(conference => {
    displayConferenceInfo(conference, upcomingConferencesList);
});

fetch('conferences.json')
    .then(response => response.json())
    .then(data => {
        // Tu peux utiliser les données ici
        console.log(data);
    })
    .catch(error => {
        console.error('Erreur lors du chargement des données JSON :', error);
    });
