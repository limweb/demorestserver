// <thaiaddressone v-model="thaiadd" />
export default { 
    template: `
    <div :id="uuid" class="demo" :style="{ display: isShow }" autocomplete="off">
        <small>ลองกรอกอย่างใดอย่างหนึ่ง ตำบล, อำเภอ, จังหวัด หรือ รหัสไปรษณีย์</small>
        <input name="search" class="uk-input uk-width-1-1" type="text"
        :placeholder="placeholder">
        <div :id="uuid+'-output'" class="uk-margin"></div>
    </div>
    `, 
    mixins: [], 
    props:{
        value:{
            uuid:'',
            type: Object,
            default:()=>{ 
                return {
                    amphoe: "",
                    district: "",
                    province: "",
                    zipcode: "",
                }}
        },
        placeholder:{
            type:String,
            default:'ค้นหาที่อยู่ของคุณ'
        }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Thai Address one',
          isShow: false
      }; 
    }, 
    methods: {}, 
    created() { 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {
          this.$nextTick(()=>{ 
                $.Thailand({
                    database: '/jquery.Thailand.js/database/db.json', 
                    $search: $('#'+ this.uuid+' [name="search"]'),
                    onDataFill: (data)=> {
                        console.log('----onDataFill---',this.value,data)
                        this.value = data;
                        this.$emit('input',data)
                        var html = '<b>ที่อยู่:</b> ตำบล' + data.district + ' อำเภอ' + data.amphoe + ' จังหวัด' + data.province + ' ' + data.zipcode;
                        $('#'+this.uuid+'-output').prepend('<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a>' + html + '</div>');
                    },
                    onLoad: () => {
                            console.info('thai address one line aAutocomplete is ready!');
                            this.isShow = true;
                    }
                });
          });
    }, 
    computed: {
    },
    components:{} 
}; 


