import {
    mdiBookOpenVariant,
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
    mdiAccountFileText,
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
                route: "dokumentasi", // Jika tidak ada route maka akan dianggap sebagai label nanti di ubah cok ke route
                label: "Dokumentasi",
                icon: mdiSquareEditOutline,
            },
            {
                route: "acara",
                label: "Acara",
                icon: mdiAccount,
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
                route: "kelompok",
                label: "Kelompok",
                icon: mdiAccountGroup,
            },
            {
                route: "prodi",
                label: "Prodi",
                icon: mdiSquareEditOutline,
            },
            {
                route: "skill",
                label: "Daftar Skill",
                icon: mdiBookOpenVariant,
            },
            {
                route: "keterangan",
                label: "Skill Mahasiswa",
                icon: mdiAccountFileText,
            },
            {
                route: "mahasiswa",
                label: "Mahasiswa",
                icon: mdiAccount,
            },
        ],
    },
    {
        label: "Materi",
        icon: mdiViewList,
        menu: [
            {
                route: "materi",
                label: "Materi",
                icon: mdiClipboardText,
            },
            {
                route: "linkmateri",
                label: "Link Materi",
                icon: mdiClipboardText,
            },
        ]
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
                route: "ui",
                label: "UI",
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
