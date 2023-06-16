window.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const addressInput = document.getElementById('address').value;
        const breakpoint = ","
        const result = addressInput.split(breakpoint);
        console.log(result);

        if (result) {
            document.getElementById('street').value = result[0];
            document.getElementById('zipcode').value = result[1];
            document.getElementById('city').value = result[2];
            
        }

        form.submit();
    });
});
