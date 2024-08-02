<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BetRiskOption from "@/Components/BetRiskOption.vue";
import {Head, usePage} from '@inertiajs/vue3';
import {computed, ref} from "vue";

const bets = [
    ["Low Risk", "by -25 up to 100"],
    ["Moderate Risk", "by -100 up to 1000"],
    ["High Risk", "by -500 up to 2500"],
    ["Severe Risk", "by -3000 up to 5000"]
];
const page = usePage()
const user = computed(() =>
    page.props.auth.user
);

function handleResult(result) {
    console.log(result);
    betResult.value = result;
}

const betResult = ref([]);
</script>
<!--TODO:
        1.Update the total money
-->
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Your money: {{ user.balance }}</h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-2">
            <div v-for="bet of bets" class="w-1/4 py-10">
                <BetRiskOption
                    :bet=bet[0] :description=bet[1] :available_balance="Number(user.balance)" :user_id=user.id
                    @result="handleResult"
                />
            </div>
        </div>

        <!--TODO: Display Bet results here-->
        <ul v-for="(result, index) in betResult" :key="result.id + '-' + index">
            <li :class="[result.net_winnings > 0 ? 'text-green-600' : 'text-red-600']">You pushed <span>{{ result.bet }}</span>.
                Value is
                <span>{{ result.net_winnings }}.
                Your
                current
                money now is
                {{ result.new_balance }}</span></li>
        </ul>
    </AuthenticatedLayout>
</template>
