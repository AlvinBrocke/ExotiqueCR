function validateCar() {
    const regNoInput = document.getElementById('reg_no');
    const modelInput = document.getElementById('model');
    const yearInput = document.getElementById('year');
    const capacityInput = document.getElementById('capacity');
    const carImageInput = document.getElementById('car_image');
    const descriptionInput = document.getElementById('description');
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

    return isValid;
}
