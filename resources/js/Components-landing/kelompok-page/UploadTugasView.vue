<template>
    <div class="bg-white p-4 mt-8 rounded-lg shadow-md overflow-x-auto" data-aos="fade-down">
        <h1 class="text-gray-600 text-lg text-left mb-4">
            Upload file tugas kalian disini.
        </h1>
        <h1 class="text-gray-600 text-lg text-left mb-4">
            Upload File mu lagi jika ingin update/merubahnya.
        </h1>
        <!-- Upload form or uploaded files -->
        <div v-if="uploadedFiles.length === 0">
            <form id="file-upload-form"
                class="w-full flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg py-12"
                @drop.prevent="handleDrop" @dragover.prevent="handleDragOver">
                <input id="file-upload-input" type="file" class="hidden" @change="handleFileSelect" ref="fileInput" multiple />
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
                    JPEG, PNG, PDF, DOC, and ZIP
                </p>
            </div>
        </div>
        <div v-if="previewFiles.length > 0">
            <h2 class="text-gray-600 text-lg text-left mt-4">Preview Files:</h2>
            <div class="flex flex-col items-center border-2 border-dashed border-gray-300 rounded-lg py-4">
                <div v-for="(file, index) in previewFiles" :key="index"
                    class="w-full flex justify-between items-center">
                    <template v-if="file.type.startsWith('image/')">
                        <img :src="file.url" :alt="file.name" class="w-12 h-12 object-cover rounded-md pl-3" />
                    </template>
                    <template v-else-if="file.type === 'application/pdf'">
                        <RiFilePdfLine class="w-10 h-10 object-cover rounded-md pl-3 text-red-500" />
                    </template>
                    <template v-else-if="file.type.includes('word')">
                        <RiFileWordLine class="w-10 h-10 object-cover rounded-md pl-3 text-blue-500" />
                    </template>
                    <template v-else>
                        <div class="w-10 h-10 flex items-center justify-center rounded-md pl-3 text-gray-500">
                            <RiInboxArchiveLine class="w-8 h-8" />
                        </div>
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
            :disabled="uploading"
            class="px-6 mt-4 py-2 font-bold text-black bg-white border-2 border-gray-300 rounded-full hover:bg-gray-200 hover:border-gray-400">
            <template v-if="uploading">
                <div class="flex items-center justify-center">
                    <svg class="animate-spin h-5 w-5 mr-3 text-indigo-500" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.963 7.963 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Uploading...
                </div>
            </template>
            <template v-else>
                Upload
            </template>
        </button>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import { RiInboxArchiveLine, RiDeleteBinLine, RiFilePdfLine, RiFileWordLine } from "@remixicon/vue";
    import axios from 'axios';

    const uploadedFiles = ref([]);
    const previewFiles = ref([]);
    const uploading = ref(false);
    const fileInput = ref(null);

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
        const file = files[i];
        const fileType = file.type;
        const fileSize = file.size;

        // Batasi ukuran file maksimal 5MB
        const maxSize = 5 * 1024 * 1024; // 5MB dalam byte

        if (fileSize > maxSize) {
            alert(`File ${file.name} terlalu besar. Ukuran maksimal adalah 5MB.`);
            continue;
        }

        if (['image/jpeg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'].includes(fileType)) {
            uploadedFiles.value.push(file);
            const reader = new FileReader();
            reader.onload = (e) => {
                previewFiles.value.push({
                    name: file.name,
                    url: fileType.startsWith('image/') ? e.target.result : '',
                    type: fileType
                });
            };
            if (fileType.startsWith('image/')) {
                reader.readAsDataURL(file);
            } else {
                previewFiles.value.push({
                    name: file.name,
                    url: '',
                    type: fileType
                });
            }
        } else {
            alert(`File ${file.name} tidak didukung. File ini akan diabaikan.`);
        }
    }
};


    const removeFile = (index) => {
        uploadedFiles.value.splice(index, 1);
        previewFiles.value.splice(index, 1);
    };

    const handleFileUpload = async () => {
        if (uploadedFiles.value.length === 0) {
            alert('Please select files to upload');
            return;
        }

        uploading.value = true;

        const formData = new FormData();
        uploadedFiles.value.forEach((file, index) => {
            formData.append(`files[${index}]`, file);
        });

        try {
            const response = await axios.post('/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            if (response.data.success) {
                alert('Files uploaded successfully');
                uploadedFiles.value = [];
                previewFiles.value = [];
            } else {
                alert('Error uploading files');
            }
        } catch (error) {
            console.error('Error uploading files:', error);
            if (error.response) {
                alert(`Error: ${error.response.data.message}`);
            } else if (error.request) {
                alert('Error: No response from server. Please try again later.');
            } else {
                alert(`Error: ${error.message}`);
            }
        } finally {
            uploading.value = false;
        }
    };
</script>
