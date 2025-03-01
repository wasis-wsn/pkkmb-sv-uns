<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import { mdiCheckDecagram } from "@mdi/js";
import BaseLevel from "@/Components/BaseLevel.vue";
import UserAvatarCurrentUser from "@/Components/UserAvatarCurrentUser.vue";
import CardBox from "@/Components/CardBox.vue";
import FormCheckRadio from "@/Components/FormCheckRadio.vue";
import PillTag from "@/Components/PillTag.vue";

const { props } = usePage();
const user = props.auth.user;

const userSwitchVal = ref(false);
const lastLoginAt = ref("");
const lastLoginIp = ref("");

const fetchSessionInfo = async () => {
    try {
        const response = await fetch("/session");
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const data = await response.json();
        if (data.session) {
            lastLoginAt.value = data.session.last_activity;
            lastLoginIp.value = data.session.ip_address;
        } else {
            lastLoginAt.value = "No data";
            lastLoginIp.value = "No data";
        }
    } catch (error) {
        console.error("Error fetching session info:", error);
        lastLoginAt.value = "Error fetching data";
        lastLoginIp.value = "Error fetching data";
    }
};

onMounted(() => {
    fetchSessionInfo();
});
</script>

<template>
    <CardBox>
        <BaseLevel type="justify-around lg:justify-center">
            <UserAvatarCurrentUser class="lg:mx-12" />
            <div class="space-y-3 text-center md:text-left lg:mx-12">
                <div class="flex justify-center md:block">
                    <FormCheckRadio
                        v-model="userSwitchVal"
                        name="notifications-switch"
                        type="switch"
                        label="Notifications"
                        :input-value="true"
                    />
                </div>
                <h1 class="text-2xl">
                    Hello, <b>{{ user ? user.username : "Loading..." }}</b>
                    !
                </h1>
                <p>
                    Last login <b>{{ lastLoginAt }}</b> from
                    <b>{{ lastLoginIp }}</b>
                </p>
                <div class="flex justify-center md:block">
                    <PillTag
                        label="Verified"
                        color="info"
                        :icon="mdiCheckDecagram"
                    />
                </div>
            </div>
        </BaseLevel>
    </CardBox>
</template>
