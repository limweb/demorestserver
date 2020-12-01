    //---- vuejs ----------
    import Vue from 'https://unpkg.com/vue@2.6.10/dist/vue.esm.browser.min.js';
    
    //---- vuerouter ----------
    import VueRouter from 'https://unpkg.com/vue-router@3.1.3/dist/vue-router.esm.browser.min.js';
    import routes from "./routes.js";
    const router = new VueRouter({
        mode: 'history',
        base: routepath,
        routes
    });
    Vue.use(VueRouter);
    console.log('routepath--->',routepath);


    //---- vuex ----------
    import Vuex from 'https://unpkg.com/vuex@3.1.1/dist/vuex.esm.browser.min.js';
    Vue.use(Vuex);
    import vuexmodule from "./stores/index.js";
    const store = new Vuex.Store({
        namespaced: true,
        state: {
            databases,
            components: dbs.components,
            tables: dbs.tables,
            dbname,
            table:'',
            timeoutTimer:'',
            timeout: false,
        },
        mutations: {},
        actions: {},
        getters: {},
        modules: vuexmodule
    });

    //---- Element UI ----------
    import elementUi from 'https://cdn.skypack.dev/element-ui';
    import locale from 'https://cdn.skypack.dev/element-ui/lib/locale/lang/en';
    Vue.use(elementUi,{ locale });

    //---- Register Global Components ----------
    import GlobalComponents from './components/globalComponents.js';
    //----register global component------
    Object.keys(GlobalComponents).map(key=>{ 
        console.log('----register----> ',key);
        Vue.component(key,GlobalComponents[key]);
    })

    import Mainlayout from './layout/mainlayout.js';
    import Loginlayout from './layout/loginlayout.js';
    import Lockscreenlayout from './layout/lockscreenlayout.js';
    window.vm = new Vue({
    store,
    router,
    mixins:[],
    data(){ return {
        msg:'Hello world'
    }},
    el:'#app',
    methods:{
        StartTimers() {
            console.log('starttimer--->');
            this.timeoutTimer = setTimeout(()=>{
                 this.timeout = true;
                 this.$router.push('/lockscreen');
            }, 300000);
        },
        ResetTimers() {
            if(this.timeout){
                console.log('Timeout');
            } else {
                this.StartTimers();
                clearTimeout(this.timeoutTimer);
            }
        },
    },
    computed:{},
    watch: {},
    components:{
        mainlayout:Mainlayout,
        loginlayout:Loginlayout,
        lockscreenlayout:Lockscreenlayout
    },
    // render : h => h(App),
    beforeCreate  () { /* console.log('beforeCreate'); */ },
    created       () { /* console.log('created'); */ },
    beforeMount   () { /* console.log('beforeMount'); */ },
    mounted       () { /* console.log('mounted'); */ 
        this.StartTimers();
        window.addEventListener('mousemove',()=>{
            // console.log('mousemove');
            this.ResetTimers();
        })
    },
    beforeUpdate  () { /* console.log('beforeUpdate'); */ },
    updated       () { /* console.log('updated'); */ },
    beforeDestroy () { /* console.log('beforeDestroy'); */ },
    destroyed     () { /* console.log('destroyed'); */ },
    })	

    console.log(vm);