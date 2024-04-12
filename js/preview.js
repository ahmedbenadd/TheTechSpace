document.querySelectorAll('.thumbnail').forEach(thumbnail => {
    thumbnail.addEventListener('mouseover', function() {
        var newImg = this.getAttribute('data-img');
        document.getElementById('main-image').src = newImg;
    });
});


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
