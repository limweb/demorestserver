    import Vue from 'https://unpkg.com/vue@2.6.10/dist/vue.esm.browser.min.js';
    
    import VueRouter from 'https://unpkg.com/vue-router@3.1.3/dist/vue-router.esm.browser.min.js';
    import routes from "./routes.js";
    Vue.use(VueRouter);
    const router = new VueRouter({
        mode: 'history',
        base: routepath,
        routes
    });
    console.log('routepath--->',routepath);


    import Vuex from 'https://unpkg.com/vuex@3.1.1/dist/vuex.esm.browser.min.js';
    Vue.use(Vuex);
    const store = new Vuex.Store({
        namespaced: true,
        state: {},
        mutations: {},
        actions: {},
        getters: {}
    });

    import Mainlayout from './layout/mainlayout.js';
    import Loginlayout from './layout/loginlayout.js';
    window.vm = new Vue({
    store,
    router,
    mixins:[],
    data(){ return {
        msg:'Hello world'
    }},
    el:'#app',
    methods:{},
    computed:{},
    watch: {},
    components:{
        mainlayout:Mainlayout,
        loginlayout:Loginlayout
    },
    // render : h => h(App),
    beforeCreate  () { /* console.log('beforeCreate'); */ },
    created       () { /* console.log('created'); */ },
    beforeMount   () { /* console.log('beforeMount'); */ },
    mounted       () { /* console.log('mounted'); */    },
    beforeUpdate  () { /* console.log('beforeUpdate'); */ },
    updated       () { /* console.log('updated'); */ },
    beforeDestroy () { /* console.log('beforeDestroy'); */ },
    destroyed     () { /* console.log('destroyed'); */ },
    })	

    console.log(vm);