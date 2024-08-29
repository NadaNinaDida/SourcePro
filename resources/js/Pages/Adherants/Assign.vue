<template>
    <div class="container mt-0" style="width: 60%; margin: auto;"><br>
      <h3 class="mx-4 my-2 text-center">Assigner une formation à <strong>{{ adherent.nom }} {{ adherent.prenom }}</strong></h3>
      <br>
      <div v-if="$page.props.flash.error" class="alert alert-danger">
        {{ $page.props.flash.error }}
    </div>
    <div v-if="$page.props.flash.success" class="alert alert-success">
        {{ $page.props.flash.success }}
    </div>
      <form @submit.prevent="submit">
        <div class="form-group">
          <label for="formation_id">Formation</label>
          <select v-model="form.formation_id" class="form-control" id="formation_id" required>
            <option v-for="formation in formations" :key="formation.id" :value="formation.id">
              {{ formation.nom }}
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="date_debut">Date de début</label>
          <input type="date" v-model="form.date_debut" class="form-control" id="date_debut" required>
        </div>
        <div class="form-group">
          <label for="prix_heure">Prix par heure</label>
          <input type="number" v-model="form.prix_heure" class="form-control" id="prix_heure" required >
        </div>
        <button type="submit" class="btn btn-primary">Assigner</button>
      </form>
    </div>
  </template>

  <script>
  import { useForm } from '@inertiajs/inertia-vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    props: {
      adherent: Object,
      formations: Array,
      csrfToken: String,
    },
    setup(props) {
      const form = useForm({
        formation_id: '',
        date_debut: '',
        prix_heure: '',
        _token: props.csrfToken,
      });

      function submit() {
        form.post(route('adherents.assign', props.adherent.id));
      }

      function route(name, id = null) {
        const baseUrl = '/';
        switch(name) {
          case 'adherents.assign':
            return `${baseUrl}adherents/${id}/assign`;
          default:
            return baseUrl;
        }
      }

      return { form, submit, route };
    },
  };
  </script>
