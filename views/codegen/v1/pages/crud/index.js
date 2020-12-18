export default {
    template: `
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <b>CURD AJAX TITLE</b>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <router-link to="/home">Home</router-link>
                                </li>
                                <template v-for="(r,idz)  in routesplit">
                                <li v-if="idz==0" class="breadcrumb-item ">
                                    <router-link v-if="idz==0" :to="'/'+r">{{r}}</router-link>
                                </li>
                                <li v-else class="breadcrumb-item active">{{r}}</li>
                                </template>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <router-view />
        </div>`,
    mixins: [],
    data() {
        return {
            theme: 'AdminLte',
            name: 'User Records',
        };
    },
    created(){},
    methods:{},
    computed: {
        routesplit(){
            return this.$route.fullPath.replace(/^\/|\/$/g, '').split('/');
        }
    },
    mounted(){}
};