export default { 
    template: `
        <div class="flex flex-col">
          <label :for="[uuid+v.value]" v-for="(v,idx) in values" >
            <input  type="checkbox" :id="[uuid+v.value]" :value="v.value" v-model="myvalue" class="mr-3" @change="updateValue">
            {{v.label}}</label>
        </div>
    `, 
    mixins: [], 
    props:{
      value:{
        type: Array,
        default:[]
      },
      values:{
        type: Array,
        defaule:[]
      }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Checkboxgroup',
          myvalue:[],
          uuid:'',
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);
    }, 
    mounted() {}, 
    methods: {
      updateValue(){
        this.$emit('input',this.myvalue)
      }
    }, 
    computed: {}, 
    components:{} 
}; 