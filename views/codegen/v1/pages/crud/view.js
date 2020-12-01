export default {
    template: `
        <section class="content">
            <div class="card" >
                <div class="card-header noprint">
                    <h3 class="card-title">View Crud</h3>
                    <div class="flex card-tools">
                            <button  @click="exportdata('EXCEL')" class="mr-2 btn btn-success"><i class="far fa-file-excel"></i>&nbsp;&nbsp;EXCEl</button>
                            <button  @click="exportdata('PDF')" class="mr-2 btn btn-success"><i class="far fa-file-pdf"></i>&nbsp;&nbsp;PDF</button>
                            <button  @click="exportdata('PRINT')" class="mr-2 btn btn-success"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>
                            <button type="button" class="ml-5 btn btn-tool" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                    </div>
                </div>
                <div class="card-body">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-around p-5 bg-gray-200">
                                <div v-for="(col,idx) in columns" :key="idx" v-if="col.view" class="w-1/2 px-4 pb-2">
                                    <label class="w-full" :for="col.key">{{col.label}}</label>
                                    <component :is="col.comp.is" class="w-8/12 h-8" v-model="$store.state.crud.row_view[col.key]" :id="col.key" :name="col.key"
                                        v-bind="col.comp" />
                                </div>
                            </div>
                            <div class="flex justify-end w-full px-4 py-4 ">
                                <button
                                    @click="back"
                                    value="Back"
                                    class="px-4 py-2 m-2 text-gray-700 transition duration-500 bg-gray-200 border border-gray-200 rounded-md select-none noprint ease hover:bg-gray-300 focus:outline-none focus:shadow-outlin">
                                    <i class="fas fa-chevron-circle-left"></i>&nbsp;Back
                                </button>
                            </div>
                        </div>
                </div>
                <div class="card-footer noprint">
                    <i class="far fa-file-excel"></i>
                    <i class="far fa-file-pdf"></i>
                    <i class="fas fa-print"></i>
                    
                    <pre>{{$store.state.crud.row_update}}</pre>
                </div>
            </div>
        </section>
    `,
    mixins: [],
    data() {
        return {
            theme: 'AdminLte',
            name: 'Edit',
            columns: [
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Id',                          key:'id' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Name',                        key:'name' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Nickname',                    key:'nickname' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Age',                         key:'age' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Birthdate',                   key:'birthdate' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Email',                       key:'email' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Gender',                      key:'gender' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2', max:10, min:0 },  label: 'Salary',       key:'salary' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2', row:4 },  label: 'Address',                     key:'address' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Group',                       key:'group' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Group_id',                    key:'group_id' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Created_at',                  key:'created_at' },
            { view: true, comp: { is:'input_text_readonly'  ,inputClass:'w-full px-2' },  label: 'Updated_at',                  key:'updated_at' }],
            item:{
                id: '',
                name: '',
                nickname: '',
                age: '',
                birthdate: '',
                email: '',
                gender: '',
                salary: '',
                address: '',
                group: '',
                group_id: '',
                created_at: '',
                updated_at  : '',
            }
        };
    },
    created() {
        console.log(this.name + 'component is created');
    },
    methods: {
        exportdata(types){
          switch(types){
           case 'PDF':
              console.log('pdf--->');
           break;
           case 'EXCEL':
              console.log('excel--->');
           break;
           case 'PRINT':
           default:
              console.log('print--->');
              window.print();
            break;
          }
        },
        back(){
          this.$router.back();
        },
    },
    computed: {},
    mounted() {},
    components: {}
};