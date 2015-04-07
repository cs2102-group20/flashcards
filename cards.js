$('#card-edit').click(function () {
    $('.cardedit').removeClass('cardedit-disabled').addClass('cardedit-enabled');
});
$('#card-cancel').click(function () {
    $('.cardedit').removeClass('cardedit-enabled').addClass('cardedit-disabled');
});

$('#card-delete').click(function () {
    return confirm("Delete this card?");
});

(function (cards) {
    var currentCard = 0, onFront = true;

    var prev = $('#card-prev'), next = $('#card-next'),
        word = $('#card-word'), id = $('#cardedit-id'),
        word1 = $('#cardedit-word1'), word2 = $('#cardedit-word2');

    var updateCard = function () {
        word.text((onFront) ? cards[currentCard].word1 : cards[currentCard].word2);
        id.val(cards[currentCard].id);
        word1.val(cards[currentCard].word1);
        word2.val(cards[currentCard].word2);
    }

    $('#card-flip').click(function () {
        onFront = !onFront;
        updateCard();
    })

    prev.click(function () {
        if (currentCard == 1) {
            prev.addClass('disabled');
        }

        if (currentCard == 0) {
            return;
        } else if (currentCard == cards.length - 1) {
            next.removeClass('disabled');
        }

        currentCard--;
        onFront = true;
        updateCard();
    });

    next.click(function () {
        if (currentCard == cards.length - 2) {
            next.addClass('disabled');
        }

        if (currentCard == cards.length - 1) {
            return;
        } else if (currentCard == 0) {
            prev.removeClass('disabled');
        }

        currentCard++;
        onFront = true;
        updateCard();
    });

    updateCard();
})(cards)
