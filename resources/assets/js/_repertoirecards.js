document.querySelectorAll('.repertoire-card').forEach(function(card) {
    card.addEventListener('mouseover', function() {
        this.classList.add('hovered');
    });
    card.addEventListener('mouseout', function() {
        this.classList.remove('hovered');
    });
});
