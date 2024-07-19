import {
    mdiAccountCircle,
    mdiMonitor,
    mdiAlertCircle,
    mdiSquareEditOutline,
    mdiViewList,
    mdiHandshakeOutline,
    mdiBrain,
    mdiAccountGroup,
    mdiAccount,
    mdiYoutube,
    mdiClipboardText,
    mdiForum,
    mdiAccountDetails,
} from "@mdi/js";

export default [
    {
        route: "dashboard",
        icon: mdiMonitor,
        label: "Dashboard",
    },
    {
        route: "user",
        icon: mdiAccountDetails,
        label: "User",
    },
    {
        label: "Landing",
        icon: mdiViewList,
        menu: [
            {
                route: "sponsor",
                label: "Sponsor",
                icon: mdiHandshakeOutline,
            },
            {
                route: "hima",
                label: "Hima",
                icon: mdiBrain,
            },
        ],
    },
    {
        label: "Galeri",
        icon: mdiViewList,
        menu: [
            {
                route: "galeri",
                label: "dokumentasi",
                icon: mdiSquareEditOutline,
            },
            {
                to: "acara",
                label: "acara",
                icon: mdiSquareEditOutline,
            },
            {
                route: "youtube",
                label: "YouTube",
                icon: mdiYoutube,
            },
        ],
    },
    {
        label: "Kelompok",
        icon: mdiViewList,
        menu: [
            {
                route: "kelompoks",
                label: "Kelompok",
                icon: mdiAccountGroup,
            },
            {
                route: "prodi",
                label: "Prodi",
                icon: mdiSquareEditOutline,
            },
            {
                route: "mahasiswa",
                label: "Mahasiswa",
                icon: mdiAccount,
            },
        ],
    },
    {
        route: "materi",
        label: "Materi",
        icon: mdiClipboardText,
    },
    {
        route: "chat",
        label: "Chat",
        icon: mdiForum,
    },
    {
        label: "Dropdown",
        icon: mdiViewList,
        menu: [
            {
                route: 'ui',
                label: 'UI',
            },
            {
                label: "Item Two",
            },
        ],
    },
    {
        route: "error",
        label: "Error",
        icon: mdiAlertCircle,
    },


];
