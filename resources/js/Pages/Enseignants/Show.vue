<template>
    <div class="container-fluid mt-0" style="width:60%; margin:auto;">
        <br>
        <h1 class="mx-4 my-2">Détails de l'enseignant</h1>
        <br>
      <table class="table table-striped">
        <tr>
          <th>Nom</th>
          <td>{{ enseignant.nom }}</td>
        </tr>
        <tr>
          <th>Prénom</th>
          <td>{{ enseignant.prenom }}</td>
        </tr>
        <tr>
          <th>Téléphone</th>
          <td>{{ enseignant.telephone }}</td>
        </tr>
        <tr>
          <th>Adresse</th>
          <td>{{ enseignant.adresse }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ enseignant.email }}</td>
        </tr>
        <tr>
          <th>Qualification</th>
          <td>{{ enseignant.qualification }}</td>
        </tr>
      </table>
      <a :href="route('enseignants.index')" class="btn btn-secondary">Retour</a>
    </div>
  </template>

  <script>
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    name: 'ShowEnseignant',
    props: {
      enseignant: Object,
    },
    setup() {
      function route(name, id = null) {
        const baseUrl = '/';
        switch(name) {
          case 'enseignants.index':
            return `${baseUrl}enseignants`;
          default:
            return baseUrl;
        }
      }

      return { route };
    },
  };
  </script>
