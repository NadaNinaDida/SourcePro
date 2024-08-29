<template>
    <div class="container mt-0">
        <br>
      <h1 class="mx-4 my-2"> <i class="fa-regular fa-rectangle-list"></i>  Liste Des Enseignants</h1>
      <br>
      <div class="d-flex justify-content-end mb-3">
  <a :href="route('enseignants.create')" class="btn btn-primary"> <i class="fa-solid fa-user-plus"></i> Ajouter Un Enseignant</a>
</div>


      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th>Email</th>
              <th>Qualification</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="enseignant in enseignants" :key="enseignant.id">
              <td>{{ enseignant.nom }}</td>
              <td>{{ enseignant.prenom }}</td>
              <td>{{ enseignant.telephone }}</td>
              <td>{{ enseignant.adresse }}</td>
              <td>{{ enseignant.email }}</td>
              <td>{{ enseignant.qualification }}</td>
              <td>
                <a :href="route('enseignants.show', enseignant.id)" class="btn btn-info btn-sm mr-1 mb-1"><i class="fa-solid fa-eye"></i></a>
                <a :href="route('enseignants.edit', enseignant.id)" class="btn btn-warning btn-sm mr-1 mb-1"><i class="fa-solid fa-pen"></i></a>
                <button @click="openDeleteModal(enseignant.id)" class="btn btn-danger btn-sm mr-1 mb-1"><i class="fa-solid fa-trash"></i></button>
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
            Êtes-vous sûr de vouloir supprimer cet enseignant ? Cette action est irréversible.
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
      enseignants: Array,
      csrfToken: String,
    },
    setup(props) {
      const deleteId = ref(null);
      const showModal = ref(false);

      const form = useForm({
        _method: 'DELETE',
        _token: props.csrfToken,
      });

      function route(name, id = null) {
        const baseUrl = '/';
        switch(name) {
          case 'enseignants.create':
            return `${baseUrl}enseignants/create`;
          case 'enseignants.show':
            return `${baseUrl}enseignants/${id}`;
          case 'enseignants.edit':
            return `${baseUrl}enseignants/${id}/edit`;
          case 'enseignants.destroy':
            return `${baseUrl}enseignants/${id}`;
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
          form.delete(route('enseignants.destroy', deleteId.value), {
            onSuccess: () => {
              location.reload();
            },
          });
        }
      }

      return { route, openDeleteModal, closeDeleteModal, confirmDelete, showModal };
    },
  };
  </script>

  <style scoped>
  .custom-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1050;
  }

  .custom-modal {
    background: white;
    border-radius: 5px;
    width: 500px;
    max-width: 100%;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }

  .custom-modal-header,
  .custom-modal-footer {
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
  }

  .custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .custom-modal-body {
    padding: 1rem;
  }

  .close-button {
    background: none;
    border: none;
    font-size: 1.5rem;
    line-height: 1;
    color: #000;
    opacity: 0.5;
    cursor: pointer;
  }

  .close-button:hover {
    opacity: 0.75;
  }
  </style>
