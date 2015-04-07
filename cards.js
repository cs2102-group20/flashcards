$('#card-edit').click(function () {
    $('.cardedit').removeClass('cardedit-disabled').addClass('cardedit-enabled');
});
$('#card-cancel').click(function () {
    $('.cardedit').removeClass('cardedit-enabled').addClass('cardedit-disabled');
});

$('#card-delete').click(function () {
    return confirm("Delete this card?");
});
