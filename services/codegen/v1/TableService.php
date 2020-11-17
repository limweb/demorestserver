<?php

//----------------------------------------------
//FILE NAME:  TableService.php gen for Servit Framework Service
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-11-17(Tue)  00:31:30 

//----------------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;

class TableService 
{
    private  $componemts = [
        "label",
        "text_span",
        "input_text_readonly",

        "toggle",
        "input_checkbox",
        "input_radio",
        "checkbox_group",
        "radio_group",
        "checkbox_group_relation",
        "radio_group_relation",

        "select",
        "select_multi",
        "select_relation",
        "select_multi_relation",

        "input_text",
        "input_number",
        "input_email",
        "input_image",
        "input_number",
        "input_password",
        "input_range",
        "input_tel",
        "input_url",
        "input_file",
        "input_upload",
        "input_uploads",

        "input_time",
        "input_date",
        "input_week",
        "input_month",
        "input_datetime",
        "datepicker",

        "textarea",
        "htmleditor",
        "json_editor",
        "maskdown_editor",

        "input_color",
        "colorpicker",
    ];

    private  $numbertype = [
        "tinyint" => 'input_number', //	A very small integer
        "smallint" => 'input_number', //	A small integer
        "mediumint" => 'input_number', //	A medium-sized integer
        "int" => 'input_number', //	A standard integer
        "bigint" => 'input_number', //	A large integer
        "decimal" => 'input_number', //	A fixed-point number
        "float" => 'input_number', //	A single-precision floating point number
        "double" => 'input_number', //	A double-precision floating point number
        "bit" => 'input_number', //
    ];

    private  $stringtype = [
        "char" => 'input_text', //	A fixed-length nonbinary (character) string
        "varchar" => 'input_text', //	A variable-length non-binary string
        "binary" => 'input_text', //	A fixed-length binary string
        "varbinary" => 'input_text', //	A variable-length binary string
        "tinyblob" => 'input_text', //	A very small BLOB (binary large object)
        "blob" => 'input_text', //	A small BLOB
        "mediumblob" => 'input_text', //	A medium-sized BLOB
        "longblob" => 'textarea', //	A large BLOB
        "tinytext" => 'input_text', //	A very small non-binary string
        "text" => 'textarea', //	A small non-binary string
        "mediumtext" => 'textarea', //	A medium-sized non-binary string
        "longtext" => 'textarea', //	A large non-binary string
        "enum" => 'select', //	An enumeration; each column value may be assigned one enumeration member
        "set" => 'select', //	A set; each column value may be assigned zero or more SET members
    ];

    private  $datetype = [
        "date"=>'input_date', //	A date value in CCYY-MM-DD format
        "time"=>'input_time', //	A time value in hh:mm:ss format
        "datetime"=>'input_datetime', //	A date and time value inCCYY-MM-DD hh:mm:ssformat
        "timestamp"=>'input_datetime', //	A timestamp value in CCYY-MM-DD hh:mm:ss format
        "year"=>'input_date', //	A year value in CCYY or YY format
    ];

    private  $spicialtype = [
        "geometry" => "input_text", //	A spatial value of any type
        "point" => "input_text", //	A point (a pair of X-Y coordinates)
        "linestring" => "input_text", //	A curve (one or more POINT values)
        "polygon" => "input_text", //	A polygon
        "geometrycollection" => "input_text", //	A collection of GEOMETRYvalues
        "multilinestring" => "input_text", //	A collection of LINESTRINGvalues
        "multipoint" => "input_text", //	A collection of POINTvalues
        "multipolygon" => "input_text", //	A collection of POLYGONvalues
    ];

    private  $booleantype = [
        "boolean" => "input_checkbox", //tineint(1)
    ];

    public function __construct($config=''){
        $this->config = $config;
    }

    public function  getDatabases(){
        return Capsule::select('show databases');
    }

