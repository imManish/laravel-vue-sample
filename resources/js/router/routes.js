import Login from '../components/auth/Login.vue'
import Home from '../components/layout/Home.vue';
import Profile from '../components/profile/Profile.vue'
import UserMain from '../components/Users/Main.vue'
import Userlist from '../components/Users/List.vue'
import NewUser from '../components/Users/New.vue'
import User from '../components/Users/View.vue'
import Category from '../components/Category/index.vue'
import Country from '../components/Country/index.vue'


export const routes = [
    {
        path:'/',
        component: Home,
        meta : {
            requiresAuth: true,
        }
    },
    {
        path: '/login',
        component: Login,
        meta: { bodyClass: 'login' },
    },
    {
        path: '/profile',
        component:Profile,
        meta : {
            requiresAuth: true
        }

    },
    {
        path: '/users',
        component: UserMain,
        meta : {
            requiresAuth: true
        },
        children:[
            {
                path:'/',
                component: Userlist
            },
            {
                path:'new',
                component: NewUser
            },
            {
                path:':id',
                component: User
            }
        ]
    },
    {
        path: '/categories',
        component: Category,
        meta :{
            requiresAuth:true
        }

    },
    {
        path: '/countries',
        component: Country,
        meta :{
            requiresAuth:true
        }

    },


];
