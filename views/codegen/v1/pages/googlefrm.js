import vueDragable from '../libs/vuedraggable.js';

export default { 
    template: `
    <div class="w-full bg-gray-200 flex flex-col relative items-center h-full">
        <div class="bg-gray-100 shadow border relative border-black w-1/2 mt-5 h-52 px-2 py-2 flex flex-col">
            <div class="w-full ">Title:</div>
            <div class="w-full ">Description:</div>
            <div @click="addnewq" v-if="questions.length===0"class="cursor-pointer w-12 h-12 self-center textcenter absolute -bottom-6 border border-gray-400 bg-blue-400 rounded-full shadow  flex items-center justify-center">+</div>
        </div>

        <div class="bg-gray-100 shadow border-2 w-1/2 mt-2 px-2 flex flex-col border-l-4 " @click="activeq(idq)"
             v-for="(question,idq) in questions" :key="idq" 
             :style="'border-left-color:'+ activecolor(question) "
              >
                <div class="bg-gray-100 w-full cursor-pointer">:::</div>
                <div class="flex w-full  border-black border-b">
                    <component  :is="question.is" class="w-3/5" v-model="question.ques" />
                    <select  v-model="question.is" class="border w-2/5 h-12 border-gray-400 ml-2"  @change="changetype(question)">
                        <option value="shortanswer">Short answer</option>
                        <option value="paragraph">Paragraph</option>
                        <option value="multiplechoice">Multiple choice</option>
                        <option value="checkboxes">Checkboxes</option>
                        <option value="dropdowntype">Dropdown</option>
                        <option value="fileupload">Fileupload</option>
                        <option value="linescale">line scale</option>
                        <option value="multipolechoicegrid">Multipole choice grid</option>
                        <option value="checkboxgrid">Checkbox grid</option>
                        <option value="datetype">Date</option>
                        <option value="timetype">Time</option>
                        <option value="monthtype">Month</option>
                        <option value="yeartype">Year</option>
                    </select>
                </div>
                <div class="flex justify-end h-8 items-center mt-2" name="footer">
                    <div @click="cloneq(question,idq)" class="mr-2 -mt-3 cursor-pointer"><i class="far fa-clone mr-2"></i></div>
                    <div @click="removeq(idq)" class="mr-2 -mt-3 cursor-pointer"><i class="fas fa-trash-alt"></i></div>
                    <toggle style="width:60px;" class="mr-2 cursor-pointer" v-model="question.toggle" />
                </div>
        </div>
        <div class="relative flex justify-end w-1/2">
        <div v-if="questions.length>0"style="top: -40px;right:-50px; w-10" 
                @click="addnewq"
                class="cursor-pointer shadow bg-white w-10 h-8 absolute shadow-sm border border-black text-center ">+</div>
        </div>

        <div class="h-52">&nbsp;</div>
    </div>`,
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'GOOGLE FORM', 
          uuid: '', 
          questions:[
            { is:'shortanswer' , answer:'', ques: { qtitle:'', choices: [] },  active: false, toggle: false},
            { is:'shortanswer' , answer:'', ques: { qtitle:'', choices: [] },  active: false, toggle: false},
          ],
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      window.vgf = this;
    }, 
    methods: {
        changetype(question){
            if(['multiplechoice','checkboxes','dropdowntype'].includes(question.is)){
               console.log('nothing--->'); 
            } else if(question.is == 'linescale'){
                question.ques.choices = { numstart:1, numend:10 , starttxt:'',endtxt:'' };
            } else if(['checkboxgrid','multipolechoicegrid'].includes(question.is)){
                if(!['checkboxgrid','multipolechoicegrid'].includes(question?.oldis)){
                    question.ques.choices = { rows:[], cols:[] };
                }
            } else {
                question.ques.choices = '';
            }
            question.oldis = question.is;
        },
        cloneq(q,idx){
            console.log('clone q--->');
            this.questions.splice(idx, 0,JSON.parse(JSON.stringify(q)));
            setTimeout(()=>{
                this.questions.map(q=>q.active=false);
                this.questions[idx+1].active=true;
            },100)
        },
        removeq(idq){
            console.log('idq--->',idq);
            if (idq > -1) {
                this.questions.splice(idq, 1);
            }
        },
        addnewq(){
            this.questions.push({ is:'shortanswer' , answer:'', ques: { qtitle:'', choices: [] },  active: false, toggle: false})
        },
        activecolor(q){
            return q.active ? 'blueviolet;':''
        },
        activeq(idq){
            console.log('activeq--->',idq);
            this.questions.map((q, idx)=>{
                 q.active=(idx==idq);
            }); 
        }
    }, 
    computed: {

    }, 
    mounted() {}, 
    components:{
        vueDragable
    } 
}; 