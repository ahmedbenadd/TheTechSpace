
document.querySelector('#submit-btn').addEventListener('click', function (){
    const productId = this.getAttribute('data-productid');
    let name = document.getElementById('name').value;
    let category = document.getElementById('category').value;
    let description = document.getElementById('description').value;
    let longDescription = document.getElementById('longdescription').value;
    let price = document.getElementById('price').value;
    let quantity = document.getElementById('quantity').value;
    let img1 = document.getElementById('img_1').value;
    let img2 = document.getElementById('img_2').value;
    let img3 = document.getElementById('img_3').value;
    let img4 = document.getElementById('img_4').value;

    let nameError = document.getElementById("name-error");
    let descriptionError = document.getElementById("description-error");
    let priceError = document.getElementById("price-error");
    let quantityError = document.getElementById("quantity-error");
    let categoryError = document.getElementById("category-error");
    let img1Error = document.getElementById("img1-error");

    nameError.textContent = "";
    descriptionError.textContent = "";
    priceError.textContent = "";
    quantityError.textContent = "";
    categoryError.textContent ="";
    img1Error.textContent = "";

    let valid = true;

    if(category == "none") {
        categoryError.textContent = "*Please select a category."
        valid = false;
    }

    let inputs = [
        { value: name, error: nameError },
        { value: description, error: descriptionError },
        { value: price, error: priceError },
        { value: quantity, error: quantityError },
        { value: img1, error: img1Error }
    ];

    inputs.forEach(input => {
        if (input.value.trim() === "") {
            input.error.textContent = "*This field cannot be empty.";
            valid = false;
        }
    });

    if(valid) {
        $.ajax({
            url: 'php/edit_product.php',
            type: 'POST',
            data: {action: "add", productId: productId, name: name, category: category, description: description, longDescription: longDescription, price: price, quantity: quantity, img1: img1, img2: img2, img3: img3, img4: img4 },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function (data) {
                console.log(data);
                window.location.href('products.php');
            }
        });
    }
});

