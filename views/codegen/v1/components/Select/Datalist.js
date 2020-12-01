//  <v-datalist 
//     datas="[]" 
//     label="label" 
//     valkey="value" 
//     connector="-" 
//     default=""
//     placeholder=""
//     required="false"
//     v-mode=""
//     />
 
 export default { 
   template: `<div> 
                <input :list="uuid" 
                    class="form-control" 
                    style="width:300px;" 
                    :value="xdata"
                    @input="updateValue($event.target.value)"
                    >
                <datalist :id="uuid"  >
                    <option value="">--select รายการ--</option>
                    <option v-for="(item,idx) in datas" :key="idx"
                    :value="item[valkey] + connector + item[label]">{{item[valkey]}}{{connector}}{{item[label]}}</option>
                </datalist>
         </div>`, 
   mixins: [], 
   props: { 
     value: { 
       type: [Number,String,Object],
       default: '', 
     }, 
     datas:{
       type: Array,
       default:[]
     },
     label:{
         type: String,
         default:'label'
     },
     valkey:{
         type: String,
         default: 'value'
     },
     default:{
         type: [String,Number,Object],
         default: ''
     },
     placeholder: { 
       type: String, 
       default: '', 
     }, 
     connector:{
       type: String,
       default: ' '
     },
     required: { 
       type: Boolean, 
       default: false 
     } 
   }, 
   data() { 
     return { 
       theme: 'AdminLte', 
       name: 'DataList', 
       uuid:'idx',
       data:''
     }; 
   }, 
   methods: { 
     updateValue(value) { 
       console.log('----input---',value); 
       let arr = value.split(this.connector);
       this.$emit('input', arr[0]) 
     } 
   }, 
   computed: {
       xdata: {
           get:()=>{
               let item = this?.datas.find(item=>item[this.valkey] == this.value);
               if(item){
                    return item[this.valkey] + this.connector + item[this.label];
               } else {
                   return '';
               }
           },
           set:(val)=>{
               this.value = val;  
           }
       }
   }, 
   created() { 
     console.log(this.name + 'component is created',this); 
     this.uuid ='idx'+Math.random().toString(36).slice(-6);
   }, 
   mounted() {}, 
   components: {} 
 }; 
