export default { 
    template: `
     <div class="flex">
      <label v-for="(v,idx) in values " :for="[uuid+v.value]" class="mr-3">
        <input type="radio" :id="[uuid+v.value]" :value="v.value" v-model="picked" class="mr-2" :name="$attrs?.name"  @change="updateValue">
          {{v.label}}
      </label>
     </div>
    `,  
    mixins: [], 
    props:{
      value:{
        type:[String,Number],
        defaule:''
      },
      values:{
        type: Array,
        default:[]
      }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Radiogroup', 
          picked:'',
          uuid:'',
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);
    }, 
    mounted() {
      this.picked = this.value;
    }, 
    methods: {
      updateValue(){
        this.$emit('input',this.picked);
      }
    }, 
    computed: {}, 
    components:{} 
}; 