<script>
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
  layout: AdminLayout,

  setup() {
    const form = useForm({
      nom: '',
      prenom: '',
      email: '',
      adresse: '',
      tel: '',
      tel_parent: '',
      date_inscription: '',
    });

    function submit() {
      form.post(route('adherants.store'));
    }

    return { form, submit };
  },
};
</script>
<template>
        <Head title="Create_Adherant" />
        <div class="container-fluid mx-2">
      <h1 class="mb-4">Ajouter un adhérant</h1>
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
        <button type="submit" class="btn btn-primary my-2">Ajouter</button>
      </form>
    </div>
  </template>


