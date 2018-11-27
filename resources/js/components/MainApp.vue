<template>
<div class="wrapper">
    <template v-if="main">
        <router-view></router-view>

    </template>
    <template v-else>
        <Header/>
        <Sidebar/>
            <div class="main-panel">
                <div class="content">
                    <router-view></router-view>

                </div>
                <Footer/>
            </div>
            <Quickbar/>
    </template>
    <loader></loader>
</div>

</template>
<script>
    import Header from './partials/Header.vue'
    import Sidebar from './partials/Sidebar.vue';
    import Quickbar from './partials/Quickbar.vue';
    import Footer from './partials/Footer.vue';
    import Loader from './partials/_loader.vue'
    export default {
        name: 'main-app',
        data(){
            return {
                title: 'WaselOrder',
                loader: true
            }
        },
        components: {Header,Sidebar,Quickbar,Footer,Loader},
        computed:{
        main(){
            return this.$route.path === '/login'
        }
    },

  }
</script>
