<template>
    <div class="container mt-0">
        <br>
      <h1 class="mx-4 my-2">Détails de la formation</h1> <br>
      <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
        <tr>
          <th>Nom</th>
          <td>{{ formation.nom }}</td>
        </tr>
        <tr>
          <th>Description</th>
          <td>{{ formation.description }}</td>
        </tr>
        <tr>
          <th>Nombre d'heures</th>
          <td>{{ formation.nbr_heure }}</td>
        </tr>
        <tr>
          <th>Prix par heure</th>
          <td>{{ formation.prix_heure }}</td>
        </tr>
      </table>
          <div class="mt-3">
            <a :href="route('formations.index')" class="btn btn-secondary">Retour</a>
        </div>
        </div>
      </div>


    </div>
  </template>

  <script>
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    name: 'ShowFormation',
    props: {
      formation: Object,
    },
    setup() {
      function route(name, id = null) {
        const baseUrl = '/';
        switch(name) {
          case 'formations.index':
            return `${baseUrl}formations`;
          default:
            return baseUrl;
        }
      }

      return { route };
    },
  };
  </script>
