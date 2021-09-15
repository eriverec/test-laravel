import Citas from './components/Citas.vue';
import AddCita from './components/AddCita.vue';
import UpdateCita from './components/UpdateCita.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: Citas
    },
    {
        name: 'add',
        path: '/add',
        component: AddCita
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: UpdateCita
    }
];