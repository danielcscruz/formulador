import { set } from '@vueuse/core';

const setTitle = (title: string) => {
    return title ? `${title} | Formulador` : 'Formulador';
};

const stdRoutes = [
    {
        path:'/std/new/',
        name:'std.new',
        meta: {
            title: setTitle('Nova Fórmula')
        },
        component: () => import('@/views/std/NewStd.vue'),
    },
    {
        path:'/std/raw/',
        name:'std.raw',
        meta: {
            title: setTitle('Matérias-Primas')
        },
        component: () => import('@/views/std/RawMaterial.vue'),
    },
    {
        path:'/std/stock/',
        name:'std.stock',
        meta: {
            title: setTitle('Estoque')
        },
        component: () => import('@/views/std/StockRaw.vue'),
    },
    {
        path:'/std/log/',
        name:'std.log',
        meta: {
            title: setTitle('Formulados')
        },
        component: () => import('@/views/apps/recipe/index.vue'),
    },
    {
        path:'/std/pre/',
        name:'std.pre',
        meta: {
            title: setTitle('Pre-Formulados')
        },
        component: () => import('@/views/std/PreStd.vue'),
    },
        {
        path:'/std/qual/',
        name:'std.qual',
        meta: {
            title: setTitle('Qualidade')
        },
        component: () => import('@/views/std/QualityStd.vue'),
    },
    {
        path:'/std/prod/',
        name:'std.prod',
        meta: {
            title: setTitle('Produtividade')
        },
        component: () => import('@/views/std/ProductionStd.vue'),
    },
    {
        path:'/std/law/',
        name:'std.law',
        meta: {
            title: setTitle('Regulatório')
        },
        component: () => import('@/views/std/NormsStd.vue'),
    }
]
const authRoutes = [
    {
        path: '/auth/sign-in',
        name: 'auth.sign-in',
        meta: {
            title: setTitle('Sign In')
        },
        component: () => import('@/views/auth/sign-in.vue')
    },
    {
        path: '/auth/sign-up',
        name: 'auth.sign-up',
        meta: {
            title: setTitle('Sign Up')
        },
        component: () => import('@/views/auth/sign-up.vue')
    },
    {
        path: '/auth/reset-password',
        name: 'auth.reset-password',
        meta: {
            title: setTitle('Reset Password')
        },
        component: () => import('@/views/auth/reset-password.vue')
    },
    {
        path: '/auth/lock-screen',
        name: 'auth.lock-screen',
        meta: {
            title: setTitle('Lock Screen')
        },
        component: () => import('@/views/auth/lock-screen.vue')
    }
];

const errorRoutes = [
    {
        path: '/404',
        name: 'error.404',
        meta: {
            title: setTitle('Error 404')
        },
        component: () => import('@/views/pages/error-404.vue')
    },
    {
        path: '/404-alt',
        name: 'error.404-alt',
        meta: {
            title: setTitle('Error 404 Alt')
        },
        component: () => import('@/views/pages/error-404-alt.vue')
    },
    {
        path: '/:catchAll(.*)',
        redirect: '404'
    }
];

const dashboardRoutes = [
    {
        path: '/',
        name: 'dashboards.index',
        meta: {
            title: setTitle('Dashboard'),
        },
        component: () => import('@/views/dashboards/index.vue'),
    }
];

const pagesRoutes = [
    {
        path: '/pages/starter',
        name: 'pages.welcome',
        meta: {
            title: setTitle('Welcome'),
        },
        component: () => import('@/views/pages/welcome.vue'),
    },
    {
        path: '/pages/faqs',
        name: 'pages.faqs',
        meta: {
            title: setTitle('FAQs'),
        },
        component: () => import('@/views/pages/faqs.vue'),
    },
    {
        path: '/pages/coming-soon',
        name: 'pages.coming-soon',
        meta: {
            title: setTitle('Coming Soon'),
        },
        component: () => import('@/views/pages/coming-soon.vue'),
    },
    {
        path: '/pages/timeline',
        name: 'pages.timeline',
        meta: {
            title: setTitle('Timeline'),
        },
        component: () => import('@/views/pages/timeline.vue'),
    },
    {
        path: '/pages/pricing',
        name: 'pages.pricing',
        meta: {
            title: setTitle('Pricing'),
        },
        component: () => import('@/views/pages/pricing.vue')
    },
    {
        path: '/pages/maintenance',
        name: 'pages.maintenance',
        meta: {
            title: setTitle('Maintenance'),
        },
        component: () => import('@/views/pages/maintenance.vue')
    },
];



