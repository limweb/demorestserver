        import Shortanswer from './forms/shortanswer.js';
        import Paragraph from './forms/paragraph.js';
        import Multiplechoice from './forms/multiplechoice.js';
        import Checkboxes from './forms/checkboxes.js';
        import Dropdowntype from './forms/dropdowntype.js';
        import Fileupload from './forms/fileupload.js';
        import Linescale from './forms/linescale.js';
        import Multipolechoicegrid from './forms/multipolechoicegrid.js';
        import Checkboxgrid from './forms/checkboxgrid.js';
        import Datetype from './forms/datetype.js';
        import Timetype from './forms/timetype.js';
        import Monthtype from './forms/monthtype.js';
        import Yeartype from './forms/yeartype.js';

        import Tagsedit from './tags/tagsedit.js';
        import Tagsview from './tags/tagsview.js';
        import Totop  from "./Totop/Totop.js";
        import VueAvatar from "./avata/VueAvatar.js";
        import VueAvatarEditor from "./avata/VueAvatarEditor.js";
        import Avata from "./avata/Avata.js";
        import Avatax from "./avata/Avatax.js";
        import Label  from "./Label/Label.js";
        import Text_span  from "./Text_span/Text_span.js";
        import Input_text_readonly  from "./Input_text_readonly/Input_text_readonly.js";
        import Toggle  from "./Toggle/Toggle.js";
        import Input_checkbox  from "./Input_checkbox/Input_checkbox.js";
        import Input_radio  from "./Input_radio/Input_radio.js";
        import Checkbox_group  from "./Checkbox_group/Checkbox_group.js";
        import CheckboxGtf  from "./Checkbox_group/CheckboxGtf.js";
        import Dropf  from "./dropfile/dropf.js";
        import Radio_group  from "./Radio_group/Radio_group.js";
        import Gender  from "./Radio_group/gender.js";
        import Checkbox_group_relation  from "./Checkbox_group_relation/Checkbox_group_relation.js";
        import Radio_group_relation  from "./Radio_group_relation/Radio_group_relation.js";
        import Select_html  from "./Select/Select.js";
        import Datalist  from "./Select/Datalist.js";
        import Typeahead  from "./Select/Typeahead.js";
        import Select_multi  from "./Select_multi/Select_multi.js";
        import Select_relation  from "./Select_relation/Select_relation.js";
        import Select_multi_relation  from "./Select_multi_relation/Select_multi_relation.js";
        import Input_text  from "./Input_text/Input_text.js";
        import Input_number  from "./Input_number/Input_number.js";
        import Input_id  from "./Input_id/Input_id.js";
        import Input_email  from "./Input_email/Input_email.js";
        import Input_image  from "./Input_image/Input_image.js";
        import Input_password  from "./Input_password/Input_password.js";
        import Input_range  from "./Input_range/Input_range.js";
        import Input_tel  from "./Input_tel/Input_tel.js";
        import Input_url  from "./Input_url/Input_url.js";
        import Input_upload  from "./Input_upload/Input_upload.js";
        import Input_uploads  from "./Input_uploads/Input_uploads.js";
        import Input_time  from "./Input_time/Input_time.js";
        import Input_date  from "./Input_date/Input_date.js";
        import Input_day  from "./Input_day/Input_day.js";
        import Input_daynum  from "./Input_day/Input_daynum.js";
        import Input_week  from "./Input_week/Input_week.js";
        import Input_month  from "./Input_month/Input_month.js";
        import Input_year  from "./Input_year/Input_year.js";
        import Input_datetime  from "./Input_datetime/Input_datetime.js";

        import XModal from "./modal/modal.js";

        import Textarea  from "./Textarea/Textarea.js";
        import Htmleditor  from "./Htmleditor/Htmleditor.js";
        import Htmlbubbleeditor  from "./Htmleditor/Htmlbubbleeditor.js";

        import Input_color  from "./Input_color/Input_color.js";
        import Editable  from "./Editable/Editable.js";
        
        import Thaiaddress from "./thaiaddress/Thaiaddress.js";
        import Thaiaddressone from "./thaiaddress/Thaiaddressone.js";
        import Twtypeaheadbasic from "./twitter/Typeahead_basic.js";

        import v2Datepicker from "./datepicker.js";
        import v2Daterangpicker from "./daterangpicker.js";
        import v2Datetimepicker from "./datetimepicker.js";
        import v2Yearpicker from "./yearpicker.js";
        import v2Monthpicker from "./monthpicker.js";
        import v2Weekpicker from "./weekpicker.js";
        import JsonExcel from "./JsonExcel.js";
        import Printa4table from "./Printa4table.js";

        export default  {
            'shortanswer': Shortanswer,
            'paragraph': Paragraph,
            'multiplechoice': Multiplechoice,
            'checkboxes': Checkboxes,
            'dropdowntype': Dropdowntype,
            'fileupload': Fileupload,
            'linescale': Linescale,
            'multipolechoicegrid': Multipolechoicegrid,
            'checkboxgrid': Checkboxgrid,
            'datetype': Datetype,
            'timetype': Timetype,
            'monthtype': Monthtype,
            'yeartype': Yeartype,


            'avatar':Avata,
            'avatarx':Avatax,
            'vueavatar': VueAvatar,
            'vueavatareditor': VueAvatarEditor,
            'printa4table' : Printa4table,
            'downloadExcel': JsonExcel,
            'Label' : Label,
            'text_span' : Text_span,
            'input_text_readonly' : Input_text_readonly,
            'toggle' : Toggle,
            'totop':Totop,
            'input_checkbox' : Input_checkbox,
            'input_radio' : Input_radio,
            'checkbox_group' : Checkbox_group,
            'checkboxgtf' : CheckboxGtf,
            'radio_group' : Radio_group,
            'gender' : Gender,
            'checkbox_group_relation' : Checkbox_group_relation,
            'radio_group_relation' : Radio_group_relation,
            'select_html' : Select_html,
            'select_multi' : Select_multi,
            'select_relation' : Select_relation,
            'select_multi_relation' : Select_multi_relation,
            'input_text' : Input_text,
            'input_number' : Input_number,
            'input_email' : Input_email,
            'input_image' : Input_image,
            'input_password' : Input_password,
            'input_range' : Input_range,
            'input_tel' : Input_tel,
            'input_url' : Input_url,
            'xmodal':XModal,
            'input_file' : Input_upload,
            'input_upload' : Input_upload,
            
            'input_uploads' : Input_uploads,
            'input_files' : Input_uploads,
            
            'input_time' : Input_time,
            'input_date' : Input_date,
            'input_week' : Input_week,
            'input_month' : Input_month,
            'input_datetime' : Input_datetime,
            'Textarea' : Textarea,
            'htmleditor' : Htmleditor,
            'htmlbubbleeditor' : Htmlbubbleeditor,
            'input_color' : Input_color,
            'input_id': Input_id,
            'input_day': Input_day,
            'input_daynum': Input_daynum,
            'input_year': Input_year,
            'editable': Editable,
            'dropf':Dropf,
            // 'v-select': VueSelect.VueSelect,
            'v-datalist': Datalist,
            'v-typeahead': Typeahead,
            'thaiaddress': Thaiaddress,
            'thaiaddressone': Thaiaddressone,
            "tagsedit":Tagsedit,
            "tagsview":Tagsview,
            'twtypeaheadbasic': Twtypeaheadbasic,
            'v2datepicker': v2Datepicker,
            'v2daterangpicker': v2Daterangpicker,
            'v2datetimepicker': v2Datetimepicker,
            'v2yearpicker': v2Yearpicker,
            'v2monthpicker': v2Monthpicker,
            'v2weekpicker': v2Weekpicker,
        }
