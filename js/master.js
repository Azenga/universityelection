function validateUid(regno) {
    pattern = new RegExp("\\w{4,5}/\\d{5}/\\d{2}")

    if (pattern.test(regno)) {
        return true;
    } else {
        return false;
    }
}

regnoid = document.getElementById("uid");

regnoid.addEventListener('blur', function() {
    if (validateUid(this.value)) {
        alert("Valid");
    } else {
        this.value = "";
        alert("Invalid Registration Number");
    }
});