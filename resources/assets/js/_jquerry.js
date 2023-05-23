import $ from 'jquery';

// Get the repertoire container element.
const repertoireContainer = $("#repertoire-container");

// Fetch the repertoires from the server.
fetch("{{ route('repertoire.index') }}")
    .then(response => response.json())
    .then(repertoires => {
        // Create the HTML for each repertoire.
        let repertoiresHtml = '';
        for (let repertoire of repertoires) {
            repertoiresHtml += `
                <div class="col-md-4 mb-4">
                    <div class="card position-relative">
                        <a href="{{ route('repertuaras.show', ['slug' => $repertoire->event_name]) }}">
                            <img src="${repertoire.image_src}" class="img-fluid w-100" alt="${repertoire.event_name}">
                            <div class="card-hover-info">
                                <h5 class="event-name">${repertoire.event_name}</h5>
                                <p class="description">${repertoire.brief_description}</p>
                            </div>
                        </a>
                    </div>
                </div>
            `;
        }

        // Add the repertoires HTML to the repertoire container.
        repertoireContainer.html(`
            <div class="container">
                <div class="row">${repertoiresHtml}</div>
            </div>
        `);

        // Add hover effect to cards.
        $(".card-hover-info").hide();
        $(".card").hover(
            function() {
                $(this).addClass("card-hover");
                $(this).find(".card-hover-info").fadeIn();
            },
            function() {
                $(this).removeClass("card-hover");
                $(this).find(".card-hover-info").fadeOut();
            }
        );
    })




    $(document).ready(function() {
    $(".actor").hover(function() {
        $(this).find(".description").fadeIn();
    }, function() {
        $(this).find(".description").fadeOut();
    });
});