const appsRoutes = [
    {
        path: '/apps/chat',
        name: 'apps.chat',
        meta: {
            title: setTitle('Chat'),
        },
        component: () => import('@/views/apps/chat/index.vue')
    },
    {
        path: '/apps/email',
        name: 'apps.email',
        meta: {
            title: setTitle('Email'),
        },
        component: () => import('@/views/apps/email/index.vue')
    },
    {
        path: '/apps/todo',
        name: 'apps.todo',
        meta: {
            title: setTitle('Todo'),
        },
        component: () => import('@/views/apps/todo/index.vue')
    },
    {
        path: '/apps/calendar/schedule',
        name: 'apps.calendar.schedule',
        meta: {
            title: setTitle('Schedule'),
        },
        component: () => import('@/views/apps/calendar/schedule/index.vue')
    },
    {
        path: '/apps/calendar/integration',
        name: 'apps.calendar.integration',
        meta: {
            title: setTitle('Integration'),
        },
        component: () => import('@/views/apps/calendar/integration/index.vue')
    },
    {
        path: '/apps/invoice',
        name: 'apps.invoice.list',
        meta: {
            title: setTitle('Invoice List'),
        },
        component: () => import('@/views/apps/invoices/index.vue'),
    },
    {
        path: '/apps/invoice/:id',
        name: 'apps.invoice.details',
        params: { id: '1001' },
        meta: {
            title: setTitle('Invoice Details'),
        },
        component: () => import('@/views/apps/invoices/[id]/index.vue'),
    },
    {
        path: '/widgets',
        name: 'widgets',
        meta: {
            title: setTitle('Widgets'),
        },
        component: () => import('@/views/widgets/index.vue'),
    },
];

const uiRoutes = [
    {
        path: '/ui/accordions',
        name: 'ui.accordions',
        meta: {
            title: setTitle('Accordions'),
        },
        component: () => import('@/views/ui/accordions.vue')
    },
    {
        path: '/ui/alerts',
        name: 'ui.alerts',
        meta: {
            title: setTitle('Alerts'),
        },
        component: () => import('@/views/ui/alerts.vue')
    },
    {
        path: '/ui/avatars',
        name: 'ui.avatars',
        meta: {
            title: setTitle('Avatars'),
        },
        component: () => import('@/views/ui/avatars.vue')
    },
    {
        path: '/ui/badges',
        name: 'ui.badges',
        meta: {
            title: setTitle('Badges'),
        },
        component: () => import('@/views/ui/badges.vue')
    },
    {
        path: '/ui/breadcrumb',
        name: 'ui.breadcrumb',
        meta: {
            title: setTitle('Breadcrumb'),
        },
        component: () => import('@/views/ui/breadcrumb.vue')
    },
    {
        path: '/ui/buttons',
        name: 'ui.buttons',
        meta: {
            title: setTitle('Buttons'),
 
        },
        component: () => import('@/views/ui/buttons.vue')
    },
    {
        path: '/ui/cards',
        name: 'ui.cards',
        meta: {
            title: setTitle('Cards'),
        },
        component: () => import('@/views/ui/cards.vue')
    },
    {
        path: '/ui/carousel',
        name: 'ui.carousel',
        meta: {
            title: setTitle('Carousel'),
        },
        component: () => import('@/views/ui/carousel.vue')
    },
    {
        path: '/ui/collapse',
        name: 'ui.collapse',
        meta: {
            title: setTitle('Collapse'),
        },
        component: () => import('@/views/ui/collapse.vue')
    },
    {
        path: '/ui/dropdowns',
        name: 'ui.dropdowns',
        meta: {
            title: setTitle('Dropdowns'),
        },
        component: () => import('@/views/ui/dropdowns.vue')
    },
    {
        path: '/ui/list-group',
        name: 'ui.list-group',
        meta: {
            title: setTitle('ListGroup'),
        },
        component: () => import('@/views/ui/listGroup.vue')
    },
    {
        path: '/ui/modals',
        name: 'ui.modals',
        meta: {
            title: setTitle('Modals'),
        },
        component: () => import('@/views/ui/modals.vue')
    },
    {
        path: '/ui/offcanvas',
        name: 'ui.offcanvas',
        meta: {
            title: setTitle('Offcanvas'),
        },
        component: () => import('@/views/ui/offcanvas.vue')
    },
    {
        path: '/ui/pagination',
        name: 'ui.pagination',
        meta: {
            title: setTitle('Pagination'),
        },
        component: () => import('@/views/ui/pagination.vue')
    },
    {
        path: '/ui/placeholders',
        name: 'ui.placeholders',
        meta: {
            title: setTitle('Placeholders'),
        },
        component: () => import('@/views/ui/placeholders.vue')
    },
    {
        path: '/ui/popovers',
        name: 'ui.popovers',
        meta: {
            title: setTitle('Popovers'),
        },
        component: () => import('@/views/ui/popovers.vue')
    },
    {
        path: '/ui/progress',
        name: 'ui.progress',
        meta: {
            title: setTitle('Progress'),
        },
        component: () => import('@/views/ui/progress.vue')
    },
    {
        path: '/ui/scrollspy',
        name: 'ui.scrollspy',
        meta: {
            title: setTitle('Scrollspy'),
        },
        component: () => import('@/views/ui/scrollspy.vue')
    },
    {
        path: '/ui/spinners',
        name: 'ui.spinners',
        meta: {
            title: setTitle('Spinners'),
        },
        component: () => import('@/views/ui/spinners.vue')
    },
    {
        path: '/ui/tabs',
        name: 'ui.tabs',
        meta: {
            title: setTitle('Tabs'),
        },
        component: () => import('@/views/ui/tabs.vue')
    },
    {
        path: '/ui/toasts',
        name: 'ui.toasts',
        meta: {
            title: setTitle('Toasts'),
        },
        component: () => import('@/views/ui/toasts.vue')
    },
    {
        path: '/ui/tooltips',
        name: 'ui.tooltips',
        meta: {
            title: setTitle('Tooltips'),
        },
        component: () => import('@/views/ui/tooltips.vue')
    }
];

