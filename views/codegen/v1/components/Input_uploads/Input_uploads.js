export default { 
    template: `
    <div><label>Uploads:</label>
        <div>input type="file" /><img src="#" /></div>
        <div>input type="file" /><img src="#" /></div>
    </div>
    `, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Uploads', 
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