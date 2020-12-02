export default { 
    template: `
     <div class="flex">
      <p>Please select your gender:</p>
      <label for="M">
        <input type="radio" id="M" value="M" v-model="picked" class="mr-2" name="gender"  @change="updateValue">
          Male
      </label>
      <label for="F">
        <input type="radio" id="F" value="F" v-model="picked" class="mr-2" name="gender"  @change="updateValue">
         Female 
      </label>
      <label for="other">
        <input type="radio" id="other" value="other" v-model="picked" class="mr-2" name="gender"  @change="updateValue">
         Other 
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
          picked:''
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
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
