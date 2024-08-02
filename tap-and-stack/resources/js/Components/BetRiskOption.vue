<script setup>
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    bet: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    available_balance: {
        type: Number,
        required: true
    },
    user_id: {
        type: Number,
        required: true
    }
});

const form = useForm({
    bet: '',
    available_balance: null,
    user_id: null
});
function submitBet() {
    form.bet = props.bet
    form.available_balance = props.available_balance
    form.user_id = props.user_id
}

const result = ref([]);
const emit = defineEmits(['result'])
function submitForm() {
    axios.post('/create', form)
        .then(response => {
            /*console.log(response.data);*/
            result.value = response.data.result
            emit('result', result.value);
    })
        .catch(error => {
            console.log(error);
        });
}
</script>

<template>
    <form @submit.prevent="submitForm">
        <div class="overflow-hidden shadow-sm sm:rounded-lg border-2 border-blue-600 text-center">
            <h2>{{ props.bet }}</h2>
            <button type="submit"
                    class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded my-4"
                    :disabled="form.processing"
                    @click="submitBet">Bet</button>
            <p>{{  props.description }}</p>
        </div>
    </form>
</template>

<style scoped>

</style>
