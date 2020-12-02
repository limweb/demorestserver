// <thaiaddress v-model="thaiadd" />
export default { 
    template: `
        <div>
            <div :id="uuid" class="w-full px-2 py-2 border border-black " :style="{display: isShow }" autocomplete="off" uk-grid >
                <div class="flex">
                    <div  class="w-2/6 mt-2 mr-3 text-lg text-right">ตำบล / แขวง</div>
                    <div  class="w-4/6"><input name="district" class="w-full p-2 border-b border-black"
                    type="text" :value="value.district" ></div>
                </div>
                <div class="flex">
                    <div  class="w-2/6 mt-2 mr-3 text-lg text-right">อำเภอ / เขต</div>
                    <div  class="w-4/6"><input name="amphoe" class="w-full p-2 border-b border-black"
                    type="text" :value="value.amphoe"></div>
                </div>
                <div class="flex">
                    <div class="w-2/6 mt-2 mr-3 text-lg text-right">จังหวัด</div>
                    <div class="w-4/6"><input name="province" class="w-full p-2 border-b border-black"
                    type="text" :value="value.province"></div>
                </div>
                <div class="flex"> 
                    <div  class="w-2/6 mt-2 mr-3 text-lg text-right">รหัสไปรษณีย์</div>
                    <div  class="w-4/6"><input name="zipcode" class="w-full p-2 border-b border-black"
                    type="text" :value="value.zipcode"></div>
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

