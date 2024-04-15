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
