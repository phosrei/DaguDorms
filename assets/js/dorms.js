// TODO: add dorms in a different file
const dorms = [
    {
        id: 0,
        image: '',
        price: 0,
        title: 'DaguDorms',
        location: '31 Riofero Road, Arellano St.',
        details: 'Testing purposes only',
        room_image: '',
        room_name: 'Room',
        room_details: 'Test',
        contactNum: '+63 995 724 5708',
        email: 'dagudorms@email.com',
        facebook: 'dagudorms',
        filters: ['airConditioning', 'wifi', 'dormRoom'],
        tags: ['Air Conditioning', 'Wi-Fi', 'Dorm Room']
    },
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
const searchBar = document.getElementById('search_bar');

searchBar.addEventListener('input', () => {
    const searched = searchBar.value.toLowerCase();
    const filtered = dorms.filter((dorm) => {
        return dorm.title.toLowerCase().includes(searched) || dorm.tags.some(tag => tag.toLowerCase().includes(searched));
    });
    displayDorm(filtered);
});

const displayDorm = (items) => {
    const dormsListing = document.getElementById('dorm-card-root');
    dormsListing.innerHTML = items.map((dorm) => {
        var { id, image, price, title, location, details, room_image, room_name, room_details, contactNum, email, facebook, tags } = dorm;
        const encodedTags = tags.map(tag => encodeURIComponent(tag)).join(',');

        return (
            `<div class="dorm-card">
                <img class="dorms-image" src=${image}>
                <div class="dorm-info">
                    <p class="price">from <b>₱${price}</b> / month</p>
                    <h2>${title}</h2>
                    <p>${location}</p>
                    <a class="button" href="dorm-info.html?id=${id}&title=${encodeURIComponent(title)}&price=${price}&image=${encodeURIComponent(image)}&location=${encodeURIComponent(location)}&details=${encodeURIComponent(details)}&room_image=${encodeURIComponent(room_image)}&room_name=${encodeURIComponent(room_name)}&room_details=${encodeURIComponent(room_details)}&contactNum=${encodeURIComponent(contactNum)}&email=${encodeURIComponent(email)}&facebook=${encodeURIComponent(facebook)}&tags=${encodedTags}">View</a>
                </div>
            </div>`
        );
    }).join('');
};


displayDorm(dorms);
