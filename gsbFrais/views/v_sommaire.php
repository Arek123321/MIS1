<!-- Division pour le sommaire -->
<nav class="menuLeft">
    <ul class="menu-ul">
        <li class="menu-item"><a href="index.php">retour</a></li>

        <li class="menu-item">
            Visiteur :<br>
            <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes
                fiches de frais</a>
        </li>
        <li class="menu-item">
            <a href="index.php?uc=cumulefrais&action=cumulefrais" title="Consultation du cumule des frais">
                 Etat de tout les frais par mois-1a</a>
        </li>
        <li class="menu-item">
            <a href="index.php?uc=fraisVisiteur&action=fraisVisiteur" title="Consultation du cumule des frais">
            Etat de tout les frais par visiteurs-1b</a>
        </li>
        <li class="menu-item">
            <a href="index.php?uc=cumulefrais&action=cumuletous" title="Consultation du cumule des frais">
                 Etat de tout les frais-1c</a>
        </li>
        <li class="menu-item">
            <a href="index.php?uc=cumulefrais&action=cumulevisiteur" title="Consultation du cumule des frais">
                 Etat de Visiteur-1d</a>
        </li>
        <li class="menu-item">
            <a href="index.php?uc=fraisVisiteur&action=1e" title="Consultation du cumule des frais">
            Insertion-1e</a>
        <li class="menu-item">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
    </ul>
</nav>
<section class="content">


