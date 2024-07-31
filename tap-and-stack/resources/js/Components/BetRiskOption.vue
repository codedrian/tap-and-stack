<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    bet: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    }
});

const form = useForm({
    bet: null
});

function submitBet() {
    form.bet = props.bet
}
</script>

<template>
    <form @submit.prevent="form.post('/create')">
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
