let selectedFilters = {
    type: [],
    categorie: [],
    tijd: [],
    ingredienten: [],
    temperatuur: []
};

function updateFilter(category, value) {

    if (selectedFilters[category].includes(value)) {

        selectedFilters[category] =
            selectedFilters[category].filter(item => item !== value);

    } else {

        selectedFilters[category].push(value);

    }

    applyFilters();
}

function applyFilters() {

    const recepten = document.querySelectorAll('.recept')

    recepten.forEach(recept => {

        const type = recept.dataset.type.trim();
        const categorie = recept.dataset.categorie.trim();
        const tijd = recept.dataset.tijd.trim();
        const ingredienten = recept.dataset.ingredienten.trim();
        const temperatuur = recept.dataset.temperatuur.trim();


        const matchesType =
            selectedFilters.type.length === 0 ||
            selectedFilters.type.includes(type);


        const matchesCategorie =
            selectedFilters.categorie.length === 0 ||
            selectedFilters.categorie.includes(categorie);


        const matchesTijd =
            selectedFilters.tijd.length === 0 ||
            selectedFilters.tijd.includes(tijd);


        const matchesIngredienten =
            selectedFilters.ingredienten.length === 0 ||
            selectedFilters.ingredienten.includes(ingredienten);


        const matchesTemperatuur =
            selectedFilters.temperatuur.length === 0 ||
            selectedFilters.temperatuur.includes(temperatuur);


        const matchesAll =
            matchesType &&
            matchesCategorie &&
            matchesTijd &&
            matchesIngredienten &&
            matchesTemperatuur;


        recept.style.display = matchesAll ? '' : 'none';

    });

}