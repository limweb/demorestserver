export default { 
    template: `
     <div class="flex w-full p-2 mx-2 my-2 border border-black">
        <label v-for="(v,idx) in values " :for="[uuid+v[valkey]]"  class="mr-3">
            <input type="radio" 
              :id="[uuid+v[valkey]]" 
              :value="v[valkey]" 
              v-model="picked" 
              class="mr-2" 
              v-bind="$attrs"  
              @change="updateValuex">
        {{v[lblkey]}}
        </label>
     </div>
    `,  
    mixins: [], 
    props:{
      value:{
        type:[String,Number],
        defaule:''
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
          name: 'Radiogrouprelation', 
          picked:'',
          uuid:''
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
      updateValuex(){
        this.$emit('input',this.picked);
      }
    }, 
    computed: {}, 
    components:{} 
};  