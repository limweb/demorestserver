export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full h-40 flex flex-col">
          <div class="w-full border border-black">
            <Label :label="value.ques.qtitle" />
          </div>
          <div class="w-full flex items-end">
           <table class="w-full border border-black mt-2"> 
                <tr>
                  <td>&nbsp;</td>
                  <td v-for="(c,idc) in value.ques.choices.cols">{{c.label}}</td>
                </tr>
                <tr v-for="(r,idr) in value.ques.choices.rows" >
                  <td>{{r.label}}</td>
                  <td v-for="(c,idc) in value.ques.choices.cols"><input type="checkbox"></td>
                </tr>
           </table>
          </div>
          {{value.answer}}
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Checkbox Grid', 
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
         this.value.choices.rows.push({ label:'' })
       },
       addcol(){
         this.value.choices.cols.push({ label:'' })
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