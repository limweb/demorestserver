export default { 
    template: `
    <div>
        <select multiple  
            class="w-full p-2 border border-black"
            @change="updateValue" 
            v-model="myselectValues">
            <option v-for="(data,idx) in values" :key="idx" :value="data.value">{{data.label}}</option>
        </select>
    </div>`, 
    mixins: [], 
    props:['value','values'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Selectmulti', 
          myselectValues: []
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {
      updateValue(){
        this.$emit('input',this.myselectValues);
      }
    }, 
    computed: {}, 
    components:{} 
}; 