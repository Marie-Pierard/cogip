<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cogip Challenge</title>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="/assets/images/logocogip.png" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/') ?  ' active' : '' ?>">
                    <a class="nav-link" href="/">Accueil</a>
                </li>

                <li class="nav-item<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/invoices') ?  ' active' : '' ?>">
                    <a class="nav-link" href="/invoices">Invoices</a>
                </li>

                <li class="nav-item<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/companies') ?  ' active' : '' ?>">
                    <a class="nav-link" href="/companies">Companies</a>
                </li>
                
                <li class="nav-item<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/contacts') ?  ' active' : '' ?>">
                    <a class="nav-link" href="/contacts">Contacts</a>
                </li>

                <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                    <?php if($_SESSION['user']['role'] === 'admin' OR $_SESSION['user']['role'] === 'moderator') : ?>
                        <li class="nav-item dropdown<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/admin') ?  ' active' : '' ?>">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/admin/view">Dashboard</a>
                            <a class="dropdown-item" href="/contacts/add">New contact</a>
                            <a class="dropdown-item" href="/companies/add">New company</a>
                            <a class="dropdown-item" href="/invoices/add">New invoice</a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/logout">Deconnexion</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/users' && isset($_SESSION['page_view']) && $_SESSION['page_view'] == 'login') ?  ' active' : '' ?>">
                        <a class="nav-link" href="/users/login">Connexion</a>
                    </li>
                    <li class="nav-item<?= (isset($_SESSION['page']) && $_SESSION['page'] == '/users' && isset($_SESSION['page_view']) && $_SESSION['page_view'] == 'register') ?  ' active' : '' ?>">
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
     <!-- Footer -->
     <footer  position="fixed" bottom="0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <ul class="navbar-nav mr-auto" style="color:white"> 
        <li class="nav-item" style="margin-right:2rem"> © Copyright </li>
        <li class="nav-item"> Cogip is the best </liv>
      </ul>              
    </nav>

    </footer>
    <!-- Footer -->

    
    <script src="/assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <?php 
        if(isset($_SESSION['js'])) :
            foreach($_SESSION['js'] as $file) :
    ?>
                <script src="/assets/js/<?= $file ?>.js"></script>
    <?php
            endforeach;
        endif;
        unset($_SESSION['js']);
    ?>
</body>

</html>