export default { 
    template: `
    <div>
        <label>
            Upload:
            <input type="file"  />
            <img src="#" />
        </label>
    </div.`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Upload', 
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