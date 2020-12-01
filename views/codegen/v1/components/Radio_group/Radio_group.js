export default { 
    template: `
    <div><label>Radio Group:</label>
       <label>A <input type="radio" group="xxx"/></label>
       <input type="radio" group="xxx" />
       <input type="radio" group="xxx" />
       <input type="radio" group="xxx" />
    </div>
    `,  
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Radiogroup', 
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