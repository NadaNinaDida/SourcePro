<template>
    <div class="container mt-4">
      <h1 class="mb-4">Détails de l'adhérant</h1>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <tbody>
              <tr>
                <th scope="row">Nom</th>
                <td>{{ adherant.nom }}</td>
              </tr>
              <tr>
                <th scope="row">Prénom</th>
                <td>{{ adherant.prenom }}</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>{{ adherant.email }}</td>
              </tr>
              <tr>
                <th scope="row">Adresse</th>
                <td>{{ adherant.adresse }}</td>
              </tr>
              <tr>
                <th scope="row">Téléphone</th>
                <td>{{ adherant.tel }}</td>
              </tr>
              <tr>
                <th scope="row">Téléphone Parent</th>
                <td>{{ adherant.tel_parent }}</td>
              </tr>
              <tr>
                <th scope="row">Date d'inscription</th>
                <td>{{ adherant.date_inscription }}</td>
              </tr>
            </tbody>
          </table>
          <div class="mt-3">
            <Link :href="route('adherants.index')" class="btn btn-secondary">Retour</Link>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { Link } from '@inertiajs/inertia-vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    name: 'ShowAdherant',
    props: {
      adherant: Object,
    },
    components: {
      Link,
    },
  };
  </script>
