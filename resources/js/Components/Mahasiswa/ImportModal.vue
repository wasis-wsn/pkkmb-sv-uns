<script setup>
import { ref } from 'vue';
import FormField from '@/Components/FormField.vue';
import BaseButton from '../BaseButton.vue';

const show = ref(true);

function closeModal() {
    show.value = false;
}

async function submitForm(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log('CSRF Token:', csrfToken); // Log the CSRF token for debugging

        const response = await fetch('/mahasiswaImport', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        if (response.ok) {
            closeModal();
            alert('Data berhasil diimport');
            window.location.href = '/dashboard/mahasiswa';
        } else {
            const errorData = await response.json();
            alert('Terjadi kesalahan saat mengimpor data: ' + (errorData.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error submitting form:', error);
        alert('Terjadi kesalahan saat mengimpor data');
    }
}
</script>

<template>
    <div class="fixed z-10 inset-0 overflow-y-auto" v-if="show">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form @submit="submitForm" enctype="multipart/form-data">
                    <div class="bg-slate-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <label for="" class="text-xl text-white">Upload Data Mahasiswa</label>
                                <div class="mt-2">
                                    <input type="file" name="file_mahasiswa"  required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-950 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <BaseButton type="submit" color="success" label="Submit" />
                        <BaseButton type="button" color="warning" class="mx-4" @click="closeModal" label="Cancel" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
