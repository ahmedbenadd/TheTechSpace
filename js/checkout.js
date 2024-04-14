document.querySelector('.cart-edit').addEventListener('click', function () {
    document.querySelector('.cart-show').click();
});

document.querySelector('.order-place').addEventListener('click', function () {
    var fName = document.querySelector('#full-name').value;
    var email = document.querySelector('#email').value;
    var address = document.querySelector('#address').value;
    var city = document.querySelector('#city').value;
    var zipCode = document.querySelector('#zip-code').value;
    var terms = document.querySelector('#terms');
    var fNameErr = document.querySelector('#full-name-error');
    var emailErr = document.querySelector('#email-error');
    var addressErr = document.querySelector('#address-error');
    var cityErr = document.querySelector('#city-error');
    var zipCodeErr = document.querySelector('#zip-code-error');
    var termsErr = document.querySelector('#checkbox-label');
    var namePattern = /^[a-zA-Z\s]+$/;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var zipCodePattern = /^\d{5}$/;
    var valid = true;
    if (!fName.trim()) {
        fNameErr.textContent = '*Please enter your full name.';
        valid = false;
    } else if (!namePattern.test(fName)) {
        fNameErr.textContent = '*Please enter a valid name.';
        valid = false;
    } else {
        fNameErr.textContent = '';
    }
    if (!email.trim()) {
        emailErr.textContent = '*Please enter your email address.';
        valid = false;
    } else if (!emailPattern.test(email)) {
        emailErr.textContent = '*Please enter a valid email address.';
        valid = false;
    } else {
        emailErr.textContent = '';
    }
    if (!address.trim()) {
        addressErr.textContent = '*Please enter your address.';
        valid = false;
    } else {
        addressErr.textContent = '';
    }
    if (!city.trim()) {
        cityErr.textContent = '*Please enter your city.';
        valid = false;
    } else if (!namePattern.test(city)) {
        cityErr.textContent = '*Please enter a valid city name.';
        valid = false;
    } else {
        cityErr.textContent = '';
    }
    if (!zipCode.trim()) {
        zipCodeErr.textContent = '*Please enter your zip code.';
        valid = false;
    } else if (!zipCodePattern.test(zipCode)) {
        zipCodeErr.textContent = '*Please enter a valid zip code.';
        valid = false;
    } else {
        zipCodeErr.textContent = '';
    }
    if (!terms.checked) {
        termsErr.innerHTML = "<span></span> * I accept the terms & conditions";
        termsErr.classList.add('error');
        valid = false;
    } else {
        termsErr.innerHTML = "<span></span>I accept the terms & conditions";
        termsErr.classList.remove('error');
    }
    if (valid) {
        $.ajax({
            url: 'php/place_order.php',
            type: 'POST',
            data: { full_name: fName, email: email, address: address, city: city, zip_code: zipCode },
            beforeSend: function () {
                document.querySelector('.order-place').style.padding = "9px 20px";
                document.querySelector('.order-place').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="25px" height="25px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" r="32" stroke-width="8" stroke="#FFFFFF" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform></circle></svg>';
            },
            success: function(data) {
                const response = JSON.parse(data);
                if (response.status) {
                    document.querySelector('.heading').style.display = "none";
                    document.querySelector('.page-content').style.display = "none";
                    document.querySelector('.order-success').style.display = "block";
                } else if (response.message == "ins_qty") {
                    document.querySelector('#id-' + response.product).innerHTML = (response.qty > 0) ? ("*Quantity available is: " + response.qty + ". Please edit your cart.") : "Product is out of stock.";
                }else {
                    window.location.href = 'index.php';
                }
            },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function () {
                document.querySelector('.order-place').innerHTML = "PLACE ORDER";
                document.querySelector('.order-place').style.padding = "12px 30px";
            }
        });
    }
});

