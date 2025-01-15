<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center w-100">
                <?php if (!isset($_SESSION['id']) || empty($_SESSION['id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Bejelentkezés</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Regisztráció</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="index.php">Főoldal</a></li>
                    <li class="nav-item"><a class="nav-link" href="help.php">Kapcsolat</a></li>
                    <?php if ($_SESSION['permission'] === "admin"): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Adminisztrátor</a>
                            <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                <li><a class="dropdown-item" href="create_courses.php">Tananyag létrehozása</a></li>
                                <li><a class="dropdown-item" href="manage_courses.php">Tananyagok kezelése</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="modifyMyProfile.php">Profilom kezelése</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Kijelentkezés</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>