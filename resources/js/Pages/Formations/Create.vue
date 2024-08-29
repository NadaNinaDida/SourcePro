<template>
    <div class="container mt-0" style="width:60%; margin:auto;">
      <br>
        <h1 class="mx-4 my-2">Ajouter une formation</h1>
        <br>
      <form @submit.prevent="submit">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" v-model="form.nom" class="form-control" id="nom" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea v-model="form.description" class="form-control" id="description" required></textarea>
        </div>
        <div class="form-group">
          <label for="nbr_heure">Nombre d'heures</label>
          <input type="number" v-model="form.nbr_heure" class="form-control" id="nbr_heure" required>
        </div>
        <div class="form-group">
          <label for="prix_heure">Prix par heure</label>
          <input type="number" v-model="form.prix_heure" class="form-control" id="prix_heure" required>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
      </form>
    </div>
  </template>

  <script>
  import { useForm } from '@inertiajs/inertia-vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    name: 'CreateFormation',
    setup() {
      const form = useForm({
        nom: '',
        description: '',
        nbr_heure: '',
        prix_heure: '',
      });

      function submit() {
        form.post(route('formations.store'));
      }

      return { form, submit };
    },
  };
  </script>
