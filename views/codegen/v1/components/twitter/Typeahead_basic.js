// states: ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
// 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
// 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
// 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
// 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
// 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
// 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
// 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
// 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
// ],
// state: '',

// <pre>{{state}}</pre>
// <twtypeaheadbasic
// :datas="states"
// v-model="state"
// placeholder="Select รัฐ ของ USA" />

export default { 
    template: `
        <div id="the-basics" class="w-full h-10 border border-black">
            <input class="w-full h-10 p-2 typeahead" type="text" :placeholder="placeholder">
        </div>
    `,
    props:{
        datas:{
            type:Array,
            default:[]
        },
        value:{
            type:String,
            default:''
        },
        placeholder:{
            type:String,
            default: 'Twitter TypeAhead Basic'
        }
    },
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Twitter TypeAhead Basic',
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
        substringMatcher(strs) {
            return (q, cb) => {
                var matches, substrRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, (i, str) => {
                    if (substrRegex.test(str)) {
                    matches.push(str);
                    }
                });

                cb(matches);
            };
        },
        starttypeahead(){
            $('#the-basics .typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
                },
                {
                name: 'datas',
                source: this.substringMatcher(this.datas),
                display: function(item) {
                //   console.info('display---->',item);
                  return item
                },
                onComplete:(data)=>{
                    console.log('---onComplete---',data);
                },
                onLoad: function () {
                    console.log('---onLoad---');
                },
                onDataFill: function () {
                    console.log('---on Data Fill--');
                },
            })
            .on('typeahead:selected', ($e, data) => {
                console.log('---s elected---',data);
                this.$emit('input',data);
            });
        }
    }, 
    mounted() {
        this.starttypeahead();
    }, 
    computed: {}, 
    components:{} 
}; 