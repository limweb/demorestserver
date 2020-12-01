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
            mydate: null,
            mydaterang: null,
            mydatetime: null,
            myyear: null,
            mymonth: null,
            myweek: null,
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
            { filtertxt:'', show: true,  search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'id',         sort: false, sortfield: 'id',         sortOrder: 0,  sortDirection: 'x', key:'id' },
            { filtertxt:'', show: true,  search: true,   inline:{ enable:true,   type:'text'    },searchfield:   'name',       sort: true,  sortfield: 'name',       sortOrder: 0,  sortDirection: 'x', key:'name' },
            { filtertxt:'', show: true,  search: true,   inline:{ enable:true,   type:'text'    },searchfield:   'nickname',   sort: true,  sortfield: 'nickname',   sortOrder: 0,  sortDirection: 'x', key:'nickname' },
            { filtertxt:'', show: true,  search: true,   inline:{ enable:true,   type:'number'  },searchfield:   'birthdate',  sort: true,  sortfield: 'birthdate',  sortOrder: 0,  sortDirection: 'x', key:'age' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:true,   type:'date'    },searchfield:   'birthdate',  sort: false, sortfield: 'birthdate',  sortOrder: 0,  sortDirection: 'x', key:'birthdate' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'email',      sort: false, sortfield: 'email',      sortOrder: 0,  sortDirection: 'x', key:'email' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'gender',     sort: false, sortfield: 'gender',     sortOrder: 0,  sortDirection: 'x', key:'gender' },
            { filtertxt:'', show: true,  search: true,   inline:{ enable:true,   type: 'number' },searchfield:   'salary',     sort: true,  sortfield: 'salary',     sortOrder: 0,  sortDirection: 'x', key:'salary' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'address',    sort: false, sortfield: 'address',    sortOrder: 0,  sortDirection: 'x', key:'address' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'group',      sort: false, sortfield: 'group',      sortOrder: 0,  sortDirection: 'x', key:'group' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'group_id',   sort: false, sortfield: 'group_id',   sortOrder: 0,  sortDirection: 'x', key:'group_id' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'created_at', sort: false, sortfield: 'created_at', sortOrder: 0,  sortDirection: 'x', key:'created_at' },
            { filtertxt:'', show: false, search: false,  inline:{ enable:false,  type:'text'    },searchfield:   'updated_at', sort: false, sortfield: 'updated_at', sortOrder: 0,  sortDirection: 'x', key:'updated_at' }],
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
        viewItem(item){
           this.$router.push('/crud/view/'+item.id);
        },
        saveInline(item){
          console.log('saveinline--->');
          item.inline=!item.inline 
          this.bckedititem = null;
          
        },
        calcelInline(item){
            console.log('test--->',item==this.bckedititem);
            item.inline=!item.inline 
            Object.keys(this.bckedititem).map(key=>{
                item[key] = this.bckedititem[key];
            })
        },
        inlineEdit(item){ 
            if (this.datas.filter(row=>row.inline && row.id != item.id ).length > 0 ){
                this.$msgbox.alert('Please save before edit new line')
            } else {
                this.bckedititem = JSON.parse(JSON.stringify(item));
                item.inline=!item.inline 
            }
        },
        chkinline(){
            if (this.datas.filter(row=>row.inline).length > 0 ){
                this.$msgbox.alert('Please save before edit new line')
                return false;    
            } else {
                return true;    
            }
        },
        editrow(item){
           this.$router.push('/crud/edit/'+item.id)
        },
        delrow(idx,item){
           this.$msgbox.confirm(`Are you sure want to delete id = ${idx} ? `,'!DELETE').then(rs=>{
               if(rs==='confirm'){
                   this.$message.info('Confirm')
                   this.$router.push('/crud/delete/'+item.id)
               }
           }).catch(err=>{
                if(err ==='cancel') {
                   this.$message.info('Cancel')
               } 
           })
        },
        addrow(){
            this.$router.push("/crud/add")
        },
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
            if(this.chkinline()){
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
        }
    },
    computed: {
        routesplit(){
            return this.$route.fullPath.replace(/^\/|\/$/g, '').split('/');
        },
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