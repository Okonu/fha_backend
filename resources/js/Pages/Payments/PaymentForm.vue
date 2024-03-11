<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
});

const form = useForm({
    phone_number: '',
});

const submit = () => {
    form.post(route('payment.submit'), {
        onFinish: () => form.reset('phone_number'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Complete Payment" />

        <div>
            <h2>Welcome, {{ user.name }}</h2>
            <p>Your email is {{ user.email }}</p>
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="phone_number" value="Phone Number" />

                <TextInput
                    id="phone_number"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.phone_number"
                    required
                    autocomplete="tel"
                />

                <InputError class="mt-2" :message="form.errors.phone_number" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit Payment
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
