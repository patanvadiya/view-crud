import addEmployee from './components/addEmployee.vue';
import home from './components/home.vue';
import editData from './components/editData.vue';
import deletes from './components/delete.vue';


  
export const routes = [
    {
        name: 'addEmployee',
        path: '/addEmployee',
        component: addEmployee
    },
    {
        name: 'home',
        path: '/',
        component: home
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: editData
       
    },{
        name: 'delete',
        path: '/delete/:id',
        component: deletes
       
    }
    
];