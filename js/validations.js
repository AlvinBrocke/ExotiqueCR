// Form Validations

function validateCar() {
    const regNoInput = document.getElementById('reg_no').value;
    const modelInput = document.getElementById('model').value;
    const yearInput = document.getElementById('year').value;
    const capacityInput = document.getElementById('capacity').value;
    const carImageInput = document.getElementById('car_image').value;
    const descriptionInput = document.getElementById('description').value;
    const mileageInput = document.getElementById('mileage').value;

    let isValid = true;


    // Validate registration number with regex (alphanumeric characters, hyphens, and spaces)
    const regNoRegex = /^[A-Za-z0-9\s-]+$/;
    regNoInput.addEventListener('input', function() {
        if (isEmpty(regNoInput.value) || !regNoRegex.test(regNoInput.value)) {
            document.getElementById('regno-error').style.display = 'block';
            isValid = false;
        }
        
    });

    // Validate model (alphanumeric characters, spaces, hyphens, and apostrophes)
    const modelRegex = /^[A-Za-z0-9\s\-']+$/;
    modelInput.addEventListener('input', function() {
        if (isEmpty(modelInput.value) || !modelRegex.test(modelInput.value)) {
            document.getElementById('model-error').style.display = 'block';
            isValid = false;
        } 
    });

    // Validate year (four digits)
    const yearRegex = /^\d{4}$/;
    yearInput.addEventListener('input', function() {
        if (isEmpty(yearInput.value) || !yearRegex.test(yearInput.value) || parseInt(yearInput.value) > new Date().getFullYear() || parseInt(yearInput.value) < 1900){
            document.getElementById('year-error').style.display = 'block';
            isValid = false;
        } 
    });

    // Validate capacity (numeric value)
    const capacityRegex = /^\d+$/;
    capacityInput.addEventListener('input', function() {
        if (isEmpty(capacityInput.value) || !capacityRegex.test(capacityInput.value)) {
            document.getElementById('capacity-error').style.display = 'block';
            isValid = false;
        }
    });

    // Validate car image (check if a file is selected)
    carImageInput.addEventListener('change', function() {
        if (!carImageInput.files || carImageInput.files.length === 0) {
            document.getElementById('carimage-error').style.display = 'block';
            isValid = false;
        } 
    });

    // Validate description (any characters)
    descriptionInput.addEventListener('input', function() {
        if (isEmpty(descriptionInput.value)) {
            document.getElementById('description-error').style.display = 'block';
            isValid = false;
        } 
    });

    // Validate mileage (numeric value)
    const mileageRegex = /^\d+$/;
    mileageInput.addEventListener('input', function() {
        if (isEmpty(mileageInput.value) || !mileageRegex.test(mileageInput.value)) {
            document.getElementById('mileage-error').style.display = 'block';
            isValid = false;
        }
    });



    return isValid;
}

function validateBrand(){
    const brandInput = document.getElementById('brand_name');
    let isValid = true;

    // Validate brand (alphanumeric characters, spaces, hyphens, and apostrophes)
    const brandRegex = /^[A-Za-z\s\-']+$/;
    brandInput.addEventListener('input', function() {
        if (isEmpty(brandInput.value) || !brandRegex.test(brandInput.value)) {
            document.getElementById('brand_name_error').style.display = 'block';
            isValid = false;
        }
    });

    return isValid;
}

function validateBodyType(){
    const bodyTypeInput = document.getElementById('bodytype_name').value;
    const dailyrateInput = document.getElementById('daily_rate').value;
    const weeklyrateInput = document.getElementById('weekly_rate').value;
    let isValid = true;

    // Validate body type (alphanumeric characters, spaces, hyphens, and apostrophes)
    const bodyTypeRegex = /^[A-Za-z\s\-']+$/;
    bodyTypeInput.addEventListener('input', function() {
        if (isEmpty(bodyTypeInput.value) || !bodyTypeRegex.test(bodyTypeInput.value)) {
            document.getElementById('bodytype_name_error').style.display = 'block';
            isValid = false;
        }
    });

    // Validate daily rate (numeric value)
    const dailyRateRegex = /^\d+$/;
    dailyrateInput.addEventListener('input', function() {
        if (isEmpty(dailyrateInput.value) || !dailyRateRegex.test(dailyrateInput.value)) {
            document.getElementById('daily_rate_error').style.display = 'block';
            isValid = false;
        }
    });

    // Validate weekly rate (numeric value)
    const weeklyRateRegex = /^\d+$/;
    weeklyrateInput.addEventListener('input', function() {
        if (isEmpty(weeklyrateInput.value) || !weeklyRateRegex.test(weeklyrateInput.value)) {
            document.getElementById('weekly_rate_error').style.display = 'block';
            isValid = false;
        }
    });

    return isValid;
}
