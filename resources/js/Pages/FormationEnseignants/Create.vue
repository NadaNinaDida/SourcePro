<template>
    <div class="container-fluid mt-0" style="width:60%; margin:auto;">
        <br>
        <h1 class="mx-4 my-2"> Assignation d'un Enseignant</h1>
        <br>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="id_enseignant">Enseignant</label>
                <select v-model="form.id_enseignant" class="form-control" id="id_enseignant" required>
                    <option v-for="enseignant in enseignants" :key="enseignant.id" :value="enseignant.id">
                        {{ enseignant.nom }} {{ enseignant.prenom }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_cours">Cours</label>
                <select v-model="form.id_cours" class="form-control" id="id_cours" required>
                    <option v-for="formation in formations" :key="formation.id" :value="formation.id">
                        {{ formation.nom }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="prix_heure">Prix par heure</label>
                <input type="number" v-model="form.prix_heure" class="form-control" id="prix_heure" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
    layout: AdminLayout,
    props: {
        formations: Array,
        enseignants: Array,
        csrfToken: String,
    },
    setup(props) {
        const form = useForm({
            id_enseignant: '',
            id_cours: '',
            prix_heure: '',
            _token: props.csrfToken,
        });

        function submit() {
            form.post(route('formation-enseignants.store'), {
                onSuccess: () => {
                    location.reload();
                },
            });
        }

        return { form, submit };
    }
}
</script>
