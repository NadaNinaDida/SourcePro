<template>
    <div class="container-fluid mt-0" style="width:60%; margin:auto;">
        <br>
        <h1 class="mx-4 my-2">Détail de l'attribution</h1>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Enseignant</h5>
                <p class="card-text">{{ formationEnseignant.enseignant.nom }} {{ formationEnseignant.enseignant.prenom }}</p>
                <h5 class="card-title">Cours</h5>
                <p class="card-text">{{ formationEnseignant.formation.nom }}</p>
                <h5 class="card-title">Prix par heure</h5>
                <p class="card-text">{{ formationEnseignant.prix_heure }}</p>
                <a :href="route('formation-enseignants.edit', formationEnseignant.id)" class="btn btn-warning btn-sm mr-1 mb-1"><i class="fa-solid fa-pen"></i> Modifier</a>
                <button @click="openDeleteModal(formationEnseignant.id)" class="btn btn-danger btn-sm mr-1 mb-1"><i class="fa-solid fa-trash"></i> Supprimer</button>
            </div>
        </div>
        <!-- Modal de confirmation de suppression -->
        <div v-if="showModal" class="custom-modal-overlay">
            <div class="custom-modal">
                <div class="custom-modal-header">
                    <h5>Confirmer la suppression</h5>
                    <button @click="closeDeleteModal" class="close-button">×</button>
                </div>
                <div class="custom-modal-body">
                    Êtes-vous sûr de vouloir supprimer cette formation enseignant ? Cette action est irréversible.
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
        formationEnseignant: Object,
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
