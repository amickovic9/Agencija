document.getElementById('polazak').addEventListener('change', function() {
    var departureDate = this.value;
    var returnInput = document.getElementById('povratak');
    returnInput.min = departureDate;
    if (returnInput.value < departureDate) {
        returnInput.value = departureDate;
    }
});
document.getElementById('polazak').addEventListener('change', function() {
    var departureDate = this.value;
    var returnInput = document.getElementById('povratak');
    returnInput.min = departureDate;
    if (returnInput.value < departureDate) {
        returnInput.value = departureDate;
    }
});
  document.addEventListener('DOMContentLoaded', function() {
    const enforceRange = (input, min, max) => {
      input.addEventListener('blur', () => {
        let value = parseInt(input.value, 10);
        if (value < min) {
          input.value = min;
        } else if (value > max) {
          input.value = max;
        }
      });
    };

    const brojMestaInput = document.querySelector('input[name="broj_mesta"]');
    const cenaInput = document.querySelector('input[name="cena"]');

    enforceRange(brojMestaInput, 1, 100);
    enforceRange(cenaInput, 1, 100000);
});
