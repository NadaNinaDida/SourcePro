<template>
    <div class="container mt-0">
      <h1 class="mx-4 my-2">Liste des adhérants</h1>
      <div class="mb-3">
        <a :href="route('adherants.create')" class="btn btn-primary">Ajouter un adhérant</a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Adresse</th>
              <th>Téléphone</th>
              <th>Téléphone Parent</th>
              <th>Date d'inscription</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="adherant in adherants" :key="adherant.id">
              <td>{{ adherant.nom }}</td>
              <td>{{ adherant.prenom }}</td>
              <td>{{ adherant.email }}</td>
              <td>{{ adherant.adresse }}</td>
              <td>{{ adherant.tel }}</td>
              <td>{{ adherant.tel_parent }}</td>
              <td>{{ adherant.date_inscription }}</td>
              <td>
                <a :href="route('adherants.show', adherant.id)" class="btn btn-info btn-sm mr-1 mb-1" ><i class="fa-solid fa-eye"></i></a>
                <a :href="route('adherants.edit', adherant.id)" class="btn btn-warning btn-sm mr-1 mb-1"><i class="fa-solid fa-pen"></i></a>
                <button @click="openDeleteModal(adherant.id)" class="btn btn-danger btn-sm mr-1 mb-1"><i class="fa-solid fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Modal de confirmation de suppression -->
      <div v-if="showModal" class="custom-modal-overlay">
        <div class="custom-modal">
          <div class="custom-modal-header">
            <h5>Confirmer la suppression</h5>
            <button @click="closeDeleteModal" class="close-button">×</button>
          </div>
          <div class="custom-modal-body">
            Êtes-vous sûr de vouloir supprimer cet adhérant ? Cette action est irréversible.
          </div>
          <div class="custom-modal-footer">
            <button @click="closeDeleteModal" class="btn btn-secondary mr-2">Annuler</button>
            <button @click="confirmDelete" class="btn btn-danger">Supprimer</button>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import AdminLayout from '@/Layouts/AdminLayout.vue';

  export default {
    layout: AdminLayout,
    props: {
      adherants: Array,
      csrfToken: String,
    },
    setup(props) {
      const deleteId = ref(null);
      const showModal = ref(false);

      // Création d'un formulaire pour la suppression
      const form = useForm({
        _method: 'DELETE',
        _token: props.csrfToken,
      });

      function route(name, id = null) {
        const baseUrl = '/'; // Remplacez par votre base URL
        switch(name) {
          case 'adherants.create':
            return `${baseUrl}adherants/create`;
          case 'adherants.show':
            return `${baseUrl}adherants/${id}`;
          case 'adherants.edit':
            return `${baseUrl}adherants/${id}/edit`;
          case 'adherants.destroy':
            return `${baseUrl}adherants/${id}`;
          default:
            return baseUrl;
        }
      }

      function openDeleteModal(id) {
        deleteId.value = id;
        showModal.value = true;
      }

      function closeDeleteModal() {
        showModal.value = false;
      }

      function confirmDelete() {
        if (deleteId.value !== null) {
          form.delete(route('adherants.destroy', deleteId.value), {
            onSuccess: () => {
              // Optionnel: Rafraîchir la liste des adhérants après suppression
              location.reload();
            },
            onError: (errors) => {
              console.error('Erreur:', errors);
            }
          });
          closeDeleteModal();
          deleteId.value = null;
        }
      }

      return { route, openDeleteModal, closeDeleteModal, confirmDelete, showModal };
    }
  };
  </script>

  <style scoped>
  .custom-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .custom-modal {
    background: white;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    padding: 20px;
  }

  .custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .custom-modal-body {
    margin: 20px 0;
  }

  .custom-modal-footer {
    display: flex;
    justify-content: flex-end;
  }

  .close-button {
    background: none;
    border: none;
    font-size: 1.5rem;
  }
  </style>
