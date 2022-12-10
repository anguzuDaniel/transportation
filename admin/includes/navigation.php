        <header class="navbar navbar-expand-lg navbar-dark bg-dark pb-4 pt-4 px-5">
            <h1 class="h1 navbar-brand">Admin</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <nav class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="registerClient.php" class="nav-link">Register client</a>
                    </li>
                    <li class="nav-item">
                        <a href="showClients.php" class="nav-link">Show clients</a>
                    </li>
                    <li class="nav-item">
                        <a href="registerClient.php" class="nav-link">Create client</a>
                    </li>
                    <li class="nav-item">
                        <a href="createOrder.php" class="nav-link">Create order</a>
                    </li>
                    <?php if (isLoggedIn()) : ?>
                        <li class="nav-link"><a href="../logout.php" class="btn btn-primary btn-block btn-lg btn-out-primary" role="button">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>