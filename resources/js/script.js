// Supprimer un utilisateur en utilisant fetch
function supprimerUtilisateur(Id) {
    fetch(`/users/${Id}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Erreur lors de la suppression");
            }
            return response.json();
        })
        .then((data) => {
            console.log(data.message); // Message de confirmation de suppression
            // Effectuer d'autres actions après la suppression
        })
        .catch((error) => {
            console.error("Erreur:", error);
        });
}
