export default { 
    template: `
    <div class="w-full border border-black">
        <select v-model="myselect" class="w-full p-2"  @change="updateValue" multiple>
            <option value="0">--please Select Option----</option>
            <option v-for="(data,idx) in values" :key="idx" :value="data[valkey]">{{data[lblkey]}}</option>
        </select>
    </div>`, 
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
          name: 'Select Multi Relation', 
          myselect:[0],
          datas: []
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {
      updateValue(){
        this.$emit('input',this.myselect);
      }
    }, 
    computed: {}, 
    components:{} 
}; 