// <thaiaddress v-model="thaiadd" />
export default { 
    template: `
        <div>
            <div :id="uuid" class="demo" :style="{display: isShow }" autocomplete="off" uk-grid >
                <div class="uk-width-1-2@m">
                    <label class="">ตำบล / แขวง</label>
                    <input name="district" class="uk-input uk-width-1-1"
                    type="text" :value="value.district" >
                </div>
                <div class="uk-width-1-2@m">
                    <label class="">อำเภอ / เขต</label>
                    <input name="amphoe" class="uk-input uk-width-1-1"
                    type="text" :value="value.amphoe">
                </div>
                <div class="uk-width-1-2@m">
                    <label class="">จังหวัด</label>
                    <input name="province" class="uk-input uk-width-1-1"
                    type="text" :value="value.province">
                </div>
                <div class="uk-width-1-2@m">
                    <label class="">รหัสไปรษณีย์</label>
                    <input name="zipcode" class="uk-input uk-width-1-1"
                    type="text" :value="value.zipcode">
                </div>
            </div>
        </div>
    `, 
    mixins: [],
    props:{
        value:{
            type: Object,
            default:{
                amphoe: "",
                district: "",
                province: "",
                zipcode: "",
            }
        }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Thai Address', 
          uuid:'idx',
          isShow: false,
      }; 
    }, 
    methods: {}, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);
      this.loader ='loader'+Math.random().toString(36).slice(-6);
    }, 
    mounted() {
            $.Thailand({
                database: '/jquery.Thailand.js/database/db.json', 
                $district: $('#'+this.uuid+' [name="district"]'),
                $amphoe: $('#'+this.uuid+' [name="amphoe"]'),
                $province: $('#'+this.uuid+' [name="province"]'),
                $zipcode: $('#'+this.uuid+' [name="zipcode"]'),

                onDataFill: (data) => {
                    console.info('Data Filled', data);
                    this.$emit('input',data);
                },

                onLoad: () => {
                    console.info('Autocomplete is ready!');
                    this.isShow = true;
                }
            });
            $('#'+this.uuid+' [name="district"]').change((event)=>{
                console.log('ตำบล',event.target.value);
            });
            $('#'+this.uuid+' [name="amphoe"]').change((event)=>{
                console.log('อำเภอ', event.target.value);
            });
            $('#'+this.uuid+' [name="province"]').change((event)=>{
                console.log('จังหวัด', event.target.value);
            });
            $('#'+this.uuid+' [name="zipcode"]').change((event)=>{
                console.log('รหัสไปรษณีย์', event.target.value);
            });
    }, 
    computed: {}, 
    components:{} 
}; 

