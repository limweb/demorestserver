 import autocomplete from "../../util/autocompleter.js"

  //---------- วิธีใช้ ----------------
    // <v-typeahead
    //     placeholder="เลือกรายการสินค้า" 
    //     v-model="test"
    //     :datas="customers"  // datas สำหรับให้เลือก
    //     valkye="id"  // key ที่จะแปลงเป็น id 
    //     :lblfunc="this.myname"  // key ที่จะแปลงเป็น label  ซึ่งใช้  text หรือ function ก็ได้
    //     >



 export default { 
   template: `<div> 
        <input  
              ref="inputRef"
              :placeholder="placeholder" 
              :value="selectvalue"
              type="text" 
              class="input"
        />
   </div>`, 
   mixins: [], 
   props: { 
     value: { 
       type: [String,Number,Object], 
       default: '', 
     }, 
     placeholder: { 
       type: String, 
       default: '', 
     }, 
     datas:{
       type: Array, 
       default: [],
     },
     valkey:{
       type: String,
       default: 'id'
     },
     lblfunc:{
       type: [String,Function],
       default: null
     },
     required: { 
       type: Boolean, 
       default: false 
     } 
   }, 
   data() { 
     return { 
       theme: 'AdminLte', 
       name: 'TypeAhead',
       selectvalue: 0,
       selectlabel: '' 
     }; 
   }, 
   methods: { 
      updateValue(value) { 
        console.log('----input typeahead---',value); 
        this.$emit('input', value);
      } 
   }, 
   computed: {
      lists(){
          if(this.datas){
            return this.datas.map(item => {
                let label = '';
                if(typeof(this.lblfunc) == 'string'){
                  label = item[this.lblfunc];
                } else if(typeof(this.lblfunc) == 'function') {
                  label = this.lblfunc(item);
                }
                return {
                    id: item[this.valkey],
                    label: label
                    // label: item[this.label]
                }
            });
          } return [];
      }
   }, 
   created() { 
     console.log(this.name + 'component is created'); 
   }, 
   mounted() {
      this.autocompleteRef = autocomplete({
          input: this.$refs.inputRef,
          minLength: 1,
          emptyMsg: 'No matched items found',

          fetch: (text, update)=>{
              console.log('-----start---autocomplete---',this.lists);
              const pattern = new RegExp(text, 'i')
              const suggestions = this.lists.filter(({ label }) => {
                    return pattern.test(label)
                })
              update(suggestions)
          },

          onSelect: ({ id, label }) => {
              this.selectid = id
              this.selectvalue = label
              this.updateValue(id)
          }
      })
   },
   beforeDestroy() {
      this.autocompleteRef.destroy()
   },
   components: {} 
 }; 