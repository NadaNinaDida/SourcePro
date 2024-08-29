<template>
    <div class="container mt-4">
      <br>
      <h1 class="ml-4">Détails de l'adhérant</h1> <br>
      <div class="d-flex justify-content-end mb-3">
        <a :href="route('adherents.assign', adherant.id)" class="btn btn-success btn-sm mr-1 mb-1 p-2">
          <i class="fa-solid fa-user-graduate"></i> <h7>Assigner une formation</h7>
        </a>
      </div>
      <div v-if="$page.props.flash.error" class="alert alert-danger text-center mx-auto" style="max-width: 400px;">
          <strong>{{ $page.props.flash.error }}</strong>
      </div>
      <div v-if="$page.props.flash.success" class="alert alert-success text-center mx-auto" style="max-width: 400px;">
         <strong>{{ $page.props.flash.success }}</strong>
      </div>
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

          <!-- Section des formations suivies -->
          <div class="mt-4">
            <h4 class=" col-3 bg-secondary p-2 text-center mx-auto rounded">Formations Suivies</h4>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Formation</th>
                  <th>Date de Début</th>
                  <th>Prix par Heure</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="formation in adherant.formations" :key="formation.id">
                  <td>{{ formation.nom }}</td>
                  <td>{{ formation.pivot.date_debut }}</td>
                  <td>{{ formation.pivot.prix_heure }} €</td>
                </tr>
                <tr v-if="!adherant.formations.length">
                  <td colspan="3" class="text-center">Aucune formation assignée.</td>
                </tr>
              </tbody>
            </table>
          </div>

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
