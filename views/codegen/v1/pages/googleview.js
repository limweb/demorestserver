export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full flex flex-col items-center bg-gray-200">
    <div><router-link to="/googlefrm">Edit</router-link></div>
    <h1 class="text-3xl">{{$store.state.gform.title}}</h1>
    <h3 class="text-2xl">{{$store.state.gform.description}}</h3>
    <div class="bg-black border-b border-black w-11/12" />
    <div class="my-2 px-2 py-2 w-3/5 bg-gray-100 shadow rounded border border-black"
         v-for="(q,idx) in $store.state.gform.questions"
    >
         <component :is="q.vis" v-model="q" />
    </div>
        
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'googleview', 
          uuid: '', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
    }, 
    methods: { 
       updateValue(value){ 
         this.$emit('input',value) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 