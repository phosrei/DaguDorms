// TODO: add dorms in a different file
const dorms = [
    {
        id: 0,
        image: '',
        price: 0,
        title: 'Dormitory Name 1',
        location: '31 Riofero Road, Arellano St.',
        tags: ['airConditioning', 'wifi', 'dormRoom']
    },
    {
        id: 1,
        image: '',
        price: 0,
        title: 'Dormitory Name 2',
        location: '31 Riofero Road, Arellano St.',
        tags: ['kitchen', 'utilities', 'studio']
    }
]

// Price and Ratings Filter
const priceRange = document.getElementById('priceRange');
const priceValue = document.getElementById('priceValue');

const ratingsRange = document.getElementById('ratingsRange');
const rateValue = document.getElementById('rateValue');

priceRange.addEventListener('input', () => {
    priceValue.textContent = priceRange.value;
});

ratingsRange.addEventListener('input', () => {
    rateValue.textContent = ratingsRange.value;
});

// Feature/RoomType Filter
const filterDorms = () => {
    const selectedFilters = Array.from(document.querySelectorAll('.checkbox:checked')).map(checkbox => checkbox.id);
    const filteredDorms = dorms.filter(dorm => {
        return selectedFilters.every(filter => dorm.tags.includes(filter));
    });
    displayDorm(filteredDorms);
};

document.querySelectorAll('.checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', filterDorms);
});

// Search Bar
const categories = [...new Set(dorms.map((dorm)=> {return dorm}))]

const searchButton = document.getElementById('search_button');

searchButton.addEventListener('click', () => {
    const searchBar = document.getElementById('search_bar');
    const searched = searchBar.value.toLowerCase();
    const filtered = dorms.filter((dorm) => {
        return dorm.title.toLowerCase().includes(searched);
    });
    displayDorm(filtered);
});

const displayDorm = (items) => {
    const dormsListing = document.getElementById('dorm-card-root');
    dormsListing.innerHTML = items.map((dorm) => {
        var { image, price, title, location } = dorm;
        return (
            `<div class="dorm-card">
                <img class="dorms-image" src=${image}>
                <div class="dorm-info">
                    <p class="price">from <b>₱${price}</b> / month</p>
                    <h2>${title}</h2>
                    <p>${location}</p>
                    <br>
                    <a class="btn-two" href="dorm-info.html">View</a>
                </div>
            </div>`
        );
    }).join('');
};

displayDorm(dorms);