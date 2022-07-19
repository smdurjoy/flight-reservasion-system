<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="assets/img/logo.png" class="header-logo"/>
                <span class="logo-name">FRS</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
            <li class="dropdown <?= ($activePage == 'index') ? 'active':''; ?>">
                <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown <?= ($activePage == 'aircraft') ? 'active':''; ?>">
<!--                1-->
                <a href="aircraft.php" class="nav-link"><i data-feather="monitor"></i><span>Aircraft</span></a>
            </li>
            <li class="dropdown <?= ($activePage == 'flightList') ? 'active':''; ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i>
                    <span>Flight</span></a>
                <ul class="dropdown-menu">
<!--                    2-->
                    <li class="<?= ($activePage == 'flightList') ? 'active':''; ?>"><a class="nav-link" href="flightList.php">Flight List Route Wise</a></li>
<!--                    3-->
                    <li><a class="nav-link" href="flightPassengers.html">Flight Passengers</a></li>
<!--                    5-->
                    <li><a class="nav-link" href="totalFare.html">Total Fare</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i>
                    <span>Tickets</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="ticketsInfo.html">Tickets Info</a></li>
<!--                    6-->
                    <li><a class="nav-link" href="badge.html">Date Wise Tickets</a></li>
<!--                    10-->
                    <li><a class="nav-link" href="badge.html">State Wise Tickets</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i>
                    <span>Travelling</span></a>
                <ul class="dropdown-menu">
<!--                    7-->
                    <li><a class="nav-link" href="ticketsInfo.html">Airport Wise</a></li>
<!--                    8-->
                    <li><a class="nav-link" href="badge.html">Reached Wise</a></li>
<!--                    9-->
                    <li><a class="nav-link" href="badge.html">States Wise</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>