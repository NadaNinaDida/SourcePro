<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-2">
      <a href="#" class="brand-link">
        <img src="/logo.png" alt="The Source Logo" class="brand-image">
        <span class="brand-text font-weight-light">The Source</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <img src="/images/dash2.png" alt="" class="nav-icon">
                    <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <img src="/images/diplome.png" alt="" class="nav-icon">
                   <span>Adhérant</span>
              </a>
            </li>     <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <img src="/images/prof.png" alt="" class="nav-icon">
                      <span>Enseignant</span>
              </a>
            </li>     <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <img src="/images/documents.png" alt="" class="nav-icon">
                      <span>Formation</span>
              </a>
            </li>     <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <img src="/images/calendrier.png" alt="" class="nav-icon">
                        <span>Planing</span>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <img src="/images/panier.png" alt="" class="nav-icon">
                        <span>Achat</span>
              </a>
            </li>
            <!-- Ajoutez d'autres éléments de la barre latérale ici -->
          </ul>
        </nav>
      </div>
    </aside>
  </template>

  <script>
  export default {
    name: 'Sidebar'
  }
  </script>

  <style scoped>
  /* Styles pour la sidebar */
  .main-sidebar {
    width: 250px; /* Largeur par défaut pour les grands écrans */
    transition: width 0.3s; /* Animation pour les transitions de largeur */
    overflow-x: hidden; /* Empêche le défilement horizontal */
    background: linear-gradient(to bottom, #3a6b8d, #1d3c55); /* Dégradé bleu clair et foncé */
  }

  /* Style pour le lien de la marque */
  .brand-link {
    display: flex;
    align-items: center;
    padding: 15px; /* Augmente le padding pour plus de confort */
    background-color: #2c4a6f; /* Couleur de fond légèrement différente mais harmonieuse */
  }

  /* Style pour l'image du logo */
  .brand-image {
    height: 60px; /* Ajustez la hauteur du logo */
    width: auto; /* Garder les proportions du logo */
    margin-right: 10px; /* Espace entre l'image et le texte */
  }

  /* Style pour le texte de la marque */
  .brand-text {
    font-size: 1.25rem; /* Taille du texte */
    white-space: nowrap; /* Évite le retour à la ligne du texte */
    color: #ffffff; /* Couleur du texte pour un bon contraste */
  }

  /* Styles pour les éléments de navigation */
  .nav-link {
    display: flex;
    align-items: center;
    padding: 15px; /* Augmente le padding pour plus de confort */
    color: #ffffff; /* Couleur du texte des liens */
    text-decoration: none; /* Supprime les sous-lignages */
  }

  /* Style pour les icônes dans la navigation */
  .nav-icon {
    margin-right: 15px; /* Espace entre l'icône et le texte */
    width: 25px; /* Largeur des icônes */
    height: 25px; /* Hauteur des icônes */
  }

  /* Styles pour les écrans plus petits */
  @media (max-width: 768px) {
    .main-sidebar {
      width: 180px; /* Réduit la largeur pour les petits écrans */
    }

    .brand-link {
      flex-direction: column; /* Aligne le logo et le texte verticalement pour les petits écrans */
      align-items: center; /* Centre les éléments */
    }

    .brand-image {
      height: 50px; /* Réduit la taille du logo pour les petits écrans */
      margin-right: 0; /* Supprime l'espace à droite du logo */
      margin-bottom: 10px; /* Ajoute de l'espace sous le logo */
    }

    .brand-text {
      font-size: 1rem; /* Réduit la taille du texte pour les petits écrans */
      text-align: center; /* Centre le texte */
    }

    .nav-link {
      padding: 10px; /* Réduit le padding pour les petits écrans */
    }

    .nav-icon {
      width: 20px; /* Réduit la largeur des icônes pour les petits écrans */
      height: 20px; /* Réduit la hauteur des icônes pour les petits écrans */
    }
  }

  /* Styles pour les très petits écrans */
  @media (max-width: 576px) {
    .main-sidebar {
      width: 80px; /* Encore plus petit pour les très petits écrans */
    }

    .brand-link {
      flex-direction: column; /* Aligne le logo et le texte verticalement pour les très petits écrans */
      align-items: center; /* Centre les éléments */
    }

    .brand-image {
      height: 40px; /* Réduit la taille du logo pour les très petits écrans */
      margin-bottom: 5px; /* Réduit l'espace sous le logo */
    }

    .brand-text {
      font-size: 0.875rem; /* Réduit la taille du texte pour les très petits écrans */
      text-align: center; /* Centre le texte */
      display: none; /* Cache le texte pour économiser de l'espace */
    }

    .nav-link {
      padding: 10px; /* Réduit le padding pour les très petits écrans */
    }

    .nav-icon {
      width: 20px; /* Réduit la largeur des icônes pour les très petits écrans */
      height: 20px; /* Réduit la hauteur des icônes pour les très petits écrans */
    }
  }
  </style>
