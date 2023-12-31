//utils
const delay = (delayInms) => {
    return new Promise(resolve => setTimeout(resolve, delayInms));
}

function displayDatatable(){
    $('#datatable').DataTable({
        language: {
            "decimal":        "",
            "emptyTable":     "Aucune donnée trouvée",
            "info":           "Affichage de _START_ à _END_ sur _TOTAL_ lignes",
            "infoEmpty":      "Affichage 0 à 0 sur 0 lignes",
            "infoFiltered":   "(Tri de _MAX_ lignes au total)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Affiche _MENU_ lignes",
            "loadingRecords": "Chargement...",
            "processing":     "",
            "search":         "Recherche:",
            "zeroRecords":    "Aucune donnée correspondante",
            "paginate": {
                "first":      "Début",
                "last":       "Fin",
                "next":       "Suivant",
                "previous":   "Précédent"
            },
            "aria": {
                "sortAscending":  ": activer pour trier la colonne en ascendant",
                "sortDescending": ": activer pour trier la colonne en descendant"
            }
        }
    });
}