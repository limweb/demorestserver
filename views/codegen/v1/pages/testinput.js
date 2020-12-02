export default { 
    template: `
    <dvi class="flex" :class="$attrs?.class">
         <table class="table w-full">
          <thead>
                <tr>
                  <th class="w-2/12">Name</th>
                  <th class="w-4/12">Component</th>
                  <th class="w-6/12">value</th>
                </tr>
          </thead>
          <tbody>
              <tr v-for="(comp,idx) in comps">
                <td>{{comp.is}} :</td>
                <td><component class="text-green" :is="comp.is" v-model="comp.value"  v-bind="comp" /></td>
                <td>{{comp.value}}</td>
              </tr>
          </tbody>
        </table>
      <section>
      </section>  
      
        <pre>{{comps}}</pre>
    </div>`,
    mixins: [], 
    data() { 
      return { 
          thaiadd:'',
          testchks:[],
          picked:'',
          theme: 'AdminLte', 
          name: 'TestInput', 
          test:'Test',
          comps:[
            // {  is:'input_checkbox'      , value: false, class:'' ,  style:'',  id:'input_checkbox', label:'อาหารกลางวัน', name:'input_checkbox', placeholder:'input_checkbox'},
            // {  is:'checkbox_group'      , value:[],     values:[{ value:'A' , label: 'AAAAAA' },{ value:'B' , label: 'BBBBBB' },{ value:'C' , label: 'CCCCCC' },],   class:'' ,style:'',  id:'checkbox_group',name:'checkbox_group'},
            // {  is:'checkbox_group'      , value:[],     values:[{ value:'A' , label: 'AAAAAA' },{ value:'B' , label: 'BBBBBB' },{ value:'C' , label: 'CCCCCC' },],   class:'' ,style:'',  id:'checkbox_group',name:'checkbox_group'},
            // {  is:'radio_group' , value:'',  values:[{ value:'A' , label: 'AAAAAA' },{ value:'B' , label: 'BBBBBB' },{ value:'C' , label: 'CCCCCC' },], class:'flex-col' ,style:'',  id:'radio_group', name:'radio_group'},
            // {  is:'radio_group' , value:'',  values:[{ value:'A' , label: 'AAAAAA' },{ value:'B' , label: 'BBBBBB' },{ value:'C' , label: 'CCCCCC' },], class:'flex-col' ,style:'',  id:'radio_group', name:'radio_group1'},
            // {  is:'radio_group' , value:'',  values:[{ value:'M',  label: 'Male' }, { value:'F',  label: 'Female' }, { value:'O',  label: 'Other' },], class:'flex-col' ,style:'',  id:'radio_group', name:'radio_group3'},
            // {  is:'input_radio' , value: this.picked, id:'input_radio',  name:'input_radio', label:'input_radio'},
            // {  is:'input_radio' , value: this.picked, id:'input_radio1', name:'input_radio', label:'input_radio'},
            // {  is:'gender' , value:'',  values:['A','B','C'], class:'flex-col' ,style:'',  id:'radio_group', name:'radio_group2'},
            // {  is:'input_text' , value:'', class:'' ,style:'',  id:'input_text', name:'input_text' ,label:'input_text', placeholder:'input_text'},
            // {  is:'input_number' , value:'', class:'' ,style:'',  id:'input_number', name:'input_number' ,label:'input_number', placeholder:'input_number'},
            // {  is:'input_email' , value:'', class:'' ,style:'',  id:'input_email', name:'input_email' ,label:'input_email', placeholder:'input_email'},
            // {  is:'input_image' , value:'', class:'' ,style:'',  id:'input_image', name:'input_image' ,label:'input_image', placeholder:'input_image'},
            // {  is:'input_password' , value:'', class:'' ,style:'',  id:'input_password', name:'input_password' ,label:'input_password', placeholder:'input_password'},
            // {  is:'input_range' , value:'', class:'' ,style:'',  id:'input_range', name:'input_range',label:'input_range', placeholder:'input_range'},
            // {  is:'thaiaddress' , value:'', class:'' ,style:'',     id:'thaiaddress'}, //ห้ามมี id 
            // {  is:'thaiaddressone' , value:'', class:'' ,style:''},
            // {  is:'Label'               , value:'xxxx', class:'' ,style:'',  id:'Label'               , label: 'Labeltest' , placeholder:'Label'},
            // {  is:'text_span'           , value:'xxxx', class:'' ,style:'',  id:'text_span'           , label: 'text_span' , placeholder:'text_span'},
            // {  is:'input_text_readonly' , value:'xxxx', class:'border border-black' ,style:'',  id:'input_text_readonly' , label: 'input_text_readonly' , placeholder:'input_text_readonly'},
            // {  is:'input_tel' , value:'', class:'' ,style:'',  id:'input_tel', name:'input_tel',label:'input_tel', placeholder:'input_tel'},
            // {  is:'input_url' , value:'', class:'' ,style:'',  id:'input_url', name:'input_url',label:'input_url', placeholder:'input_url'},
            // {  is:'input_file' , value:'', class:'' ,style:'',  id:'input_file', name:'input_file',label:'input_file', placeholder:'input_file'},
            // {  is:'input_upload' , value:'', class:'' ,style:'',  id:'input_upload', name:'input_upload',label:'input_upload', placeholder:'input_upload'},
            // {  is:'input_uploads' , value:'', class:'' ,style:'',  id:'input_uploads', name:'input_uploads',label:'input_uploads', placeholder:'input_uploads'},
            // {  is:'input_time' , value:'', class:'' ,style:'',   id:'input_time', name:'input_time' , label:'input_time', placeholder: 'input_time'},
            // {  is:'input_date' , value:'', class:'' ,style:'',   id:'input_date', name:'input_date' , label:'input_date', placeholder: 'input_date'},
            // {  is:'input_week' , value:'', class:'' ,style:'',   id:'input_week', name:'input_week' , label:'input_week', placeholder: 'input_week'},
            // {  is:'input_month' , value:'', class:'' ,style:'',   id:'input_month', name:'input_month' , label:'input_month', placeholder: 'input_month'},
            // {  is:'v2datepicker' , value:'', class:'' ,style:'',  id:'v2datepicke',name:'v2datepicke',label:'v2datepicke',placeholder:'v2datepicke'},
            // {  is:'v2daterangpicker' , value:'', class:'' ,style:'',  id:'v2daterangpicke', name:'v2daterangpicke',label:'v2daterangpicke',placeholder:'v2daterangpicke'},
            // {  is:'v2datetimepicker' , value:'', class:'' ,style:'',  id:'v2datetimepicke', name:'v2datetimepicke',label:'v2datetimepicke',placeholder:'v2datetimepicke'},
            // {  is:'v2yearpicker' , value:'', class:'' ,style:'',  id:'v2yearpicke', name:'v2yearpicke',label:'v2yearpicke',placeholder:'v2yearpicke'},
            // {  is:'v2monthpicker' , value:'', class:'' ,style:'',  id:'v2monthpicke', name:'v2monthpicke',label:'v2monthpicke',placeholder:'v2monthpicke'},
            // {  is:'v2weekpicker' , value:'', class:'' ,style:'',  id:'v2weekpicke', name:'v2weekpicke',label:'v2weekpicke',placeholder:'v2weekpicke'},
            // {  is:'Textarea' , value:'', class:'' ,style:'',  id:'Textarea', name:'Textarea', label:'Textarea', placeholder:'Textarea'},
            // {  is:'toggle' , value:'', class:'' ,style:'',  id:'toggle',name:'toggle', label:'toggle'},
              { is:'input_datetime' , value: ''        , values:[                                                                                               ], class:''            ,style:'', id:'input_datetime' },
              { is:'select_html'    , value: 'B'       , values:[{ value: 'A' , label:'AAAAAA' },{ value: 'B' , label:'BBBBBB' },{ value: 'C' , label:'CCCCCC' }], class:''            ,style:'', id:'select_html'    },
              { is:'select_multi'   , value: []        , values:[{ value: 'A' , label:'AAAAAA' },{ value: 'B' , label:'BBBBBB' },{ value: 'C' , label:'CCCCCC' }], class:''            ,style:'', id:'select_multi'   },
              { is:'input_id'       , value: '1'       , values:[                                                                                               ], class:''            ,style:'', id:'input_id'       },
              { is:'input_day'      , value: 'Tuesday' , values:[                                                                                               ], class:''            ,style:'', id:'input_day'      },
              { is:'input_daynum'   , value: '1'       , values:[                                                                                               ], class:''            ,style:'', id:'input_daynum'   },
              { is:'input_year'     , value: '2015'    , values:[                                                                                               ], class:'bg-gree-200' ,style:'', id:'input_year'     },
              {  is:'htmleditor'    , value:'', class:'' ,style:'',  id:'htmleditor'},
          ],
          datas:[
              // {  is:'checkbox_group_relation' , value: [], class:'' ,style:'',  id:'checkbox_group_relation'},
              // {  is:'radio_group_relation' , value:'', class:'' ,style:'',  id:'radio_group_relation'},
              // {  is:'select_relation' , value:'', class:'' ,style:'',  id:'select_relation'},
              // {  is:'select_multi_relation' , value:'', class:'' ,style:'',  id:'select_multi_relation'},
              // {  is:'json_editor' , value:'', class:'' ,style:'',  id:'json_editor'},
              // {  is:'maskdown_editor' , value:'', class:'' ,style:'',  id:'maskdown_editor'},
              // {  is:'input_color' , value:'', class:'' ,style:'',  id:'input_color'},
              // {  is:'colorpicker' , value:'', class:'' ,style:'',  id:'colorpicker'},
              // {  is:'test' , value:'', class:'' ,style:'',  id:'test'},
              // {  is:'editabl' , value:'', class:'' ,style:'',  id:'editabl'},
              // {  is:'v-datalis' , value:'', class:'' ,style:'',  id:'v'},
              // {  is:'v-typeahead' , value:'', class:'' ,style:'',  id:'v'},
              // {  is:'twtypeaheadbasi' , value:'', class:'' ,style:'',  id:'twtypeaheadbasi'},
          ]
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {}, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 