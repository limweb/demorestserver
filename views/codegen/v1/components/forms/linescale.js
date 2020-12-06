export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full min-h-40 flex flex-col">
          <div class="w-full border border-black">
            <input type="text" class="w-full p-2 h-12"  v-model="qtitle" placeholder="short answer" @input="updateValue">
          </div>
          <div class="w-full h-12 flex items-end mb-2">
             <input v-model="ques.numstart"  type="number" max='1' min="0" >
             <span class="mx-4">To</span>
             <input v-model="ques.numend" type="number" min="2" max="10" >
          </div>
          <div class="w-full h-12 border-b border-black flex items-center">
             {{ques.numstart}}<input type="text" v-model="ques.starttxt" class="h-10 p-2 w-full" placeholder="Label(option)" >
          </div>
          <div class="w-full h-12 border-b border-black flex items-center">
             {{ques.numend}}<input  type="text" v-model="ques.endtxt" class="w-full h-10 p-2" placeholder="Label(option)" >
          </div>
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Line Scale', 
          uuid: '', 
          qtitle:'',
          ques:'',
          numstart:0,
          numend:10,
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      this.qtitle = this.value.qtitle;
      this.ques = this.value.choices
    }, 
    methods: { 
       updateValue(){ 
         this.value.qtitle = this.qtitle;
         this.$emit('input',this.value) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 