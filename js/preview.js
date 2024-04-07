function changeImage(src) {
    document.getElementById('main-image').src = src;
}

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

document.