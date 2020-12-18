export default {
    template: `
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Crud</h3>
                    <div class="card-tools">
                        <button @click="back" value="Back"
                            class="btn btn-success">
                            <i class="fas fa-chevron-circle-left"></i>&nbsp;Back
                        </button>
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
                <div class="card-body">
                    <form action="#" @submit="saveItem">
                        <div class="w-full">
                            <div class="flex flex-wrap justify-around p-5 bg-gray-200">
                                <div v-for="(col,idx) in columns" :key="idx" v-if="col.add" class="w-1/2 px-4 pb-2">
                                    <label class="w-full" :for="col.key">{{col.label}}</label>
                                    <component :is="col.comp.is" class="w-8/12 h-8" v-model="item[col.key]" :id="col.key" :name="col.key"
                                        v-bind="col.comp" />
                                </div>
                            </div>
                            <div class="flex justify-end w-full px-4 py-4 ">
                                <input type="reset"
                                    @click="resetfrm"
                                    class="px-4 py-2 m-2 text-gray-700 transition duration-500 bg-gray-200 border border-gray-200 rounded-md select-none ease hover:bg-gray-300 focus:outline-none focus:shadow-outlin">
                                </input>

                                <input type="submit"
                                    class="px-4 py-2 m-2 mr-5 text-white transition duration-500 bg-green-500 border border-green-500 rounded-md select-none ease hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                </input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <pre>{{item}}</pre>
                </div>
            </div>
        </section>
    `,
    mixins: [],
    data() {
        return {
            theme: 'AdminLte',
            name: 'User Add',
            columns: [
            { add: false, comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Id',                          key:'id' },
            { add: true,  comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Name',                        key:'name' },
            { add: true,  comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Nickname',                    key:'nickname' },
            { add: false, comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Age',                         key:'age' },
            { add: true,  comp: { is:'v2datepicker'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Birthdate',                   key:'birthdate' },
            { add: true,  comp: { is:'input_email'  ,required: true  ,inputClass:'w-full px-2' },  label: 'Email',                       key:'email' },
            { add: true,  comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Gender',                      key:'gender' },
            { add: true,  comp: { is:'input_number' ,required: true  ,inputClass:'w-full px-2', min:0 },  label: 'Salary',       key:'salary' },
            { add: true,  comp: { is:'Textarea'     ,required: true  ,inputClass:'w-full px-2', row:4 },  label: 'Address',                     key:'address' },
            { add: false, comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Group',                       key:'group' },
            { add: true,  comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Group_id',                    key:'group_id' },
            { add: false, comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Created_at',                  key:'created_at' },
            { add: false, comp: { is:'input_text'   ,required: true  ,inputClass:'w-full px-2' },  label: 'Updated_at',                  key:'updated_at' }],
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
        window.vc = this;
    },
    methods: {
        back(){
          this.$router.back();  
        },
        resetfrm(){
          Object.keys(this.item).map(key=>{
            this.item[key] = '';
          })
        },
        saveItem(evt){
          evt.preventDefault();
          console.log('save--->',evt);
          this.$msgbox.alert('Save Successed');
        }
    },
    computed: {},
    mounted() {},
    components: {}
};