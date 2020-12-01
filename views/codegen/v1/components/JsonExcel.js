import  xlsx from "../mixins/xlsx.js";
export default {
    mixins:[xlsx],
    template: `<div
		:id="id_name"
		@click="generate">
		<slot>
			{{button_text}}
		</slot>
	</div>
    `,
    data: function() {
        return {
            animate: true,
            animation: ""
        };
    },
    props: {
        type: {
            type: String,
            default: "xls"
        },
        button_text: {
            type: String,
            default: "Download Excel"
        },
        data: {
            type: Array,
            required: true
        },
        fields: {
            type: Object,
            required: true
        },
        name: {
            type: String,
            default: "data.xls"
        },
        meta: {
            type: Array,
            default: () => []
        }
    },
    created: function() {},
    computed: {
        id_name: function() {
            var now = new Date().getTime();
            return "export_" + now;
        }
    },
    methods: {
    }
};




