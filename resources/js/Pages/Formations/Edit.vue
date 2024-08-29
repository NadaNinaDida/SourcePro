<template>
    <div class="container mt-0">
      <h1 class="mx-4 my-2">Modifier une formation</h1>
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
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
  </template>

  <script>
  import { useForm } from '@inertiajs/inertia-vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    name: 'EditFormation',
    props: {
      formation: Object,
      csrfToken: String,
    },
    setup(props) {
      const form = useForm({
        nom: props.formation.nom,
        description: props.formation.description,
        nbr_heure: props.formation.nbr_heure,
        prix_heure: props.formation.prix_heure,
        _method: 'PUT',
        _token: props.csrfToken,
      });

      function submit() {
        form.put(route('formations.update', props.formation.id));
      }

      function route(name, id = null) {
        const baseUrl = '/';
        switch(name) {
          case 'formations.update':
            return `${baseUrl}formations/${id}`;
          default:
            return baseUrl;
        }
      }

      return { form, submit, route };
    },
  };
  </script>
