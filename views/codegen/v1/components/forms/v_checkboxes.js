export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full flex flex-col">
      <div class="w-full flex flex-col">
            <div class="w-full border border-black">
              <Label :label="value.ques.qtitle" />
            </div>
            <div class="w-full flex items-end" >
              <component is="checkbox_group_relation" v-model="value.answer" lblkey="choice" valkey="choice"  :values="value.ques.choices"  class="flex flex-col" />
            </div>
            {{value.answer}}
      </div>
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Checkbox', 
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