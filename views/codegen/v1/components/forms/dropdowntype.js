export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full flex flex-col">
          <div class="w-full border border-black">
            <input type="text" class="w-full p-2 h-12"  v-model="qtitle" placeholder="short answer" @input="updateValue">
          </div>
          <div class="w-full h-12 flex items-center" v-for="(choice,idx) in value.choices" :key="idx" >
              <span class="whitespace-nowrap" >{{idx+1}} : </span><input type="text" class="p-2 w-full" v-model="choice.choice" placeholder="type your choice" ><span @click="rmchoice(choice)"> &nbsp;&nbsp;X&nbsp;&nbsp; </span>
          </div>
          <div class="w-full h-12 mt-2">
              <span @click="addchoice" class="cursor-pointer">Add choice...</span>
          </div>
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Dropdown', 
          uuid: '', 
          qtitle:'',
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      this.qtitle = this.value.qtitle;
    }, 
    methods: { 
       rmchoice(choice){
         console.log('choice--->',choice);
       },
       addchoice(){
         this.value.choices.push({ choice:'' })
       },
       updateValue(){ 
         this.value.qtitle = this.qtitle;
         this.$emit('input',this.value) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 