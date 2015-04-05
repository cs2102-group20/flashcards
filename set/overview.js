$('#setedit-edit').click(function () {
    $('.setedit').removeClass('setedit-disabled').addClass('setedit-enabled');
    $('.setedit-field').addClass('form-control').prop('readonly', false);
});

$('#setedit-words')
    .on('click', '.setedit-delete', function(ev) {
        if (confirm("Delete this card?")) {
            $(ev.target).closest('tr').remove();
        }
    })
    .on('focus', 'tr:last-child .setedit-field.form-control', function(ev) {
        var row = $(ev.target).closest('tr');
        row.clone().insertAfter(row);
        row.find('.setedit-field').prop('required', true);
    })
    .on('blur', '.setedit-field.form-control', function(ev) {
        var row = $(ev.target).closest('tr');
        var newTarget = $(ev.relatedTarget || ev.explicitOriginalTarget || document.activeElement);
        if (!row.find('.setedit-field').filter(function() { return $(this).val() }).length
            && !row.has(newTarget).length) {
            row.remove();
        }
    });