const advancedUIRoutes = [
    {
        path: '/advanced/ratings',
        name: 'advanced.ratings',
        meta: {
            title: setTitle('Ratings'),
        },
        component: () => import('@/views/advanced/ratings/index.vue')
    },
    {
        path: '/advanced/alert',
        name: 'advanced.alert',
        meta: {
            title: setTitle('Sweet Alert'),
        },
        component: () => import('@/views/advanced/alert/index.vue')
    },
    {
        path: '/advanced/swiper',
        name: 'advanced.swiper',
        meta: {
            title: setTitle('Swiper'),
        },
        component: () => import('@/views/advanced/swiper/index.vue')
    },
    {
        path: '/advanced/scrollbar',
        name: 'advanced.scrollbar',
        meta: {
            title: setTitle('Scrollbar'),
        },
        component: () => import('@/views/advanced/scrollbar/index.vue')
    },
    {
        path: '/advanced/toastify',
        name: 'advanced.toastify',
        meta: {
            title: setTitle('Toastify'),
        },
        component: () => import('@/views/advanced/toastify/index.vue')
    }
];

const chartsRoutes = [
    {
        path: '/charts/area',
        name: 'charts.area',
        meta: {
            title: setTitle('Apex Area Chart'),
        },
        component: () => import('@/views/charts/area/index.vue')
    },
    {
        path: '/charts/bar',
        name: 'charts.bar',
        meta: {
            title: setTitle('Apex Bar Chart'),
        },
        component: () => import('@/views/charts/bar/index.vue')
    },
    {
        path: '/charts/boxplot',
        name: 'charts.boxplot',
        meta: {
            title: setTitle('Apex Boxplot Chart'),
        },
        component: () => import('@/views/charts/boxplot/index.vue')
    },
    {
        path: '/charts/bubble',
        name: 'charts.bubble',
        meta: {
            title: setTitle('Apex Bubble Chart'),
        },
        component: () => import('@/views/charts/bubble/index.vue')
    },
    {
        path: '/charts/candlestick',
        name: 'charts.candlestick',
        meta: {
            title: setTitle('Apex Candlestick Chart'),
        },
        component: () => import('@/views/charts/candlestick/index.vue')
    },
    {
        path: '/charts/column',
        name: 'charts.column',
        meta: {
            title: setTitle('Apex Column Chart'),
        },
        component: () => import('@/views/charts/column/index.vue')
    },
    {
        path: '/charts/heatmap',
        name: 'charts.heatmap',
        meta: {
            title: setTitle('Apex Heatmap Chart'),
        },
        component: () => import('@/views/charts/heatmap/index.vue')
    },
    {
        path: '/charts/line',
        name: 'charts.line',
        meta: {
            title: setTitle('Apex Line Chart'),
        },
        component: () => import('@/views/charts/line/index.vue')
    },
    {
        path: '/charts/mixed',
        name: 'charts.mixed',
        meta: {
            title: setTitle('Apex Mixed Chart'),
        },
        component: () => import('@/views/charts/mixed/index.vue')
    },
    {
        path: '/charts/pie',
        name: 'charts.pie',
        meta: {
            title: setTitle('Apex Pie Chart'),
        },
        component: () => import('@/views/charts/pie/index.vue')
    },
    {
        path: '/charts/polar',
        name: 'charts.polar',
        meta: {
            title: setTitle('Apex Polar Chart'),
        },
        component: () => import('@/views/charts/polar/index.vue')
    },
    {
        path: '/charts/radar',
        name: 'charts.radar',
        meta: {
            title: setTitle('Apex Radar Chart'),
        },
        component: () => import('@/views/charts/radar/index.vue')
    },
    {
        path: '/charts/radial-bar',
        name: 'charts.radial-bar',
        meta: {
            title: setTitle('Apex Radial Bar Chart'),
        },
        component: () => import('@/views/charts/radial-bar/index.vue')
    },
    {
        path: '/charts/scatter',
        name: 'charts.scatter',
        meta: {
            title: setTitle('Apex Scatter Chart'),
        },
        component: () => import('@/views/charts/scatter/index.vue')
    },
    {
        path: '/charts/timeline',
        name: 'charts.timeline',
        meta: {
            title: setTitle('Apex Timeline Chart'),
        },
        component: () => import('@/views/charts/timeline/index.vue')
    },
    {
        path: '/charts/treemap',
        name: 'charts.treemap',
        meta: {
            title: setTitle('Apex Treemap Chart'),
        },
        component: () => import('@/views/charts/treemap/index.vue')
    }
];

