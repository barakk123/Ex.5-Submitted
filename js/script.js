fetch('categories.json')
    .then(response => response.json())
    .then(data => {
        const selectElement = document.getElementById('category-select');

        data.categories.forEach(category => {
            let optionElement = document.createElement('option');
            optionElement.value = category;
            optionElement.textContent = category;

            selectElement.appendChild(optionElement);
        });

        updateBookList('');
    });

function updateBookList(category) {
    fetch(`getBooksByCategory.php?category=${category}`)
        .then(response => response.json())
        .then(data => {
            const bookListElement = document.getElementById('book-list');

            bookListElement.innerHTML = '';

            data.books.forEach(book => {
                let bookDiv = document.createElement('div');
                bookDiv.className = 'book';
                bookDiv.innerHTML = `
                    <a href='book.php?id=${book.id}'> <img class="book-image" src="${book.img_url}.png" alt="${book.name}"></a>
                    <h2 class="book-name">${book.name}</h2>
                    <h3 class="author-name">${book.author}</h3>
                    <a class="info-button" href='book.php?id=${book.id}'>More Info</a>
                `;

                bookListElement.appendChild(bookDiv);
            });
        });
}

// Update the background color based on cursor position
document.addEventListener("mousemove", function(event) {
    var x = event.clientX;
  
    var color1 = 'red';
    var color2 = 'blue';
    var color3 = 'yellow';
    var color4 = 'green';
    var color5 = 'orange';
    var color6 = 'purple';
  
    // Define the range of each color
    var range = window.innerWidth / 6;
  
    if (x < range) {
      document.documentElement.style.setProperty('--color', color1);
    } else if (x < range * 2) {
      document.documentElement.style.setProperty('--color', color2);
    } else if (x < range * 3) {
      document.documentElement.style.setProperty('--color', color3);
    } else if (x < range * 4) {
      document.documentElement.style.setProperty('--color', color4);
    } else if (x < range * 5) {
      document.documentElement.style.setProperty('--color', color5);
    } else {
      document.documentElement.style.setProperty('--color', color6);
    }
    
  });