$('#set-edit').click(function () {
    $('.setedit').removeClass('setedit-disabled').addClass('setedit-enabled');
});

$('#set-delete').click(function () {
    return confirm("Delete this set?");
});

$('#setedit-words')
    .on('click', '.setedit-delete', function(ev) {
        if (confirm("Delete this card?")) {
            $(ev.target).closest('tr').remove();
        }
    })
    .on('focus', 'tr:last-child input', function(ev) {
        var row = $(ev.target).closest('tr');
        row.clone().insertAfter(row);
        row.find('input').prop('required', true);
    })
    .on('blur', 'input', function(ev) {
        var row = $(ev.target).closest('tr');
        var newTarget = $(ev.relatedTarget || ev.explicitOriginalTarget || document.activeElement);
        if (!row.find('input').filter(function() { return $(this).val() }).length
            && !(row.has(newTarget).length && newTarget.is('input'))) {
            row.remove();
        }
    });

$('#filter-word').on('input propertychange', function () {
    var search = $(this).val().toLowerCase();
    $('#setedit-words tr').has('td').map(function() {
        if ($(this).find('input').filter(function() { return $(this).val().toLowerCase().indexOf(search) >= 0 }).length) {
            $(this).removeClass('hidden');
        } else {
            $(this).addClass('hidden');
        }
    });
});