    public  function gentables() {
        $tables = [];
        $dbname = $this->getdbname();
        $rawtables = Capsule::select('show tables');
        // $rawtables = Capsule::select('show tables where tables_in_lotnew = "test";');
        foreach ($rawtables as $rawtable) {
            foreach($rawtable as $table){
                $o = new stdClass();
                $o->table =$table;
                $o->pk = Capsule::select('SHOW KEYS FROM ' . $table . ' WHERE Key_name = "PRIMARY"');
                $o->fk = Capsule::select("SELECT concat(table_name,'.',column_name) AS 'fk',concat(referenced_table_name,'.',referenced_column_name) AS 'references' 
                            FROM information_schema.key_column_usage WHERE referenced_table_name IS NOT NULL 
                            AND table_schema='$dbname' AND table_name='$table'");
                $o->modelclass= $this->camelize(strtolower($this->plural_to_singular($table)));
                $o->isTable = true;
                $o->isModelclass = true;
                $o->isServiceclass = true;
                $o->isCtrlClass = true;
                $o->isVueui = false;
                $o->isVue2Typem = true;
                $o->isVue3 = false;
                $o->isSvelte = false;
                $o->relations = [];
                $o->isTimestamps = false;
                $o->serviceclass = $o->modelclass.'Service';
                $o->controllerclass = $o->modelclass.'Controller';
                $o->baseRoute = '/api/' . strtolower($o->table);
                $cols = Capsule::select('DESCRIBE '.$o->table);

                $o->isSoftdelete = false;
                $o->softdelete = '';
                $o->createdat = '';
                $o->updatedat = '';

                $iscreated = false;
                $isupdated = false;
                foreach($cols as $col){
                    if($col->Field == 'deleted_at'){
                        $o->isSoftdelete = true;
                        $o->softdelete = 'deleted_at';
                    }
                    if($col->Field == 'created_at'){
                        $iscreated = true;
                        $o->createdat = 'created_at';
                    }

                    if($col->Field == 'updated_at'){
                        $isupdated = true;
                        $o->updatedat = 'updated_at';
                    }
                }
                if($iscreated && $isupdated){
                    $o->isTimestamps = true;
                }

                $o->cols = $this->gencols($cols);
                $o->allCols = true;
                $o->allShow	 = true;
                $o->allEdit	 = true;
                $o->allCreate = true;
                $o->allDelete = true;
                $tables[] = $o;
            }
        }
        $json = json_decode(json_encode($tables));
        // dump($json[0]);
        $o = new stdClass();
        $o->components = $this->componemts;
        $o->tables = $tables;
        return $o;
        // dump($o);
        // dump($o->tables[0]->cols);
    }
    
    public function getdbname(){
        return $dbname = $this->config->dbconfig['database'];
        // return $dbname = $this->camelize($this->config->dbconfig['database']);       
    }

    public function todbjson(){
        return json_encode($this->gentables());
    }

    private   function camelize($input, $separator = '_'){
        return str_replace($separator, '', ucwords($input, $separator));
    }

    private  function plural_to_singular($string){
        // quick return of "untouchables"
        if(preg_match('~^(?:[oó]culos|parab[eé]ns|f[eé]rias)$~iu', $string))
        {
            return $string;
        }

        $regex_map = [
            '~[õã]es$~iu' => 'ão',
            '~(?:[áó].*e|[eé])is$~iu' => 'el',
            '~[^eé]\Kis$~iu' => 'l',
            '~ns$~iu' => 'm',
            '~eses$~iu' => 'ês',
            '~(?:[rzs]\Ke)?s$~iu' => ''
        ];

        foreach ($regex_map as $pattern => $replacement)
        {
            $singular = preg_replace($pattern, $replacement, $string, 1, $count);
            if ($count)
            {
                // return $this->is_allcaps($string) ? ucfirst(mb_strtolower($singular)) : ucfirst($singular);
                return $singular;
            }
        }
        return $string;
    }    
    
    private  function gencols($table){
        $cols =[];
        foreach($table as $key => $col ){
            $o = new stdClass();
            $o->rawcol = $col;
            $o->field = $col->Field;
            $o->isCol = true;
            $o->label = ucfirst($this->camelize(strtolower($col->Field))); // Label of Field
            $o->requed = $col->Null=='NO'?:'false';
            $o->tablea = '';
            $o->tableb = '';
            $o->tablea_col = '';
            $o->tableb_col = '';
            $o->ralation='';
            $o->ralation_name = '';
            //key-----    
            $o->pkey = $col->Key =='PRI'?:false;
            $o->default = $col->Default;
            $o->extra = $col->Extra;

            //CRUD
            $o->isGuarded  = false;
            $o->isShow = true;   //R View
            $o->isCreate = true; //C Add or Create
            $o->isDelete =true; //D Delete
            $o->isEdit = true; // Edit
            $o->isSearch = false; // Edit
            $o->isSort = false;
            $o->sort = 'asc';

            if($o->pkey && $o->extra == "auto_increment"){
                $o->isGuarded  = true;
                $o->isCreate = false; //C Add or Create
            } 
            if($o->field =='created_at'){
                $o->isCreate = false; //C Add or Create
                $o->isEdit = false; // Edit
                $o->isDelete =false; //D Delete
                $o->isShow = false;   //R View
            }
            if($o->field =='updated_at'){
                $o->isCreate = false; //C Add or Create
                $o->isEdit = false; // Edit
                $o->isDelete =false; //D Delete
                $o->isShow = false;   //R View
            }
            if($o->field == 'deleted_at'){
                $o->isCreate = false; //C Add or Create
                $o->isEdit = false; // Edit
                $o->isDelete =false; //D Delete
                $o->isShow = false;   //R View
            }
            if($o->field == 'password'){
                $o->isCreate = false; //C Add or Create
                $o->isEdit = false; // Edit
                $o->isDelete =false; //D Delete
                $o->isShow = false;   //R View
            }

            $o->type = $this->gentype($col->Type);
            $cols[] = $o;
        }
        return $cols;
    }

    private  function gentype($type) {
        $lists = explode(' ',$type);
        $o = new stdClass();
        $o->rawtype = $type;
        $type = isset($lists[0])?$lists[0]:'';
        if($type) {
            preg_match('/(?P<type>\w+)($|\((?P<length>(\d+|(.*)))\))/', $type, $field);
            $o->type = isset($field['type']) ? $field['type'] : null;
            $o->length = isset($field['length']) ? explode(',',$field['length']) : [];
        } 

        if($o->type){
            $stype = strtolower($o->type);

            if (array_key_exists($stype, $this->numbertype ) ) {
                switch ($stype) {
                    case 'tinyint':
                            if(isset($o->length[0]) && $o->length[0] == 1) {
                                $o->component = 'input_checkbox';
                            } else {
                                $o->component = $this->numbertype[$stype];
                            }
                        break;
                    default:
                            $o->component = $this->numbertype[$stype];
                        break;
                }
            } else if(array_key_exists($stype,$this->spicialtype)) {
                $o->component = $this->spicialtype[$stype];
            } else if(array_key_exists($stype,$this->booleantype)) {
                $o->component = $this->booleantype[$stype];
            } else if(array_key_exists($stype,$this->datetype)) {
                $o->component = $this->datetype[$stype];
            } else if(array_key_exists($stype,$this->stringtype)) {
                switch ($stype) {
                    case 'enum':
                    case 'set':
                        $o->choices = $o->length;
                        $o->length = [];
                        $o->component = $this->stringtype[$stype];
                        break;
                    default:
                        if( count($o->length) == 0 || ((isset($o->length[0]) && $o->length[0] == 0 )|| $o->length[0] > 255) ){
                            $o->component = 'textarea';
                        } else {
                            $o->component = 'input_text';
                        }
                        break;
                }

            } else {
                $o->component = 'input_text';
            }
        } else {
            $o->component = 'input_text';
        }
        return $o;
    }
} 

