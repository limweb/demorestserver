export default {
    template: `<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <b>Project Setting</b>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/home">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{$route.name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="col-2">
                        <div class="d-flex align-items-center">
                            Show &nbsp;
                            <select class="custom-select mr-2" style="width:80px;" v-model="per_page">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="email" class="form-control" placeholder="Search...">
                    </div>
                    <div class="col-3">
                        <i class="fa fa-spinner fa-spin fa-x fa-fw"></i>
                        <i class="fa fa-cog fa-spin fa-x fa-fw"></i>
                        <i class="fa fa-spinner fa-pulse fa-x fa-fw"></i>
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-2 card-tools">
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-success" >
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="dropdown ml-1">
                                <a href="#" class="btn btn-secondary " data-toggle="dropdown"><i
                                        class="nav-icon fas fa-cog"></i></a>
                                <ul class="dropdown-menu ">
                                    <li v-for="(col,idx) in columns" ><input v-model="col.show" class="ml-2" type="checkbox">&nbsp;&nbsp;{{col.key}}</input></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-tool ml-5" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="min-height: 70vh;">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width:20px;">&nbsp;&nbsp;&nbsp;</th>
                            <th style="width:20px;white-space: nowrap;"># No</th>
                            <th style="width:20px;"><input type="checkbox"></th>
                            <th  v-for="(col,idx) in columns" v-show="col.show" >
                                <div class="d-flex">
                                    <div class="col-6">{{col.key}}</div>
                                    <div  v-if="col.sort" class="col-6" style="display: inline-flex; align-items: center; flex-wrap: nowrap;cursor: pointer;">
                                        {{idx}}
                                        <i class="fas fa-sort-down" style="display:none"></i>
                                        <i aria-hidden="true" class="fa fa-sort" ></i>
                                        <i class="fas fa-sort-up" style="display:none"></i>
                                    </div>
                                </div>
                                <input type="text" v-model="col.txt" placeholder="Search..." style="color: darkcyan;">
                            </th>
                            <th>&nbsp;</th>
                            <th class="text-center" style="width:100px;">
                                <div>Action</div>
                                <div>&nbsp; </div>
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr v-if="false">
                        <td class="text-center" colspan="8">NO DATA!</td>
                    </tr>
                    <tr v-if="false">
                        <td class="text-center " colspan="8" ><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>&nbsp;LOADING.....!</td>
                    </tr>
                    <template v-for="(item,idx) in datas" :key="idx">
                        <tr >
                            <td style="cursor:pointer;" data-toggle="collapse" :data-target="'#accordion'+idx" >+/-</td>
                            <td style="cursor:pointer;">#{{idx}}</td>
                            <td style="cursor:pointer;"><input type="checkbox"></td>
                            <td v-for="(col,idz) in columns" v-show="col.show" :key="idz" >{{item[col.key]}}</td>
                            <td>         
                                <i class="fa fa-spinner fa-spin fa-x fa-fw"></i>
                                <i class="fa fa-cog fa-spin fa-x fa-fw"></i>
                                <i class="fa fa-spinner fa-pulse fa-x fa-fw"></i>
                            </td>
                            <td class="d-flex justify-content-center" style="width:100px;cursor: pointer;">
                                    <i class="far fa-eye text-success"  style="width:35px;height:35px;" ></i>
                                    <i class="ml-1 far fa-edit text-warning"  style="width:35px;height:35px;" ></i>
                                    <i class="ml-1 far fa-trash-alt text-danger" style="width:35px;height:35px;"  ></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" :id="'accordion'+idx" class="collapse">
                                <div class="d-flex flex-col flex-wrap pl-5">
                                    <div v-for="(add,idy) in Object.keys(item?.address)" :key="idy">{{add}}:{{item?.address[add]}}</div>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
                <thead  class="thead-dark">
                    <tr>
                        <th style="width:20px;">&nbsp;&nbsp;&nbsp;</th>
                        <th style="width:20px;white-space: nowrap;"># No</th>
                        <th style="width:20px;"><input type="checkbox"></th>
                        <th  v-for="(col,idx) in columns" v-show="col.show" >
                            <div class="d-flex">
                                <div class="col-6">{{col.key}}</div>
                                <div  v-if="col.sort" class="col-6" style="display: inline-flex; align-items: center; flex-wrap: nowrap;cursor: pointer;">
                                    {{idx}}
                                    <i class="fas fa-sort-down" style="display:none"></i>
                                    <i aria-hidden="true" class="fa fa-sort" ></i>
                                    <i class="fas fa-sort-up" style="display:none"></i>
                                </div>
                            </div>
                        </th>
                        <th>&nbsp;</th>
                        <th class="text-center" style="width:100px;">Action</th>
                    </tr>
                </thead>
            </table>
            <div class="d-flex justify-content-between mt-2 mb-2">
                <div>Displaying {{this.form}} to {{this.to}} of {{this.total}} items</div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item" v-for="(page,idp) in last_page" ><a class="page-link"  href="#">{{page}}</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                </nav>
                <div>
                    <select class="custom-select mr-2" style="width:180px;" v-model="goto_page" @change="gotoPage">
                        <option v-for="i in last_page"  :value="i">Page# {{i}}</option>
                    </select>
                </div>
            </div>
        </div>
         <div class="card-footer">
        </div>
</div>
</section>
</div>`,
    mixins: [],
    data() {
        return {
            theme: 'AdminLte',
            name: 'User Records',
            datas: [],
            current_page: 1,
            from: 1,
            last_page: 1,
            next_page_url: '',
            per_page: 10,
            prev_page_url: '',
            to: 10,
            goto_page:1,
            total: 200,
            columns: [
            { txt:'', show:true,  sort: false, key:'id' },
            { txt:'', show:true,  sort: true, key:'name' },
            { txt:'', show:true,  sort: true, key:'nickname' },
            { txt:'', show:true,  sort: true, key:'age' },
            { txt:'', show:true,  sort: false, key:'birthdate' },
            { txt:'', show:false,  sort: false, key:'email' },
            { txt:'', show:false,  sort: false, key:'gender' },
            { txt:'', show:false,  sort: false, key:'salary' },
            { txt:'', show:false, sort: false, key:'address' },
            { txt:'', show:false, sort: false, key:'group' },
            { txt:'', show:false, sort: false, key:'group_id' },
            { txt:'', show:false, sort: false, key:'created_at' },
            { txt:'', show:false, sort: false, key:'updated_at' }]
        };
    },
    created() {
        console.log(this.name + 'component is created');
        window.vc = this;
        let url = 'https://vuetable.ratiw.net/api/users?per_page='+this.per_page;
        axios.get(url).then(rs=>{
            console.log(rs);
            this.datas = rs.data.data;
            this.current_page = rs.data.current_page;
            this.from = rs.data.from;
            this.last_page = rs.data.last_page;
            this.next_page_url = rs.data.next_page_url;
            this.per_page = rs.data.per_page;
            this.prev_page_url = rs.data.prev_page_url;
            this.to = rs.data.to;
            this.total = rs.data.total;
        }).catch(console.error);
    },
    mounted() {},
    methods: {
        gotoPage(){
            let url = 'https://vuetable.ratiw.net/api/users?per_page='+this.goto_page;
            axios.get(url).then(rs=>{
                console.log(rs);
                this.datas = rs.data.data;
                this.current_page = rs.data.current_page;
                this.from = rs.data.from;
                this.last_page = rs.data.last_page;
                this.next_page_url = rs.data.next_page_url;
                this.per_page = rs.data.per_page;
                this.prev_page_url = rs.data.prev_page_url;
                this.to = rs.data.to;
                this.total = rs.data.total;
            }).catch(console.error);
        }
    },
    computed: {},
    components: {}
};