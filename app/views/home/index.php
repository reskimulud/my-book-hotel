<div class="preloader" style="display: none;">
    <h4>Please Wait</h4>
</div>

<!-- Start of first page: #home -->
<div data-role="page" id="home">

    <div data-role="header" style="overflow: hidden;" data-position="fixed">
        <h1><?= $title; ?></h1>
        <div data-role="navbar" data-iconpos="right">
            <ul>
                <li><a data-icon="home" data-theme="b">Home</a></li>
                <li><a href="#my" data-direction="reverse" data-icon="user">My RSV</a></li>
            </ul>
        </div>
    </div>

    <div role="main" class="ui-content">

        <label for="search-input"><b>Destinasi</b></label>
        <div>
            <table id="table-search">
                <tr>
                    <td>
                        <input type="search" name="search-input" id="search-input" placeholder="Cari lokasi...">
                    </td>
                    <td>
                        <input data-mini="true" id="search-button" type="button" value="Search">
                    </td>
                </tr>
            </table>
        </div>

        <div id="for-destination"></div>

        <ul data-role="listview" id="destination-list" data-filter="true" data-filter-placeholder="Filter result..."
            data-inset="true" style="display: none;">

        </ul>

        <div class="card" id="reservation-detail" style="display: none;">
            <h2>Detail reservasi</h2>
            <input type="hidden" name="id-destination" id="id-destination">
            <div>
                <label for="checkin">Tanggal Check-In:</label>
                <input type="date" name="checkin" id="checkin" value="">
            </div>
            <div>
                <label for="checkout">Tanggal Check-Out:</label>
                <input type="date" name="checkout" id="checkout" value="">
            </div>
            <button id="btn-rsv" class="ui-btn ui-btn-b">Lanjut</button>
        </div>

        <div id="popup-menu" data-role="popup" data-theme="b">

        </div>

    </div>
    <!-- /content -->



    <div data-role="footer" data-theme="a" data-position="fixed">
        <h4>Copyright &copy; 2021 - Reski Mulud Muchamad</h4>
    </div>
    <!-- /footer -->
</div>
<!-- /page home -->