const formRoutes = [
    {
        path: '/forms/basic',
        name: 'forms.basic',
        meta: {
            title: setTitle('Form Basic'),
        },
        component: () => import('@/views/forms/basic.vue')
    },
    {
        path: '/forms/checkbox',
        name: 'forms.checkbox',
        meta: {
            title: setTitle('Form Checkbox'),
        },
        component: () => import('@/views/forms/checkbox.vue')
    },
    {
        path: '/forms/select',
        name: 'forms.select',
        meta: {
            title: setTitle('Choice Select'),
        },
        component: () => import('@/views/forms/select.vue')
    },
    {
        path: '/forms/clipboard',
        name: 'forms.clipboard',
        meta: {
            title: setTitle('Clipboard'),
        },
        component: () => import('@/views/forms/clipboard.vue')
    },
    {
        path: '/forms/flat-picker',
        name: 'forms.flat-picker',
        meta: {
            title: setTitle('Flat Picker'),
        },
        component: () => import('@/views/forms/flat-picker.vue')
    },
    {
        path: '/forms/validation',
        name: 'forms.validation',
        meta: {
            title: setTitle('Validation'),
        },
        component: () => import('@/views/forms/validation/index.vue')
    },
    {
        path: '/forms/wizard',
        name: 'forms.wizard',
        meta: {
            title: setTitle('Wizard'),
        },
        component: () => import('@/views/forms/wizard.vue')
    },
    {
        path: '/forms/file-uploads',
        name: 'forms.file-uploads',
        meta: {
            title: setTitle('File Uploads'),
        },
        component: () => import('@/views/forms/file-uploads.vue')
    },
    {
        path: '/forms/editors',
        name: 'forms.editors',
        meta: {
            title: setTitle('Editors'),
        },
        component: () => import('@/views/forms/editors.vue')
    },
    {
        path: '/forms/input-mask',
        name: 'forms.input-mask',
        meta: {
            title: setTitle('Input Mask'),
        },
        component: () => import('@/views/forms/input-mask.vue')
    },
    {
        path: '/forms/slider',
        name: 'forms.slider',
        meta: {
            title: setTitle('Slider'),
        },
        component: () => import('@/views/forms/slider.vue')
    }
];

const tablesRoutes = [
    {
        path: '/tables/basic',
        name: 'tables.basic',
        meta: {
            title: setTitle('Tables Basic'),
        },
        component: () => import('@/views/tables/basic.vue')
    },
    {
        path: '/tables/gridjs',
        name: 'tables.gridjs',
        meta: {
            title: setTitle('Tables Grid Js'),
        },
        component: () => import('@/views/tables/gridjs/index.vue')
    }
];

const iconsRoutes = [
    {
        path: '/icons/boxicons',
        name: 'icons.boxicons',
        meta: {
            title: setTitle('Boxicons Icons'),
        },
        component: () => import('@/views/icons/boxicons.vue')
    },
    {
        path: '/icons/solar',
        name: 'icons.solar',
        meta: {
            title: setTitle('Solar Icons'),
        },
        component: () => import('@/views/icons/solar.vue')
    }
];

const mapsRoutes = [
    {
        path: '/maps/google',
        name: 'maps.google',
        meta: {
            title: setTitle('Google Map'),
        },
        component: () => import('@/views/maps/google.vue')
    },
    {
        path: '/maps/vector',
        name: 'maps.vector',
        meta: {
            title: setTitle('Vector Map'),
        },
        component: () => import('@/views/maps/vector.vue')
    }
];

export const allRoutes = [...dashboardRoutes, ...stdRoutes, ...pagesRoutes, ...errorRoutes, ...authRoutes, ...appsRoutes, ...uiRoutes, ...advancedUIRoutes, ...chartsRoutes, ...formRoutes, ...tablesRoutes, ...iconsRoutes, ...mapsRoutes];
