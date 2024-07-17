<script setup>
    import CardBox from '@/Components/CardBox.vue'
    import FormField from '@/Components/FormField.vue'
    import FormControl from '@/Components/FormControl.vue'
    import BaseButton from '@/Components/BaseButton.vue'
    import BaseButtons from '@/Components/BaseButtons.vue'
    import { reactive, ref } from 'vue'

    const selectOptions = [
  { id: 1, label: 'D3 Teknik Informatika' },
  { id: 2, label: 'D3 Teknologi Hasil Pertanian' },
  { id: 3, label: 'D3 Farmasi' },
  { id: 4, label: 'D3 Kebidanan' },
//   { id: 5, label: 'D3 Teknik Sipil' },
//   { id: 6, label: 'D3 Teknik Mesin' },
//   { id: 7, label: 'D3 Teknik Elektro' },
//   { id: 8, label: 'D3 Akuntansi' },
//   { id: 9, label: 'D3 Manajemen Pemasaran' },
//   { id: 10, label: 'D3 Manajemen Administrasi' },
//   { id: 11, label: 'D3 Keperawatan' },
//   { id: 12, label: 'D4 Teknik Informatika' },
//   { id: 13, label: 'D4 Teknologi Hasil Pertanian' },
//   { id: 14, label: 'D4 Kebidanan' },
//   { id: 15, label: 'D4 Teknik Sipil' },
//   { id: 16, label: 'D4 Akuntansi' },
//   { id: 17, label: 'D4 Manajemen Pemasaran' },
//   { id: 18, label: 'D4 Manajemen Administrasi' },
//   { id: 19, label: 'D4 Keperawatan' },
//   { id: 20, label: 'D4 Pengelolaan Hutan' }
];


const form = reactive({
  name: '',
  kelompok: selectOptions[0],
  prodi: selectOptions[0],
  subject: '',
  question: ''
})

    const submit = () => {
        //
    }

</script>
<template>
    <CardBox form @submit.prevent="submit">
        <FormField label="Nama" help="">
            <FormControl type="text" placeholder="Masukkan nama Mahasiswa" />
        </FormField>

        <FormField label="Kelompok">
          <FormControl v-model="form.kelompok" :options="selectOptions" />
        </FormField>

        <FormField label="Kelompok">
          <FormControl v-model="form.kelompok" :options="selectOptions" />
        </FormField>

        <template #footer>
            <BaseButtons>
                <BaseButton type="submit" color="success" label="Submit" />
                <BaseButton type="reset" color="danger" outline label="Reset" />
            </BaseButtons>
        </template>
    </CardBox>
</template>

