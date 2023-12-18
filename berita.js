document.addEventListener('DOMContentLoaded', function () {
    const newsForm = document.getElementById('add-news-form');
    const newsList = document.getElementById('news-items');

    newsForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const title = event.target.elements.title.value;
        const content = event.target.elements.content.value;
        const imageFile = event.target.elements.image.files[0];

        if (title && content && imageFile) {
            addNewsItem(title, content, imageFile);
            newsForm.reset();
        } else {
            alert('Mohon lengkapi semua kolom tersebut');
        }
    });

    function addNewsItem(title, content, imageFile) {
        const listItem = document.createElement('li');
        listItem.classList.add('news-item');

        const titleElement = document.createElement('h3');
        titleElement.textContent = title;

        const contentElement = document.createElement('p');
        contentElement.textContent = content;

        const imageElement = document.createElement('img');
        imageElement.src = URL.createObjectURL(imageFile);
        imageElement.alt = title;

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Hapus';
        deleteButton.addEventListener('click', function () {
            deleteNewsItem(listItem);
        });

        listItem.appendChild(titleElement);
        listItem.appendChild(contentElement);
        listItem.appendChild(imageElement);
        listItem.appendChild(deleteButton);

        newsList.appendChild(listItem);
    }

    function deleteNewsItem(item) {
        const confirmDelete = confirm('Apakah Anda yakin ingin menghapus berita ini?');
        if (confirmDelete) {
            newsList.removeChild(item);
        }
    }
});

