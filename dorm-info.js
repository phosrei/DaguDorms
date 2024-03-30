document.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const title = params.get('title');
    const price = params.get('price');
    const image = decodeURIComponent(params.get('image'));
    const location = decodeURIComponent(params.get('location'));
    const details = decodeURIComponent(params.get('details'));
    const room_image = decodeURIComponent(params.get('room_image'));
    const room_name = decodeURIComponent(params.get('room_name'));
    const room_details = decodeURIComponent(params.get('room_details'));
    const contactNum = decodeURIComponent(params.get('contactNum'));
    const email = decodeURIComponent(params.get('email'));
    const facebook = decodeURIComponent(params.get('facebook'));

    document.getElementById('title').textContent = title;
    document.getElementById('price').textContent = price;
    document.getElementById('image').src = image;
    document.getElementById('location').textContent = location;
    document.getElementById('details').textContent = details;
    document.getElementById('room_image').src = room_image;
    document.getElementById('room_name').textContent = room_name;
    document.getElementById('room_details').textContent = room_details;
    document.getElementById('contactNum').textContent = contactNum;
    document.getElementById('email').textContent = email;
    document.getElementById('facebook').textContent = facebook;

});

document.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const tagsParam = params.get('tags');
    const tags = tagsParam ? tagsParam.split(',').map(tag => decodeURIComponent(tag)) : [];

    console.log('Decoded Tags:', tags);

    const tagsContainer = document.getElementById('tags-container');
    tags.forEach(tag => {
        const tagElement = document.createElement('span');
        tagElement.classList.add('tag', 'br-12');
        tagElement.textContent = tag;
        tagsContainer.appendChild(tagElement);
    });
});

document.addEventListener('DOMContentLoaded', function() {
	let items = document.querySelectorAll('.item');
	let currentIndex = 0;

	items[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });

	document.getElementById('prev').addEventListener('click', function() {
		if (currentIndex > 0) {
			currentIndex--;
		} else {
			currentIndex = items.length - 1;
		}
		items[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
		});

	document.getElementById('next').addEventListener('click', function() {
		if (currentIndex < items.length - 1) {
			currentIndex++;
		} else {
			currentIndex = 0;
		}
		items[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
		});
});
