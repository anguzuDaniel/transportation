        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="registerClient.php">Register client</a></li>
                    <li><a href="showClients.php">Show clients</a></li>
                    <li><a href="registerClient.php">Create client</a></li>
                    <li><a href="createOrder.php">Create order</a></li>
                    <?php if (isLoggedIn()) : ?>
                        <li><a href="../logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>