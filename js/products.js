var images = document.querySelectorAll('.product-card .image img');

images.forEach(function(image) {
    var originalSrc = image.src;

    image.addEventListener('mouseenter', function() {
        var hoverSrc = image.getAttribute('data-hover');
        image.src = hoverSrc;
    });

    image.addEventListener('mouseleave', function() {
        image.src = originalSrc;
    });
});

function displaySortedProducts(sortedProducts) {
    let productList = document.getElementById('products_listing');
    productList.innerHTML = '';
    sortedProducts.forEach(product => {
        productList.appendChild(product);
    });
}

function sortProducts() {
    let sortOption = document.getElementById('sort-options').value;
    
    if (sortOption === 'Default') {
        location.reload();
        return;
    }
    
    let products = document.querySelectorAll('.product-card');
    let sortedProducts;

    if (sortOption === 'name-asc') {
        sortedProducts = Array.from(products).sort((a, b) => {
            let nameA = a.querySelector('h3').innerText.toLowerCase();
            let nameB = b.querySelector('h3').innerText.toLowerCase();
            return nameA.localeCompare(nameB);
        });
    } else if (sortOption === 'name-desc') {
        sortedProducts = Array.from(products).sort((a, b) => {
            let nameA = a.querySelector('h3').innerText.toLowerCase();
            let nameB = b.querySelector('h3').innerText.toLowerCase();
            return nameB.localeCompare(nameA);
        });
    } else if (sortOption === 'price-asc') {
        sortedProducts = Array.from(products).sort((a, b) => {
            let priceA = parseFloat(a.querySelector('.price span').innerText.replace('$', ''));
            let priceB = parseFloat(b.querySelector('.price span').innerText.replace('$', ''));
            return priceA - priceB;
        });
    } else if (sortOption === 'price-desc') {
        sortedProducts = Array.from(products).sort((a, b) => {
            let priceA = parseFloat(a.querySelector('.price span').innerText.replace('$', ''));
            let priceB = parseFloat(b.querySelector('.price span').innerText.replace('$', ''));
            return priceB - priceA;
        });
    }

    displaySortedProducts(sortedProducts);
}

document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            userData = JSON.parse(localStorage.getItem('userData'));
            if(userData.login) {
                const productId = this.getAttribute('data-product-id');
                console.log('Add product with ID ' + productId + ' to cart');
            }
            
        });
    });
});