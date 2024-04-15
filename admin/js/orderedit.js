document.addEventListener("DOMContentLoaded", function() {
    var checkbox = document.getElementById("editPasswordCheckbox");

    var form = document.getElementById("form");
    var table = document.getElementById("table");

    checkbox.addEventListener("change", function() {
        if (checkbox.checked) {
            form.style.display = "none";
            table.style.display = "inline-table";
        } else {
            form.style.display = "block";
            table.style.display = "none";
        }
    });
});

document.querySelector('#delete-btn').addEventListener('click', function (){
    const orderId = this.getAttribute('data-orderid');
    darkOverlay = document.querySelector('.dark-overlay');
    modal = document.querySelector('#myModal');
    closeBtn = document.querySelector('.close');
    cancelBtn = document.querySelector('#cancel');
    deleteBtn = document.querySelector("#delete");
    darkOverlay.style.display = "block";
    modal.style.display = "block";
    darkOverlay.addEventListener('click', function (){
        darkOverlay.style.display = "none";
        modal.style.display = "none";
    });
    closeBtn.addEventListener('click', function (){
        darkOverlay.style.display = "none";
        modal.style.display = "none";
    });
    cancelBtn.addEventListener('click', function (){
        darkOverlay.style.display = "none";
        modal.style.display = "none";
    });
    deleteBtn.addEventListener('click', function () {
        $.ajax({
            url: 'php/delete_order.php',
            type: 'POST',
            data: { orderId: orderId },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function () {
                cancelBtn.click();
                window.location.reload();
            }
        });
    });
});

document.querySelector('#submit-btn').addEventListener('click', function (){
    const orderId = this.getAttribute('data-orderid');
    let fullName = document.getElementById('fullname').value;
    let email = document.getElementById('email').value;
    let address = document.getElementById('address').value;
    let city = document.getElementById('city').value;
    let zipCode = document.getElementById('zipCode').value;

    let fullNameError = document.getElementById("full-name-error");
    let emailError = document.getElementById("email-error");
    let addressError = document.getElementById("address-error");
    let cityError = document.getElementById('city-error');
    let zipCodeError = document.getElementById('zipCode-error');

    fullNameError.textContent = "";
    emailError.textContent = "";
    addressError.textContent = "";
    cityError.textContent = "";
    zipCodeError.textContent = "";

    let isValid = true;

    if (fullName.trim() === "") {
        fullNameError.textContent = "*Please enter your full name.";
        document.getElementById("fullname").style.marginBottom = "4px";
        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.trim())) {
        emailError.textContent = "*Please enter a valid email address.";
        document.getElementById("email").style.marginBottom = "4px";
        isValid = false;
    }

    if (address.trim() === "") {
        addressError.textContent = "*Please enter your address.";
        document.getElementById("address").style.marginBottom = "4px";
        isValid = false;
    }

    if (city.trim() === "") {
        cityError.textContent = "*Please enter your city.";
        document.getElementById("city").style.marginBottom = "4px";
        isValid = false;
    }

    const zipCodeRegex = /^\d{5}(?:[-\s]\d{4})?$/;
    if (!zipCodeRegex.test(zipCode.trim())) {
        zipCodeError.textContent = "*Please enter a valid zip code.";
        document.getElementById("zipCode").style.marginBottom = "4px";
        isValid = false;
    }

    if (isValid) {
        $.ajax({
            url: 'php/edit_order.php',
            type: 'POST',
            data: {orderId: orderId, fullName: fullName, email: email, address: address, city: city, zipCode: zipCode },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function() {
                window.location.reload();
            }
        });
    }
});

document.querySelectorAll('.remove-item-button').forEach(remove => {
        remove.addEventListener('click', function (){
        const orderId = this.getAttribute('data-orderid');
        const productId = this.getAttribute('data-productid');
        darkOverlay = document.querySelector('.dark-overlay');
        modal = document.querySelector('#myModal');
        closeBtn = document.querySelector('.close');
        cancelBtn = document.querySelector('#cancel');
        deleteBtn = document.querySelector("#delete");
        darkOverlay.style.display = "block";
        modal.style.display = "block";
        darkOverlay.addEventListener('click', function (){
            darkOverlay.style.display = "none";
            modal.style.display = "none";
        });
        closeBtn.addEventListener('click', function (){
            darkOverlay.style.display = "none";
            modal.style.display = "none";
        });
        cancelBtn.addEventListener('click', function (){
            darkOverlay.style.display = "none";
            modal.style.display = "none";
        });
        deleteBtn.addEventListener('click', function () {
            $.ajax({
                url: 'php/delete_order_item.php',
                type: 'POST',
                data: { orderId: orderId, productId: productId },
                error: function(error) {
                    console.error('Error:', error);
                },
                complete: function () {
                    cancelBtn.click();
                    window.location.reload();
                }
            });
        });
    });
});

document.querySelectorAll('.update-qty').forEach(update => {
    update.addEventListener('click', function (){
        const orderId = this.getAttribute('data-orderid');
        const productId = this.getAttribute('data-productid');
        let quantityInput = this.closest('tr').querySelector('.qty-input').value; // Select the quantity input in the same row
        $.ajax({
            url: 'php/update_order_item.php',
            type: 'POST',
            data: { orderId: orderId, productId: productId, quantity: quantityInput },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function () {
                window.location.reload();
            }
        });
    });
});
