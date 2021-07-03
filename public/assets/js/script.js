const basisURL = $('#base-url').html();
var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
var ciDate = '';
var coDate = '';
var costTotal = '';
var costCurrent = '';
var nameHotel = '';
var addressHotel = '';

function showPreloader() {
    $('.preloader').show();
}
function hidePreloader() {
    $('.preloader').hide();
}


function searchDestination() {
    $('#destination-list').html('');
    $('#reservation-detail').hide();
    let searchValue = $('#search-input').val();

    let settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://hotels4.p.rapidapi.com/locations/search?query=" + searchValue + "&locale=en_US",
        "method": "GET",
        "headers": {
            "x-rapidapi-key": "[API_KEY]",
            "x-rapidapi-host": "hotels4.p.rapidapi.com"
        }
    };

    showPreloader();

    $.ajax(settings).done((response) => {

        if (response.term === searchValue) {
            let destination = response.suggestions[0].entities;
            console.log(destination);

            $('#destination-list').show();

            $.each(destination, (i, data) => {
                $('#destination-list').append(`
                    <li onclick="detailReservation('${data.destinationId}', '${data.name}')">
                        <a href="" id="movie-list" class="see-detail ui-btn ui-corner-all ui-shadow ui-btn-inline">
                            ${data.name}
                            <p>${data.caption}</p>

                        </a>
                    </li>
                `)
            });

            hidePreloader();
        }

    });

}

$('#search-button').on('click', () => {
    searchDestination();
});

function detailReservation(id, name) {

    showPreloader();
    $('#destination-list').hide();

    $('#for-destination').html(`
        <h2>${name}</h2>
    `)
    $('#reservation-detail').show();
    $('#id-destination').val(`${id}`)
    hidePreloader();

}

$('#btn-rsv').on('click', () => {

    let checkin = $('#checkin').val();
    let checkout = $('#checkout').val();
    let idDestination = $('#id-destination').val();

    showPreloader();

    let settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://hotels4.p.rapidapi.com/properties/list?adults1=1&pageNumber=1&destinationId=" + idDestination + "&pageSize=25&checkOut=" + checkout + "&checkIn=" + checkin + "&sortOrder=PRICE&locale=en_US&currency=IDR",
        "method": "GET",
        "headers": {
            "x-rapidapi-key": "[API_KEY]",
            "x-rapidapi-host": "hotels4.p.rapidapi.com"
        }
    };

    showPreloader();

    $.ajax(settings).done((response) => {

        if (response.result === 'OK') {
            console.log(response);
            let hotels = response.data.body.searchResults.results;

            ciDate = new Date(checkin);
            coDate = new Date(checkout);

            ciDate = ciDate.getDate() + ' ' + month[ciDate.getMonth()] + ' ' + ciDate.getFullYear();
            coDate = coDate.getDate() + ' ' + month[coDate.getMonth()] + ' ' + coDate.getFullYear();

            $('#for-destination').html(`
                <h2>${response.data.body.header}</h2>
                <b>${ciDate} - ${coDate}</b>

            `)

            $('#destination-list').html('');
            $('#destination-list').show();
            $('#reservation-detail').hide();

            $.each(hotels, (i, data) => {
                let cost1 = data.ratePlan.price.fullyBundledPricePerStay;
                let cost2 = data.ratePlan.price.current;

                addressHotel = data.address.streetAddress + ', ' + data.address.locality;

                $('#destination-list').append(`
                    <li style="margin-buttom: 20px;" onclick="getCost('${cost1}', '${cost2}'), getName('${data.name}')">
                        <a href="#popup-menu" data-name="${data.name}" data-rel="popup" data-transition="pop" class="see-detail ui-btn ui-corner-all ui-shadow ui-btn-inline">
                            <img src="${data.optimizedThumbUrls.srpDesktop}" width="100px"
                                alt="">
                            ${data.name}
                            <p>${addressHotel}</p>
                            rating : ${data.starRating} <br>
                            <b>${cost1}</b> <small>${cost2}/malam </small>
                        </a>
                    </li>
                `)
            });

            hidePreloader();
        }

    });

});

function getCost(cost1, cost2) {
    costTotal = cost1;
    costCurrent = cost2;
}
function getName(name) {
    nameHotel = name;
}

$('#destination-list').on('click', '.see-detail', () => {
    $('#popup-menu').html(`
        <ul data-role="listview" onclick="bookNow('${nameHotel}')" data-inset="true" onclick style="min-width: 210px;">
            <li id="book-now"><a href="">Book now</a></li>
        </ul>
    `)
});

function bookNow(name) {

    showPreloader();

    $.ajax({
        url: basisURL + "home/tambahrsv",
        type: 'post',
        data: {
            nama: name,
            ci_date: ciDate,
            co_date: coDate,
            cost_current: costCurrent,
            cost_total: costTotal,
            address: addressHotel
        },
        success: () => {

            const noData = $('#no-data').text();

            if (noData != "") {
                $('#list-my-rsv').html('');
            }

            $('#list-my-rsv').append(`

                <li>
                    <p>${ciDate} - ${coDate}</p>
                    ${name}
                    <p>${addressHotel}</p>
                    ${costTotal}
                </li>

            `)

            hidePreloader();
            alert('Reservasi dibuat');
        }
    });

}
