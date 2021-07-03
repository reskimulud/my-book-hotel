<!-- Start of second page: #my -->
<div data-role="page" id="my" data-theme="a">

    <div data-role="header">
        <h1 id="movie-title">My RSV</h1>
        <div data-role="navbar" data-iconpos="right">
            <ul>
                <li><a href="#home" data-direction="reverse" data-icon="home">Home</a></li>
                <li><a data-icon="user" data-theme="b">My RSV</a></li>
            </ul>
        </div>
    </div><!-- /header -->

    <div role="main" class="ui-content">
        <ul data-role="listview" id="list-my-rsv" data-filter="true" data-filter-placeholder="Search reservasi..."
            data-inset="true">
            <?php if ($rsv) : ?>
            <?php foreach ($rsv as $r) : ?>
            <li>
                <p><?= $r['ci_date']; ?> - <?= $r['co_date']; ?></p>
                <?= $r['nama']; ?>
                <p><?= $r['address']; ?></p>
                <?= $r['cost_total']; ?>

            </li>
            <?php endforeach; ?>
            <?php else : ?>
            <li id="no-data">Belum ada data</li>
            <?php endif; ?>
        </ul>
        <p><a href="#home" data-direction="reverse" class="ui-btn ui-shadow ui-corner-all ui-btn-b">Back to page
                "home"</a></p>
    </div><!-- /content -->

    <div data-role="footer" data-theme="a" data-position="fixed">
        <h4>Copyright &copy; 2021 - Reski Mulud Muchamad</h4>
    </div>
    <!-- /footer -->
</div>
<!-- /page my -->