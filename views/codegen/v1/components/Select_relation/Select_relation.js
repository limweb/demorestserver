export default { 
    template: `
    <div>
        <select>
            <option value="">--please Select Option----</option>
            <option v-for="(data,idx) in datas" :key="idx" :value="data.value">{{data.label}}</option>
        </select>
    </div>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Selectrelation', 
          datas: []
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {}, 
    computed: {}, 
    components:{} 
}; 