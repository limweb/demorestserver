export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full h-40 flex flex-col">
          <div class="w-full border border-black">
            <Label :label="value.ques.qtitle" />
          </div>
          <div class="w-full h-12 flex items-end">
            <div class="mr-2">{{value.ques.choices.starttxt}}</div>
            <component is="radio_group" :values="getvalues()" valkey="value"  v-model="value.ques.answer" />
            <div class="ml-2">{{value.ques.choices.endtxt}}</div>
          </div>
          {{value.ques.answer}}
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
      getvalues(){
        let rs = [];
        for(let i=this.value.ques.choices.numstart;i<=this.value.ques.choices.numend;i++) {
            rs.push({value:i});
        }
        console.log('rs--->',rs);
        return rs;
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