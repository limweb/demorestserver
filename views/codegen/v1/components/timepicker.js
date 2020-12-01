import Datepicker from 'https://cdn.skypack.dev/vue2-datepicker';
export default { 
    template: `
    <Datepicker   
            format="HH:mm"
            type="time"
            valueType="format"
            placeholder="Select time"
            v-model="mydate"
            :lang="lang"
            @change="updatedate"
    />
    `, 
    mixins: [], 
    props:['value'],
    data() { 
      return { 
          lang: {
                  formatLocale: {
                      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                      monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                      weekdays: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                      weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                      weekdaysMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                      firstDayOfWeek: 0,
                      firstWeekContainsDate: 1,
                      monthBeforeYear: false,
              }
          },
          theme: 'AdminLte', 
          name: 'Datepicker', 
          mydate: this.value
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    methods: {
        updatedate(){
            console.log('change--->',this.mydate);
            this.$emit('input',this.mydate)
        }
    }, 
    computed: {}, 
    components:{Datepicker} 
}; 