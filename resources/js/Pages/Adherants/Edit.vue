<template>
    <div class="container mt-0">
      <h1 class="mx-4 my-1">Modifier un adhérant</h1>

      <form @submit.prevent="submit">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" v-model="form.nom" class="form-control" id="nom" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" v-model="form.prenom" class="form-control" id="prenom" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" v-model="form.email" class="form-control" id="email" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="adresse">Adresse</label>
              <input type="text" v-model="form.adresse" class="form-control" id="adresse" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="tel">Téléphone</label>
              <input type="text" v-model="form.tel" class="form-control" id="tel" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="tel_parent">Téléphone Parent</label>
              <input type="text" v-model="form.tel_parent" class="form-control" id="tel_parent" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="date_inscription">Date d'inscription</label>
              <input type="date" v-model="form.date_inscription" class="form-control" id="date_inscription" required>
            </div>
          </div>
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
    name: 'EditAdherant',
    props: {
      adherant: Object,
    },
    setup(props) {
      const form = useForm({
        nom: props.adherant.nom,
        prenom: props.adherant.prenom,
        email: props.adherant.email,
        adresse: props.adherant.adresse,
        tel: props.adherant.tel,
        tel_parent: props.adherant.tel_parent,
        date_inscription: props.adherant.date_inscription,
      });

      function submit() {
        form.put(route('adherants.update', props.adherant.id));
      }

      return { form, submit };
    },
  };
  </script>
