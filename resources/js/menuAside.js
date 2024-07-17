import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
  mdiReact,
  mdiHandshakeOutline,
  mdiBrain,
  mdiAccountGroup,
  mdiAccount,
  mdiYoutube,
  mdiClipboardText,
  mdiForum
} from '@mdi/js'

export default [
  {
    route: 'dashboard',
    icon: mdiMonitor,
    label: 'Dashboard'
  },
  {
    route: 'table',
    label: 'Table',
    icon: mdiTable
  },
  {
    route: 'form',
    label: 'Form',
    icon: mdiSquareEditOutline
  },
  {
    to: 'ui',
    label: 'UI',
    icon: mdiTelevisionGuide
  },
  {
    route: 'responsive',
    label: 'Responsive',
    icon: mdiResponsive
  },
  {
    route: 'style',
    label: 'Style',
    icon: mdiPalette
  },
  {
    route: 'profiles',
    label: 'Profile',
    icon: mdiAccountCircle
  },
  {
    route: 'login',
    label: 'Login',
    icon: mdiLock
  },
  {
    route: 'error',
    label: 'Error',
    icon: mdiAlertCircle
  },
  {
    route: 'sponsor',
    label: 'Sponsor',
    icon: mdiHandshakeOutline
  },
  {
    route: 'hima',
    label: 'Hima',
    icon: mdiBrain
  },
//   {
//     route: "kelompok",
//     label: "Kelompok",
//     icon: mdiAccountGroup ,
// },
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
    route: 'materis',
    label: 'Materi',
    icon: mdiClipboardText
  },
  {
    route: 'chat',
    label: 'Chat',
    icon: mdiForum
  },
  {
    route: 'youtube',
    label: 'YouTube',
    icon: mdiYoutube
  },
  {
    label: 'Dropdown',
    icon: mdiViewList,
    menu: [
      {
        label: 'Item One'
      },
      {
        label: 'Item Two'
      }
    ]
  },
  {
    href: 'https://github.com/justboil/admin-one-vue-tailwind',
    label: 'GitHub',
    icon: mdiGithub,
    target: '_blank'
  },
  {
    href: 'https://github.com/justboil/admin-one-react-tailwind',
    label: 'React version',
    icon: mdiReact,
    target: '_blank'
  }
]
