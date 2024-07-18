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
        route: "galeri",
        label: "Galeri",
        icon: mdiSquareEditOutline,
    },
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
    {
        route: "materis",
        label: "Materi",
        icon: mdiClipboardText,
    },
    {
        route: "chat",
        label: "Chat",
        icon: mdiForum,
    },
    {
        route: "youtube",
        label: "YouTube",
        icon: mdiYoutube,
    },
    {
        label: "Dropdown",
        icon: mdiViewList,
        menu: [
            {
                label: "Item One",
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
    {
        route: 'ui',
        label: 'UI',
    },

];
