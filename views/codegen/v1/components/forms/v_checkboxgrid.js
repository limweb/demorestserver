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
                    <td v-for="(c,idc) in value.ques.choices.cols">
                        <input v-model="myanswer[idr][idc]" :value="idr+','+idc" type="checkbox" @change="updateValue">
                    </td>
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
          name: 'MultiplechoiceGrid', 
          uuid: '', 
          qtitle:'',
          myanswer: []
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      this.qtitle = this.value.qtitle;
      if(this.value.answer==''){
        for(let i=0;i< this.value.ques.choices.rows.length;i++){
            this.myanswer.push([]);
            for(let j=0;j< this.value.ques.choices.cols.length;j++){
              this.myanswer[i].push(false);
            }
        }
      } else {
        this.myanswer = this.value.answer;
      }
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
         console.log('update--->',this.myanswer);
         this.value.qtitle = this.qtitle;
        //  this.value.answer = JSON.parse(JSON.stringify(this.myanswer));
         this.value.answer = this.myanswer;
        this.$emit('input',this.value) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 