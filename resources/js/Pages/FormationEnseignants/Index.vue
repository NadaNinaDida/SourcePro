<template>
    <div class="container mt-0">
        <br>
        <h1 class="mx-4 my-2"><i class="fa-regular fa-rectangle-list"></i> Les Attributions Des Enseignants </h1>
        <br>
        <div class="d-flex justify-content-end mb-3">
            <a :href="route('formation-enseignants.create')" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Assigner un Enseignant</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Enseignant</th>
                        <th>Cours</th>
                        <th>Prix par heure</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="formationEnseignant in formationEnseignants" :key="formationEnseignant.id">
                        <td>{{ formationEnseignant.enseignant.nom }} {{ formationEnseignant.enseignant.prenom }}</td>
                        <td>{{ formationEnseignant.formation.nom }}</td>
                        <td>{{ formationEnseignant.prix_heure }}</td>
                        <td>
                            <a :href="route('formation-enseignants.show', formationEnseignant.id)" class="btn btn-info btn-sm mr-1 mb-1"><i class="fa-solid fa-eye"></i></a>
                            <a :href="route('formation-enseignants.edit', formationEnseignant.id)" class="btn btn-warning btn-sm mr-1 mb-1"><i class="fa-solid fa-pen"></i></a>
                            <button @click="openDeleteModal(formationEnseignant.id)" class="btn btn-danger btn-sm mr-1 mb-1"><i class="fa-solid fa-trash"></i></button>
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
                    Êtes-vous sûr de vouloir supprimer l'attribution de cet enseignant ? Cette action est irréversible.
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
        formationEnseignants: Array,
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
                case 'formation-enseignants.create':
                    return `${baseUrl}formation-enseignants/create`;
                case 'formation-enseignants.show':
                    return `${baseUrl}formation-enseignants/${id}`;
                case 'formation-enseignants.edit':
                    return `${baseUrl}formation-enseignants/${id}/edit`;
                case 'formation-enseignants.destroy':
                    return `${baseUrl}formation-enseignants/${id}`;
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
                form.delete(route('formation-enseignants.destroy', deleteId.value), {
                    onSuccess: () => {
                        location.reload();
                    },
                });
            }
        }

        return { route, openDeleteModal, closeDeleteModal, confirmDelete, showModal };
    }
}
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
    padding: 20px;
    border-radius: 5px;
    width: 500px;
    max-width: 100%;
    z-index: 1060;
}

.custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close-button {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}

.custom-modal-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}
</style>
