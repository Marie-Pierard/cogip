<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cogit Challenge</title>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Cogit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/invoices">Facture</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/companies">Compagnies</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/contacts">Contacts</a>
                </li>

                <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                    <?php if($_SESSION['user']['role'] === 'admin') : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/admin/view">Dashboard</a>
                            <a class="dropdown-item" href="/contacts/add">New contact</a>
                            <a class="dropdown-item" href="/invoices/add">New invoice</a>
                            <a class="dropdown-item" href="/companies/add">New company</a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/logout">Deconnexion</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/register">Inscription</a>
                    </li>
                <?php endif; ?>  
            </ul>
        </div>
    </nav>
    <?php include '../Views/layout/message.php'; ?>
    <div class="container">
        <?= $content ?>
    </div>

    <script src="/assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>