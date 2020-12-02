export default { 
    template: `
        <div class="flex w-full p-2 border border-black" :class="$attrs?.class" >
            <label :for="[uuid+v[valkey]]"v-for="(v,idx) in values" :key="idx" class="mr-4" >
                <input  
                    type="checkbox" 
                    :id="[uuid+v[valkey]]" 
                    :value="v[valkey]" 
                    v-model="myvalues" 
                    class="mr-3" 
                    @change="updateValue">
              {{v[lblkey]}}
              </label>
        </div>
    `, 
    mixins: [], 
    props:{
      value:{
        type: Array,
        default:[]
      },
      valkey:{
        type: String,
        default: 'id'
      },
      lblkey:{
        type: String,
        default: 'label'
      },
      values:{
        type: Array,
        defaule:[]
      }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Checkbox_group_relation', 
          myvalues:[],
          uuid:''
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);
      this.myvalues = this.value;
    }, 
    mounted() {}, 
    methods: {
      updateValue(){
        this.$emit('input',this.myvalues)
      }
    }, 
    computed: {}, 
    components:{} 
};  