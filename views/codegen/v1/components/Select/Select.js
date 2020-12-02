export default { 
    template: `
    <div>
        <select v-model="selectValue" @change="updateValue"
          class="w-full h-10 border border-black"
         >
            <option value="">--please Select Option----</option>
            <option v-for="(data,idx) in values" :key="idx" :value="data.value">{{data.label}}</option>
        </select>

    </div>`, 
    mixins: [], 
    props:['value','values'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Select', 
          selectValue:'',
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.selectValue = this.value;
    }, 
    mounted() {}, 
    methods: {
      updateValue(){
        this.$emit('input',this.selectValue);
      }
    }, 
    computed: {}, 
    components:{} 
}; 