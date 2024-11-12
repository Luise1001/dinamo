const amount = document.getElementById('amount');
AmountKeyUp(amount);

$('#myLocation').on('click', function() {
    $('.my-location').removeClass('d-none');
    $('.my-address').addClass('d-none');
    $('#address_id').val('');
});

$('#myAddress').on('click', function() {
    $('.my-address').removeClass('d-none');
    $('.my-location').addClass('d-none');
    $('#lat').val('');
    $('#lng').val('');
    $('#address').val('');
});