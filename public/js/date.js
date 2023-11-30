document.getElementById('polazak').addEventListener('change', function() {
    var departureDate = this.value;
    var returnInput = document.getElementById('povratak');
    returnInput.min = departureDate;
    if (returnInput.value < departureDate) {
        returnInput.value = departureDate;
    }
});
