export default { 
    template: `
        <div class="flex flex-col">
          <label :for="[uuid+v.value]" v-for="(v,idx) in values" >
            <input_checkbox  v-model="myvalue[idx]" :value="v.value" />
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
      this.myvalue = this.value;
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