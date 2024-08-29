<template>
  <div class="container-fluid mt-0" style="width:60%; margin:auto;">
    <br>
          <h1 class="mx-4 my-2">Modifier Un Enseignant</h1>
          <br>
      <form @submit.prevent="submit">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" v-model="form.nom" class="form-control" id="nom" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom</label>
          <input type="text" v-model="form.prenom" class="form-control" id="prenom" required>
        </div>
        <div class="form-group">
          <label for="telephone">Téléphone</label>
          <input type="text" v-model="form.telephone" class="form-control" id="telephone" required>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse</label>
          <input type="text" v-model="form.adresse" class="form-control" id="adresse" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" v-model="form.email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
          <label for="qualification">Qualification</label>
          <input type="text" v-model="form.qualification" class="form-control" id="qualification" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Mettre à jour</button>
      </form>
    </div>
  </template>

  <script>
  import { useForm } from '@inertiajs/inertia-vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    name: 'EditEnseignant',
    props: {
      enseignant: Object,
      csrfToken: String,
    },
    setup(props) {
      const form = useForm({
        nom: props.enseignant.nom,
        prenom: props.enseignant.prenom,
        telephone: props.enseignant.telephone,
        adresse: props.enseignant.adresse,
        email: props.enseignant.email,
        qualification: props.enseignant.qualification,
        _method: 'PUT',
        _token: props.csrfToken,
      });

      function submit() {
        form.put(route('enseignants.update', props.enseignant.id));
      }

      function route(name, id = null) {
        const baseUrl = '/';
        switch(name) {
          case 'enseignants.update':
            return `${baseUrl}enseignants/${id}`;
          default:
            return baseUrl;
        }
      }

      return { form, submit, route };
    },
  };
  </script>
