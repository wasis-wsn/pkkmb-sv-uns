<template>
    <div class="bg-white p-4 mt-8 rounded-lg shadow-md overflow-x-auto" data-aos="fade-down">
        <h1 class="text-gray-600 text-lg text-left mb-4">
            Tolong untuk upload file tugas kalian disini sesuai dengan kelompok masing-masing.
        </h1>
        <!-- Upload form or uploaded files -->
        <div v-if="uploadedFiles.length === 0">
            <form id="file-upload-form"
                class="w-full flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg py-12"
                @drop.prevent="handleDrop" @dragover.prevent="handleDragOver">
                <input id="file-upload-input" type="file" class="hidden" @change="handleFileSelect" multiple />
                <label for="file-upload-input" class="text-center text-gray-500 cursor-pointer">
                    <div class="flex flex-col items-center mt-7 mb-5">
                        <RiInboxArchiveLine class="h-10 w-10 text-gray-400 top-1/2 transform -translate-y-1/2" />
                        <span class="font-semibold">Drag and drop your files here</span>
                        <span class="text-sm mt-1 text-gray-400">or click to select files</span>
                    </div>
                </label>
            </form>
            <div class="left-7 flex w-full pt-5">
                <p class="font-normal font text-sm text-left text-gray-500">
                    Accepted File Types : <br>
                    Archive (Zip) <br>
                    Archive files .7z .bdoc .cdoc .ddoc .gtar .gz .gzip .hqx .rar .sit .tar .tgz .zip
                </p>
            </div>
        </div>
        <div v-if="previewFiles.length > 0">
            <h2 class="text-gray-600 text-lg text-left mt-4">Preview Files:</h2>
            <div class="flex flex-col items-center border-2 border-dashed border-gray-300 rounded-lg py-4">
                <div v-for="(file, index) in previewFiles" :key="index"
                    class="w-full flex justify-between items-center">
                    <template v-if="file.type.includes('image')">
                        <img :src="file.url" :alt="file.name" class="w-12 h-12 object-cover rounded-md pl-3" />
                    </template>
                    <template v-else>
                        <component :is="getIconComponent(file.type)" class="w-10 h-10 object-cover rounded-md pl-3" />
                    </template>
                    <p class="text-gray-800 font text-sm">{{ file.name }}</p>
                    <button @click="removeFile(index)"
                        class="text-red-500 font-bold py-1 px-2 rounded hover:bg-red-200 pr-3">
                        <RiDeleteBinLine class="h-6 w-6" />
                    </button>
                </div>
            </div>
        </div>
        <button @click="handleFileUpload"
            class="px-6 mt-4 py-2 font-bold text-black bg-white border-2 border-gray-300 rounded-full hover:bg-gray-200 hover:border-gray-400">
            Upload
        </button>
    </div>
</template>

<script setup>
    import {
        ref
    } from 'vue';
    import {
        RiInboxArchiveLine,
        RiFileWordLine,
        RiFilePdfLine,
        RiDeleteBinLine
    } from "@remixicon/vue";

    const uploadedFiles = ref([]);
    const previewFiles = ref([]);

    const handleDrop = (event) => {
        event.preventDefault();
        const files = event.dataTransfer.files;
        handleFiles(files);
    };

    const handleDragOver = (event) => {
        event.preventDefault();
    };

    const handleFileSelect = (event) => {
        const files = event.target.files;
        handleFiles(files);
    };

    const handleFiles = (files) => {
        for (let i = 0; i < files.length; i++) {
            uploadedFiles.value.push(files[i]);
            const file = files[i];
            const reader = new FileReader();
            reader.onload = (e) => {
                previewFiles.value.push({
                    name: file.name,
                    url: e.target.result,
                    type: file.type
                });
            };
            reader.readAsDataURL(file);
        }
    };

    const removeFile = (index) => {
        uploadedFiles.value.splice(index, 1);
        previewFiles.value.splice(index, 1);
    };

    const getIconComponent = (type) => {
        if (type.includes('pdf')) {
            return RiFilePdfLine;
        } else if (type.includes('word')) {
            return RiFileWordLine;
        } else {
            return RiFileWordLine; // Default icon
        }
    };

    const handleFileUpload = () => {
        console.log("Upload button clicked");

        const formData = new FormData();
        uploadedFiles.value.forEach((file, index) => {
            formData.append(`files[${index}]`, file);
        });

        fetch('/upload-tugas', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Files uploaded successfully:', data);
                    // Clear the uploaded files after successful upload
                    uploadedFiles.value = [];
                    previewFiles.value = [];
                    // You might want to show a success message to the user here
                } else {
                    console.error('Upload failed:', data);
                    // You might want to show an error message to the user here
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // You might want to show an error message to the user here
            });
    };

</script>
