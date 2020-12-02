export default { 
    template: `
    <dvi class="flex flex-col items-center">
      <div class="w-8/12 ">
         <table class="table my-4 border border-black shadow">
            <thead>
                  <tr>
                    <th class="w-2/12">Name</th>
                    <th class="w-5/12 border border-black min-w-max">Component</th>
                    <th class="w-2/12 border border-black">value</th>
                    <th class="w-3/12">JSON</th>
                  </tr>
            </thead>
            <tbody>
                <tr v-for="(comp,idx) in comps" class="px-4">
                  <td>{{comp.is}} :</td>
                  <td class="border border-black "><div class="w-full"><component class="text-green" :is="comp.is" v-model="comp.value"  v-bind="comp" /><div></td>
                  <td class="border border-black ">
                      <div v-if="comp.is == 'htmleditor'" v-html="comp.value" />
                      <pre v-else class="text-wrap">{{comp.value}}</pre>
                  </td>
                  <td><div class="w-full text-wrap" style="min-height:250px; max-width:250px;display: inline-block; overflow: scroll;">{{comp}}</div></td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>`,
    mixins: [], 
    data() { 
      return { 
          items: [{ value:'A' , label: 'AAAAAA' },{ value:'B' , label: 'BBBBBB' },{ value:'C' , label: 'CCCCCC' }],
          thaiadd:'',
          testchks:[],
          picked:'',
          theme: 'AdminLte', 
          name: 'TestInput', 
          test:'C',
          comps:[
            { "is": "checkbox_group", "value": [], "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "", "id": "checkbox_group", "name": "checkbox_group" },
            { "is": "checkbox_group", "value": [], "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "", "id": "checkbox_group1", "name": "checkbox_group1" },
            { "is": "checkbox_group_relation", "valkey": "value", "lblkey": "label", "value": [], "class": "flex-col", "style": "", "id": "checkbox_group_relation", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }] },
            { "is": "editable", "value": "ssss", "class": "", "style": "", "contenteditable": true, "id": "editable" },
            { "is": "gender", "value": "", "values": ["A", "B", "C"], "class": "flex-col", "style": "", "id": "radio_group", "name": "radio_group2" },
            { "is": "htmlbubbleeditor", "value": "<h1>test</h1>", "class": "h-40", "id": "htmleditor" },
            { "is": "htmleditor", "value": "<h1>test</h1>", "class": "h-40", "id": "htmleditor" },
            { "is": "input_checkbox", "value": false, "class": "", "style": "", "id": "input_checkbox", "label": "อาหารกลางวัน", "name": "input_checkbox", "placeholder": "input_checkbox" },
            { "is": "input_color", "value": "", "class": "", "style": "", "id": "input_color" },
            { "is": "input_date", "value": "", "class": "", "style": "", "id": "input_date", "name": "input_date", "label": "input_date", "placeholder": "input_date" },
            { "is": "input_datetime", "value": "", "values": [], "class": "", "style": "", "id": "input_datetime" },
            { "is": "input_day", "value": "Tuesday", "values": [], "class": "", "style": "", "id": "input_day" },
            { "is": "input_daynum", "value": "1", "values": [], "class": "", "style": "", "id": "input_daynum" },
            { "is": "input_email", "value": "", "class": "", "style": "", "id": "input_email", "name": "input_email", "label": "input_email", "placeholder": "input_email" },
            { "is": "input_file", "value": "", "class": "", "style": "", "id": "input_file", "name": "input_file", "label": "input_file", "placeholder": "input_file" },
            { "is": "input_id", "value": "1", "values": [], "class": "", "style": "", "id": "input_id" },
            { "is": "input_image", "value": "`https://images.unsplash.com/photo-1455656678494-4d1b5f3e7ad4?w:1080`", "width": "900", "height": "600", "placeholder": "https://images.unsplash.com/photo-1455656678494-4d1b5f3e7ad4?w:30", "srcset": "https://images.unsplash.com/photo-1455656678494-4d1b5f3e7ad4?w:320 320w, https://images.unsplash.com/photo-1455656678494-4d1b5f3e7ad4?w:480 480w, https://images.unsplash.com/photo-1455656678494-4d1b5f3e7ad4?w:800 800w", "sizes": "(max-width: 320px) 280px, (max - width: 480 px) 440 px, (max - width: 800 px) 760 px, 1080 px ", "alt": "Beautiful forest" },
            { "is": "input_month", "value": "", "class": "", "style": "", "id": "input_month", "name": "input_month", "label": "input_month", "placeholder": "input_month" },
            { "is": "input_number", "value": "", "class": "", "style": "", "id": "input_number", "name": "input_number", "label": "input_number", "placeholder": "input_number" },
            { "is": "input_password", "value": "", "class": "", "style": "", "id": "input_password", "name": "input_password", "label": "input_password", "placeholder": "input_password" },
            { "is": "input_radio", "id": "input_radio", "name": "input_radio", "label": "input_radio" },
            { "is": "input_radio", "id": "input_radio1", "name": "input_radio", "label": "input_radio" },
            { "is": "input_range", "value": "", "class": "", "style": "", "max": 20, "minx": 0, "id": "input_range", "name": "input_range", "label": "input_range", "placeholder": "input_range" },
            { "is": "input_tel", "value": "", "class": "", "style": "", "id": "input_tel", "name": "input_tel", "label": "input_tel", "placeholder": "input_tel" },
            { "is": "input_text", "value": "", "class": "", "style": "", "id": "input_text", "name": "input_text", "label": "input_text", "placeholder": "input_text" },
            { "is": "input_text_readonly", "value": "xxxx", "class": "border border-black", "style": "", "id": "input_text_readonly", "label": "input_text_readonly", "placeholder": "input_text_readonly" },
            { "is": "input_time", "value": "", "class": "", "style": "", "id": "input_time", "name": "input_time", "label": "input_time", "placeholder": "input_time" },
            { "is": "input_upload", "value": "", "class": "", "style": "", "id": "input_upload", "name": "input_upload", "label": "input_upload", "placeholder": "input_upload" },
            { "is": "input_uploads", "value": "", "class": "", "style": "", "id": "input_uploads", "name": "input_uploads", "label": "input_uploads", "placeholder": "input_uploads" },
            { "is": "input_url", "value": "", "class": "", "style": "", "id": "input_url", "name": "input_url", "label": "input_url", "placeholder": "input_url" },
            { "is": "input_week", "value": "", "class": "", "style": "", "id": "input_week", "name": "input_week", "label": "input_week", "placeholder": "input_week" },
            { "is": "input_year", "value": "2015", "values": [], "class": "bg-gree-200", "style": "", "id": "input_year" },
            { "is": "Label", "value": "xxxx", "class": "", "style": "", "id": "Label", "label": "Labeltest", "placeholder": "Label" },
            { "is": "radio_group", "value": "", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "flex-col", "style": "", "id": "radio_group", "name": "radio_group" },
            { "is": "radio_group", "value": "", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "", "id": "radio_group", "name": "radio_group1" },
            { "is": "radio_group", "value": "", "values": [{ "value": "M", "label": "Male" }, { "value": "F", "label": "Female" }, { "value": "O", "label": "Other" }], "class": "flex-col", "style": "", "id": "radio_group", "name": "radio_group3" },
            { "is": "radio_group_relation", "valkey": "value", "lblkey": "label", "value": [], "class": "", "style": "", "name": "rdg_x", "id": "radio_group_relation", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }] },
            { "is": "radio_group_relation", "valkey": "value", "lblkey": "label", "value": [], "class": "flex-col", "style": "", "name": "rdg_xx", "id": "radio_group_relationx", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }] },
            { "is": "select_html", "value": "B", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "", "id": "select_html" },
            { "is": "select_multi", "value": [], "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "", "id": "select_multi" },
            { "is": "select_multi_relation", "value": [], "class": "flex-col", "style": "", "id": "radio_group_relationx", "valkey": "value", "lblkey": "label", "name": "rdg_xx", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }] },
            { "is": "select_relation", "value": [], "class": "flex-col", "style": "", "id": "radio_group_relationx", "valkey": "value", "lblkey": "label", "name": "rdg_xx", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }] },
            { "is": "text_span", "value": "xxxx", "class": "", "style": "", "id": "text_span", "label": "text_span", "placeholder": "text_span" },
            { "is": "Textarea", "value": "", "class": "", "style": "", "id": "Textarea", "name": "Textarea", "label": "Textarea", "placeholder": "Textarea" },
            { "is": "thaiaddress", "value": "", "class": "", "style": "", "id": "thaiaddress" },
            { "is": "thaiaddressone", "value": "", "class": "", "style": "" },
            { "is": "toggle", "value": "", "class": "", "style": "", "id": "toggle", "name": "toggle", "label": "toggle" },
            { "is": "twtypeaheadbasic", "value": "", "class": "", "style": "", "datas": ["Alabama", "Alaska", "Arizona", "Arkansas", "California"] },
            { "is": "v-datalist", "value": "B", "values": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "", "id": "v-datalist" },
            { "is": "v-typeahead", "value": "", "valkey": "value", "lblfunc": "label", "placeholder": "เลือกรายการสินค้า", "datas": [{ "value": "A", "label": "AAAAAA" }, { "value": "B", "label": "BBBBBB" }, { "value": "C", "label": "CCCCCC" }], "class": "", "style": "" },
            { "is": "v2datepicker", "value": "", "class": "", "style": "", "id": "v2datepicke", "name": "v2datepicke", "label": "v2datepicke", "placeholder": "v2datepicke" },
            { "is": "v2daterangpicker", "value": "", "class": "", "style": "", "id": "v2daterangpicke", "name": "v2daterangpicke", "label": "v2daterangpicke", "placeholder": "v2daterangpicke" },
            { "is": "v2datetimepicker", "value": "", "class": "", "style": "", "id": "v2datetimepicke", "name": "v2datetimepicke", "label": "v2datetimepicke", "placeholder": "v2datetimepicke" },
            { "is": "v2monthpicker", "value": "", "class": "", "style": "", "id": "v2monthpicke", "name": "v2monthpicke", "label": "v2monthpicke", "placeholder": "v2monthpicke" },
            { "is": "v2weekpicker", "value": "", "class": "", "style": "", "id": "v2weekpicke", "name": "v2weekpicke", "label": "v2weekpicke", "placeholder": "v2weekpicke" },
            { "is": "v2yearpicker", "value": "", "class": "", "style": "", "id": "v2yearpicke", "name": "v2yearpicke", "label": "v2yearpicke", "placeholder": "v2yearpicke" }
          ],
          datas:[]
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    components:{} 
}; 