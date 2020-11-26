export default {
    template: `<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
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
                            <select class="mr-2 custom-select" style="width:80px;" v-model="per_page" @change="changeperpage">
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
                            <div class="ml-1 dropdown">
                                <a href="#" class="btn btn-secondary " data-toggle="dropdown"><i
                                        class="nav-icon fas fa-cog"></i></a>
                                <ul class="dropdown-menu ">
                                    <li v-for="(col,idx) in columns"  class="dropdown-item">
                                        <input v-model="col.show" class="mt-2 ml-2 mr-3" type="checkbox">&nbsp;&nbsp;{{col.key}}</input>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="ml-5 btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
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
                            <th style="width:20px;white-space: nowrap;"># No </th>
                            <th style="width:20px;"  @click="checkedall">
                                <input v-model="selectAll" type="checkbox">
                            </th>
                            <th  v-for="(col,idx) in columns" v-show="col.show" >
                                <div class="flex-row d-flex" @click="sorted(col,$event)">
                                    <div class="col-6"><div style="    white-space: nowrap;" >{{col.key}}</div></div>
                                    <div v-if="col.sort" class="col-6 d-flex" style="cursor: pointer;justify-content: flex-end;">
                                        <div><small style="position: absolute;right: 20px;top: 0px;" v-if="col.sortOrder">{{ col.sortOrder }}</small></div>
                                        <div><i class="fas fa-sort-up" :style="{ display: (col.sortDirection=='asc'?'block':'none') }"></i></div>
                                        <div><i aria-hidden="true" class="fa fa-sort" :style="{ display: (col.sortDirection=='x'?'block':'none')}" ></i></div>
                                        <div><i class="fas fa-sort-down" :style="{ display: (col.sortDirection=='desc'?'block':'none')}"></i></div>
                                    </div>
                                </div>
                                <input v-if="col.search" type="text" class="pl-2" v-model="col.filtertxt" placeholder="Search..." 
                                style="color: darkcyan;width: 100%;" @input="searchfilter" >
                                <div  v-else="col.search" >&nbsp;</div>
                            </th>
                            <th>&nbsp;</th>
                            <th class="text-center" style="width:100px;">
                                <div>Action</div>
                                <div @click="clearsearchtxt" >clear text</div>
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr v-if="datas.length==0" >
                        <td class="text-center" colspan="8">NO DATA!</td>
                    </tr>
                    <tr v-if="loading">
                        <td class="text-center " colspan="8" ><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>&nbsp;LOADING.....!</td>
                    </tr>
                    <template v-if="datas.length>0"  v-for="(item,idx) in datas" :key="idx">
                        <tr :class="[item.inline ? 'border-2 border-green-300 ':'']">
                            <td  class="accordion-toggle collapsed" style="cursor:pointer;" data-toggle="collapse" :data-target="'#accordion'+idx" >
                                <span class="expand-button"></span>
                            </td>
                            <td style="cursor:pointer;">#{{idx+1}}</td>
                            <td style="cursor:pointer;">
                                <input v-model="item.check" type="checkbox" >
                            </td>
                            <td v-for="(col,idz) in columns" v-show="col.show" :key="idz" class="px-0 py-0" >
                                <div :contenteditable="item.inline" class="w-full px-2 py-3" style="height:62px;">{{item[col.key]}}</div>
                            </td>
                            <td>         
                                <i class="fa fa-spinner fa-spin fa-x fa-fw"></i>
                                <i class="fa fa-cog fa-spin fa-x fa-fw"></i>
                                <i class="fa fa-spinner fa-pulse fa-x fa-fw"></i>
                            </td>
                            <td class="d-flex justify-content-center" style="width:100px;cursor: pointer;">
                                    <img src="https://static.thenounproject.com/png/399935-84.png" 
                                    class="w-5 h-4" @click="item.inline=!item.inline"
                                    > 
                                    <i class="far fa-eye text-success"  style="width:35px;height:35px;" ></i>
                                    <i class="ml-1 far fa-edit text-warning"  style="width:35px;height:35px;" ></i>
                                    <i class="ml-1 far fa-trash-alt text-danger" style="width:35px;height:35px;"  ></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" :id="'accordion'+idx" class="collapse">
                                <div class="flex-col flex-wrap pl-5 d-flex">
                                    <div v-for="(add,idy) in Object.keys(item?.address)" :key="idy">{{add}}:{{item?.address[add]}}</div>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th style="width:20px;">&nbsp;&nbsp;&nbsp;</th>
                        <th style="width:20px;white-space: nowrap;"># No </th>
                        <th style="width:20px;"  @click="checkedall">
                            <input v-model="selectAll" type="checkbox">
                        </th>
                        <th  v-for="(col,idx) in columns" v-show="col.show" >
                            {{col.key}}
                        </th>
                        <th>&nbsp;</th>
                        <th class="text-center" style="width:100px;">
                            <div>Action</div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class="mt-2 mb-2 d-flex justify-content-between">
                <div>Displaying {{this.form}} to {{this.to}} of {{this.total}} items</div>
                    <div class="d-flex align-items-center">
                        Show &nbsp;
                        <select class="mr-2 custom-select" style="width:80px;" v-model="per_page" @change="changeperpage">
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
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item" @click="gotopfirstpage" :class="{disabled:current_page==1}">
                        <div class="page-link" aria-label="Previous" >
                            <span aria-hidden="true">&lsaquo;</span>
                            <span class="sr-only">First</span>
                        </div>
                        </li>
                        <li class="page-item" @click="gotoprevpage" :class="{disabled:current_page==1}">
                        <div class="page-link" aria-label="Previous" >
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </div>
                        </li>
                        <li v-if="page<=Math.ceil(last_page/2)" class="page-item " :class="{active:current_page==page}"  v-for="(page,idp) in uppage" @click="gotopage(page)"  >
                            <div class="page-link" >{{page}}</divf=>
                        </li>
                        <!-- <li v-if="last_page >10" class="page-item disabled"><div  class="page-link">...</div></li> -->
                        <li v-if="last_page >10" class="page-item">
                            <div>
                                <select class="mr-2 custom-select" style="width:180px;" v-model="goto_page" @change="gotoPage">
                                    <option v-for="i in last_page"  :value="i">Page# {{i}}</option>
                                </select>
                            </div>
                        </li>
                        <!-- <li v-if="last_page >10"  class="page-item disabled"><div class="page-link">...</div></li> -->
                        <li v-if="page>Math.ceil(last_page/2)" class="page-item " :class="{active:current_page==page}"  v-for="(page,idp) in downpage" @click="gotopage(page)"  >
                            <div class="page-link" >{{page}}</div>
                        </li>
                        <li class="page-item" @click="gotonexpage" :class="{disabled:current_page==last_page}">
                        <div class="page-link" aria-label="Next" >
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </div>
                        </li>
                        <li class="page-item" @click="gotolastpage" :class="{disabled:current_page==last_page}">
                        <div class="page-link" aria-label="Next" >
                            <span aria-hidden="true">&rsaquo;</span>
                            <span class="sr-only">Last</span>
                        </div>
                        </li>
                    </ul>
                </nav>
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
            { filtertxt:'', show: true,  search: false,  searchfield: 'id',         sort: false, sortfield: 'id',         sortOrder: 0,  sortDirection: 'x', key:'id' },
            { filtertxt:'', show: true,  search: true,   searchfield: 'name',       sort: true,  sortfield: 'name',       sortOrder: 0,  sortDirection: 'x', key:'name' },
            { filtertxt:'', show: true,  search: true,   searchfield: 'nickname',   sort: true,  sortfield: 'nickname',   sortOrder: 0,  sortDirection: 'x', key:'nickname' },
            { filtertxt:'', show: true,  search: true,   searchfield: 'birthdate',  sort: true,  sortfield: 'birthdate',  sortOrder: 0,  sortDirection: 'x', key:'age' },
            { filtertxt:'', show: false, search: false,  searchfield: 'birthdate',  sort: false, sortfield: 'birthdate',  sortOrder: 0,  sortDirection: 'x', key:'birthdate' },
            { filtertxt:'', show: false, search: false,  searchfield: 'email',      sort: false, sortfield: 'email',      sortOrder: 0,  sortDirection: 'x', key:'email' },
            { filtertxt:'', show: false, search: false,  searchfield: 'gender',     sort: false, sortfield: 'gender',     sortOrder: 0,  sortDirection: 'x', key:'gender' },
            { filtertxt:'', show: true,  search: true,   searchfield:  'salary',    sort: true,  sortfield:  'salary',     sortOrder: 0,  sortDirection: 'x', key:'salary' },
            { filtertxt:'', show: false, search: false,  searchfield: 'address',    sort: false, sortfield: 'address',    sortOrder: 0,  sortDirection: 'x', key:'address' },
            { filtertxt:'', show: false, search: false,  searchfield: 'group',      sort: false, sortfield: 'group',      sortOrder: 0,  sortDirection: 'x', key:'group' },
            { filtertxt:'', show: false, search: false,  searchfield: 'group_id',   sort: false, sortfield: 'group_id',   sortOrder: 0,  sortDirection: 'x', key:'group_id' },
            { filtertxt:'', show: false, search: false,  searchfield: 'created_at', sort: false, sortfield: 'created_at', sortOrder: 0,  sortDirection: 'x', key:'created_at' },
            { filtertxt:'', show: false, search: false,  searchfield: 'updated_at', sort: false, sortfield: 'updated_at', sortOrder: 0,  sortDirection: 'x', key:'updated_at' }],
            selectAll:false,
            sortOrder:[],
            loading:false,
            timer:'',
            sorturl:''
        };
    },
    created() {
        console.log(this.name + 'component is created');
        window.vc = this;
        let url = 'https://vuetable.ratiw.net/api/users?per_page='+this.per_page;
        this.getdata(url);
    },
    methods: {
        searchfilter(){
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                console.log('searchfilter');
            }, 800);
        },
        clearsearchtxt(){
            this.columns.map(c=>c.filtertxt='')
        },
        sorted(col,evt){
            console.log(evt)
            if(col.sort){
                let sorturl = '';
                if(evt.ctrlKey || evt.altKey || evt.metaKey){
                let s = this.sortOrder.find(sort=>sort.key==col.key);
                if(s){
                    s.sortDirection = s.sortDirection=='asc'?'desc':'asc';
                } else {
                    col.sortDirection = col.sortDirection=='asc'?'desc':'asc';
                    this.sortOrder.push(col) 
                    col.sortOrder = this.sortOrder.length;
                }
                    sorturl = this.sortOrder.map(s=>{
                            return s.sortfield+'|'+s.sortDirection; 
                    }).join(',');
                } else {
                this.sortOrder = [];
                let direction = col.sortDirection=='asc'?'desc':'asc';
                this.columns.map(col=>{ col.sortOrder= 0; col.sortDirection='x'; });
                col.sortDirection = direction;
                sorturl = col.sortfield+'|'+col.sortDirection; 
                }
                this.sorturl = sorturl;
                let url = 'https://vuetable.ratiw.net/api/users?page='+ this.goto_page + '&per_page='+this.per_page +'&sort=' + sorturl;
                console.log(url);
                this.getdata(url);
            }
        },
        genderLabel (value) {
            return value === 'M'
                ? '<span class="tag is-primary is-medium"><span class="icon"><i class="fa fa-mars"></i></span>&nbsp;Male</span>'
                : '<span class="tag is-danger is-medium"><span class="icon"><i class="fa fa-venus"></i></span>&nbsp;Female</span>'
        },
        checkedall(){
            this.selectAll=!this.selectAll;
            console.log('---select--->',this.selectAll);
            this.datas.map(item=>item.check=this.selectAll)
        },
        gotopage(page){
            this.goto_page = page;
            this.gotoPage();
        },
        gotoPage(){
            
            let url = 'https://vuetable.ratiw.net/api/users?page='+ this.goto_page + '&per_page='+this.per_page +'?sort='+ this.sorturl;
            this.getdata(url);
        },
        gotolastpage(){
           this.goto_page = this.last_page;
           this.gotoPage();
        },
        gotopfirstpage(){
           this.goto_page = 1;
           this.gotoPage();
        },
        changeperpage(){
           this.goto_page = 1;
           this.gotoPage();
        },
        gotonexpage(){
          let url = this.next_page_url = this.next_page_url;
          this.getdata(url);
        },
        gotoprevpage(){
          let url = this.prev_page_url = this.prev_page_url;
          this.getdata(url);
        },
        getdata(url){
            this.loading = true;
            axios.get(url).then(rs=>{
                console.log(rs);
                
                this.datas = rs.data.data.map(item=>{
                        item.check = false;
                        item.inline  = false;
                        return item;
                })
                this.current_page = rs.data.current_page;
                this.goto_page = this.current_page;
                this.from = rs.data.from;
                this.last_page = rs.data.last_page;
                this.next_page_url = rs.data.next_page_url;
                this.per_page = rs.data.per_page;
                this.prev_page_url = rs.data.prev_page_url;
                this.to = rs.data.to;
                this.total = rs.data.total;
                this.loading = false;
            }).catch(err=>{
                console.error(err)
                this.loading = false;
            });            
        }
    },
    computed: {
        uppage(){
            if(this.last_page > 20) {
                if(this.current_page < 5) {
                    return [1,2,3,4,5];
                } else {
                     return [...[1,2],this.current_page-2,this.current_page-1,this.current_page,this.current_page+1,this.current_page+2];
                }
            } else {
               let pages = []
               for(let i=1;i<=this.last_page/2;i++){
                   pages.push(i);
               }       
               return pages;
            }
        },
        downpage(){
            if(this.last_page > 20) {
                if(this.current_page <= this.last_page - 4) { 
                    return [this.current_page-2,this.current_page-1,this.current_page,this.current_page+1,this.current_page+2,this.last_page-1,this.last_page];
                } else {
                    return [this.last_page-4,this.last_page-3,this.last_page-2,this.last_page-1,this.last_page];
                }
            } else {
               let pages = [];
               for(let i= Math.ceil(this.last_page/2); i<=this.last_page; i++){
                  pages.push(i);
               }
               return pages;
            }
        }

    },
    mounted() {},
    components: {}
};