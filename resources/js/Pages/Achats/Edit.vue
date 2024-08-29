<template>
    <div class="container-fluid mt-0" style="width:60%; margin:auto;">
        <br>
        <h1 class="mx-4 my-2"><i class="fa-solid fa-pen"></i> Modifier un achat</h1>
        <br>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="designation">Désignation</label>
                <input type="text" v-model="form.designation" class="form-control" id="designation" required>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" v-model="form.quantite" class="form-control" id="quantite" required>
            </div>
            <div class="form-group">
                <label for="prix_achat">Prix d'achat</label>
                <input type="number" v-model="form.prix_achat" class="form-control" id="prix_achat" required>
            </div>
            <div class="form-group">
                <label for="date_achat">Date d'achat</label>
                <input type="date" v-model="form.date_achat" class="form-control" id="date_achat" required>
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
    props: {
        achat: Object,
    },
    setup(props) {
        const form = useForm({
            designation: props.achat.designation,
            quantite: props.achat.quantite,
            prix_achat: props.achat.prix_achat,
            date_achat: props.achat.date_achat,
        });

        function submit() {
            form.put(route('achats.update', props.achat.id));
        }

        return { form, submit };
    }
}
</script>
