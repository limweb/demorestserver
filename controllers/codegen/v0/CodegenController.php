<?php

namespace codegen\v0;
//----------------------------------------------
//FILE NAME:  CodegenController.php gen for Servit Framework Controller
//DATE: 2019-09-11(Wed)  19:43:34 

//----------------------------------------------
use	Illuminate\Database\Capsule\Manager as Capsule;
use	Carbon\Carbon;

class CodegenController  {
    
    private $componemts = [
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

        "select_html",
        "select_multi",
        "select_relation",
        "select_multi_relation",

        "input_id",
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

    private $numbertype = [
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

    private $stringtype = [
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

    private function testdb(){
         try {
                Capsule::connection('default')->table(Capsule::raw('DUAL'))->first([Capsule::raw(1)]);
                return true;
            } catch(\Exception $e) {
                echo '<center>การเชื่อมต่อ DB ผิดพลาด กรุณาตั้งค่าใน .env ใหม่ </center>';
                exit();
        }
    }

    private function gentables($dbname=null) {
        $tables = [];
        $rawtables = Capsule::select('show tables');
        // $rawtables = Capsule::select('show tables where tables_in_lotnew = "test";');
        foreach ($rawtables as $rawtable) {
            foreach($rawtable as $table){
                $o = new \stdClass();
                $o->table =$table;
                $o->pk = Capsule::select('SHOW KEYS FROM ' . $table . ' WHERE Key_name = "PRIMARY"');
                $o->fk = Capsule::select("SELECT concat(table_name,'.',column_name) AS 'fk',concat(referenced_table_name,'.',referenced_column_name) AS 'references' 
                            FROM information_schema.key_column_usage WHERE referenced_table_name IS NOT NULL 
                            AND table_schema='dbname' AND table_name='$table'");
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
        $o = new \stdClass();
        $o->components = $this->componemts;
        $o->tables = $tables;
        return $o;
        // dump($o);
        // dump($o->tables[0]->cols);
    }

    private function gencols($table){
        $cols =[];
        $extprops = $this->genextpropsdata();
        foreach($table as $key => $col ){
            $o = new \stdClass();
            $o->rawcol = $col;
            $o->field = $col->Field;
            $o->isCol = true;
            $o->label = ucfirst($this->camelize(strtolower($col->Field))); // Label of Field
            $o->requed = $col->Null=='NO'?:'false';
            $o->tablea = ''; //table relation for column
            $o->extprops = [];  // for exters input field 
            $o->tablea_value = '';  //value
            $o->tablea_label = '';  // label
            $o->extralation= 0 ; // 0 ไม่มี 1 relation table 2 extraprops
            $o->ralation_name = ''; // ชื่อ func
            $o->noext = false;
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

            if($o->field == 'created_by'){
                $o->isCreate = false; //C Add or Create
                $o->isEdit = false; // Edit
                $o->isDelete =false; //D Delete
                $o->isShow = false;   //R View
            }
            if($o->field == 'updated_by'){
                $o->isCreate = false; //C Add or Create
                $o->isEdit = false; // Edit
                $o->isDelete =false; //D Delete
                $o->isShow = false;   //R View
            }
            if($o->field == 'deleted_by'){
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
            $o->extprops = isset($extprops[$o->type->component])?$extprops[$o->type->component]:[];
            if($o->extprops){
                $o->extralation = 2;
                $o->noext = 1;
                switch ($o->type->component) {
                    case 'checkbox_group':
                    case 'radio_group':
                        foreach( $o->extprops as &$extp ){
                            if($extp['key'] == 'groupname') {
                               $extp['data'] = $o->field;
                            }
                        }
                        break;
                    default:
                        break;
                }
            }
            if($o->pkey){
                    $o->type->component = 'input_id';
                    $o->extprops = [];
                    $o->extralation = 0;
                    $o->noext = 0;
            }

            $cols[] = $o;
        }
        return $cols;
    }

    private function gentype($type) {
        $lists = explode(' ',$type);
        $o = new \stdClass();
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

    private  function camelize($input, $separator = '_'){
        return str_replace($separator, '', ucwords($input, $separator));
    }

    private function is_allcaps($string){
        $last_letter = mb_substr($string, -1, 1, 'UTF-8');
        return $last_letter === mb_strtoupper($last_letter, 'UTF-8');
        // otherwise use cytpe_upper() and setlocale()
    }

    private function plural_to_singular($string){
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
    private function genextpropsdata(){
            $extprops = [];

            $extprops['select'] =       [ [ "key"=> "datas", "data"=> [] ],[ "key"=> "default", "data"=> "" ], ["key"=> "example", "data"=> "[{\"value\":\"aaa\",\"label\":\"bbbb\"}]" ] ];
            $extprops['select_multi'] = [ [ "key"=> "datas", "data"=> [] ],[ "key"=> "default", "data"=> "" ], ["key"=> "example", "data"=> "[{\"value\":\"aaa\",\"label\":\"bbbb\"}]" ] ];

            $extprops['checkbox_group'] = [ [ "key"=> "datas", "data"=> [] ],[ "key"=> "default", "data"=> "" ], ["key"=> "example", "data"=> "[{\"value\":\"aaa\",\"label\":\"bbbb\"}]" ],["key"=>"groupname","data"=>""] ];
            $extprops['radio_group'] =    [ [ "key"=> "datas", "data"=> [] ],[ "key"=> "default", "data"=> "" ], ["key"=> "example", "data"=> "[{\"value\":\"aaa\",\"label\":\"bbbb\"}]" ],["key"=>"groupname","data"=>""] ];

            // $extprops['input_number'] =[["key"=>'max','data'=>1],["key"=>'min','data'=>0],["key"=>'default','data'=>0],];
            $extprops['input_range'] = [["key"=>'max','data'=>1],["key"=>'min','data'=>0],["key"=>'default','data'=>0],];
            // dump($extprops);
            return $extprops;
    }
    
    /**
    *@noAuth
    *@url GET /index
    *----------------------------------------------
    *FILE NAME:  CodegenController.php gen for Servit Framework Controller
    *DATE:  2019-09-11(Wed)  19:43:48 
    
    *----------------------------------------------
    */
    public function index($dbname=null){
        $this->testdb();
        $dbs = $this->gentables($dbname);
        $dbsjson = json_encode($dbs);
        $dbname = $this->camelize($this->server->config->dbconfig['database']);        
        $html = <<<HTML
        <!DOCTYPE html>   
        <html lang="en">   
        <head>   
            <title>VUEVM CODEGEN BY TLEN!</title>   
            <meta charset="utf-8">  
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        HTML;        
        $html .='<style>
                #myBtn {

                    display: none; /* Hidden by default */
                    position: fixed; /* Fixed/sticky position */
                    bottom: 20px; /* Place the button at the bottom of the page */
                    right: 30px; /* Place the button 30px from the right */
                    z-index: 99; /* Make sure it does not overlap */
                    border: none; /* Remove borders */
                    outline: none; /* Remove outline */
                    background-color: red; /* Set a background color */
                    color: white; /* Text color */
                    cursor: pointer; /* Add a mouse pointer on hover */
                    padding: 15px; /* Some padding */
                    border-radius: 10px; /* Rounded corners */
                    font-size: 18px; /* Increase font size */
                }

                #myBtn:hover {
                    background-color: #555; /* Add a dark-grey background on hover */
                }
            </style>';
            $html .= <<<HTML
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
            <script src="https://unpkg.com/vue/dist/vue.js"></script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://unpkg.com/vue-ls@3.2.1/dist/vue-ls.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js" integrity="sha256-gy5W5/rXWluWXFRvMWFFMVhocfpBe7Tf4SW2WMfjs4E=" crossorigin="anonymous"></script>
            <script>
                var dbs = $dbsjson;
            </script>
        <head> 
        <body> 
            <div id="app" class="pl-4">
            <center><h3>AUTO GEN API/VUEUI CRUD FROM DATABASE</h3></center>
            <div class="d-flex justify-content-between" style="cursor: pointer;">
                <div @click="togglealltable"><b>Database:</b><input type="checkbox" v-model="alltable" /> $dbname
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="isDownload" />D/L ZIP</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="isGenbckend" />GEN Backend</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" @change="changepreview" v-model="isViewcode" />PreVieewCOde</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="viewcode.frontend" />front-end</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="viewcode.backend" />back-end</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="viewcode.login" />login</div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="viewcode.msdt" />master-detail</div>
                <div @click="toggleVue2typemodule"><input type="checkbox" v-model="isVue2typemodule" >Vue2-typeModule</div>
                <div @click="toggleVue2"><input type="checkbox" v-model="isVue2" >Vue2</div>
                <div @click="toggleVue3"><input type="checkbox" v-model="isVue3" >Vue3</div>
                <div @click="toggleSvelte"><input type="checkbox" v-model="isSvelte" >Svelte</div>
                <div @click="togglesoftdelete"><input type="checkbox" v-model="allsoftdel" >Softdelete</div>
                <div @click="toggletimestamp"><input type="checkbox" v-model="alltimestamp" >Timestamps</div>
                <button @click="genall" class="btn btn-sm btn-success" style="float:right" >GENCODE FOR ALL TABLES</button>
            </div>
            <div id="accordion">
        HTML;
                // dump($dbs->tables[0]->cols);
                echo $html;
                // dump($dbs);
        ?>
        <!-- ------ ตาราง gen ระบบ  login  ------------ -->
            <div class="card">
                <div class="card-header d-flex align-items-start  justify-content-between" style="background-color:#c3c3c3">
                    <label>เลือกตาราง
                        <select v-model="loginsys.table" @change="changelogintable">
                            <option value="">กรุณาเลือกตารางสำหรับ Login</option>
                            <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                        </select>
                    </label>
                    <label>เลือก Field User/Email
                        <select v-model="loginsys.username">
                            <option value="">กรุณาเลือก Field username</option>
                            <option v-for="(fuser,idx) in getcols(loginsys.table)" :value="fuser.field" :key="idx">{{fuser.field}}</option>
                        </select>
                    </label>
                    <label>เลือก Field Password
                        <select v-model="loginsys.password">
                            <option value="">กรุณาเลือก Field password</option>
                            <option v-for="(fuser,idx) in getcols(loginsys.table)" :value="fuser.field" :key="idx">{{fuser.field}}</option>
                        </select>
                    </label>
                    <label>เลือก ชนิดตรวจสอบการ Login
                        <select v-model="loginsys.logintype">
                            <option value="JWT">กรุณาเลือก JWT </option>
                        </select>
                    </label>
                    <div class="d-flex flex-column">
                    <label>ISS เจ้าของ token
                        <input type="text"  v-model="loginsys.iss" placeholder="ISS เจ้าของ token "  />
                    </label>
                    <label>AUD ผู้รับ token
                        <input type="text" v-model="loginsys.aud" placeholder="AUD ผู้รับ token" />
                    </label>

                    <label>EXP
                        <select v-model="loginsys.exp">
                            <option value="0"> ตลอดชีพ</option>
                            <option value="1">1 นาที</option>
                            <option value="2">5 นาที</option>
                            <option value="10">10 นาที</option>
                            <option value="15">15 นาที</option>
                            <option value="30">30 นาที</option>
                            <option value="60">1 ชั่วโมง</option>
                            <option value="720">ครึ่งวัน</option>
                            <option value="1440">1 วัน</option>
                            <option value="10080">7 วัน</option>
                        </select>
                    </label>
                    <label>Name
                        <select v-model="loginsys.name">
                            <option value="">---เลือก Name---</option>
                            <option v-for="(fuser,idx) in getcols(loginsys.table)" :value="fuser.field" :key="idx">{{fuser.field}}</option>
                        </select>
                    </label>
                    <label>Role
                        <select v-model="loginsys.roles">
                            <option value="0">---เลือก Name---</option>
                            <option v-for="(fuser,idx) in getcols(loginsys.table)" :value="fuser.field" :key="idx">{{fuser.field}}</option>
                        </select>
                    </label>


                    </div>
                    <div class="text-nowrap  pl-2"><a href="#codegen"><input @click="genlogin" type="button" class="btn btn-sm btn-primary" value="GEN login SYSTEM" /></a></div>
                </div>
            </div>
        <!-- ------ ตาราง gen ระบบ  login  ------------ -->
            <br/>
        <!-- ------ ตาราง gen ระบบ  master/details  ----------start-- -->
            <div class="card" style="background-color:#7ad9ff; padding-top:10px;">
                <div class="d-flex" style="justify-content: space-between;">
                    <div>
                        &nbsp;&nbsp;&nbsp;&nbsp;<b>Master/Details</b> 
                        <button @click="addmasterdetail">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Add M/D
                        </button>
                    </div>
                    <div class="text-nowrap  mr-4">
                        <input @click="genmasterdetails(1)" type="button" class="btn btn-sm btn-primary" value="GEN All Master Details" />
                    </div>
                </div>
                <div class="card-header d-flex flex-column align-items-start  justify-content-between" >
                    <div  v-for="(md,idx) in masterdetails" style="width:100%;padding-top:20px;justify-content: space-between;" class="d-flex flex-column">
                            <div class="d-flex flex-row" style="width:100%;justify-content: space-between;">
                               <div>#{{idx+1}} Name:<input v-model="md.name" /></div>
                               <div class="text-nowrap">
                                    <input @click="genmasterdetail(md,idx+1)" type="button" class="btn btn-sm btn-primary" value="GEN Master Details By Item" />
                                </div>
                            </div>
                            <div  class="d-flex flex-row">
                                <div class="d-flex flex-column" style="width:15%">
                                    Master:
                                    <select v-model="md.master">
                                        <option value="">----Master Table----</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <div style="width:30px;">
                                        <button style="width:30px;" @click="delmasterdetail(idx)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" style="width:15%">
                                    Detail:
                                    <select v-model="md.detail">
                                        <option value="">----Details Table----</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <select v-model="md.detailfk">
                                        <option value="">----Details Field----</option>
                                        <option v-for="(dt,idx) in getcols(md.detail)" :value="dt.field" :key="idx">{{dt.field}}</option>
                                    </select >                                
                                </div>
                                <div class="d-flex flex-column" style="width:15%">
                                    Relation#1:
                                    <select  v-model="md.relation1">
                                        <option value="">----Realtion Table----</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <select  v-model="md.relation1fk">
                                        <option value="">----Details Field----</option>
                                        <option v-for="(dt,idx) in getcols(md.master)" :value="dt.field" :key="idx">{{dt.field}}</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column" style="width:15%">
                                    Relation#2:
                                    <select  v-model="md.relation2">
                                        <option value="">----Realtion Table----</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <select  v-model="md.relation2fk">
                                        <option value="">----Details Field----</option>
                                        <option v-for="(dt,idx) in getcols(md.master)" :value="dt.field" :key="idx">{{dt.field}}</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column" style="width:15%">
                                    Relation#3:
                                    <select  v-model="md.relation3">
                                        <option value="">----Realtion Table----</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <select  v-model="md.relation3fk">
                                        <option value="">----Details Field----</option>
                                        <option v-for="(dt,idx) in getcols(md.master)" :value="dt.field" :key="idx">{{dt.field}}</option>
                                </select>                        
                                </div>        
                                <div class="d-flex flex-column" style="width:15%">
                                    Relation#4:
                                    <select v-model="md.relation4">
                                        <option value="">----Realtion Table----</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <select v-model="md.relation4fk">
                                        <option value="">----Details Field----</option>
                                        <option v-for="(dt,idx) in getcols(md.master)" :value="dt.field" :key="idx">{{dt.field}}</option>
                                    </select>                                
                                </div>
                                <div class="d-flex flex-column" style="width:15%">
                                    Relation#5:
                                    <select v-model="md.relation5">
                                        <option value="">Realtion Table</option>
                                        <option v-if="tables.length>0" v-for="(table,idt) in tables" :key="idt" :value="table.table">{{table.table}}</option>
                                    </select>
                                    <select  v-model="md.relation5fk">
                                        <option value="">----Details Field----</option>
                                        <option v-for="(dt,idx) in getcols(md.master)" :value="dt.field" :key="idx">{{dt.field}}</option>
                                    </select>                                
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <!-- ------ ตาราง gen ระบบ  master/details  ----------end-- -->
            <br/>
        <!-- ------ ตาราง gen ระบบ  tables  ------------ -->
            <div v-for="(table,idx) in tables" class="card ">
                <div class="card-header d-flex align-items-start  justify-content-between">
                    <div>
                        <div class="d-flex flex-row">
                            <div>
                                <label class="pr-2 "> #{{idx+1}}</label>
                            </div>
                            <div>
                                <input type="checkbox" v-model="table.isTable" />
                                <a class="card-link" data-toggle="collapse" :href="'#table'+idx">
                                    {{table.table}}
                                </a>
                            </div>
                            <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isModelclass" />
                                <input placeholder="Model Class" v-model="table.modelclass" />
                            </div>
                            <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isServiceclass" />
                                <input placeholder="Service Class" v-model="table.serviceclass" />
                            </div>
                            <div class="text-nowrap  pl-2 d-flex flex-row">
                                <div class="d-flex">
                                    <input type="checkbox" v-model="table.isCtrlClass" />
                                    <input placeholder="Controller Class" v-model="table.controllerclass" />
                                </div>
                                <div>
                                    &nbsp;&nbsp;&nbsp;<input placeholder="base Route" v-model="table.baseRoute" />
                                </div>
                            </div>
                            <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isVue2Typem" />* Vue2 TM</div>
                            <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isVueui" />* Vue2 UI</div>
                            <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isVue3" />* Vue3 UI</div>
                            <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isSvelte" />* SVELTE UI</div>
                        </div>
                        <!-- ----gen relation of table---------- -->
                            <div class="d-flex flex-row ">
                                <div style="height:80px">
                                        <button @click="addrelation(table)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-nowrap" v-for="(related,rdx) in table.relations" style="background-color: aquamarine;">
                                        <label>#{{rdx+1}}</lable>
                                        <input type="text" v-model="related.name" placeholder="functionname" /> 
                                        <input type="text" v-model="related.bname" placeholder="functionname" /> 
                                        <select v-model="related.type" @change="selectrelatetb(related)">
                                            <option value="0">--เลือก-relation--</option>
                                            <option value="1">HasOne</option>
                                            <option value="2">HasMany</option>
                                        </select>
                                        <select v-model="related.relatetable_name" @change="selectrelatetb(related)">
                                            <option value="">--เลือก-ตาราง relation--</option>
                                            <option  v-for="(selecttable,idxx) in tables" :value="selecttable.table">{{selecttable.table}}</option>
                                        </select>
                                        <select v-model="related.field_master" >
                                            <option value="">--เลือก-field ตาราง {{table.table?table.table:'ต้นทาง'}}--</option>
                                            <option  v-for="(ffield,idxy) in table.cols" :value="ffield.field">{{ffield.field}}</option>
                                        </select>
                                        <select v-model="related.field_relate">
                                            <option value="">--เลือก-field ตาราง {{related.relatetable_name?related.relatetable_name:'ปลายทาง'}}--</option>
                                            <option  v-for="(lfield,idxz) in getcolsbytable(related.relatetable_name)" :value="lfield.field">{{lfield.field}}</option>
                                        </select>
                                        <label><input type="checkbox" v-model="related.isWith" />$with</label>
                                        <input style="width:50%" type="text" v-model="related.comment" placeholder="ใส่หมายเหตุให้กับ function relation" />
                                        <button @click="delrelation(rdx,table.relations)" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        <!-- ----gen relation of table---------- -->                            
                    </div>
                    <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isSoftdelete" />* Soft Delete <br />
                        <div>
                            <select v-model="table.softdelete">
                                <option value="">-- add sql deleted at--</option>
                                <option v-for="(dt,idd) in datetimefields(table.cols)" :key="idd">{{dt.field}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isTimestamps" />* Timestamps
                        <div>
                            <select v-model="table.createdat">
                                <option value="">--add sql created_at--</option>
                                <option v-for="(dt,idc) in datetimefields(table.cols)" :key="idc">{{dt.field}}</option>
                            </select><br />
                            <select v-model="table.updatedat">
                                <option value="">--add sql updated_at--</option>
                                <option v-for="(dt,idu) in datetimefields(table.cols)" :key="idu">{{dt.field}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-nowrap  pl-2"><a href="#codegen"><input @click="genbytable(table)" type="button" class="btn btn-sm btn-primary" value="GEN by Table ZIP" /></a></div>
                 </div>

                <div :id="'table'+idx" class="collapse" data-parent="#accordion">
                    <div class="card-body ">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th @click="togglecol(table)">
                                    <input type="checkbox" v-model="table.allCols" />Column Name</th>
                                    <th style="width:150px;" @click="toggledelete(table)">Is Sort</th>
                                    <th style="width:150px;" @click="toggledelete(table)">Is Search</th>
                                    <th style="width:150px;" @click="toggleshow(table)"><input type="checkbox"   v-model="table.allShow"  /> Is Show</th>
                                    <th style="width:150px;" @click="toggleedit(table)"><input type="checkbox"   v-model="table.allEdit"  /> Is Edit</th>
                                    <th style="width:150px;" @click="togglecreate(table)"><input type="checkbox" v-model="table.allCreate"  /> Is Create</th>
                                    <th style="width:150px;" @click="toggledelete(table)"><input type="checkbox" v-model="table.allDelete"  /> Is Delete</th>
                                    <th>* Form Componet</th>
                                    <th>Ralation Config</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(col,idk) in table.cols">
                                    <td class="d-flex align-items-center">
                                        #{{idk+1}}&nbsp;
                                        <input type="checkbox" v-model="col.isCol" />
                                        &nbsp;&nbsp;
                                        <input type="text" :placeholder="'label ' + col.field " v-model="col.label" /></td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <input type="checkbox" v-model="col.isSort" />
                                            <select v-model="col.sort">
                                                <option value="asc">Asc</option>
                                                <option value="desc">Desc</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td><input type="checkbox" v-model="col.isSearch" /></td>
                                    <td><input type="checkbox" v-model="col.isShow" /></td>
                                    <td><input type="checkbox" v-model="col.isEdit" /></td>
                                    <td><input type="checkbox" v-model="col.isCreate" /></td>
                                    <td><input type="checkbox" v-model="col.isDelete" /></td>
                                    <td>
                                        <select name="components" v-model="col.type.component"   @change="changecol(col)" >
                                            <option v-for="(component,idy) in components" :key="idy">
                                                {{component}}</option>';
                                        </select>
                                        <labeL><input type="checkbox" v-model="col.noext">&nbsp;&nbsp;&nbsp;extpro</label>
                                    </td>
                                    <td v-if="chkrelation(col.type.component)">
                                        <div class="d-flex flex-column">
                                                <label>Table:<select name="tablea" v-model="col.tablea" @change="col.relation_name = col.tablea">
                                                    <option>--เลือก-table--</option>
                                                    <option v-for="(table,idt) in tables" :key="idt" :value="table.table">
                                                        {{table.table}}</option>
                                                </select></label>
                                                <label>Name:<input type="text" v-model="col.relation_name" plactholder="ralation name" /></label>
                                                <label>Value field:<select name="fielda" v-model="col.tablea_value">
                                                    <option value="">--เลือก-field--</option>
                                                    <option v-for="(column,idc) in getcols(col.tablea)" :key="idc" :value="column.field">
                                                        {{column.label}}</option>
                                                </select></label>
                                                <label>Label field:<select name="fieldb" v-model="col.tablea_label">
                                                    <option value="">--เลือก-field--</option>
                                                    <option v-for="(columnc,idcc) in getcols(col.tablea)" :key="idcc" :value="columnc.field">
                                                        {{columnc.label}}</option>
                                                </select></label>
                                        </div>
                                    </td>
                                    <td v-else-if="chkext(col.type.component) && col.noext">
                                        <div class="d-flex flex-column">
                                           <div v-for="(prop,keyp) in col.extprops" :key="keyp">
                                                    <label>{{prop['key']}}
                                                            <span v-if="prop['key'] == 'example'">{{prop['data']}}</span>
                                                            <textarea v-else-if="prop['key']=='datas' "  rows="3" v-model="prop['data']" ></textarea>
                                                            <input v-else type="text" v-model="prop['data']" />
                                                    </label>
                                            </div>
                                        </div>

                                    </td>
                                    <td v-else>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- ------ ตาราง gen ระบบ  tables  ------------ -->
            </div>
            <div class="pt-4">
                <button  style="float:right" @click="genall" class="btn btn-sm btn-success">GENCODE FOR ALL TABLES</button>
                <br /><br />
            </div>
            <div>
                <hr/>
                    <button @click="cleardata('loginsys')" class="btn btn-danger mr-2">Clear Login</button>
                    <button @click="cleardata('relationtables')"  class="btn btn-danger mr-2">Clear Relation</button>
                    <button @click="cleardata('masterdetails')"  class="btn btn-danger mr-2">Clear Master Datails</button>
                    <button @click="cleardata('tables')"  class="btn btn-danger mr-2">Clear Tables</button>
                <hr/>
                <h5>comments * </h5>
                <p class="pl-4"><b>softdelete</b>: จะต้องเลือก field 1 รายการที่เป็น ชนิด datatime ไม่ซ้ำกับ timestamps<br />
                    <b>timestamps</b>: จะต้องเลือก filed ที่เป็น ชนิด datatime จำนวน 2 รายการ ตามตัวอย่าง ถ้าไม่มีให้ไปสร้างใน db ก่อน<br />
                    <b>vueui</b>: จะทำการ gen CRUD ตาม รายการ ทีเลือกให้<br />
                    <b>component</b>: default จะเลือก component ตาม datatype ที่มากับ database นั้น ๆ ถ้าต้องการเปลีย่นสามารถเลือกเปลี่ยนได้ตามความเหมาะสมกับการใช้งาน <br/>
                    <b>is Search</b>: สำหรับ columns ที่มีไว้ ค้นห้าด้วย keyword ทั้งฝั่ง backend และ frontend ค่า default จะไม่กำหนดให้ ถ้าต้องการกรุณากำหนดเอง </br>
                    <b>Is Show</b>:	Column ที่จะแสดงในส่วนของ Info และ Data Tables <br/>
                    <b>Is Edit</b>:	Column ที่เปิดให้ แก้ไขได้  <br/>
                    <b>Is Create</b>:	Column ที่จะให้ fillable สำหรับ   <br/>
                    <b>Is Delete</b>:  Cloumn ที่จะแสดงข้อมูลก่อน delete <br/>
                </p>
                <hr/>
            </div>
            <br /><br /><br /><br /><br />
        <!-- ------ ตาราง gen ระบบ  ส่วนขอแสดงผลตัวอย่าง  ------------ -->
            <pre v-if="isViewcode" id="codegen" style="border: 1px;width: 100%;min-height: 100px;background-color: #eeeeee;padding: 10px;" >{{codegen}}</pre>
            <button id="myBtn" style="float: right;margin-right: 20px;" @click="toTop">TOP</button>
            </div><br /><br />
        <!-- ------ ตาราง gen ระบบ  ส่วนขอแสดงผลตัวอย่าง  ------------ -->
        <script>
        options = {
            namespace: 'vuejs__', // key prefix
            name: 'ls', // name variable Vue.[ls] or this.[$ls],
            storage: 'local', // storage name session, local, memory
        };
        Vue.use(VueStorage, options);
        window.vm = new Vue({
            mixins: [],
            data() {
              return {
                componentprops:{   
                    "checkbox_group":{ "datas":[], "default":"","groupname":"","example":'[{"value":"aaa","label":"bbbb"}]'},
                    "radio_group":{ "datas":[],"default":"","groupname":"","example":'[{"value":"aaa","label":"bbbb"}]'},
                    "select_html":{ "datas":[],    "default":"","example":'[{"value":"aaa","label":"bbbb"}]'},
                    "select_multi":{"datas":[], "default":[],"example":'[{"value":"aaa","label":"bbbb"}]'},
                    // "input_number":{"max":1,"min":0, "default":""},
                    "input_range":{"default":0, "max":1,"min":0},
                },
                codegen: 'CODE GEN AREA',
                codedata:[],
                codelogindata:{},
                tables: dbs.tables,
                components: dbs.components,
                alltable: true,
                allsoftdel: false,
                alltimestamp: false,
                isVue2typemodule: true,
                isVue2: false,
                isVue3: false,
                isSvelte: false,
                isDownload:false,
                isGenbckend:false,
                isViewcode: false,
                viewcode: {
                    frontend: false,
                    backend:false,
                    login:false,
                    msdt:false,
                },
                relationtables:{},
                loginsys:{
                    logintype:'JWT',
                    username:'',
                    password:'',
                    table:'',
                    name:'',
                    iss:'',
                    aud:'',
                    roles: 0,
                    exp:0
                },
                masterdetails:[],
                codemasterdetails:[],
              }
            },
            el: "#app",
            methods: {
                changepreview(){
                    console.log('---changepreview--',this.isViewcode);
                    this.viewcode.frontend = this.isViewcode;
                    this.viewcode.backend = this.isViewcode;
                    this.viewcode.login = this.isViewcode;
                    this.viewcode.msdt = this.isViewcode;
                },
                cleardata(key){
                    if(key == 'masterdetails'){
                        this.$data[key] = [];
                    } else if(key=='tables'){
                        this.tables = [];
                    } else {
                        this.$data[key] = {};
                    }
                },
                datetimefields(cols) {
                    return cols.filter(c => {
                        return (c.type.type == 'datetime' || c.field.toLocaleLowerCase().indexOf('date') != -1);
                    })
                },
                getcols(table) {
                    if (table) {
                        tablex = this.tables.find(t => t.table == table)
                        if (!!tablex) {
                            return tablex.cols
                        } else {
                            return [];
                        }
                    } else {
                        return [];
                    }
                },
                chkrelation(component) {
                    let arr = component.split('_');
                    if (arr[arr.length - 1] == 'relation') {
                        return true;
                    } else {
                        return false;
                    }
                },
                chkext(component){
                    let c =this.componentprops[component];
                    return c;
                },
                changecol(component){
                    let c =this.componentprops[component.type.component];
                    let arr = component.type.component.split('_');
                    component.extralation =  (arr[arr.length - 1] == 'relation')?1:0;
                    console.log('----change col-->',c);
                    component.noext = 0;
                    if(c){
                        let arraykey = Object.keys(c);
                        console.log('---arraykey---',arraykey);
                        component.extprops = arraykey.map(key=>{
                                let obj = {};
                                 obj.key = key;
                                 if(key == 'groupname'){
                                    obj.data = component.field;
                                 } else {
                                    obj.data = c[key];
                                 }
                                return obj;
                        });
                        component.noext = 1;
                        component.extralation = 2;
                        // console.log('---col.extprops-->',component.extprops );
                    } else {
                        component.extprops = [];
                        component.noext = component.extralation;


                    }
                },
                togglecol(table){
                    table.allCols = !table.allCols;
                    table.cols.map(col=>col.isCol=table.allCols);
                    console.log('table--->',table.cols);
                },
                toggleVue2typemodule(){
                    this.isVue2typemodule=!this.isVue2typemodule;
                    this.tables.map(table=>table.isVue2Typem=this.isVue2typemodule);
                },
                toggleVue2(){
                    this.isVue2=!this.isVue2;
                    this.tables.map(table=>table.isVueui=this.isVue2);
                },
                toggleVue3(){
                    this.isVue3=!this.isVue3;
                    this.tables.map(table=>table.isVue3 = this.isVue3);
                },
                toggleSvelte(){
                    this.isSvelte=!this.isSvelte;
                    this.tables.map(table=>table.isSvelte =this.isSvelte);
                },
                togglesoftdelete(){
                    this.allsoftdel = !this.allsoftdel;
                    this.tables.map(table=>table.isSoftdelete = this.allsoftdel);
                },
                toggletimestamp(){
                    this.alltimestamp = !this.alltimestamp;
                    this.tables.map(table=>table.isTimestamps = this.alltimestamp);
                },
                toggleshow(table){
                    table.allShow = !table.allShow;
                    table.cols.map(col=>col.isShow = table.allShow);    
                },
                toggleedit(table){
                    table.allEdit = !table.allEdit;
                    table.cols.map(col=>col.isEdit = table.allEdit);    
                },
                toggledelete(table){
                    table.allDelete = !table.allDelete;
                    table.cols.map(col=>col.isDelete = table.allDelete);    
                },
                togglecreate(table){
                    table.allCreate = !table.allCreate;
                    table.cols.map(col=>col.isCreate = table.allCreate);    
                },
                togglealltable(){
                      this.alltable = !this.alltable;
                      this.tables.map(table=>table.isTable = this.alltable);
                },
                toTop(){
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                },
                addrelation(table){
                    console.log('--table---',table);
                    let pks = this.getpkname(table.pk);
                    console.log('pks-->',pks);
                    let relation = {
                        type: 0,
                        comment:'',
                        isWith:false,
                        
                        name: '',
                        relatetable_name:'',
                        relatetable_class:'',
                        field_relate:'',

                        bname:table.table,
                        master_table:table.table,
                        master_class: table.modelclass,
                        field_master: (pks.length==1?pks[0]:''),
                        
                    }
                    this.relationtables[table.table].push(relation);
                    table.relations = this.relationtables[table.table];
                },
                updatetolocalstorage(){
                    this.$ls.set('relations',this.relationtables);
                    this.$ls.set('loginsys',this.loginsys);
                    this.$ls.set('masterdetails',this.masterdetails);
                    this.$ls.set('tables',this.tables);
                },
                delrelation(rdx,relations){
                    if(confirm('ต้องการลบหรือไม่ง')){
                        relations.splice(rdx,1);
                    }
                },
                getcolsbytable(tablename){
                    if(tablename){
                        let table = this.tables.find(table=>table.table == tablename);
                        return table.cols;
                    } else {
                        return [];
                    }
                },
                getpkname(pks){
                    return pks.map(pk=>pk.Column_name)
                },
                changelogintable(){
                    this.loginsys.username=''; 
                    this.loginsys.password='';
                },
                pluralize(val, word, plural = word + 's'){
                    const _pluralize = (num, word, plural = word + 's') =>[1, -1].includes(Number(num)) ? word : plural;
                    if (typeof val === 'object') return (num, word) => _pluralize(num, word, val[word]);
                    return _pluralize(val, word, plural);
                },         
                selectrelatetb(related){
                    related.field_relate='';
                    let i = (related.type==0 || related.type == 2 ) ? 2 : 1;
                    if(related.relatetable_name){
                        related.name = this.pluralize(i,related.relatetable_name);
                    }
                    let tb = this.tables.find(table=>{
                        if(table.table == related.relatetable_name){
                            console.log('---table---',table.modelclass);
                            return table;        
                        }
                    });
                    console.log('---tb---',tb);
                    if(tb){
                        related.relatetable_class =  tb.modelclass;
                    }
                },      
                addmasterdetail(){
                    console.log('----addmasterdetail----');
                    let md = {
                         name:'#',
                         master:'',
                         detail:'',
                         detailfk:'',
                         relation1:'',
                         relation1fk:'',
                         relation2:'',
                         relation2fk:'',
                         relation3:'',
                         relation3fk:'',
                         relation4:'',
                         relation4fk:'',
                         relation5:'',
                         relation5fk:'',
                    }
                    this.masterdetails.push(md);
                },
                delmasterdetail(idx){
                    console.log('----delmasterdetail---');
                    this.masterdetails.splice(idx,1);
                },
                validate_bf_gen(table=null){
                    let chk = true;
                    let msg = '';
                    // if(table){
                    //     //---softdelete
                    //     if(table.isSoftdelete || this.allsoftdel ){
                    //         if(!table.softdelete==''){
                    //             msg +=  table.table + ': ไม่มี soft delete \n';
                    //             chk = false;
                    //         }
                    //     }
                    //     //---timestamp
                    //     if(table.isTimestamps || this.alltimestamp ){
                    //         if(!table.updatedat=='' || !table.createdat==''){
                    //             msg +=  table.table + ': ไม่มี createdat/updatedat \n';
                    //             chk = false;
                    //         }
                    //     }
                    // } else {
                    //     this.tables.map(table=>{
                    //             if(table.isSoftdelete || this.allsoftdel ){
                    //                 if(!table.softdelete){
                    //                     msg +=  table.table + ': ไม่มี soft delete \n';
                    //                     chk = false;
                    //                 }
                    //             }
                    //             //---timestamp
                    //             if(table.isTimestamps || this.alltimestamp ){
                    //                 if(!table.updatedat || !table.createdat){
                    //                     msg +=  table.table + ': ไม่มี createdat/updatedat \n';
                    //                     chk = false;
                    //                 }
                    //             }
                    //     })
                    // }
                    if(msg){
                        console.log('--testvalidate-->',chk,msg);
                        alert(msg);
                    }
                    return chk;
                },
                gencoderelation(){ // gen relation สำหรับ php model eloquent 
                        let coderelation = {
                            error:false,
                            err:''
                        };
                        Object.keys(this.relationtables).map(table=>{
                            if( this.relationtables[table].length > 0 ) {
                                if(!coderelation[table]){
                                    coderelation[table]={
                                        xwith:[],
                                        func:{},
                                    }
                                }
                                this.relationtables[table].map(rtb=>{
                                    let xwith = '';
                                    let rfunc = '';
                                    let bfunc = '';
                                    if( rtb.name && rtb.bname && rtb.master_class && rtb.relatetable_class && rtb.field_master && rtb.field_relate ){
                                        if(rtb.isWith){
                                            xwith += '"'+ rtb.name+'",';
                                            coderelation[table]['xwith'].push(xwith);
                                        }
                                        //------- -------rfunc------- -------
                                        rfunc = '        /** \n';
                                        rfunc += '         * '+ rtb.comment +'  \n';
                                        rfunc += '         */\n';
                                        rfunc += '        public function '+rtb.name+'() { \n';
                                        if(rtb.type > 0) { 
                                            if(rtb.ype == 1) { // hasOne 
                                                rfunc += '                return $this->hasOne("'+ rtb.relatetable_class +'","'+rtb.field_relate+'","'+rtb.field_master+'"); \n';
                                            } else {   //HasMany
                                                rfunc += '                return $this->hasMany("'+ rtb.relatetable_class +'","'+rtb.field_relate+'","'+rtb.field_master+'"); \n';
                                            } 
                                            rfunc += '        } \n\n';
                                        }
                                        if(coderelation[table]['func'][rtb.name] != undefined){
                                            coderelation['error'] = true;
                                            coderelation['err'] += rtb.name + ", ";

                                        } else {
                                            coderelation[table]['func'][rtb.name]=rfunc;
                                        }
                                        
                                        //------- -------bfunc------- -------
                                        bfunc +='        /** \n';
                                        bfunc +='        * '+ rtb.comment +' \n';
                                        bfunc +='        */ \n';
                                        bfunc +='        public function '+rtb.bname+'() \n';
                                        bfunc +='        { \n';
                                        bfunc +='                return $this->belongsTo("'+rtb.master_class+'", "'+rtb.field_relate+'", "'+rtb.field_master+'"); \n';
                                        bfunc +='        }         \n\n\n';

                                        if(!coderelation[rtb.relatetable_name]){
                                            coderelation[rtb.relatetable_name]={
                                                xwith:[],
                                                func:{},
                                            }
                                        }
                                        if( coderelation[rtb.relatetable_name]['func'][rtb.bname]){
                                            coderelation['error'] = true;
                                            coderelation['err'] += rtb.bname + ', ';
                                        } else {
                                            coderelation[rtb.relatetable_name]['func'][rtb.bname]=bfunc;
                                        }
                                }
                                })
                            }
                        }) 
                        return coderelation;
                },
                getmodlecols(cols){
                    let append = '';
                    let fillable='';
                    let guarded = '';
                    let hidden  = '';
                    let search  = '';
                    cols.map(col=>{
                        if(col.isCol && col.isShow){
                            append += '"'+col.field+'",';
                        } else {
                            hidden += '"'+col.field+'",';
                        }
                        if(col.isCol && col.isCreate){
                            fillable += '"'+col.field+'",';
                        }
                        if(col.isCol && col.isGuarded){
                            guarded += '"'+col.field+'",';
                        }

                        if(col.isSearch) {
                            search += '"'+col.field+'",';
                        }
                    });
                    return {
                        append:append,
                        fillable:fillable,
                        guarded:guarded,
                        hidden:hidden,
                        search:search,
                    };
                },
                genbytable(table){ // gen บางตาราง เท่านั้น พร้อม d/l 
                    console.log('---gen by table',table);
                    if(!this.validate_bf_gen()){
                        return;
                    } 
                    this.codedata = [];
                    let cols = table.cols.filter(col=>col.isCol);
                    if(cols.length > 0 ){
                       this.codegen = '';
                       let tabledata = this.genHtmltable(table);
                      if(this.viewcode.backend){
                        if(this.viewcode.backend){
                            this.codegen  += tabledata.model.doc;
                            this.codegen  += tabledata.service.doc;
                            this.codegen  += tabledata.controller.doc;
                        }
                      }
                    //-------------vuevm----code preview----------------start--
                        if(this.viewcode.frontend){
                            tabledata.vuetm.files.map(f=>{
                                this.codegen += "//---------------------------------"+f.filename+"\n";
                                this.codegen += f.doc;
                            })
                        }
                    //-------------vuevm----code preview----------------end----
                    //-------------vue2----code preview----------------start----
                     if(this.viewcode.frontend){
                            tabledata.vue2.files.map(f=>{
                                this.codegen += "//---------------------------------"+f.filename+" vue2\n";
                                this.codegen += f.doc;
                            })
                     }
                    //-------------vue3----code preview----------------start----
                        tabledata.vue3.files.map(f=>{
                            this.codegen += "//---------------------------------"+f.filename+" vue3\n";
                            this.codegen += f.doc;
                        })
                       this.codegen  += tabledata.svelte.doc;
                       this.codegen  += "//---------------------------------------------------sql \n";
                       this.codegen  += tabledata.sql.doc;
                       this.codegen  += "//---------------------------------------------------routebygen.php \n";
                       this.codegen  += tabledata.routebygen.doc;
                       this.codegen += '\n\n';
                       this.codedata.push(tabledata);
                       
                       let fileName = 'codegen_'+table.table+'.zip';
                       this.genzipfile(fileName)
                    } else {
                        alert('Please Select Column minimum 1 column!');
                    }
                    location.href="#codegen"
                },
                genall(){
                    if(!this.validate_bf_gen()){
                        return;
                    } 
                    let data = this.tables.filter(table=>table.isTable);
                    console.log('genall table--->',data);
                    this.genAllHtmltable(data);  // all table จะถูกแปลงเป็น htmlcode
                    this.genmasterdetails(0);
                    let fileName = 'codegen_vuevm.zip';
                    this.genzipfile(fileName);
                    location.href="#codegen"
                    if(this.isGenbckend){
                        let postdata = { 
                            tabledata:this.codedata,
                            logindata:this.codelogindata 
                            };
                        console.log('---postdata--->',postdata);
                        axios.post("/gencode/genall",JSON.stringify(postdata))
                        .then((rs) => {
                            console.log(rs);
                        })
                        .catch( (err) => {
                            console.log(err);
                        });
                    }
                },
                genAllHtmltable(tables){
                   this.codegen = '';
                   this.codedata = [];
                   this.genlogincode();
                   this.genmasterdetails();
                   let routecodegen  = "//---------------------------------------------------routebygen.php \n";
                   tables.map(table=>{ // loop to gen  table data  
                       let tabledata = this.genHtmltable(table);
                        if(this.viewcode.backend){
                            this.codegen  += tabledata.model.doc;
                            this.codegen  += tabledata.service.doc;
                            this.codegen  += tabledata.controller.doc;
                        }

                        //-------------vuevm----code preview----------------start--
                            if(this.viewcode.frontend){
                                tabledata.vuetm.files.map(f=>{
                                    this.codegen += "//---------------------------------"+f.filename+"\n";
                                    this.codegen += f.doc;
                                })
                            }
                        //-------------vuevm----code preview----------------end----
                        //-------------vue2----code preview----------------start----
                            if(this.viewcode.frontend){
                                tabledata.vue2.files.map(f=>{
                                    this.codegen += "//---------------------------------"+f.filename+" vue2\n";
                                    this.codegen += f.doc;
                                })
                            } 
                        //-------------vue3----code preview----------------start----
                            if( this.viewcode.frontend){
                                    tabledata.vue3.files.map(f=>{
                                        this.codegen += "//---------------------------------"+f.filename+" vue3\n";
                                        this.codegen += f.doc;
                                    })
                                    this.codegen  += tabledata.svelte.doc;
                            }
                            if(this.viewcode.backend){
                                    this.codegen  += tabledata.sql.doc;
                            }
                            routecodegen  += tabledata.routebygen.doc;
                            this.codedata.push(tabledata);
                    });

                   //------------add logincodedata------------- 
                    if(this.viewcode.backend){
                        if(this.codelogindata.model){
                            this.codegen += "//---------------------------------Login.php \n";
                            this.codegen += this.codelogindata.model;
                        }
                        if(this.codelogindata.jwtsrv){
                            this.codegen += "//---------------------------------JwtService.php \n";
                            this.codegen += this.codelogindata.jwtsrv;
                        }
                        if(this.codelogindata.loginsrv){
                            this.codegen += "//---------------------------------LoginService.php \n";
                            this.codegen += this.codelogindata.loginsrv;
                        }
                        if(this.codelogindata.loginctl){
                            this.codegen += "//---------------------------------LoginController.php \n";
                            this.codegen += this.codelogindata.loginctl;
                            routecodegen  = '$server->addClass("LoginController","",""); \n' + routecodegen;
                        }
                        if(this.codelogindata.jwtctl){
                            //this.codegen += "//---------------------------------JwtController.php \n";
                            //this.codegen += this.codelogindata.jwtctl;
                            //routecodegen  = '$server->addClass("JwtController","",""); \n' + routecodegen;
                        }
                        if(this.codelogindata.vuehtml){
                            this.codegen += "//---------------------------------Login.vue \n";
                            this.codegen += this.codelogindata.vuehtml;
                        }
                        this.codegen += routecodegen;
                        this.codegen += '\n\n';
                    }
                },                
                genHtmltable(table){ // gen แต่ละ table 
                    console.log('---gen---html----table----',table.table);
                    
                    let createdat = '';
                    let updatedat = '';
                    let deletedat = '';

                    let data = {
                        model:{
                            filename: table.modelclass +'.php',
                            doc: "",
                        },
                        service:{
                            filename: table.serviceclass+'.php',
                            doc: "",
                        },
                        controller:{
                            filename: table.controllerclass +'.php',
                            doc: "",
                        },
                        sql:{
                            filename: (new Date().valueOf())+'.sql',
                            doc: "",
                        },
                        vuetm:{
                            filename: table.table,
                            filetxt: "addroutes.txt",
                            classname: table.modelclass,
                            routedoc:'',
                            storedoc:'',
                            files: [
                            {
                                type:"store",
                                filename: "store/modules/"+table.table+"_store.js",
                                doc:""
                            },
                            { 
                                type:"route",
                                filename: "route/"+table.table+"_route.js",
                                doc:""
                            },
                            { 
                                type:"home",
                                filename: "pages/"+table.modelclass+"/Home.js",
                                doc:""
                            },
                            { 
                                type:"import",
                                filename: "pages/"+table.modelclass+"/Import.js",
                                doc:""
                            },
                            { 
                                type:"list",
                                filename: "pages/"+table.modelclass+"/List.js",
                                doc:""
                            },
                            { 
                                type:"export",
                                filename: "pages/"+table.modelclass+"/Export.js",
                                doc:""
                            },
                            { 
                                type:"printall",
                                filename: "pages/"+table.modelclass+"/Printall.js",
                                doc:""
                            },
                            { 
                                type:"add",
                                filename: "pages/"+table.modelclass+"/Add.js",
                                doc:""
                            },
                            { 
                                type:"edit",
                                filename: "pages/"+table.modelclass+"/Edit.js",
                                doc:""
                            },
                            { 
                                type:"delete",
                                filename: "pages/"+table.modelclass+"/Delete.js",
                                doc:""
                            },
                            { 
                                type:"print",
                                filename: "pages/"+table.modelclass+"/Print.js",
                                doc:""
                            },
                            { 
                                type:"view",
                                filename: "pages/"+table.modelclass+"/View.js",
                                doc:""
                            },
                            ]
                        },
                        vue2:{
                            filename: table.table,
                            filetxt: "addroutes.txt",
                            classname: table.modelclass,
                            routedoc:'',
                            storedoc:'',
                            files: [
                            {
                                type:"store",
                                filename: "store/modules/"+table.table+"_store.vue",
                                doc:""
                            },
                            { 
                                type:"route",
                                filename: "route/"+table.table+"_route.vue",
                                doc:""
                            },
                            { 
                                type:"home",
                                filename: "pages/"+table.modelclass+"/Home.vue",
                                doc:""
                            },
                            { 
                                type:"import",
                                filename: "pages/"+table.modelclass+"/Import.vue",
                                doc:""
                            },
                            { 
                                type:"list",
                                filename: "pages/"+table.modelclass+"/List.vue",
                                doc:""
                            },
                            { 
                                type:"export",
                                filename: "pages/"+table.modelclass+"/Export.vue",
                                doc:""
                            },
                            { 
                                type:"printall",
                                filename: "pages/"+table.modelclass+"/Printall.vue",
                                doc:""
                            },
                            { 
                                type:"add",
                                filename: "pages/"+table.modelclass+"/Add.vue",
                                doc:""
                            },
                            { 
                                type:"edit",
                                filename: "pages/"+table.modelclass+"/Edit.vue",
                                doc:""
                            },
                            { 
                                type:"delete",
                                filename: "pages/"+table.modelclass+"/Delete.vue",
                                doc:""
                            },
                            { 
                                type:"print",
                                filename: "pages/"+table.modelclass+"/Print.vue",
                                doc:""
                            },
                            { 
                                type:"view",
                                filename: "pages/"+table.modelclass+"/View.vue",
                                doc:""
                            },
                            ]
                        },
                        vue3:{
                            filename: table.table,
                            filetxt: "addroutes.txt",
                            classname: table.modelclass,
                            routedoc:'',
                            storedoc:'',
                            files: [
                            {
                                type:"store",
                                filename: "store/modules/"+table.table+"_store.vue",
                                doc:""
                            },
                            { 
                                type:"route",
                                filename: "route/"+table.table+"_route.vue",
                                doc:""
                            },
                            { 
                                type:"home",
                                filename: "pages/"+table.modelclass+"/Home.vue",
                                doc:""
                            },
                            { 
                                type:"import",
                                filename: "pages/"+table.modelclass+"/Import.vue",
                                doc:""
                            },
                            { 
                                type:"list",
                                filename: "pages/"+table.modelclass+"/List.vue",
                                doc:""
                            },
                            { 
                                type:"export",
                                filename: "pages/"+table.modelclass+"/Export.vue",
                                doc:""
                            },
                            { 
                                type:"printall",
                                filename: "pages/"+table.modelclass+"/Printall.vue",
                                doc:""
                            },
                            { 
                                type:"add",
                                filename: "pages/"+table.modelclass+"/Add.vue",
                                doc:""
                            },
                            { 
                                type:"edit",
                                filename: "pages/"+table.modelclass+"/Edit.vue",
                                doc:""
                            },
                            { 
                                type:"delete",
                                filename: "pages/"+table.modelclass+"/Delete.vue",
                                doc:""
                            },
                            { 
                                type:"print",
                                filename: "pages/"+table.modelclass+"/Print.vue",
                                doc:""
                            },
                            { 
                                type:"view",
                                filename: "pages/"+table.modelclass+"/View.vue",
                                doc:""
                            },]
                        },
                        svelte:{
                            filename: table.table +'.svelte',
                            doc: "",
                        },
                        routebygen:{
                            filename: "reoutebygen.php",
                            doc: "",
                        },
                    }
                    console.log('---testdata---',data);

                    let pks = this.getpkname(table.pk);
                    let modelcols = this.getmodlecols(table.cols);
                    
                    data.routebygen.doc = '$server->addClass("'+table.controllerclass+'","'+table.baseRoute+'",""); \n';
                    //----model.php-----
                        if(table.isModelclass){


                            let relationcode = this.gencoderelation();
                            console.log('gencoderelation-->',relationcode);
                            if(relationcode.error){
                                alert('ERROR! function '+ relationcode.err + ' ซ้ำกันในระบบกรุณตรวจสอบใหม่');
                                return;
                            }


                            html = "<\?php \n";
                            html += '//---------------Model--------------------------------------------'+table.modelclass+'.php\n';
                            html += "";
                            html += '\n';
                            html += '//----------------------------------------------\n';
                            html += '//FILE NAME:  '+table.modelclass+'.php gen for Servit Framework Model\n';
                            html += '//Created by: Tlen<limweb@hotmail.com>\n';
                            html += '//DATE: '+ new Date().toLocaleString('nl') +'\n';
                            html += '\n';
                            html += '//----------------------------------------------\n';
                            html += 'use Illuminate\\Database\\Eloquent\\Model;\n';
                            html += 'use Illuminate\\Database\\Eloquent\\SoftDeletes;\n';
                            html += 'use Servit\\Restsrv\\Model\\BaseModel;\n';
                            html += '//use DB;\n';
                            html += '\n';
                            html += 'class '+table.modelclass+' extends BaseModel { \n';
                            html += '\n';
                            //-----------soft--delete--------------------------
                            if(table.isSoftdelete){
                                html += '        use SoftDeletes;  \n';
                                if(!table.softdelete){
                                    if(table.cols.filter(col=>col.field == 'deleted_at').length == 0 ){
                                        data.sql.doc += 'ALTER TABLE `'+ table.table+ '` ADD COLUMN `deleted_at` datetime(0) NULL ; \n';
                                    }
                                    deletedat = 'deleted_at';
                                } else {
                                    deletedat = table.softdelete;
                                } 
                                html +=  '        const       DELETED_AT =  "' + deletedat + '"; \n';
                            }
                            html += '        protected	\$table="'+table.table+'"; \n';
                            html += '        protected	\$primaryKey="'+ pks.join(',')+'";\n';
                            html += '\n';
                            html += '        protected	\$dateFormat = \'Y-m-d H:i:s\';\n';
                            html += '        public	    \$timestamps = '+(table.isTimestamps?true:false)+';\n';
                            //----------------timestamp----------------------------
                            if(table.isTimestamps){
                                console.log('----test--date--',table.table,table.createdat,table.updatedat,(table.createdat && table.createdat != 'created_at'));
                                if(table.createdat && table.createdat == 'created_at'){
                                    createdat = table.createdat;
                                } else {
                                    if(table.cols.filter(col=>col.field == 'created_at').length == 0 ){
                                        data.sql.doc +='ALTER TABLE `'+table.table+'` ADD COLUMN `created_at` datetime(0) NULL DEFAULT current_timestamp; \n';
                                        createdat = 'created_at';
                                    } else {
                                        createdat = table.createdat;
                                    }
                                }
                                html += '        const       CREATED_AT = \''+createdat+'\';\n';

                                if(table.updatedat && table.updatedat == 'updated_at'){
                                    updatedat = table.updatedat;
                                } else {
                                    if(table.cols.filter(col=>col.field == 'updated_at').length == 0 ){
                                        data.sql.doc  +='ALTER TABLE `'+table.table+'` ADD COLUMN `updated_at` datetime(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP; \n';
                                        updatedat = 'updated_at';
                                    } else {
                                        updatedat = table.updatedat;
                                    }
                                }
                                html += '        const       UPDATED_AT = \''+updatedat+'\'; \n';
                            }
                            html += '        \n';
                            html += '        protected	\$guarded = ['+ modelcols.guarded +'];\n';
                            html += '        protected	\$fillable = ['+ modelcols.fillable +'];\n';
                            html += '        protected	\$hidden = ['+ modelcols.hidden +'];\n';
                            html += '        protected	\$appends = [];\n';
                            if( relationcode[table.table]){
                                html += '        protected	\$with = ['+relationcode[table.table]['xwith'].join(' ')+'];\n';
                            } else {
                                html += '        protected	\$with = [];\n';
                            }

                            html += '        protected	\$dates = ['+(createdat?'"'+createdat+'",':'')+(updatedat?'"'+updatedat+'",':'')+(deletedat?'"'+deletedat+'"':'')+'];\n';
                            html += '        protected  \$casts = [ ];\n\n\n';
                            //-------relation function ------------------------------
                            if( relationcode[table.table]){
                                let functions = relationcode[table.table]['func'];
                                Object.keys(functions).map(f=>{
                                    html += functions[f] ;
                                    html += '\n';
                                })
                            }
                            //-------relation function ------------------------------
                            html += '\n';
                            html += '} \n';
                            html += '\n';
                        } 
                        data.model.doc = html;
                    //----service.php------
                        html = '<\?php \n';
                        html += '//---------------Service------------------------------------------'+table.serviceclass+'.php\n';
                        html += ' \n';
                        html += '//---------------------------------------------- \n';
                        html += '//FILE NAME:  '+table.serviceclass+'.php gen for Servit Framework Service \n';
                        html += '//Created by: Tlen<limweb@hotmail.com> \n';
                        html += '//DATE: '+ new Date().toLocaleString('nl') +' \n';
                        html += ' \n';
                        html += '//---------------------------------------------- \n';
                        html += 'use \\Servit\\Restsrv\\RestServer\\RestException as TestException; \n';
                        html += 'use \\Servit\\Restsrv\\Traits\\DbTrait as DbTrait; \n';
                        html += 'use \\Servit\\Restsrv\\Service\\BaseService as BaseService; \n';
                        html += 'use \\Servit\\Restsrv\\Service\\BasedbService as BasedbService; \n';
                        html += 'use Illuminate\\Database\\Capsule\\Manager as Capsule; \n';
                        html += ' \n';
                        html += 'class '+table.serviceclass+' extends BaseService \n';
                        html += '{ \n';
                        html += ' \n';
                        html += '    public static function all($member=null) \n';
                        html += '    { \n';
                        html += '        return '+table.modelclass+'::get(); \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    public static function alliddesc($member=null) \n';
                        html += '    { \n';
                        html += '        return '+table.modelclass+'::orderBy("'+(pks?pks[0]:'id')+'", "desc")->get(); \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    public static function insert($arrdata,$member=null) \n';
                        html += '    { \n';
                        html += '        $r = new '+table.modelclass+'(); \n';
                        html += '        $fills = $r->getFillable(); \n';
                        html += '        foreach ($fills as $key) { \n';
                        html += '            if (isset($arrdata[$key])) { \n';
                        html += '                $r->{$key} = $arrdata[$key]; \n';
                        html += '            } \n';
                        html += '        } \n';
                        html += '        $r->save(); \n';
                        html += '        return $r; \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    public static function insertOrupdate($arrdata,$member=null) \n';
                        html += '    { \n';
                        html += '        $r = null; \n';
                        html += '        if (isset($arrdata["'+(pks?pks[0]:'id')+'"])) { \n';
                        html += '            $r = '+table.modelclass+'::find($arrdata["'+(pks?pks[0]:'id')+'"]); \n';
                        html += '        } \n';
                        html += '        if (!$r) { \n';
                        html += '            $r = new '+table.modelclass+'(); \n';
                        html += '        } \n';
                        html += ' \n';
                        html += '        $fills = $r->getFillable(); \n';
                        html += '        foreach ($fills as $key) { \n';
                        html += '            if (isset($arrdata[$key])) { \n';
                        html += '                $r->{$key} = $arrdata[$key]; \n';
                        html += '            } \n';
                        html += '        } \n';
                        html += '        $r->save(); \n';
                        html += '        return $r; \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    public static function getbyid($id,$member=null) \n';
                        html += '    { \n';
                        html += '        $r ='+table.modelclass+'::find($id); \n';
                        html += '        if($r){ \n';
                        html += '            return $r; \n';
                        html += '        } else { \n';
                        html += '            return 0; \n';
                        html += '        } \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    public static function delete($id,$member=null) \n';
                        html += '    { \n';
                        html += '        $r = '+table.modelclass+'::find($id); \n';
                        html += '        if ($r) { \n';
                        html += '            return $r->delete(); \n';
                        html += '        } else { \n';
                        html += '            return 0; \n';
                        html += '        } \n';
                        html += '    } \n';
                        html += '  \n';
                        html += '  \n';
                        html += '   public static function searchAll($page=1,$perpage=10,$kw="",$ajax=0,$member=null) { \n ';
                        html += '        $obj = new StdClass(); \n ';
                        html += '        $columns = ['+ modelcols.search +']; //searchColumn \n ';
                        html += '        $kws = []; \n ';
                        html += '        if ($kw) { \n ';
                        html += '            $kws = explode(",", $kw); \n ';
                        html += '        } \n ';
                        html += ' \n ';
                        html += '        $qry = '+table.modelclass+'::query(); \n ';
                        html += '        $qry->whereRaw("1 = 1"); \n ';
                        html += '        $vkw = ""; \n ';
                        html += '        if ($kws) { \n ';
                        html += '            foreach ($kws as $value) { \n ';
                        html += '                $vv = ""; \n ';
                        html += '                @list($k, $v) = explode("=", $value); \n ';
                        html += '                if ($v) { \n ';
                        html += '                    $v1 = str_replace("#", "/", $v); \n ';
                        html += '                    if ($v1) { \n ';
                        html += '                        $v2 = str_replace("@", ".", $v1); \n ';
                        html += '                        $vkw .= $v2 . ","; \n ';
                        html += '                        $vv = $v2; \n ';
                        html += '                    } \n ';
                        html += '                } else { \n ';
                        html += '                    $vv = $k; \n ';
                        html += '                } \n ';
                        html += ' \n ';
                        html += '                if ($k && $v) { \n ';
                        html += '                    $qry->Where($k, "like", "%" . $vv . "%"); \n ';
                        html += '                } else { \n ';
                        html += '                    $qry->where(function($query) use($columns,$vv){ \n ';
                        html += '                        foreach ($columns as $column) { \n ';
                        html += '                            $query->orWhere($column, "like", "%" . $vv . "%"); \n ';
                        html += '                        } \n ';
                        html += '                    }); \n ';
                        html += '                } \n ';
                        html += '            } \n ';
                        html += '        } \n ';
                        html += ' \n ';
                        html += '        $total = $qry->count(); \n ';
                        html += '        $skip = 0; \n ';
                        html += '        if ($total >= 500 || $ajax) { \n ';
                        html += '            if ($ajax == 0) { \n ';
                        html += '                $ajax = 1; \n ';
                        html += '            } \n ';
                        html += '            $skip = ((($page - 1) < 0) ? 0 : $page - 1) * $perpage; \n ';
                        html += '            if ($total < $skip) { \n ';
                        html += '                $skip = 0; \n ';
                        html += '            } \n ';
                        html += '            $datas = $qry->skip($skip)->take($perpage)->get(); \n ';
                        html += '        } else { \n ';
                        html += '            $datas = $qry->get(); \n ';
                        html += '        } \n ';
                        html += ' \n ';
                        html += '        $obj->total = $total; \n ';
                        html += '        $obj->skip = $skip; \n ';
                        html += '        $obj->datas = $datas; \n ';
                        html += '        $obj->skip = $skip; \n ';
                        html += '        $obj->ajax = $ajax; \n ';
                        html += '        $obj->perpage = $perpage; \n ';
                        html += '        $obj->page = $page; \n ';
                        html += '        return $obj; \n ';
                        html += '} \n ';                    
                        html += '  \n';
                        html += '  \n';
                        html += '}  \n';
                        html += ' \n';

                        data.service.doc = html;
                    
                    //----controller.php ---
                        html = '<\?php \n';
                        html += '//---------------Controller---------------------------------------'+table.controllerclass+'.php\n';
                        html += ' \n';
                        html += '//---------------------------------------------- \n';
                        html += '//FILE NAME:  '+table.controllerclass+'.php gen for Servit Framework Controller \n';
                        html += '//Created by: Tlen<limweb@hotmail.com> \n';
                        html += '//DATE: '+ new Date().toLocaleString('nl') +'  \n';
                        html += ' \n';
                        html += '//---------------------------------------------- \n';
                        html += 'use	\\Servit\\Restsrv\\RestServer\\RestException; \n';
                        html += 'use	\\Servit\\Restsrv\\RestServer\\RestController as BaseController; \n';
                        html += 'use	Illuminate\Database\\Capsule\\Manager as Capsule; \n';
                        html += 'use	Servit\\Restsrv\\Libs\\Request;  \n';
                        html += 'use	Servit\\Restsrv\\Libs\\Linenotify; \n';
                        html += 'use	Carbon\\Carbon; \n';
                        html += 'use    \\Servit\\Restsrv\\traits\\DbTrait; \n';
                        html += ' \n';
                        html += 'class '+table.controllerclass+'  extends BaseController {   //or JwtController\n';
                        html += '     \n';
                        html += ' \n';
                        html += '   /** \n';
                        html += '     *@noAuth \n';
                        html += '     *@url GET /'+ (table.baseRoute?'all':table.table)+' \n';
                        html += '     *---------------------------------------------- \n';
                        html += '     *FILE NAME:  '+table.controllerclass+' gen for Servit Framework Controller \n';
                        html += '     *DATE:'+ new Date().toLocaleString('nl') +' \n';
                        html += ' \n';
                        html += '     *---------------------------------------------- \n';
                        html += '     */ \n';
                        html += '    public function alliddesc() \n';
                        html += '    { \n';
                        html += '        try { \n';
                        html += '            // you can add $this->member for Extends JwtController \n';
                        html += '            $datas = '+table.serviceclass+'::alliddesc(); \n';
                        html += '            return [ \n';
                        html += '                "datas" => $datas, \n';
                        html += '                "status" => "1", \n';
                        html += '                "success" => true, \n';
                        html += '            ]; \n';
                        html += '        } catch (Exception $e) { \n';
                        html += '            return [ \n';
                        html += '                "status" => "0", \n';
                        html += '                "success" => false, \n';
                        html += '                "msg" => $e->getMessage(), \n';
                        html += '            ]; \n';
                        html += '        } \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    /** \n';
                        html += '     *@noAuth \n';
                        html += '     *@url POST '+ (table.baseRoute?'': '/'+table.table)+'/update \n';
                        html += '     *---------------------------------------------- \n';
                        html += '     *FILE NAME:  '+table.controllerclass+' gen for Servit Framework Controller \n';
                        html += '     *Created by: Tlen<limweb@hotmail.com> \n';
                        html += '     *DATE: '+ new Date().toLocaleString('nl') +' \n';
                        html += ' \n';
                        html += '     *---------------------------------------------- \n';
                        html += '    * Example: \n';
                        html += '    * <code>   \n';
                        html += '    * {    \n';
                        table.cols.forEach(col =>{
                            if(col.isEdit){
                                html += '    *     "'+col.field+'": "'+col.field+'"  \n';
                            }
                        });
                        html += '    * }    \n';
                        html += '    * </code>  \n';
                        html += '     */ \n';
                        html += '    public function update() \n';
                        html += '    { \n';
                        html += '        try { \n';
                        html += '            // you can add $this->member for Extends JwtController \n';
                        html += '            $rs = '+table.serviceclass+'::insertOrupdate($this->input->input->toArray()); \n';
                        html += '            $datas = '+table.serviceclass+'::alliddesc(); \n';
                        html += '            return [ \n';
                        html += '                "datas" => $datas, \n';
                        html += '                "status" => $rs, \n';
                        html += '                "success" => $rs, \n';
                        html += '            ]; \n';
                        html += '        } catch (Exception $e) { \n';
                        html += '            return [ \n';
                        html += '                "status" => "0", \n';
                        html += '                "success" => false, \n';
                        html += '                "msg" => $e->getMessage(), \n';
                        html += '            ]; \n';
                        html += '        } \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    /** \n';
                        html += '     *@noAuth \n';
                        html += '     *@url POST '+ (table.baseRoute?'': '/'+table.table)+'/add \n';
                        html += '     *---------------------------------------------- \n';
                        html += '     *FILE NAME:  '+table.controllerclass+' gen for Servit Framework Controller \n';
                        html += '     *Created by: Tlen<limweb@hotmail.com> \n';
                        html += '     *DATE: '+ new Date().toLocaleString('nl') +' \n';
                        html += ' \n';
                        html += '     *---------------------------------------------- \n';
                        html += '    * Example: \n';
                        html += '    * <code>   \n';
                        html += '    * {    \n';
                        table.cols.forEach(col =>{
                            if(col.isCreate){
                                html += '    *     "'+col.field+'": "'+col.field+'"  \n';
                            }
                        });
                        html += '    * }    \n';
                        html += '    * </code>  \n';                    
                        html += '     */ \n';
                        html += '    public function add() \n';
                        html += '    { \n';
                        html += '        try { \n';
                        html += '            // you can add $this->member for Extends JwtController \n';
                        html += '            $rs = '+table.serviceclass+'::insert($this->input->input->toArray()); \n';
                        html += '            $datas = '+table.serviceclass+'::alliddesc(); \n';
                        html += '            return [ \n';
                        html += '                "datas" => $datas, \n';
                        html += '                "status" => "1", \n';
                        html += '                "success" => true, \n';
                        html += '            ]; \n';
                        html += '        } catch (Exception $e) { \n';
                        html += '            return [ \n';
                        html += '                "status" => "0", \n';
                        html += '                "success" => false, \n';
                        html += '                "msg" => $e->getMessage(), \n';
                        html += '            ]; \n';
                        html += '        } \n';
                        html += '    } \n';
                        html += ' \n';
                        html += '    /** \n';
                        html += '     *@noAuth \n';
                        html += '     *@url GET '+ (table.baseRoute?'': '/'+table.table)+'/del/$id \n';
                        html += '     *---------------------------------------------- \n';
                        html += '     *FILE NAME:  '+table.controllerclass+'.php gen for Servit Framework Controller \n';
                        html += '     *Created by: Tlen<limweb@hotmail.com> \n';
                        html += '     *DATE:'+ new Date().toLocaleString('nl') +' \n';
                        html += ' \n';
                        html += '     *---------------------------------------------- \n';
                        html += '     */ \n';
                        html += '    public function del($id) \n';
                        html += '    { \n';
                        html += '        try { \n';
                        html += '            // you can add $this->member for Extends JwtController \n';
                        html += '            $rs = '+table.serviceclass+'::delete($id); \n';
                        html += '            $datas = '+table.serviceclass+'::alliddesc(); \n';
                        html += '            return [ \n';
                        html += '                "deleted" => $rs, \n';
                        html += '                "datas" => $datas, \n';
                        html += '                "status" => "1", \n';
                        html += '                "success" => true, \n';
                        html += '            ]; \n';
                        html += '        } catch (Exception $e) { \n';
                        html += '            return [ \n';
                        html += '                "status" => "0", \n';
                        html += '                "success" => false, \n';
                        html += '                "msg" => $e->getMessage(), \n';
                        html += '            ]; \n';
                        html += '        } \n';
                        html += '    } \n';
                        html += '/** \n';
                        html += '*@noAuth \n';
                        html += '*@url GET '+ (table.baseRoute?'': '/'+table.table)+'/getby/$id \n';
                        html += '*---------------------------------------------- \n';
                        html += '*FILE NAME:  '+ table.controllerclass +' gen for Servit Framework Controller \n';
                        html += '*Created by: Tlen<limweb@hotmail.com> \n';
                        html += '*DATE:  '+ new Date().toLocaleString('nl') +'  \n';
                        html += ' \n';
                        html += '*---------------------------------------------- \n';
                        html += '*/ \n';
                        html += 'public function getbyid($id){ \n';
                        html += '    try { \n';
                        html += '        // you can add $this->member for Extends JwtController \n';
                        html += '        $datas = '+table.serviceclass+'::getbyid($id); \n';
                        html += '        return [ \n';
                        html += '            "datas" => $datas, \n';
                        html += '            "status" => "1", \n';
                        html += '            "success"=> true, \n';
                        html += '        ]; \n';
                        html += '    } catch (Exception $e) { \n';
                        html += '        return[ \n';
                        html += '            "status" => "0", \n';
                        html += '            "success"=> false, \n';
                        html += '            "msg"=> $e->getMessage(), \n';
                        html += '        ];  \n';
                        html += '    } \n';
                        html += '}  \n';
                        html += '/** \n';
                        html += ' *@noAuth \n';
                        html += ' *@url GET '+ (table.baseRoute?'': '/'+table.table)+'/getall/ \n';
                        html += ' *@url GET '+ (table.baseRoute?'': '/'+table.table)+'/getall/$page \n';
                        html += ' *@url GET '+ (table.baseRoute?'': '/'+table.table)+'/getall/$page/$perpage \n';
                        html += ' *@url GET '+ (table.baseRoute?'': '/'+table.table)+'/getall/$page/$perpage/$ajax \n';
                        html += ' *@url GET '+ (table.baseRoute?'': '/'+table.table)+'/getall/$page/$perpage/$ajax/$kw \n';
                        html += ' */ \n';
                        html += 'public function all($page = 1, $perpage = 10, $kw = "", $ajax = 0){ \n';
                        html += '        $obj = '+ table.serviceclass+'::searchAll($page,$perpage,$kw,$ajax); \n';
                        html += '        $data = [ \n';
                        html += '            "ajax" => $obj->ajax, \n';
                        html += '            "status" => "1", \n';
                        html += '            "page" => $obj->page, \n';
                        html += '            "perpage" => $obj->perpage, \n';
                        html += '            "skip" => $obj->skip, \n';
                        html += '            "total" => $obj->total, \n';
                        html += '            "datacount" =>count($obj->datas), \n';
                        html += '            "datas" => $obj->datas, \n';
                        html += '        ]; \n';
                        html += '        // dump($data); \n';
                        html += '        return $data; \n';
                        html += ' \n';
                        html += '} \n';
                        html += '} \n';
                        html += ' \n';
                        html += ' \n';
                        data.controller.doc = html;
                    
                    
                    this.genvuetm(data.vuetm,table);
                    this.genvuev2(data.vue2,table);  // ยังไม่ได้ทำ todo
                    this.genvuev3(data.vue3,table);  // ยังไม่ได้ทำ todo
                    this.gensvelte(data.svelte,table);  // ยังไม่ได้ทำ todo
                    console.log('----data html---',data);
                    return data;
                },  
                genvuetm(vuetm,table){ //gen vuejs แบบ type=module
                   console.log('---genvuetm---',vuetm,table,vuetm.routedoc); 
                   vuetm.storedoc += "  import "+ table.table+ " from  \"/views/store/modules/"+ table.table +"_store.js\" \n";
                   vuetm.routedoc += "  import "+ table.table+ "_route from  \"/views/route/"+ table.table +"_route.js\" \n";
                   vuetm.files.map(f=>{
                    switch(f.type) {
                    case "list":
                    //---------------------- vue list--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "	template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "	<div class=\"card-header header-elements-inline\"> \n";
                        f.doc += "		<h5 class=\"card-title\">รายการสินค้า</h5> \n";
                        f.doc += "		<div class=\"header-elements\"> \n";
                        f.doc += "			<div class=\"list-icons\"> \n";
                        f.doc += "				<a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "				<a class=\"list-icons-item\" @click=\"reload\" data-action=\"reload\"></a> \n";
                        f.doc += "			</div> \n";
                        f.doc += "		</div> \n";
                        f.doc += "	</div> \n";
                        f.doc += " \n";
                        f.doc += "	<div class=\"card-body\" style=\"padding: 1px;\"> \n";
                        f.doc += "		<div class=\"dataTables_filter\"> \n";
                        f.doc += "			<label> \n";
                        f.doc += "				<span>Filter:</span> \n";
                        f.doc += "				<input type=\"search\" v-model=\"filter_text\" placeholder=\"Type to filter...\" autocomplete=\"off\"> \n";
                        f.doc += "			</label> \n";
                        f.doc += "		</div> \n";
                        f.doc += "		<div class=\"dataTables_length mr-3 d-flex\"> \n";
                        f.doc += "			<label> \n";
                        f.doc += "				<span>Show:</span> \n";
                        f.doc += "				<select v-model=\"perpage\"> \n";
                        f.doc += "					<option value=\"5\" data-select2-id=\"3\">5</option> \n";
                        f.doc += "					<option value=\"10\" data-select2-id=\"3\">10</option> \n";
                        f.doc += "					<option value=\"25\" data-select2-id=\"14\">25</option> \n";
                        f.doc += "					<option value=\"50\" data-select2-id=\"15\">50</option> \n";
                        f.doc += "					<option value=\"100\" data-select2-id=\"16\">100</option> \n";
                        f.doc += "				</select> \n";
                        f.doc += "			</label> \n";
                        f.doc += "			<div class=\"nav-item dropdown\"> \n";
                        f.doc += "				<a href=\"#\" class=\"navbar-nav-link dropdown-toggle \n";
                        f.doc += "						caret-0\" data-toggle=\"dropdown\"> \n";
                        f.doc += "					<span>columns<i class=\"icon-arrow-down22 mr-3 icon-1x\"></i></span> \n";
                        f.doc += "				</a> \n";
                        f.doc += "				<div class=\"dropdown-menu dropdown-menu-right \n";
                        f.doc += "						dropdown-content\" style=\"min-width: 200px !important;\"> \n";
                        f.doc += "					<div class=\"dropdown-content-body dropdown-scrollable\"> \n";
                        f.doc += "						<ul class=\"media-list\"> \n";
                        f.doc += "							<li class=\"media\" v-for=\"(col,idx) in columns.list\"> \n";
                        f.doc += "								<div class=\"media-body\"> \n";
                        f.doc += "									<span class=\"font-weight-semibold\">{{col.label}}</span> \n";
                        f.doc += "									<span class=\"text-muted\"><input type=\"checkbox\" \n";
                        f.doc += "											v-model=\"col.is_show\" /></span> \n";
                        f.doc += "								</div> \n";
                        f.doc += "							</li> \n";
                        f.doc += "						</ul> \n";
                        f.doc += "					</div> \n";
                        f.doc += "				</div> \n";
                        f.doc += "			</div> \n";
                        f.doc += "		</div> \n";
                        f.doc += "	</div> \n";
                        f.doc += " \n";
                        f.doc += "	<table class=\"table datatable-fixed-left dataTable\" width=\"100%\"> \n";
                        f.doc += "		<thead> \n";
                        f.doc += "			<tr class=\"bg-teal-400\"> \n";
                        f.doc += "				<th># <input v-model=\"checked_all\" @click=\"checkeall\" type=\"checkbox\"></th> \n";
                        f.doc += "				<th v-if=\"col.is_show\" v-for=\"(col,idx) in columns.list\" @click=\"sortcol(col,$event)\" :key=\"idx\" \n";
                        f.doc += "					:class=\"col.sort_class\"> \n";
                        f.doc += "					{{col.label}}</th> \n";
                        f.doc += "				<th style=\"min-width:150px;width:150px;\"> \n";
                        f.doc += "					&nbsp;Action \n";
                        f.doc += "				</th> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</thead> \n";
                        f.doc += "		<tbody> \n";
                        f.doc += "			<tr v-for=\"(item,idx) in datas\" :key=\"idx\"> \n";
                        f.doc += "				<td class=\"text-nowrap\" ><input type=\"checkbox\" class=\"mr-2\" v-model=\"item.checked\"> {{idx+1}}</td> \n";
                        f.doc += "				<td v-if=\"col.is_show\" v-for=\"(col,idy) in columns.list\" :key=\"idy\">{{item[col.field]}}</td> \n";
                        f.doc += "				<td class=\"d-flex flex-row\"> \n";
                        f.doc += "					<i style=\"cursor: pointer;\" @click=\"viewrow(item)\" class=\"icon-file-eye mr-1 icon-1x\"></i> \n";
                        f.doc += "					<i style=\"cursor: pointer;\" @click=\"editrow(idx)\" class=\"icon-pencil5 mr-1 icon-1x\"></i> \n";
                        f.doc += "					<i style=\"cursor: pointer;\" @click=\"deleterow(item)\" class=\"icon-trash mr-1 icon-1x\"></i> \n";
                        f.doc += "					<i style=\"cursor: pointer;\" @click=\"printrow(item)\" class=\"icon-shredder mr-1 icon-1x\"></i> \n";
                        f.doc += "				</td> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</tbody> \n";
                        f.doc += "		<thead> \n";
                        f.doc += "			<tr class=\"bg-teal-400\"> \n";
                        f.doc += "				<th># <input type=\"checkbox\"></th> \n";
                        f.doc += "				<th v-if=\"col.is_show\" v-for=\"(col,idx) in columns.list\" \n";
                        f.doc += "				@click=\"sortcol(col,$event)\" :key=\"idx\" \n";
                        f.doc += "				:class=\"col.sort_class\"> \n";
                        f.doc += "					{{col.label}}</th> \n";
                        f.doc += "				<th>&nbsp;Action</th> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</thead> \n";
                        f.doc += "	</table> \n";
                        f.doc += "	<div class=\"pt-2 pagerow\" style=\"border-top: 1px solid #b7b7b7;\"> \n";
                        f.doc += "		<div class=\"ml-2\"> Showing {{itempagestart}} to {{itempageend}} of {{total}} entries</div> \n";
                        f.doc += "		<paginate ref=\"paginate\" style=\"float: right;padding-right: 15px;\" :page-count=\"totalpage\" prev-text=\"Prev\" \n";
                        f.doc += "			next-text=\"Next\" :click-handler=\"changepage\" container-class=\"pagination\" page-class=\"page-item\" \n";
                        f.doc += "			page-link-class=\"page-link\" prev-class=\"page-item prev\" prev-link-class=\"page-link\" \n";
                        f.doc += "			next-class=\"page-item next\" next-link-class=\"page-link\"> \n";
                        f.doc += "		</paginate> \n";
                        f.doc += "	</div> \n";
                        f.doc += "	<br /> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		console.log(\"route เข้า component \", this); \n";
                        f.doc += "		// Pass a callback to next (optional) \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "			// // this callback has access to component instance (ie: 'this') via `vm` \n";
                        f.doc += "			// vm.$nextTick(() => { \n";
                        f.doc += "			// console.log(\"check vm\", vm); \n";
                        f.doc += "			// // vm.$root.$refs.overlay.style.display = \"none\"; \n";
                        f.doc += "			// }); \n";
                        f.doc += "			// vm.getdatas(); \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "		console.log(\"่ก่อน ออก จาก Component นี้ \"); \n";
                        f.doc += "		next(); \n";
                        f.doc += "		// if (this.update_save || this.insert_save) { \n";
                        f.doc += "		// if (confirm(\"ข้อมุูลที่แก้ไข ยังไม่ saved ต้องการ saveก่อน หรือไม่ ? \")) { \n";
                        f.doc += "		// next(false); \n";
                        f.doc += "		// } else { \n";
                        f.doc += "		// this.update_save = false; \n";
                        f.doc += "		// this.insert_save = false; \n";
                        f.doc += "		// next(vm => { \n";
                        f.doc += "		// // vm.$root.$refs.overlay.style.display = \"block\"; \n";
                        f.doc += "		// }); \n";
                        f.doc += "		// } \n";
                        f.doc += "		// } else { \n";
                        f.doc += "		// this.update_save = false; \n";
                        f.doc += "		// this.insert_save = false; \n";
                        f.doc += "		// next(vm => { \n";
                        f.doc += "		// // vm.$root.$refs.overlay.style.display = \"block\"; \n";
                        f.doc += "		// }); \n";
                        f.doc += "		// } \n";
                        f.doc += "	}, \n";
                        f.doc += "	mixins: [], \n";
                        f.doc += "	data() { \n";
                        f.doc += "		return { \n";
                        f.doc += "			theme: 'LIMILESS', \n";
                        f.doc += "			name: '"+table.modelclass+"_List', \n";
                        f.doc += "			checked_all: 0, \n";
                        f.doc += "			filter_text: '', \n";
                        f.doc += "			ajax: 0, \n";
                        f.doc += "			sort_field: '', \n";
                        f.doc += "			perpage: 10, \n";
                        f.doc += "			page: 1, \n";
                        f.doc += "			ajax: 0, \n";
                        f.doc += "		}; \n";
                        f.doc += "	}, \n";
                        f.doc += "	created() { \n";
                        f.doc += "		console.log(this.name + 'component is created'); \n";
                        f.doc += "		this.getdatas(); \n";
                        f.doc += "	}, \n";
                        f.doc += "	methods: { \n";
                        f.doc += "		sortcol(col, event) { \n";
                        f.doc += "			console.log('--sort---', col.field, event); \n";
                        f.doc += "			if(col.sort){ \n";
                        f.doc += "				this.sort_field = col.field; \n";
                        f.doc += "				this.$store.state."+table.table+".columns.list.map(colx => { \n";
                        f.doc += "					if (colx.sort) { \n";
                        f.doc += "						if (colx.field == this.sort_field) { \n";
                        f.doc += "							if (colx.sorttype == 0 || colx.sorttype == 2) { \n";
                        f.doc += "								console.log('---asc------'); \n";
                        f.doc += "								colx.sorttype = 1; \n";
                        f.doc += "								colx.sort_class = 'sorting_asc'; \n";
                        f.doc += "							} else { \n";
                        f.doc += "								console.log('---desc------'); \n";
                        f.doc += "								colx.sorttype = 2; \n";
                        f.doc += "								colx.sort_class = 'sorting_desc'; \n";
                        f.doc += "							} \n";
                        f.doc += "						} else { \n";
                        f.doc += "							colx.sort_class = 'sorting' \n";
                        f.doc += "						} \n";
                        f.doc += "					} else { \n";
                        f.doc += "						colx.sorttype = 0; \n";
                        f.doc += "						colx.sort_class = ''; \n";
                        f.doc += "					} \n";
                        f.doc += "				}); \n";
                        f.doc += "			} else { \n";
                        f.doc += "				event.preventDefault(); \n";
                        f.doc += "				console.log('-----no sortt---',col.field,col.sort); \n";
                        f.doc += "			} \n";
                        f.doc += "		}, \n";
                        f.doc += "		checkeall() { \n";
                        f.doc += "			console.log('---checkeall----'); \n";
                        f.doc += "			this.checked_all = !this.checked_all; \n";
                        f.doc += "			this.datas.map(row => row.checked = this.checked_all); \n";
                        f.doc += "		}, \n";
                        f.doc += "		viewrow(item) { \n";
                        f.doc += "			console.log('----viewrow----'); \n";
                        f.doc += "			this.$store.state."+table.table+".row_view = item; \n";
                        f.doc += "			this.$router.push('/"+table.table+"/view') \n";
                        f.doc += "		}, \n";
                        f.doc += "		editrow(item) { \n";
                        f.doc += "			console.log('----editrow----'); \n";
                        f.doc += "			this.$store.state."+table.table+".row_update = this.$store.state."+table.table+".datas[item]; \n";
                        f.doc += "			this.$router.push('/"+table.table+"/edit') \n";
                        f.doc += "		}, \n";
                        f.doc += "		deleterow(item) { \n";
                        f.doc += "			this.$store.state."+table.table+".row_delete = item; \n";
                        f.doc += "			console.log('----deleterow----',this.$store.state."+table.table+".row_delete); \n";
                        f.doc += "			this.$router.push('/"+table.table+"/del') \n";
                        f.doc += "		}, \n";
                        f.doc += "		printrow(item) { \n";
                        f.doc += "			console.log('----printrow----'); \n";
                        f.doc += "			this.$store.state."+table.table+".row_print = item; \n";
                        f.doc += "			this.$router.push('/"+table.table+"/print') \n";
                        f.doc += "		}, \n";
                        f.doc += "		changepage(page) { \n";
                        f.doc += "			console.log(\"changepage===>\", page); \n";
                        f.doc += "			this.page = page; \n";
                        f.doc += "			if (this.ajax) { \n";
                        f.doc += "				this.getdatas(); \n";
                        f.doc += "			} \n";
                        f.doc += "		}, \n";
                        f.doc += "		getdatas() { \n";
                        f.doc += "			 this.$axios.get('"+table.baseRoute+"/getall') \n";
                        f.doc += "			   .then((rs) => { \n";
                        f.doc += "  			 	console.log(rs); \n";
                        f.doc += "			 	    this.$store.state."+table.table+".datas = rs.data.datas; \n";
                        f.doc += "			   }) \n";
                        f.doc += "			   .catch((err) => { \n";
                        f.doc += "			     	console.log(err); \n";
                        f.doc += "			   }); \n";
                        f.doc += "		}, \n";
                        f.doc += "		reload(){ \n";
                        f.doc += "			this.getdatas(); \n";
                        f.doc += "			console.log('---reload---'); \n";
                        f.doc += "		}, \n";
                        f.doc += "	}, \n";
                        f.doc += "	mounted() { \n";
                        f.doc += "	}, \n";
                        f.doc += "	computed: { \n";
                        f.doc += "		filteredData() { \n";
                        f.doc += "			let datas = this.$store.state."+table.table+".datas; \n";
                        f.doc += "			if (this.filter_text) { \n";
                        f.doc += "				let searchcols = this.$store.state."+table.table+".columns.list.filter(c => c.is_search) \n";
                        f.doc += "				datas = datas.filter(row => { \n";
                        f.doc += "					return searchcols.some(c => { \n";
                        f.doc += "						return ( \n";
                        f.doc += "							String(row[c.field]) \n";
                        f.doc += "							.toLowerCase() \n";
                        f.doc += "							.indexOf(this.filter_text) > -1 \n";
                        f.doc += "						); \n";
                        f.doc += "					}); \n";
                        f.doc += "				}); \n";
                        f.doc += "			} \n";
                        f.doc += "			if (this.sort_field) { \n";
                        f.doc += "				let colsearch = this.$store.state."+table.table+".columns.list.find(c => c.field == this.sort_field); \n";
                        f.doc += "				let order = 0; \n";
                        f.doc += "				if (colsearch.sorttype == 2) { \n";
                        f.doc += "					order = -1; \n";
                        f.doc += "				} else if (colsearch.sorttype == 1) { \n";
                        f.doc += "					order = 1; \n";
                        f.doc += "				} \n";
                        f.doc += "				datas.sort((a, b) => { \n";
                        f.doc += "					a = a[colsearch.field]; \n";
                        f.doc += "					b = b[colsearch.field]; \n";
                        f.doc += "					if(isNaN(a) && a != undefined){ \n";
                        f.doc += "						return a.localeCompare(b) * order; \n";
                        f.doc += "					} else { \n";
                        f.doc += "						return (a-b) * order; \n";
                        f.doc += "					} \n";
                        f.doc += "				}); \n";
                        f.doc += "			} \n";
                        f.doc += "			return datas; \n";
                        f.doc += "		}, \n";
                        f.doc += "		datas() { \n";
                        f.doc += "			let datas = this.filteredData; \n";
                        f.doc += "			if (this.ajax) { \n";
                        f.doc += "				return datas; \n";
                        f.doc += "			} else { \n";
                        f.doc += "				if (this.page > this.totalpage) { \n";
                        f.doc += "					this.page = 1; \n";
                        f.doc += "					this.$refs.paginate ? (this.$refs.paginate.selected = 0) : null; \n";
                        f.doc += "				} \n";
                        f.doc += "				let skip = (this.page - 1) * Number(this.perpage); \n";
                        f.doc += "				let take = Number(skip) + Number(this.perpage); \n";
                        f.doc += "				return datas.slice(skip, take); \n";
                        f.doc += "			} \n";
                        f.doc += "		}, \n";
                        f.doc += "		columns() { \n";
                        f.doc += "			return this.$store.state."+table.table+".columns; \n";
                        f.doc += "		}, \n";
                        f.doc += "		totalpage() { \n";
                        f.doc += "			if (this.ajax) { \n";
                        f.doc += "				return Math.ceil(this.total / this.perpage); \n";
                        f.doc += "			} \n";
                        f.doc += "			return Math.ceil(this.filteredData.length / this.perpage); \n";
                        f.doc += "		}, \n";
                        f.doc += "		itempagestart() { \n";
                        f.doc += "			return (this.page - 1) * this.perpage + 1; \n";
                        f.doc += "		}, \n";
                        f.doc += "		itempageend() { \n";
                        f.doc += "			return this.perpage * this.page; \n";
                        f.doc += "		}, \n";
                        f.doc += "		total(){ \n";
                        f.doc += "			return this.$store.state."+table.table+".datas.length; \n";
                        f.doc += "		} \n";
                        f.doc += "	}, \n";
                        f.doc += "	components: {} \n";
                        f.doc += "}; \n";
                        f.doc += " \n";
                        f.doc += " \n";

                    break;
                    case "view":
                    //---------------------- vue view--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "  template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "  <div class=\"card-header bg-white header-elements-inline\"> \n";
                        f.doc += "    <h6 class=\"card-title\">View</h6> \n";
                        f.doc += "    <div class=\"header-elements\"> \n";
                        f.doc += "      <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green mr-4\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "      <div class=\"list-icons\"> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"reload\"></a> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </div> \n";
                        f.doc += "  </div> \n";
                        f.doc += "  <div class=\"card-body\"> \n";
                        f.doc += "    <div class=\"border border-info p-2 row\"> \n";
                        f.doc += "        <h6 class=\"mb-1 mb-1\" :class=\"columns.view.length>10?'col-md-6':'col-md-12'\" v-for=\"(col,idx) in columns.view\"> \n";
                        f.doc += "          <span class=\"font-weight-semibold\"></span> {{col.label}}:  \n";
                        f.doc += "          <span class=\"badge badge-primary badge-pill float-\"></span> \n";
                        f.doc += "          <span class=\"font-size-base text-muted d-block ml-1\">{{$store.state."+table.table+".row_view[col.field]}}</span> \n";
                        f.doc += "        </h6> \n";
                        f.doc += "     </div>  \n";
                        f.doc += "  </div> \n";
                        f.doc += "  <div class=\"card-footer bg-white d-flex justify-content-between align-items-center\"> \n";
                        f.doc += "      <button   @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "      </div> \n";
                        f.doc += "  </div> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "        if(Object.keys(vm.$store.state."+table.table+".row_view).length > 0){ \n";
                        f.doc += " \n";
                        f.doc += "        } else { \n";
                        f.doc += "           vm.$router.push('/"+table.table+"/'); \n";
                        f.doc += "        } \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "		next(vm=>{ \n";
                        f.doc += "      vm.$store.state."+table.table+".row_view = {}; \n";
                        f.doc += "    }); \n";
                        f.doc += "	}, \n";
                        f.doc += "  mixins: [], \n";
                        f.doc += "  data() { \n";
                        f.doc += "    return { \n";
                        f.doc += "      theme: 'LIMILESS', \n";
                        f.doc += "      name: '"+table.modelclass+"_View', \n";
                        f.doc += "    }; \n";
                        f.doc += "  }, \n";
                        f.doc += "  created() { \n";
                        f.doc += "    console.log(this.name + 'component is created'); \n";
                        f.doc += "  }, \n";
                        f.doc += "  mounted() {}, \n";
                        f.doc += "  methods: {}, \n";
                        f.doc += "  computed: { \n";
                        f.doc += "    columns() { \n";
                        f.doc += "      return this.$store.state."+table.table+".columns; \n";
                        f.doc += "    }, \n";
                        f.doc += "  }, \n";
                        f.doc += "  components: {} \n";
                        f.doc += "}; \n";
                        f.doc += " \n";

                    break;
                    case "print":
                    //---------------------- vue print--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "  template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "  <div class=\"card-header bg-white header-elements-inline noprint\"> \n";
                        f.doc += "    <h6 class=\"card-title noprint\">Print</h6> \n";
                        f.doc += "    <div class=\"header-elements noprint\"> \n";
                        f.doc += "      <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green mr-4\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "      <div class=\"list-icons\"> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"reload\"></a> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"remove\"></a> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </div> \n";
                        f.doc += "  </div> \n";
                        f.doc += " \n";
                        f.doc += "  <div class=\"card-body\"> \n";
                        f.doc += "    <div class=\"prnborder printarea\"> \n";
                        f.doc += "        <h6 class=\"mb-1 mb-1\" :class=\"columns.view.length>10?'col-md-6':'col-md-12'\" v-for=\"(col,idx) in columns.view\"> \n";
                        f.doc += "          <span class=\"font-weight-semibold\"></span> {{col.label}}:  \n";
                        f.doc += "          <span class=\"badge badge-primary badge-pill float-\"></span> \n";
                        f.doc += "          <span class=\"font-size-base text-muted d-block ml-1\">{{$store.state."+table.table+".row_print[col.field]}}</span> \n";
                        f.doc += "        </h6> \n";
                        f.doc += "     </div>  \n";
                        f.doc += "  </div> \n";
                        f.doc += "  <div class=\"card-footer bg-white d-flex  align-items-center noprint\"> \n";
                        f.doc += "    <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "        class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "    <button @click=\"print\" type=\"submit\" class=\"btn btn-primary ml-2\"><i style=\"cursor: pointer;\" class=\"icon-shredder mr-1 icon-1x\"></i> Print </button> \n";
                        f.doc += "  </div> \n";
                        f.doc += "</div> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "        if(Object.keys(vm.$store.state."+table.table+".row_print).length > 0){ \n";
                        f.doc += " \n";
                        f.doc += "        } else { \n";
                        f.doc += "           vm.$router.push('/"+table.table+"/'); \n";
                        f.doc += "        } \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "		next(vm=>{ \n";
                        f.doc += "      vm.$store.state."+table.table+".row_print = {}; \n";
                        f.doc += "    }); \n";
                        f.doc += "	}, \n";
                        f.doc += "  mixins: [], \n";
                        f.doc += "  data() { \n";
                        f.doc += "    return { \n";
                        f.doc += "      theme: 'LIMILESS', \n";
                        f.doc += "      name: '"+table.modelclass+"_Print', \n";
                        f.doc += "    }; \n";
                        f.doc += "  }, \n";
                        f.doc += "  created() { \n";
                        f.doc += "    console.log(this.name + 'component is created'); \n";
                        f.doc += "  }, \n";
                        f.doc += "  methods: { \n";
                        f.doc += "    print() { \n";
                        f.doc += "      window.print(); \n";
                        f.doc += "    }, \n";
                        f.doc += "  }, \n";
                        f.doc += "  mounted() {}, \n";
                        f.doc += "  computed: { \n";
                        f.doc += "    columns() { \n";
                        f.doc += "      return this.$store.state."+table.table+".columns; \n";
                        f.doc += "    }, \n";
                        f.doc += "  }, \n";
                        f.doc += "  components: {} \n";
                        f.doc += "}; \n";
                        f.doc += " \n";

                    break;
                    case "delete":
                    //---------------------- vue delete--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "  template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "  <div class=\"card-header bg-white header-elements-inline\"> \n";
                        f.doc += "    <h6 class=\"card-title\">Delete</h6> \n";
                        f.doc += "    <div class=\"header-elements\"> \n";
                        f.doc += "      <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green mr-4\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "      <div class=\"list-icons\"> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"reload\"></a> \n";
                        f.doc += "                <a class=\"list-icons-item\" data-action=\"remove\"></a> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </div> \n";
                        f.doc += "  </div> \n";
                        f.doc += " \n";
                        f.doc += "  <div class=\"card-body\"> \n";
                        f.doc += "    <div class=\"border p-2\"> \n";
                        f.doc += "        <h6 class=\"mb-1 mb-1\" :class=\"columns.view.length>10?'col-md-6':'col-md-12'\" v-for=\"(col,idx) in columns.view\"> \n";
                        f.doc += "          <span class=\"font-weight-semibold\"></span> {{col.label}}:  \n";
                        f.doc += "          <span class=\"badge badge-primary badge-pill float-\"></span> \n";
                        f.doc += "          <span class=\"font-size-base text-muted d-block ml-1\">{{$store.state."+table.table+".row_delete[col.field]}}</span> \n";
                        f.doc += "        </h6> \n";
                        f.doc += "     </div>  \n";
                        f.doc += "  </div> \n";
                        f.doc += "  <div class=\"card-footer bg-white d-flex  align-items-center\"> \n";
                        f.doc += "    <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "        class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "    <button type=\"submit\" @click=\"deleterow\" class=\"btn btn-danger ml-2\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "        class=\"icon-trash icon-1x\"></i> DEL </button> \n";
                        f.doc += "  </div> \n";
                        f.doc += "</div> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "        if(Object.keys(vm.$store.state."+table.table+".row_delete).length > 0){ \n";
                        f.doc += " \n";
                        f.doc += "        } else { \n";
                        f.doc += "           vm.$router.push('/"+table.table+"/'); \n";
                        f.doc += "        } \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "		next(vm=>{ \n";
                        f.doc += "      vm.$store.state."+table.table+".row_delete = {}; \n";
                        f.doc += "    }); \n";
                        f.doc += "	}, \n";
                        f.doc += "  mixins: [], \n";
                        f.doc += "  data() { \n";
                        f.doc += "    return { \n";
                        f.doc += "      theme: 'LIMILESS', \n";
                        f.doc += "      name: '"+table.modelclass+"_Delete', \n";
                        f.doc += "    }; \n";
                        f.doc += "  }, \n";
                        f.doc += "  created() { \n";
                        f.doc += "    console.log(this.name + 'component is created'); \n";
                        f.doc += "  }, \n";
                        f.doc += "  methods: { \n";
                        f.doc += "    deleterow(){ \n";
                        f.doc += "        console.log('---deleterow--');  \n";
                        f.doc += "        let cf  = confirm(\"คุณต้องการที่จะลบ รายการนี้หรือไม่ ? \"); \n";
                        f.doc += "        if(cf){ \n";
                        f.doc += "          let url = \"/api/"+table.table+"/del/\" + this.$store.state."+table.table+".row_delete.id; \n";
                        f.doc += "          axios.get(url) \n";
                        f.doc += "            .then((rs) => { \n";
                        f.doc += "              console.log(rs); \n";
                        f.doc += "              this.$router.push(\"/"+table.table+"/\");  \n";
                        f.doc += "            }) \n";
                        f.doc += "            .catch((err) => { \n";
                        f.doc += "              console.log(err); \n";
                        f.doc += "            }); \n";
                        f.doc += "        } \n";
                        f.doc += "    } \n";
                        f.doc += "  }, \n";
                        f.doc += "  mounted() {}, \n";
                        f.doc += "  computed: { \n";
                        f.doc += "    columns() { \n";
                        f.doc += "      return this.$store.state."+table.table+".columns; \n";
                        f.doc += "    }, \n";
                        f.doc += "  }, \n";
                        f.doc += "  components: {} \n";
                        f.doc += "}; \n";

                    break;
                    case "edit":
                    //---------------------- vue edit--------------------------------    
                        f.doc += "export default { \n";
                        f.doc += "template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "    <div class=\"card-header bg-white header-elements-inline\"> \n";
                        f.doc += "      <h6 class=\"card-title\">Edit</h6> \n";
                        f.doc += "      <div class=\"header-elements\"> \n";
                        f.doc += "        <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green mr-4\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "            class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "        <div class=\"list-icons\"> \n";
                        f.doc += "          <a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "          <a class=\"list-icons-item\" data-action=\"reload\"></a> \n";
                        f.doc += "          <a class=\"list-icons-item\" data-action=\"remove\"></a> \n";
                        f.doc += "        </div> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </div> \n";
                        f.doc += "    <form action=\"#\" @submit=\"submit\"> \n";
                        f.doc += "      <div class=\"card-body row\"> \n";

                        table.cols.map(col=>{
                            if(col.isCol && col.isEdit){
                                f.doc += "        <div class=\"form-group\" :class=\"gridclass\" > \n";
                                f.doc += "          <label>"+col.label+":</label> \n";
                                f.doc += "          <component is=\""+col.type.component+"\" v-model=\"row_update_clone['"+col.field+"']\" \n";
                                f.doc += "            placeholder=\""+col.label+"\" :required=\""+col.requed+"\"  \n";
                                if(col.extralation==1 && col.noext){
                                    f.doc += "            :datas=\"$store.state."+table.table+"."+col.field + '_' + col.relation_name+"\" \n";
                                    f.doc += "            field_label=\""+col.tablea_label+"\" \n"; 
                                    f.doc += "            field_value=\""+col.tablea_value+"\" \n"; 
                                } else if(col.extralation==2 && col.noext) {
                                        col.extprops.map(prop=>{
                                            switch ( prop['key'] ) {
                                                case 'datas':
                                                    f.doc += "      :datas=\"$store.state."+table.table+"."+col.field+"_datas\" \n";  
                                                    break;
                                                case 'example':
                                                    break;
                                                default:
                                                    f.doc +="        "+ prop['key'] +"=\"" + prop['data'] + "\" \n";
                                                    break;
                                            }
                                        });
                                }
                                f.doc += "                      /> \n";    
                                f.doc += "        </div> \n";
                            } // end if isCol isEdiit
                        });
                        f.doc += "      </div> \n";
                        f.doc += "      <div class=\"card-footer bg-white d-flex align-items-center\"> \n";
                        f.doc += "        <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green \"><i style=\"cursor: pointer;\" \n";
                        f.doc += "            class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "        <button type=\"submit\" @click=\"submit\" :disabled=\"!editchange\" class=\"btn btn-primary ml-2\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "            class=\"icon-floppy-disk icon-1x\"></i> Save </button> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </form> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "        if(Object.keys(vm.$store.state."+table.table+".row_update).length > 0){ \n";
                        f.doc += " \n";
                        f.doc += "        } else { \n";
                        f.doc += "           vm.$router.push('/"+table.table+"/'); \n";
                        f.doc += "        } \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "      console.log('------ก่อนออกจาก หน้า edit--------'); \n";
                        f.doc += "      if (this.editchange) { \n";
                        f.doc += "          if (confirm(\"ข้อมุูลที่แก้ไข ยังไม่ saved ต้องการ saveก่อน หรือไม่ ? \")) { \n";
                        f.doc += "              next(false); \n";
                        f.doc += "          } else { \n";
                        f.doc += "              next(vm => { \n";
                        f.doc += "                  vm.$store.state.rooms.row_update = {};  \n";
                        f.doc += "                  vm.row_update_clone = {};  \n";
                        f.doc += "              }); \n";
                        f.doc += "          } \n";
                        f.doc += "      } else { \n";
                        f.doc += "          next(vm => { \n";
                        f.doc += "                  vm.$store.state.rooms.row_update = {};  \n";
                        f.doc += "                  vm.row_update_clone = {};  \n";
                        f.doc += "          }); \n";
                        f.doc += "      } \n";                        
                        f.doc += "	}, \n";
                        f.doc += "mixins: [], \n";
                        f.doc += "data() { \n";
                        f.doc += "return { \n";
                        f.doc += "  theme: 'LIMILESS', \n";
                        f.doc += "  name: '"+table.modelclass+"_Edit', \n";
                        f.doc += "  editchange:false, \n";
                        f.doc += "  unwatch:()=>{}, \n";
                        f.doc += "  row_update_clone:{}, \n";
                        f.doc += "  gridclass:'col-sm-6 col-xl-6'  \n";                         
                        f.doc += "}; \n";
                        f.doc += "}, \n";
                        f.doc += "created() { \n";
                        f.doc += "  console.log(this.name + 'component is created'); \n";
                        f.doc += "  window.ved = this; \n";
                        f.doc += "}, \n";
                        f.doc += "methods: { \n";
                        f.doc += "  submit(event){ \n";
                        f.doc += "    event.preventDefault(); \n";
                        f.doc += "    console.log('---submit---',event); \n";
                        f.doc += "    if(this.editchange){ \n";
                        f.doc += "       console.log('---update-----'); \n";
                        f.doc += "       //this.updatebyidx(); \n";
                        f.doc += "       this.updatebykey(); \n";
                        f.doc += "       this.updateajax(); \n";
                        f.doc += "    } \n";
                        f.doc += "  }, \n";
                        f.doc += "  checkchange(){ \n";
                        f.doc += "     this.row_update_clone = Object.assign({}, this.$store.state."+table.table+".row_update); \n";
                        f.doc += "     this.unwatch = this.$watch( \n";
                        f.doc += "                \"row_update_clone\", \n";
                        f.doc += "                function(val, oldVal) { \n";
                        f.doc += "                    console.log(\"watch row_update is changed\"); \n";
                        f.doc += "                    this.editchange = true; \n";
                        f.doc += "                    this.unwatch(); \n";
                        f.doc += "                }, { deep: true } \n";
                        f.doc += "            ); \n";
                        f.doc += "  }, \n";
                        f.doc += "  updatebyidx(){ \n";
                        f.doc += "      let idx = this.$store.state."+table.table+".datas.findIndex(item=>item.id == this.$store.state."+table.table+".row_update.id); \n";
                        f.doc += "      this.$set(this.$store.state."+table.table+".datas,idx,this.row_update_clone); \n";
                        f.doc += "  }, \n";
                        f.doc += "  updatebykey(){ \n";
                        f.doc += "     Object.keys(this.$store.state."+table.table+".row_update).map(key=>{ \n";
                        f.doc += "            this.$store.state."+table.table+".row_update[key] = this.row_update_clone[key]; \n";
                        f.doc += "     }); \n";
                        f.doc += "  }, \n";
                        f.doc += "  updateajax() { \n";
                        f.doc += "      let url = '"+table.baseRoute+"/update'; \n";
                        f.doc += "      this.$axios.post(url,JSON.stringify(this.row_update_clone)) \n";
                        f.doc += "      .then((rs) => { \n";
                        f.doc += "        console.log(rs); \n";
                        f.doc += "        this.$router.push(\"/"+table.table+"/\"); \n";
                        f.doc += "      }) \n";
                        f.doc += "      .catch( (err) => { \n";
                        f.doc += "        console.log(err); \n";
                        f.doc += "        alert(\"Error:\"+err.msg) \n";
                        f.doc += "      }); \n";
                        f.doc += "  } \n";
                        f.doc += "}, \n";
                        f.doc += "mounted() { \n";
                        f.doc += "    this.checkchange();   \n";
                        f.doc += "}, \n";
                        f.doc += "computed: { \n";
                        f.doc += "  columns() { \n";
                        f.doc += "      return this.$store.state."+table.table+".columns; \n";
                        f.doc += "  }, \n";
                        f.doc += "}, \n";
                        f.doc += "components: {} \n";
                        f.doc += "}; \n";    
                    break;
                    case "add":
                    //---------------------- vue add--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "  template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "    <div class=\"card-header bg-white header-elements-inline\"> \n";
                        f.doc += "      <h6 class=\"card-title\">Add</h6> \n";
                        f.doc += "      <div class=\"header-elements\"> \n";
                        f.doc += "        <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green mr-4\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "            class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "        <div class=\"list-icons\"> \n";
                        f.doc += "                  <a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "                  <a class=\"list-icons-item\" data-action=\"reload\"></a> \n";
                        f.doc += "                  <a class=\"list-icons-item\" data-action=\"remove\"></a> \n";
                        f.doc += "        </div> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </div> \n";
                        f.doc += "    <form action=\"#\" @submit=\"submit\"> \n";
                        f.doc += "      <div class=\"card-body row\"> \n";
                        table.cols.map(col=>{
                            if(col.isCol && col.isCreate){
                                f.doc += "        <div class=\"form-group\" :class=\"gridclass\" > \n";
                                f.doc += "          <label>"+col.label+":</label> \n";
                                f.doc += "          <component is=\""+col.type.component+"\" v-model=\"$store.state."+table.table+".row_insert['"+col.field+"']\" \n";
                                f.doc += "            placeholder=\""+col.label+"\" :required=\""+col.requed+"\" \n";
                                if(col.extralation==1 && col.noext){
                                    f.doc += "            :datas=\"$store.state."+table.table+"."+col.field + '_' + col.relation_name+"\" \n";
                                    f.doc += "            field_label=\""+col.tablea_label+"\" \n"; 
                                    f.doc += "            field_value=\""+col.tablea_value+"\" \n";                                         
                                } else if(col.extralation==2 && col.noext) {
                                        col.extprops.map(prop=>{
                                            switch ( prop['key'] ) {
                                                case 'datas':
                                                    f.doc += "      :datas=\"$store.state."+table.table+"."+col.field+"_datas\" \n";  
                                                    break;
                                                case 'example':
                                                    break;
                                                default:
                                                    f.doc +="        "+ prop['key'] +"=\"" + prop['data'] + "\" \n";
                                                    break;
                                            }
                                        }); //--end props
                                } // end --if 
                                f.doc += "           /> \n";
                                f.doc += "        </div> \n";
                            } // end if isCol isCreate
                        }); // end table
                        
                        f.doc += "      </div> \n";
                        f.doc += "      <div class=\"card-footer bg-white d-flex align-items-center\"> \n";
                        f.doc += "        <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green \"><i style=\"cursor: pointer;\" \n";
                        f.doc += "            class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "        <button type=\"submit\" @click=\"submit\" :disabled=\"!editchange\" class=\"btn btn-primary ml-2\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "            class=\"icon-floppy-disk icon-1x\"></i> Save </button> \n";
                        f.doc += "      </div> \n";
                        f.doc += "    </form>   \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "  beforeRouteEnter(to, from, next) { \n";
                        f.doc += "    next(vm => { \n";
                        f.doc += "      // if(Object.keys(vm.$store.state."+table.table+".row_insert).length > 0){ \n";
                        f.doc += " \n";
                        f.doc += "      //    vm.$router.push('/"+table.table+"/'); \n";
                        f.doc += "      // } else { \n";
                        f.doc += "      // } \n";
                        f.doc += "    }); \n";
                        f.doc += "  }, \n";
                        f.doc += "  beforeRouteLeave(to, from, next) { \n";
                        f.doc += "      console.log('------ก่อนออกจาก หน้า add--------'); \n";
                        f.doc += "      if (this.editchange) { \n";
                        f.doc += "          if (confirm(\"ข้อมุูลที่แก้ไข ยังไม่ saved ต้องการ saveก่อน หรือไม่ ? \")) { \n";
                        f.doc += "              next(false); \n";
                        f.doc += "          } else { \n";
                        f.doc += "              next(vm => { \n";
                        f.doc += "                  vm.$store.state."+table.table+".row_insert = {}; \n";
                        f.doc += "              }); \n";
                        f.doc += "          } \n";
                        f.doc += "      } else { \n";
                        f.doc += "          next(vm => { \n";
                        f.doc += "              vm.$store.state."+table.table+".row_insert = {}; \n";
                        f.doc += "          }); \n";
                        f.doc += "      } \n";
                        f.doc += "  }, \n";
                        f.doc += "  mixins: [], \n";
                        f.doc += "  data() { \n";
                        f.doc += "    return { \n";
                        f.doc += "      theme: 'LIMILESS', \n";
                        f.doc += "      name: '"+table.modelclass+"_Add', \n";
                        f.doc += "      editchange:false, \n";
                        f.doc += "      unwatch:()=>{}, \n";
                        f.doc += "      gridclass:'col-sm-6 col-xl-6'  \n"; 
                        f.doc += "    }; \n";
                        f.doc += "  }, \n";
                        f.doc += "  created() { \n";
                        f.doc += "    console.log(this.name + 'component is created'); \n";
                        f.doc += "  }, \n";
                        f.doc += "  mounted() { \n";
                        f.doc += "    this.checkchange();   \n";
                        f.doc += "  }, \n";
                        f.doc += "  methods: { \n";
                        f.doc += "    checkchange(){ \n";
                        f.doc += "      this.unwatch = this.$watch( \n";
                        f.doc += "                  \"$store.state."+table.table+".row_insert\", \n";
                        f.doc += "                  function(val, oldVal) { \n";
                        f.doc += "                      console.log(\"watch row_insert is changed\"); \n";
                        f.doc += "                      this.editchange = true; \n";
                        f.doc += "                      this.unwatch(); \n";
                        f.doc += "                  }, { deep: true } \n";
                        f.doc += "              ); \n";
                        f.doc += "    }, \n";
                        f.doc += "    submit(event){ \n";
                        f.doc += "      event.preventDefault(); \n";
                        f.doc += "      console.log('---submit---',event); \n";
                        f.doc += "      if(this.editchange){ \n";
                        f.doc += "        console.log('---update-----'); \n";
                        f.doc += "        this.updateaddtodatas(); \n";
                        f.doc += "        this.updateajax(); \n";
                        f.doc += "      } \n";
                        f.doc += "    }, \n";
                        f.doc += "    updateaddtodatas(){ \n";
                        f.doc += "      if(this.editchange){ \n";
                        f.doc += "        this.$store.state."+table.table+".datas.push(this.$store.state."+table.table+".row_insert); \n";
                        f.doc += "      } \n";
                        f.doc += "    }, \n";
                        f.doc += "    updateajax(){ \n";
                        f.doc += "      if(this.editchange){ \n";
                        f.doc += "        let url = \""+table.baseRoute +"/add\"; \n";
                        f.doc += "        axios.post(url,JSON.stringify(this.$store.state."+table.table+".row_insert )) \n";
                        f.doc += "        .then((rs) => { \n";
                        f.doc += "            console.log(rs); \n";
                        f.doc += "             \n";
                        f.doc += "        }) \n";
                        f.doc += "        .catch( (err) => { \n";
                        f.doc += "            console.log(err); \n";
                        f.doc += "             \n";
                        f.doc += "        }); \n";
                        f.doc += "        this.$router.push(\"/"+table.table+"\"); \n";
                        f.doc += "      } \n";
                        f.doc += "    }, \n";
                        f.doc += "  }, \n";
                        f.doc += "  computed: { \n";
                        f.doc += "    columns() { \n";
                        f.doc += "      return this.$store.state."+table.table+".columns; \n";
                        f.doc += "    }, \n";
                        f.doc += "  }, \n";
                        f.doc += "  components: {} \n";
                        f.doc += "}; \n";

                    break;
                    case "printall":
                    //---------------------- vue printall--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "	template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "	<div class=\"card-header header-elements-inline\"> \n";
                        f.doc += "		<h5 class=\"card-title\">Print All</h5> \n";
                        f.doc += "		<div class=\"header-elements\"> \n";
                        f.doc += "			<div class=\"list-icons\"> \n";
                        f.doc += "				<a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "			</div> \n";
                        f.doc += "		</div> \n";
                        f.doc += "	</div> \n";
                        f.doc += " \n";
                        f.doc += "	<div class=\"card-body\" style=\"padding: 1px;\"> \n";
                        f.doc += "		<div class=\"dataTables_filter\"> \n";
                        f.doc += "     <button   @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "		</div> \n";
                        f.doc += "		<div class=\"dataTables_length mr-3 d-flex \" style=\"align-items: center;\"> \n";
                        f.doc += "         <label>กรุณาเลือกรายการที่ต้องการจะพิมพ์</label> \n";
                        f.doc += "         <button   @click=\"print\" type=\"button\" class=\"btn bg-primary ml-4\"><i style=\"cursor: pointer;\" class=\"icon-shredder mr-1 icon-1x\"></i>Print</button> \n";
                        f.doc += "		</div> \n";
                        f.doc += "	</div> \n";
                        f.doc += " \n";
                        f.doc += "	<table class=\"table datatable-fixed-left dataTable\" width=\"100%\"> \n";
                        f.doc += "		<thead> \n";
                        f.doc += "			<tr class=\"bg-teal-400\"> \n";
                        f.doc += "				<th># <input v-model=\"checked_all\" @click=\"checkeall\" type=\"checkbox\"></th> \n";
                        f.doc += "				<th v-if=\"col.is_show\" v-for=\"(col,idx) in columns.list\" @click=\"sortcol(col,$event)\" :key=\"idx\" \n";
                        f.doc += "					:class=\"col.sort_class\"> \n";
                        f.doc += "					{{col.label}}</th> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</thead> \n";
                        f.doc += "		<tbody> \n";
                        f.doc += "			<tr v-for=\"(item,idx) in datas\" :key=\"idx\"> \n";
                        f.doc += "				<td><input type=\"checkbox\" class=\"mr-2\" v-model=\"item.print\"> {{idx+1}}</td> \n";
                        f.doc += "				<td v-if=\"col.is_show\" v-for=\"(col,idy) in columns.list\" :key=\"idy\">{{item[col.field]}}</td> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</tbody> \n";
                        f.doc += "	</table> \n";
                        f.doc += "	<div class=\"pt-2 pagerow\" style=\"border-top: 1px solid #b7b7b7;\"> \n";
                        f.doc += "       <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green ml-3\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "	</div> \n";
                        f.doc += "	<br /> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		console.log(\"route เข้า component \", this); \n";
                        f.doc += "		// Pass a callback to next (optional) \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "		console.log(\"่ก่อน ออก จาก Component นี้ \"); \n";
                        f.doc += "		next(); \n";
                        f.doc += "	}, \n";
                        f.doc += "	mixins: [], \n";
                        f.doc += "	data() { \n";
                        f.doc += "		return { \n";
                        f.doc += "			theme: 'LIMILESS', \n";
                        f.doc += "			name: '"+table.modelclass+"_List', \n";
                        f.doc += "			checked_all: 0, \n";
                        f.doc += "			filter_text: '', \n";
                        f.doc += "			ajax: 0, \n";
                        f.doc += "			sort_field: '', \n";
                        f.doc += "			perpage: 10, \n";
                        f.doc += "			page: 1, \n";
                        f.doc += "			ajax: 0, \n";
                        f.doc += "		}; \n";
                        f.doc += "	}, \n";
                        f.doc += "	created() { \n";
                        f.doc += "		console.log(this.name + 'component is created'); \n";
                        f.doc += "	}, \n";
                        f.doc += "	methods: { \n";
                        f.doc += "		sortcol(col, event) { \n";
                        f.doc += "			console.log('--sort---', col.field, event); \n";
                        f.doc += "			if(col.sort){ \n";
                        f.doc += "				this.sort_field = col.field; \n";
                        f.doc += "				this.$store.state."+table.table+".columns.list.map(colx => { \n";
                        f.doc += "					if (colx.sort) { \n";
                        f.doc += "						if (colx.field == this.sort_field) { \n";
                        f.doc += "							if (colx.sorttype == 0 || colx.sorttype == 2) { \n";
                        f.doc += "								console.log('---asc------'); \n";
                        f.doc += "								colx.sorttype = 1; \n";
                        f.doc += "								colx.sort_class = 'sorting_asc'; \n";
                        f.doc += "							} else { \n";
                        f.doc += "								console.log('---desc------'); \n";
                        f.doc += "								colx.sorttype = 2; \n";
                        f.doc += "								colx.sort_class = 'sorting_desc'; \n";
                        f.doc += "							} \n";
                        f.doc += "						} else { \n";
                        f.doc += "							colx.sort_class = 'sorting' \n";
                        f.doc += "						} \n";
                        f.doc += "					} else { \n";
                        f.doc += "						colx.sorttype = 0; \n";
                        f.doc += "						colx.sort_class = ''; \n";
                        f.doc += "					} \n";
                        f.doc += "				}); \n";
                        f.doc += "			} else { \n";
                        f.doc += "				event.preventDefault(); \n";
                        f.doc += "				console.log('-----no sortt---',col.field,col.sort); \n";
                        f.doc += "			} \n";
                        f.doc += "		}, \n";
                        f.doc += "		checkeall() { \n";
                        f.doc += "			console.log('---checkeall----'); \n";
                        f.doc += "			this.checked_all = !this.checked_all; \n";
                        f.doc += "			this.datas.map(row => row.print = this.checked_all); \n";
                        f.doc += "		}, \n";
                        f.doc += "    print(){ \n";
                        f.doc += "      console.log('---print----'); \n";
                        f.doc += "      window.print(); \n";
                        f.doc += "    }, \n";
                        f.doc += "	}, \n";
                        f.doc += "	mounted() { \n";
                        f.doc += "	}, \n";
                        f.doc += "	computed: { \n";
                        f.doc += "		filteredData() { \n";
                        f.doc += "			let datas = this.$store.state."+table.table+".datas; \n";
                        f.doc += "			if (this.filter_text) { \n";
                        f.doc += "				let searchcols = this.$store.state."+table.table+".columns.list.filter(c => c.is_search) \n";
                        f.doc += "				datas = datas.filter(row => { \n";
                        f.doc += "					return searchcols.some(c => { \n";
                        f.doc += "						return ( \n";
                        f.doc += "							String(row[c.field]) \n";
                        f.doc += "							.toLowerCase() \n";
                        f.doc += "							.indexOf(this.filter_text) > -1 \n";
                        f.doc += "						); \n";
                        f.doc += "					}); \n";
                        f.doc += "				}); \n";
                        f.doc += "			} \n";
                        f.doc += "			if (this.sort_field) { \n";
                        f.doc += "				let colsearch = this.$store.state."+table.table+".columns.list.find(c => c.field == this.sort_field); \n";
                        f.doc += "				let order = 0; \n";
                        f.doc += "				if (colsearch.sorttype == 2) { \n";
                        f.doc += "					order = -1; \n";
                        f.doc += "				} else if (colsearch.sorttype == 1) { \n";
                        f.doc += "					order = 1; \n";
                        f.doc += "				} \n";
                        f.doc += "				datas.sort((a, b) => { \n";
                        f.doc += "					a = a[colsearch.field]; \n";
                        f.doc += "					b = b[colsearch.field]; \n";
                        f.doc += "					if(isNaN(a)){ \n";
                        f.doc += "						return a.localeCompare(b) * order; \n";
                        f.doc += "					} else { \n";
                        f.doc += "						return (a-b) * order; \n";
                        f.doc += "					} \n";
                        f.doc += "				}); \n";
                        f.doc += "			} \n";
                        f.doc += "			return datas; \n";
                        f.doc += "		}, \n";
                        f.doc += "		datas() { \n";
                        f.doc += "			let datas = this.filteredData; \n";
                        f.doc += "			return datas; \n";
                        f.doc += "		}, \n";
                        f.doc += "		columns() { \n";
                        f.doc += "			return this.$store.state."+table.table+".columns; \n";
                        f.doc += "		}, \n";
                        f.doc += "		totalpage() { \n";
                        f.doc += "			if (this.ajax) { \n";
                        f.doc += "				return Math.ceil(this.total / this.perpage); \n";
                        f.doc += "			} \n";
                        f.doc += "			return Math.ceil(this.filteredData.length / this.perpage); \n";
                        f.doc += "		}, \n";
                        f.doc += "		itempagestart() { \n";
                        f.doc += "			return (this.page - 1) * this.perpage + 1; \n";
                        f.doc += "		}, \n";
                        f.doc += "		itempageend() { \n";
                        f.doc += "			return this.perpage * this.page; \n";
                        f.doc += "		}, \n";
                        f.doc += "		total(){ \n";
                        f.doc += "			return this.$store.state."+table.table+".datas.length; \n";
                        f.doc += "		} \n";
                        f.doc += "	}, \n";
                        f.doc += "	components: {} \n";
                        f.doc += "}; \n";
                        f.doc += " \n";

                    break;
                    case "export":
                    //---------------------- vue export--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "	template: ` \n";
                        f.doc += "<div class=\"card\"> \n";
                        f.doc += "	<div class=\"card-header header-elements-inline\"> \n";
                        f.doc += "		<h5 class=\"card-title\">Export</h5> \n";
                        f.doc += "		<div class=\"header-elements\"> \n";
                        f.doc += "			<div class=\"list-icons\"> \n";
                        f.doc += "				<a class=\"list-icons-item\" data-action=\"collapse\"></a> \n";
                        f.doc += "			</div> \n";
                        f.doc += "		</div> \n";
                        f.doc += "	</div> \n";
                        f.doc += " \n";
                        f.doc += "	<div class=\"card-body\" style=\"padding: 1px;\"> \n";
                        f.doc += "		<div class=\"dataTables_filter\"> \n";
                        f.doc += "     	<button   @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "		</div> \n";
                        f.doc += "		<div class=\"dataTables_length mr-3 d-flex\"  style=\"align-items: center;\"> \n";
                        f.doc += "		       <label>กรุณาเลือกรายการที่ต้องการจะ export</label> \n";
                        f.doc += "         	   <button   @click=\"exportdata\" type=\"button\" class=\"btn bg-primary ml-4\"><i style=\"cursor: pointer;\" class=\"icon-download4 mr-1 icon-1x\"></i>Export</button> \n";
                        f.doc += "		</div> \n";
                        f.doc += "	</div> \n";
                        f.doc += " \n";
                        f.doc += "	<table class=\"table datatable-fixed-left dataTable\" width=\"100%\"> \n";
                        f.doc += "		<thead> \n";
                        f.doc += "			<tr class=\"bg-teal-400\"> \n";
                        f.doc += "				<th># <input v-model=\"checked_all\" @click=\"checkeall\" type=\"checkbox\"></th> \n";
                        f.doc += "				<th v-if=\"col.is_show\" v-for=\"(col,idx) in columns.list\" @click=\"sortcol(col,$event)\" :key=\"idx\" \n";
                        f.doc += "					:class=\"col.sort_class\"> \n";
                        f.doc += "					{{col.label}}</th> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</thead> \n";
                        f.doc += "		<tbody> \n";
                        f.doc += "			<tr v-for=\"(item,idx) in datas\" :key=\"idx\"> \n";
                        f.doc += "				<td><input type=\"checkbox\" class=\"mr-2\" v-model=\"item.export\"> {{idx+1}}</td> \n";
                        f.doc += "				<td v-if=\"col.is_show\" v-for=\"(col,idy) in columns.list\" :key=\"idy\">{{item[col.field]}}</td> \n";
                        f.doc += "			</tr> \n";
                        f.doc += "		</tbody> \n";
                        f.doc += "	</table> \n";
                        f.doc += "	<div class=\"pt-2 pagerow\" style=\"border-top: 1px solid #b7b7b7;\"> \n";
                        f.doc += "         <button @click=\"$router.push('/"+table.table+"/')\" type=\"button\" class=\"btn bg-green ml-3\"><i style=\"cursor: pointer;\" \n";
                        f.doc += "          class=\"icon-chevron-left icon-1x\"></i>Back</button> \n";
                        f.doc += "	</div> \n";
                        f.doc += "	<br /> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "	beforeRouteEnter(to, from, next) { \n";
                        f.doc += "		next(vm => { \n";
                        f.doc += "		}); \n";
                        f.doc += "	}, \n";
                        f.doc += "	beforeRouteLeave(to, from, next) { \n";
                        f.doc += "		next(); \n";
                        f.doc += "	}, \n";
                        f.doc += "	mixins: [], \n";
                        f.doc += "	data() { \n";
                        f.doc += "		return { \n";
                        f.doc += "			theme: 'LIMILESS', \n";
                        f.doc += "			name: '"+table.modelclass+"_List', \n";
                        f.doc += "			checked_all: 0, \n";
                        f.doc += "			filter_text: '', \n";
                        f.doc += "			ajax: 0, \n";
                        f.doc += "			sort_field: '', \n";
                        f.doc += "			perpage: 10, \n";
                        f.doc += "			page: 1, \n";
                        f.doc += "			ajax: 0, \n";
                        f.doc += "		}; \n";
                        f.doc += "	}, \n";
                        f.doc += "	created() { \n";
                        f.doc += "		console.log(this.name + 'component is created'); \n";
                        f.doc += "	}, \n";
                        f.doc += "	methods: { \n";
                        f.doc += "		sortcol(col, event) { \n";
                        f.doc += "			console.log('--sort---', col.field, event); \n";
                        f.doc += "			if(col.sort){ \n";
                        f.doc += "				this.sort_field = col.field; \n";
                        f.doc += "				this.$store.state."+table.table+".columns.list.map(colx => { \n";
                        f.doc += "					if (colx.sort) { \n";
                        f.doc += "						if (colx.field == this.sort_field) { \n";
                        f.doc += "							if (colx.sorttype == 0 || colx.sorttype == 2) { \n";
                        f.doc += "								console.log('---asc------'); \n";
                        f.doc += "								colx.sorttype = 1; \n";
                        f.doc += "								colx.sort_class = 'sorting_asc'; \n";
                        f.doc += "							} else { \n";
                        f.doc += "								console.log('---desc------'); \n";
                        f.doc += "								colx.sorttype = 2; \n";
                        f.doc += "								colx.sort_class = 'sorting_desc'; \n";
                        f.doc += "							} \n";
                        f.doc += "						} else { \n";
                        f.doc += "							colx.sort_class = 'sorting' \n";
                        f.doc += "						} \n";
                        f.doc += "					} else { \n";
                        f.doc += "						colx.sorttype = 0; \n";
                        f.doc += "						colx.sort_class = ''; \n";
                        f.doc += "					} \n";
                        f.doc += "				}); \n";
                        f.doc += "			} else { \n";
                        f.doc += "				event.preventDefault(); \n";
                        f.doc += "				console.log('-----no sortt---',col.field,col.sort); \n";
                        f.doc += "			} \n";
                        f.doc += "		}, \n";
                        f.doc += "		checkeall() { \n";
                        f.doc += "			console.log('---checkeall----'); \n";
                        f.doc += "			this.checked_all = !this.checked_all; \n";
                        f.doc += "			this.datas.map(row => row.export = this.checked_all); \n";
                        f.doc += "		}, \n";
                        f.doc += "		exportdata(){ \n";
                        f.doc += "			console.log('---export---'); \n";
                        f.doc += "          var wb = XLSX.utils.book_new();   \n";
                        f.doc += "          wb.Props = {   \n";
                        f.doc += "              Title: \"Export "+table.modelclass+"\",   \n";
                        f.doc += "              Subject: \"export\",   \n";
                        f.doc += "              Author: \"Thongchai Lim Vuevm\",   \n";
                        f.doc += "              CreatedDate: new Date(2017,12,19)   \n";
                        f.doc += "          };   \n";
                        f.doc += "          wb.SheetNames.push(\"export Sheet\");   \n";
                        f.doc += "          var ws_data = []; \n";
                        f.doc += "          ws_data.push(this.$store.state."+table.table+".columns.list.map(col=>col.label));			 \n";
                        f.doc += "          this.datas.map(row=>{ \n";
                        f.doc += "              if(row.export){ \n";
                        f.doc += "                  delete row.export; \n";
                        f.doc += "                  let data = Object.values(row); \n";
                        f.doc += "                  ws_data.push(data); \n";
                        f.doc += "              } \n";
                        f.doc += "          }); \n";
                        f.doc += "          var ws = XLSX.utils.aoa_to_sheet(ws_data);   \n";
                        f.doc += "          wb.Sheets[\"export Sheet\"] = ws;   \n";
                        f.doc += "          var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});   \n";
                        f.doc += "          function s2ab(s) {    \n";
                        f.doc += "              var buf = new ArrayBuffer(s.length); //convert s to arrayBuffer   \n";
                        f.doc += "              var view = new Uint8Array(buf);  //create uint8array as viewer   \n";
                        f.doc += "              for (var i=0; i < s.length; i++){   \n";
                        f.doc += "                  view[i] = s.charCodeAt(i) & 0xFF; //convert to octet   \n";
                        f.doc += "              }   \n";
                        f.doc += "              return buf;       \n";
                        f.doc += "          }   \n";
                        f.doc += "          let d = new Date()   \n";
                        f.doc += "          const a = document.createElement(\"a\");   \n";
                        f.doc += "          a.style.display = \"none\";   \n";
                        f.doc += "          document.body.appendChild(a);   \n";
                        f.doc += "          a.href = window.URL.createObjectURL(   \n";
                        f.doc += "              new Blob([s2ab(wbout)],{type: \"application/octet-stream\"})   \n";
                        f.doc += "          );   \n";
                        f.doc += "          a.setAttribute(\"download\", ( d.getFullYear()+'-'+ d.getMonth() + '-'+ d.getDate() +'-' + d.getMilliseconds() ) +'_'+'export_"+table.table+".xlsx');   \n";
                        f.doc += "          a.click();   \n";
                        f.doc += "          window.URL.revokeObjectURL(a.href);   \n";
                        f.doc += "          document.body.removeChild(a);   \n";
                        f.doc += "		}, \n";
                        f.doc += "	}, \n";
                        f.doc += "	mounted() { \n";
                        f.doc += "	}, \n";
                        f.doc += "	computed: { \n";
                        f.doc += "		filteredData() { \n";
                        f.doc += "			let datas = this.$store.state."+table.table+".datas; \n";
                        f.doc += "			if (this.filter_text) { \n";
                        f.doc += "				let searchcols = this.$store.state."+table.table+".columns.list.filter(c => c.is_search) \n";
                        f.doc += "				datas = datas.filter(row => { \n";
                        f.doc += "					return searchcols.some(c => { \n";
                        f.doc += "						return ( \n";
                        f.doc += "							String(row[c.field]) \n";
                        f.doc += "							.toLowerCase() \n";
                        f.doc += "							.indexOf(this.filter_text) > -1 \n";
                        f.doc += "						); \n";
                        f.doc += "					}); \n";
                        f.doc += "				}); \n";
                        f.doc += "			} \n";
                        f.doc += "			if (this.sort_field) { \n";
                        f.doc += "				let colsearch = this.$store.state."+table.table+".columns.list.find(c => c.field == this.sort_field); \n";
                        f.doc += "				let order = 0; \n";
                        f.doc += "				if (colsearch.sorttype == 2) { \n";
                        f.doc += "					order = -1; \n";
                        f.doc += "				} else if (colsearch.sorttype == 1) { \n";
                        f.doc += "					order = 1; \n";
                        f.doc += "				} \n";
                        f.doc += "				datas.sort((a, b) => { \n";
                        f.doc += "					a = a[colsearch.field]; \n";
                        f.doc += "					b = b[colsearch.field]; \n";
                        f.doc += "					if(isNaN(a)){ \n";
                        f.doc += "						return a.localeCompare(b) * order; \n";
                        f.doc += "					} else { \n";
                        f.doc += "						return (a-b) * order; \n";
                        f.doc += "					} \n";
                        f.doc += "				}); \n";
                        f.doc += "			} \n";
                        f.doc += "			return datas; \n";
                        f.doc += "		}, \n";
                        f.doc += "		datas() { \n";
                        f.doc += "			let datas = this.filteredData; \n";
                        f.doc += "			return datas; \n";
                        f.doc += "		}, \n";
                        f.doc += "		columns() { \n";
                        f.doc += "			return this.$store.state."+table.table+".columns; \n";
                        f.doc += "		}, \n";
                        f.doc += "		totalpage() { \n";
                        f.doc += "			if (this.ajax) { \n";
                        f.doc += "				return Math.ceil(this.total / this.perpage); \n";
                        f.doc += "			} \n";
                        f.doc += "			return Math.ceil(this.filteredData.length / this.perpage); \n";
                        f.doc += "		}, \n";
                        f.doc += "		itempagestart() { \n";
                        f.doc += "			return (this.page - 1) * this.perpage + 1; \n";
                        f.doc += "		}, \n";
                        f.doc += "		itempageend() { \n";
                        f.doc += "			return this.perpage * this.page; \n";
                        f.doc += "		}, \n";
                        f.doc += "		total(){ \n";
                        f.doc += "			return this.$store.state."+table.table+".datas.length; \n";
                        f.doc += "		} \n";
                        f.doc += "	}, \n";
                        f.doc += "	components: {} \n";
                        f.doc += "}; \n";
                        f.doc += " \n";
                    break;
                    case "import":
                    //---------------------- vue import--------------------------------
                        f.doc += "export default {  \n";
                        f.doc += "	template: `  \n";
                        f.doc += "<div>  \n";
                        f.doc += "	<div class=\"card\">  \n";
                        f.doc += "		<div class=\"card-header\">  \n";
                        f.doc += "			<div class=\"row\">  \n";
                        f.doc += "				<div class=\"col-md-10\">  \n";
                        f.doc += "					<div class=\"header-elements-inline\">  \n";
                        f.doc += "						<h5 class=\"card-title\">Upload Import</h5>  \n";
                        f.doc += "						<div class=\"header-elements\">  \n";
                        f.doc += "							<div class=\"list-icons\">  \n";
                        f.doc += "							</div>  \n";
                        f.doc += "						</div>  \n";
                        f.doc += "					</div>  \n";
                        f.doc += "				</div>  \n";
                        f.doc += "			</div>  \n";
                        f.doc += "		</div>  \n";
                        f.doc += "		<div class=\"card-body\">  \n";
                        f.doc += "			  <div class=\"row\">  \n";
                        f.doc += "				<div class=\"col-md-8\">  \n";
                        f.doc += "					<form action=\"#\">  \n";
                        f.doc += "						<div class=\"form-group row\">  \n";
                        f.doc += "							<div class=\"col-lg-12\">  \n";
                        f.doc += "								<div class=\"uniform-uploader\">  \n";
                        f.doc += "									<input @change=\"processFile\" type=\"file\"  \n";
                        f.doc += "									accept=\".xlsx, .xls, .csv\"  \n";
                        f.doc += "									class=\"form-input-styled\" >  \n";
                        f.doc += "									<span class=\"filename\"  \n";
                        f.doc += "									style=\"user-select:none;\">{{filename ? filename : 'No file selected' }}</span>  \n";
                        f.doc += "									<span class=\"action btn bg-pink-400\"  \n";
                        f.doc += "									style=\"user-select: none;\">Choose File</span>  \n";
                        f.doc += "								</div>  \n";
                        f.doc += "								<span class=\"form-text text-muted\">Accepted formats: xls, xlsx. Max file size 2Mb</span>  \n";
                        f.doc += "							</div>  \n";
                        f.doc += "						</div>  \n";
                        f.doc += "						<div class=\"form-group row\">  \n";
                        f.doc += "							<div class=\"col-lg-12\">  \n";
                        f.doc += "								<div class=\"uniform-uploader\">  \n";
                        f.doc += "									<!-- <button type=\"submit\" class=\"btn btn-primary\">  \n";
                        f.doc += "									 	<i class=\"icon-import icon-1x  mr-2\"></i>  \n";
                        f.doc += "										Upload and Review  \n";
                        f.doc += "									</button> -->  \n";
                        f.doc += "									<!-- <button type=\"button\" class=\"btn btn-primary ml-4\">  \n";
                        f.doc += "										<i class=\"icon-download4 mr-2\"></i>  \n";
                        f.doc += "										Download Template  \n";
                        f.doc += "									</button> -->  \n";
                        f.doc += "								</div>  \n";
                        f.doc += "							</div>  \n";
                        f.doc += "						</div>  \n";
                        f.doc += "					</form>  \n";
                        f.doc += "				</div>  \n";
                        f.doc += "				<div class=\"col-md-4\">  \n";
                        f.doc += "						<button @click=\"downloadtemplate\" type=\"button\" class=\"btn btn-primary ml-4\">  \n";
                        f.doc += "							<i class=\"icon-download4 mr-2\"></i>  \n";
                        f.doc += "							Download Template  \n";
                        f.doc += "						</button>  \n";
                        f.doc += "				</div>  \n";
                        f.doc += "			</div>  \n";
                        f.doc += "		</div>  \n";
                        f.doc += "	</div>  \n";
                        f.doc += "	<div class=\"card\"  v-if=\"datas.length > 0 && validate\">  \n";
                        f.doc += "		<div class=\"card-body\">  \n";
                        f.doc += "			<div class=\"row\">  \n";
                        f.doc += "			 	<table class=\"table datatable-fixed-left dataTable\" width=\"100%\">  \n";
                        f.doc += "				 <thead>  \n";
                        f.doc += "				 	<tr class=\"bg-teal-400\"  width=\"100%\">  \n";
                        f.doc += "						<th @click=\"selectall\"># <input type=\"checkbox\" v-model=\"selectallitem\" /></th>  \n";
                        f.doc += "						<th v-for=\"(col,idx) in columns.list\" :key=\"idx\" >{{col.label}}</th>  \n";
                        f.doc += "						<th><button @click=\"imports\" :disabled=\"selected\" class=\"btn btn-primary\">Create Selected</button></th>  \n";
                        f.doc += "					</tr>  \n";
                        f.doc += "				 </thead>  \n";
                        f.doc += "				 <tbody>  \n";
                        f.doc += "					 <tr v-for=\"(item,idx) in datas\">  \n";
                        f.doc += "						 <td @click=\"selectone\"># <input type=\"checkbox\" v-model=\"item.checked\" /></td>  \n";
                        f.doc += "						 <td v-for=\"(col,idy) in columns.list\" :key=\"idy\" >{{item[col.field]}}</td>  \n";
                        f.doc += "						 <td><button @click=\"importitem(item)\" class=\"btn btn-primary\">Create</button></td>  \n";
                        f.doc += "					 </tr>  \n";
                        f.doc += "				 </tbody>  \n";
                        f.doc += "		 			<thead>  \n";
                        f.doc += "				 	<tr class=\"bg-teal-400\">  \n";
                        f.doc += "						<th @click=\"selectall\"># <input type=\"checkbox\" v-model=\"selectallitem\" /></th>  \n";
                        f.doc += "						<th v-for=\"(col,idx) in columns.list\" :key=\"idx\" >{{col.label}}</th>  \n";
                        f.doc += "						<th><button @click=\"imports\" :disabled=\"selected\" class=\"btn btn-primary\">Create Selected</button></th>  \n";
                        f.doc += "					</tr>  \n";
                        f.doc += "				 </thead>  \n";
                        f.doc += "				 </table>  \n";
                        f.doc += "			</div>  \n";
                        f.doc += "		</div>  \n";
                        f.doc += "	</div>  \n";
                        f.doc += "</div>  \n";
                        f.doc += "	`,  \n";
                        f.doc += "	mixins: [],  \n";
                        f.doc += "	data() {  \n";
                        f.doc += "		return {  \n";
                        f.doc += "			theme: 'LIMILESS',  \n";
                        f.doc += "			name: '"+table.modelclass+"_Import',  \n";
                        f.doc += "			selectallitem:false,  \n";
                        f.doc += "			validate:false,  \n";
                        f.doc += "			rowone:[],  \n";
                        f.doc += "			datas:[],  \n";
                        f.doc += "			fileupload:'',  \n";
                        f.doc += "			filename:'',  \n";
                        f.doc += "			fileb64:'',  \n";
                        f.doc += "		};  \n";
                        f.doc += "	},  \n";
                        f.doc += "	created() {  \n";
                        f.doc += "		console.log(this.name + 'component is created');  \n";
                        f.doc += "	},  \n";
                        f.doc += "	methods: {  \n";
                        f.doc += "		importitem(item){  \n";
                        f.doc += "			let data = {};  \n";
                        f.doc += "			this.columns.list.map((c,idx)=>{  \n";
                        f.doc += "				data[c.field]=item[idx];  \n";
                        f.doc += "			});  \n";
                        f.doc += "			console.log('---data--',data);  \n";
                        f.doc += "			// axios.post(\"/api/"+table.table+"\",JSON.stringify(data)).then((rs) => {  \n";
                        f.doc += "			// 	console.log(rs);  \n";
                        f.doc += "			// })  \n";
                        f.doc += "			// .catch( (err) => {  \n";
                        f.doc += "			// 	console.log(err);  \n";
                        f.doc += "			// });  \n";
                        f.doc += "		},  \n";
                        f.doc += "		imports(){  \n";
                        f.doc += "			//this.datas.map(item=>{  \n";
                        f.doc += "			//	if(item.checked){  \n";
                        f.doc += "			//		console.log(item)  \n";
                        f.doc += "			//		this.importitem(item);  \n";
                        f.doc += "			//	}  \n";
                        f.doc += "			//});  \n";
                        f.doc += "			let impdatas = this.datas.filter(item=>item.checked);  \n";
                        f.doc += "			console.log('--impdatas-->',impdatas);  \n";
                        f.doc += "			// axios.post(\"/api/"+table.table+"\",JSON.stringify(impdata))  \n";
                        f.doc += "			// .then((rs) => {  \n";
                        f.doc += "			// 	console.log(rs);  \n";
                        f.doc += "			// })  \n";
                        f.doc += "			// .catch( (err) => {  \n";
                        f.doc += "			// 	console.log(err);  \n";
                        f.doc += "			// });  \n";
                        f.doc += "		},  \n";
                        f.doc += "		selectall(){  \n";
                        f.doc += "			this.selectallitem = !this.selectallitem;  \n";
                        f.doc += "			this.datas.map(r=>r.checked = this.selectallitem);  \n";
                        f.doc += "		},  \n";
                        f.doc += "		selectone(){  \n";
                        f.doc += "			console.log('---selectone---');  \n";
                        f.doc += "			// if(this.datas.filter(c=>c.checked).length == 0){  \n";
                        f.doc += "			// 	this.selectallitem = false;  \n";
                        f.doc += "			// }  \n";
                        f.doc += "		},  \n";
                        f.doc += "		processFile(event) {  \n";
                        f.doc += "    		this.fileupload = event.target.files[0];  \n";
                        f.doc += "			if(this.fileupload){  \n";
                        f.doc += "				this.filename = this.fileupload.name;  \n";
                        f.doc += "				const reader = new FileReader();  \n";
                        f.doc += "				reader.onload = e =>{  \n";
                        f.doc += "					const bstr = e.target.result;  \n";
                        f.doc += "					const wb = XLSX.read(bstr, { type: \"binary\" });  \n";
                        f.doc += "					const wsname = wb.SheetNames[0];  \n";
                        f.doc += "					const ws = wb.Sheets[wsname];  \n";
                        f.doc += "					const data = XLSX.utils.sheet_to_json(ws, { header: 1 });  \n";
                        f.doc += "					this.datas = [];  \n";
                        f.doc += "					data.map((d,idx)=>{  \n";
                        f.doc += "						if(idx > 0 ){  \n";
                        f.doc += "							let obj = {};  \n";
                        f.doc += "							obj.checked = false;  \n";
                        f.doc += "							this.columns.list.map((c,idx)=>{  \n";
                        f.doc += "								obj[c.field] = d[idx];  \n";
                        f.doc += "							})  \n";
                        f.doc += "							this.datas.push(obj);  \n";
                        f.doc += "						}  \n";
                        f.doc += "					});  \n";
                        f.doc += "					if(this.datas.length > 0 ){  \n";
                        f.doc += "						this.validatecols(data[0]);  \n";
                        f.doc += "					}   \n";
                        f.doc += "					console.log('---data---',data);  \n";
                        f.doc += "				}   \n";
                        f.doc += "				reader.readAsBinaryString(this.fileupload);  \n";
                        f.doc += "			}  \n";
                        f.doc += "  		},  \n";
                        f.doc += "		validatecols(item){  \n";
                        f.doc += "			let chk = true;  \n";
                        f.doc += "			let cols = this.columns.list;  \n";
                        f.doc += "			console.log('---cols-->',cols,item);  \n";
                        f.doc += "			cols.map((c,idx)=>{  \n";
                        f.doc += "				console.log('-----test----',(c.field == item[idx]));  \n";
                        f.doc += "				if(item[idx] != c.field ){  \n";
                        f.doc += "					chk = false;  \n";
                        f.doc += "				}  \n";
                        f.doc += "			})  \n";
                        f.doc += "			console.log('---chk---',chk);  \n";
                        f.doc += "			if(!chk){  \n";
                        f.doc += "				alert('ข้อมูลไม่ถูกต้อง')  \n";
                        f.doc += "			}  \n";
                        f.doc += "	  	    this.validate = chk;  \n";
                        f.doc += "		},  \n";
                        f.doc += "		downloadtemplate(){  \n";
                        f.doc += "			console.log('---downloadtemplate--');  \n";
                        f.doc += "			var wb = XLSX.utils.book_new();  \n";
                        f.doc += "			wb.Props = {  \n";
                        f.doc += "				Title: \"Import Template for "+table.table+"\",  \n";
                        f.doc += "				Subject: \"Import\",  \n";
                        f.doc += "				Author: \"Thongchai Lim Vuevm\",  \n";
                        f.doc += "				CreatedDate: new Date(2017,12,19)  \n";
                        f.doc += "			};  \n";
                        f.doc += "			wb.SheetNames.push(\"Import Sheet\");  \n";
                        f.doc += "			var ws_data = [this.columns.list.map(c=>c.field),this.columns.list.map(c=>c.field)];  //a row with 2 columns  \n";
                        f.doc += "			var ws = XLSX.utils.aoa_to_sheet(ws_data);  \n";
                        f.doc += "			wb.Sheets[\"Import Sheet\"] = ws;  \n";
                        f.doc += "			var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});  \n";
                        f.doc += "			function s2ab(s) {   \n";
                        f.doc += "				var buf = new ArrayBuffer(s.length); //convert s to arrayBuffer  \n";
                        f.doc += "				var view = new Uint8Array(buf);  //create uint8array as viewer  \n";
                        f.doc += "				for (var i=0; i < s.length; i++){  \n";
                        f.doc += "					view[i] = s.charCodeAt(i) & 0xFF; //convert to octet  \n";
                        f.doc += "				}  \n";
                        f.doc += "				return buf;      \n";
                        f.doc += "			}  \n";
                        f.doc += "			let d = new Date()  \n";
                        f.doc += "			const a = document.createElement(\"a\");  \n";
                        f.doc += "			a.style.display = \"none\";  \n";
                        f.doc += "			document.body.appendChild(a);  \n";
                        f.doc += "			a.href = window.URL.createObjectURL(  \n";
                        f.doc += "				new Blob([s2ab(wbout)],{type: \"application/octet-stream\"})  \n";
                        f.doc += "			);  \n";
                        f.doc += "			a.setAttribute(\"download\", ( d.getFullYear()+'-'+ d.getMonth() + '-'+ d.getDate() +'-' + d.getMilliseconds() ) +'_'+'import_"+table.table+".xlsx');  \n";
                        f.doc += "			a.click();  \n";
                        f.doc += "			window.URL.revokeObjectURL(a.href);  \n";
                        f.doc += "			document.body.removeChild(a);  \n";
                        f.doc += "		},  \n";
                        f.doc += "	},  \n";
                        f.doc += "	mounted() {},  \n";
                        f.doc += "	computed: {  \n";
                        f.doc += "		columns() {  \n";
                        f.doc += "			return this.$store.state."+table.table+".columns;  \n";
                        f.doc += "		},  \n";
                        f.doc += "		selected(){  \n";
                        f.doc += "			return !(this.datas.filter(r=>r.checked).length > 0);  \n";
                        f.doc += "		}		  \n";
                        f.doc += "	},  \n";
                        f.doc += "	components: {}  \n";
                        f.doc += "};  \n";
                        f.doc += "  \n";
                    break;
                    case "home":
                    //---------------------- vue home--------------------------------
                        f.doc += "export default { \n";
                        f.doc += "template: ` \n";
                        f.doc += "<div class=\"content-wrapper\"> \n";
                        f.doc += "    <div class=\"page-header page-header-light noprint\"> \n";
                        f.doc += "        <div class=\"page-header-content header-elements-md-inline noprint\"> \n";
                        f.doc += "            <div class=\"page-title d-flex\"> \n";
                        f.doc += "                <h4><i class=\"icon-arrow-left52 mr-2\"></i> <span class=\"font-weight-semibold\">Main</span> - \n";
                        f.doc += "                    <router-link to=\"/"+table.table+"\" >"+table.modelclass+" </router-link></h4> \n";
                        f.doc += "                <a href=\"#\" class=\"header-elements-toggle text-default d-md-none\"><i \n";
                        f.doc += "                        class=\"icon-more\"></i></a> \n";
                        f.doc += "            </div> \n";
                        f.doc += " \n";
                        f.doc += "            <div class=\"header-elements noprint\"> \n";
                        f.doc += "                <div class=\"d-flex justify-content-center\"> \n";
                        f.doc += "                    <router-link to=\"/"+table.table+"/add\" class=\"btn btn-primary px-4 \"><i \n";
                        f.doc += "                    class=\"icon-plus-circle2 mr-2 icon-1x\"></i> \n";
                        f.doc += "                    Insert</router-link> \n";
                        f.doc += "                    <router-link to=\"/"+table.table+"/import\" class=\"btn btn-primary ml-2 px-4\"><i class=\"icon-import mr-3 icon-1x\"></i>Import</router-link> \n";
                        f.doc += "                    <router-link to=\"/"+table.table+"/export\" class=\"btn btn-primary ml-2 px-4\"><i class=\"icon-download4 mr-3 icon-1x\"></i>Export</router-link> \n";
                        f.doc += "					<router-link to=\"/"+table.table+"/printall\" class=\"btn btn-primary ml-2 px-4\"> \n";
                        f.doc += "                    <i style=\"cursor: pointer;\" class=\"icon-shredder mr-1 icon-1x\"></i>Print All</router-link> \n";
                        f.doc += "                </div> \n";
                        f.doc += "            </div> \n";
                        f.doc += "        </div> \n";
                        f.doc += "    </div> \n";
                        f.doc += "    <div class=\"content\"> \n";
                        f.doc += "        <router-view /> \n";
                        f.doc += "    </div> \n";
                        f.doc += "    <component is=\"myfooter\" /> \n";
                        f.doc += "</div> \n";
                        f.doc += "`, \n";
                        f.doc += "methods: { \n";
                        //----------get---column--relation data ---to vuex store -----------start
                        f.doc += "        getdatas() {  \n";
                                table.cols.map(c=>{
                                    if(c.extralation==1 && c.noext){
                                         let rtable = this.tables.find(tb=>tb.table == c.relation_name);
                                         if(rtable){
                                            f.doc += "          //-----------------------ajax-----col---"+c.field+"------------------------star \n";
                                            f.doc += "			 this.$axios.get('"+rtable.baseRoute+"/getall')  \n";
                                            f.doc += "			   .then((rs) => {  \n";
                                            f.doc += "  			 	console.log(rs);  \n";
                                            f.doc += "			 	    this.$store.state."+table.table+"."+c.field + '_' + c.relation_name+" = rs.data.datas;  \n";
                                            f.doc += "			   })  \n";
                                            f.doc += "			   .catch((err) => {  \n";
                                            f.doc += "			     	console.log(err);  \n";
                                            f.doc += "			   });  \n";
                                            f.doc += "          //-----------------------ajax-----col---"+c.field+"------------------------end \n";
                                         }
                                    }
                                }); //end table.cols
                            f.doc += "		},  \n";
                        //----------get---column--relation data ---to vuex store -----------end                        
                        f.doc += "}, \n";
                        f.doc += "mounted(){ \n";
                        f.doc += "    console.log('----"+table.table+" mounted-----'); \n";
                        f.doc += "    this.getdatas();  \n";
                        f.doc += "} \n";
                        f.doc += "}; \n";
                        f.doc += " \n";
                    break;
                    case "route":
                    //---------------------- vue route--------------------------------
                        f.doc += "//import "+table.table+" from \"./"+table.table+"_route.js\"; \n";
                        f.doc += " \n";
                        f.doc += "export default  { \n";
                        f.doc += "  path: '/"+table.table+"', \n";
                        f.doc += "  name: '"+table.table+"', \n";
                        f.doc += "  component: () => import(\"/views/pages/"+table.modelclass+"/Home.js\"), \n";
                        f.doc += "  meta: { \n";
                        f.doc += "      auth: true, \n";
                        f.doc += "      role: '90', \n";
                        f.doc += "      layout: \"mainlayout\", \n";
                        f.doc += "      active: \""+table.table+"\" \n";
                        f.doc += "  }, \n";
                        f.doc += "  children: [ \n";
                        f.doc += "      {   path: 'add',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Add.js\"), \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'del',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Delete.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'view',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/View.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'edit',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Edit.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'import',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Import.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'export',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Export.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'print',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Print.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: 'printall',  \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/Printall.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "      {   path: '', \n";
                        f.doc += "          component: ()=>import(\"/views/pages/"+table.modelclass+"/List.js\"),  \n";
                        f.doc += "          meta: { \n";
                        f.doc += "              auth: true, \n";
                        f.doc += "              role: '90', \n";
                        f.doc += "              layout: \"mainlayout\", \n";
                        f.doc += "              active: \""+table.table+"\" \n";
                        f.doc += "          }, \n";
                        f.doc += "      }, \n";
                        f.doc += "  ] \n";
                        f.doc += " } \n";
                        f.doc += " \n";

                            break;
                    case "store":
                    //---------------------- vue store--------------------------------
                        console.log('----gen---vuetm--store-----');
                        f.doc += "const state = {  \n";
                        f.doc += "    datas:[],  \n";
                        //---- ad----data column--  start
                        table.cols.map(c=>{
                            if(c.extralation==1 && c.noext){
                                //---rltable----   
                                    f.doc += "    "+  c.field + '_' + c.relation_name+":[],  \n";
                            } else if(c.extralation==2 && c.noext) {
                                //---rldata-----
                                console.log('---test-extrarelation--2---',c.extprops);
                                c.extprops.map(prop=>{
                                    if(prop['key']=="datas"){
                                        f.doc += "    "+ c.field + '_' + prop['key']  + ': ' + prop['data'] +",  \n";
                                    }
                                })
                            }
                        });
                        //---- ad----data column--  end
                        f.doc += "    columns:{  \n";
                        f.doc += "       view:[  \n";
                        table.cols.map(c=>{
                            if(c.isCol && c.isShow) {
                                f.doc += " { \n";
                                f.doc += "   label:'"+c.label+"', \n";
                                f.doc += "   field:'"+c.field+"', \n";
                                f.doc += "   com_type:'"+c.type.component+"' \n";
                                f.doc += " }, \n";
                            }
                        });
                        f.doc += "       ],  \n";
                        f.doc += "       add:[  \n";
                        table.cols.map(c=>{
                            if(c.isCol && c.isCreate){
                                f.doc += "          {  \n";
                                f.doc += "            label:'"+c.label+"',  \n";
                                f.doc += "            field:'"+c.field+"',  \n";
                                f.doc += "            com_type:{  \n";
                                f.doc += "              is: '"+c.type.component+"',  \n";
                                f.doc += "              placeholder:'"+c.label+"',  \n";
                                f.doc += "              required: "+ c.requed +",  \n";
                                f.doc += "            }  \n";
                                f.doc += "          },  \n";
                            }
                        });
                        f.doc += "       ],  \n";
                        f.doc += "       edit:[  \n";
                        table.cols.map(c=>{
                            if(c.isCol && c.isEdit){
                                f.doc += "          {  \n";
                                f.doc += "            label:'"+c.label+"',  \n";
                                f.doc += "            field:'"+c.field+"',  \n";
                                f.doc += "            com_type:{  \n";
                                f.doc += "              is: '"+c.type.component+"',  \n";
                                f.doc += "              placeholder:'"+c.label+"',  \n";
                                f.doc += "              required: "+ c.requed +" \n";
                                f.doc += "            }  \n";
                                f.doc += "          },  \n";
                            }
                        });
                        f.doc += "       ],  \n";
                        f.doc += "       list:[  \n";
                        table.cols.map(c=>{
                            if(c.isCol && c.isShow){
                                f.doc += "        {  \n";
                                f.doc += "          label:'"+c.label+"',  \n";
                                f.doc += "          field:'"+c.field+"',  \n";
                                f.doc += "          sort: "+c.isSort+",  \n";
                                f.doc += "          sorttype: "+(c.isSort?(c.sort=='asc'?1:2):0)+", // 1=asc,2=desc  \n";
                                f.doc += "          sort_class:'"+(c.isSort?'sorting':'')+"',  \n";
                                f.doc += "          is_search: "+c.isSearch+",  \n";
                                f.doc += "          is_show : "+c.isShow +",  \n";
                                f.doc += "        },  \n";
                            }
                        })

                        f.doc += "      ],  \n";
                        f.doc += "    },  \n";
                        f.doc += "    checked_all:false,  \n";
                        f.doc += "    row_view: {},  \n";
                        f.doc += "    row_insert: {},  \n";
                        f.doc += "    row_update: {},  \n";
                        f.doc += "    row_delete: {},  \n";
                        f.doc += "    row_print: {},  \n";
                        f.doc += "}  \n";
                        f.doc += "const getters = {}  \n";
                        f.doc += "const mutations = {}  \n";
                        f.doc += "const actions = {} \n";
                        f.doc += "  \n";
                        f.doc += "export default {  \n";
                        f.doc += "  namespaced: true,  \n";
                        f.doc += "  state,  \n";
                        f.doc += "  getters,  \n";
                        f.doc += "  mutations,  \n";
                        f.doc += "  actions  \n";
                        f.doc += "}   \n";
                        f.doc += "  \n";
                        break;
                        default:
                        }
                   })
                },
                genvuev2(vue2,table){
                },
                genvuev3(vue3,table){
                },
                gensvelte(svelte,table){
                },                              
                genlogin(){
                    console.log('---loginsys----',this.loginsys);
                    this.codedata = [];
                    this.codegen = '';
                    let logincode = this.genlogincode();
                    Object.keys(logincode).map(key=>{
                        if(this.viewcode.login){
                            this.codegen += logincode[key];
                        }
                    })
                    let fileName = 'codegen_login.zip';
                    this.codelogindata = logincode;
                    this.genzipfile(fileName)
                },
                genlogincode(){ // gen ระบบ login ทั้ง backend and front-end
                    let data = {    
                        model:'', //php 
                        jwtsrv: '', //php 
                        loginsrv: '', //php 
                        jwtctl: '', //php 
                        loginctl: '', //php 
                        vuehtml: '', //vuetm
                        vue2:'',  //vue v2
                        vue3:'',  // vue v3
                        svelte:'', // svelte
                        store:'',
                    }
                    if(!this.loginsys.table){
                        this.codelogindata = data;
                        return data;
                    }
                    //-----------------------------------------------------------  Login.php Model
                        let modeltb = this.tables.find(tb=>tb.table == this.loginsys.table );
                        let model =   '<\?php \n';
                        model +=  'use Illuminate\\Database\\Eloquent\\Model; \n';
                        model +=  'use Illuminate\\Database\\Eloquent\\SoftDeletes; \n';
                        model +=  'use Servit\\Restsrv\\Model\\BaseModel; \n';
                        model +=  ' require_once __DIR__."/Member.php"; \n ';
                        model +=  ' \n';
                        model +=  'class Login extends '+modeltb.modelclass+' \n';
                        model +=  '{ \n';
                        model += '        protected	\$table="'+this.loginsys.table+'"; \n';
                        model +=  ' \n';
                        model +=  '}  \n';
                        data.model = model;
                    //-----------------------------------------------------------  JwtService.php
                        let jwtsrv = '<\?php \n';
                        jwtsrv += ' \n';
                        jwtsrv += ' \n';
                        jwtsrv += '//---------------------------------------------- \n';
                        jwtsrv += '//FILE NAME:  JwtService.php gen for Servit Framework Service \n';
                        jwtsrv += '//DATE: 2019-05-03(Fri)  07:48:13  \n';
                        jwtsrv += ' \n';
                        jwtsrv += '//---------------------------------------------- \n';
                        jwtsrv += 'use \\Servit\\Restsrv\\RestServer\\RestException as TestException; \n';
                        jwtsrv += 'use \\Servit\\Restsrv\\Service\\BaseService as BaseService; \n';
                        jwtsrv += 'use Illuminate\\Database\\Capsule\\Manager as Capsule; \n';
                        jwtsrv += 'use Lcobucci\\JWT\\Signer\\Hmac\\Sha256; \n';
                        jwtsrv += 'use Lcobucci\\JWT\\Signer; \n';
                        jwtsrv += 'use Lcobucci\\JWT\\Parser; \n';
                        jwtsrv += 'use Lcobucci\\JWT\\ValidationData; \n';
                        jwtsrv += 'use Lcobucci\\JWT\\Builder; \n';
                        jwtsrv += 'use Lcobucci\\JWT\\Token; \n';
                        jwtsrv += ' \n';
                        jwtsrv += ' \n';
                        jwtsrv += 'class JwtService extends BaseService \n';
                        jwtsrv += '{ \n';
                        jwtsrv += ' \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    private static $member = null; \n';
                        jwtsrv += '    public static  function  getToken($user = null) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        if (!$user) return []; \n';
                        jwtsrv += '        $privateKeyFile = "private.key"; \n';
                        jwtsrv += '        $publicKeyFile = "public.key"; \n';
                        jwtsrv += '        $header = [ \n';
                        jwtsrv += '            "alg"   => "RS256", \n';
                        jwtsrv += '            "typ"   => "JWT" \n';
                        jwtsrv += '        ]; \n';
                        jwtsrv += '        $payload = [ \n';
                        jwtsrv += '                "iss"       => "'+this.loginsys.iss+'", \n';
                        jwtsrv += '                "sub"       => $user->'+this.loginsys.username+', \n';
                        jwtsrv += '                "aud"       => "'+this.loginsys.aud+'", \n';
                        jwtsrv += '                "name"      => $user->'+this.loginsys.name+', \n';
                        jwtsrv += '                "roles"      => $user->'+this.loginsys.roles+', \n';
                        if(this.loginsys.exp > 0 ){
                            jwtsrv += '                "exp"      => '+(this.loginsys.exp * 60 * 100 )+', \n';
                        }
                        jwtsrv += '            "uid"       => $user->id \n';
                        jwtsrv += '        ]; \n';
                        jwtsrv += '        // $verify = verifyJWT("sha256", $jwt, $publicKeyFile); \n';
                        jwtsrv += '        $jwt = self::generateJWT("sha256", $header, $payload, $privateKeyFile); \n';
                        jwtsrv += '        return $jwt; \n';
                        jwtsrv += '        // var_dump($jwt); // string(277) "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.R-41ycm1V7Kvx_Lnw6nha6OAFQ-vYvdhAdgqa1Ugkj17X4dpSWSO0KRCmnq7yd6ZM-RLEMY3PEXyUAs4F1XtomT6M-CziCpIB5piLfYHLG6V1_FrtieuIOMGLZGs-PpqMZX-JgJf_L19Ly9jnqGjfl9zo6BTTandhgNECE7AVk0" \n';
                        jwtsrv += '        // $verify = verifyJWT("sha256", $jwt, $publicKeyFile); \n';
                        jwtsrv += '        // var_dump($verify); \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    public static function verify($jwt) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        $str_jwt = (string)$jwt; \n';
                        jwtsrv += '        if ($str_jwt) { \n';
                        jwtsrv += '            $publicKeyFile = "public.key"; \n';
                        jwtsrv += '            $verify = self::verifyJWT("sha256", $str_jwt, $publicKeyFile); \n';
                        jwtsrv += '            if ($verify) { \n';
                        jwtsrv += '                return self::$member; \n';
                        jwtsrv += '            } else { \n';
                        jwtsrv += '                return $verify; \n';
                        jwtsrv += '            } \n';
                        jwtsrv += '        } else { \n';
                        jwtsrv += '            return false; \n';
                        jwtsrv += '        } \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    private static function base64UrlEncode($data) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        $data = (string)$data; \n';
                        jwtsrv += '        $urlSafeData = strtr(base64_encode($data), "+/", "-_"); \n';
                        jwtsrv += '        return rtrim($urlSafeData, "="); \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    private static function base64UrlDecode($data) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        $urlUnsafeData = strtr($data, "-_", "+/"); \n';
                        jwtsrv += '        $paddedData = str_pad($urlUnsafeData, strlen($data) % 4, "=", STR_PAD_RIGHT); \n';
                        jwtsrv += '        return base64_decode($paddedData); \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    private static function getOpenSSLErrors() \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        $messages = []; \n';
                        jwtsrv += '        while ($msg = openssl_error_string()) { \n';
                        jwtsrv += '            $messages[] = $msg; \n';
                        jwtsrv += '        } \n';
                        jwtsrv += '        return $messages; \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    public static function generateJWT($algo, $header, $payload, $privateKeyFile) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        $str_header = json_encode($header); \n';
                        jwtsrv += '        $str_payload = json_encode($payload); \n';
                        jwtsrv += '        $headerEncoded = self::base64UrlEncode($str_header); \n';
                        jwtsrv += '        $payloadEncoded = self::base64UrlEncode($str_payload); \n';
                        jwtsrv += '        $dataEncoded = "$headerEncoded.$payloadEncoded"; \n';
                        jwtsrv += '        $privateKey = "file://" . SRVPATH . "/configs/" . $privateKeyFile; \n';
                        jwtsrv += '        $privateKeyResource = openssl_pkey_get_private($privateKey); \n';
                        jwtsrv += '        $result = openssl_sign($dataEncoded, $signature, $privateKeyResource, $algo); \n';
                        jwtsrv += '        if ($result === false) { \n';
                        jwtsrv += '            throw new RuntimeException("Failed to generate signature: " . implode("\n", self::getOpenSSLErrors())); \n';
                        jwtsrv += '        } \n';
                        jwtsrv += '        $signatureEncoded = self::base64UrlEncode($signature); \n';
                        jwtsrv += '        $jwt  = "$dataEncoded.$signatureEncoded"; \n';
                        jwtsrv += '        $pubpath = SRVPATH . "/configs/public.key"; \n';
                        jwtsrv += '        $pubkey = file_get_contents($pubpath); \n';
                        jwtsrv += '        return [ \n';
                        jwtsrv += '            "token" => $jwt, \n';
                        jwtsrv += '            "pubkey" => $pubkey, \n';
                        jwtsrv += '        ]; \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    private static function verifyJWT($algo,  $jwt,  $publicKeyFile) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        if (empty($jwt)) return false; \n';
                        jwtsrv += '        list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode(".", $jwt); \n';
                        jwtsrv += '        $dataEncoded  = "$headerEncoded.$payloadEncoded"; \n';
                        jwtsrv += '        $signature = self::base64UrlDecode($signatureEncoded); \n';
                        jwtsrv += '        $privateKey = "file://" . SRVPATH . "/configs/" . $publicKeyFile; \n';
                        jwtsrv += '        $publicKeyResource = openssl_pkey_get_public($privateKey); \n';
                        jwtsrv += '        $result = openssl_verify($dataEncoded, $signature, $publicKeyResource, $algo); \n';
                        jwtsrv += '        if ($result === -1) { \n';
                        jwtsrv += '            throw new RuntimeException("Failed to verify signature: " . implode("\n", self::getOpenSSLErrors())); \n';
                        jwtsrv += '        } else { \n';
                        jwtsrv += '            $data = self::base64UrlDecode($payloadEncoded); \n';
                        jwtsrv += '            $data = json_decode($data); \n';
                        jwtsrv += '            $member = Login::find($data->uid); \n';
                        jwtsrv += '            if ($data->iss == $member->token) { \n';
                        jwtsrv += '                self::$member = $member; \n';
                        jwtsrv += '                return true; \n';
                        jwtsrv += '            } else { \n';
                        jwtsrv += '                return false; \n';
                        jwtsrv += '            } \n';
                        jwtsrv += '        } \n';
                        jwtsrv += '    } \n';
                        jwtsrv += ' \n';
                        jwtsrv += '    private static function jwtdata(string $algo, string $jwt, string $publicKeyFile) \n';
                        jwtsrv += '    { \n';
                        jwtsrv += '        list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode(".", $jwt); \n';
                        jwtsrv += '        $data = self::base64UrlDecode($payloadEncoded); \n';
                        jwtsrv += '        $data = json_decode($data); \n';
                        jwtsrv += '        $member = Member::find($data->uid); \n';
                        jwtsrv += '        return  $member; \n';
                        jwtsrv += '    } \n';
                        jwtsrv += '    public static function getUser(){ \n';
                        jwtsrv += '        return self::$member; \n';
                        jwtsrv += '    } \n';
                        jwtsrv += '  \n';
                        jwtsrv += '} \n';
                        data.jwtsrv = jwtsrv;

                    //-----------------------------------------------------------  LoginService.php
                        let loginsrv = '<\?php \n';
                        loginsrv += ' \n';
                        loginsrv += 'use \\Servit\\Restsrv\\Service\\BaseService as BaseService; \n';
                        loginsrv += 'use Illuminate\\Database\\Capsule\\Manager as Capsule; \n';
                        loginsrv += ' \n';
                        loginsrv += 'class LoginService  extends BaseService \n';
                        loginsrv += '{ \n';
                        loginsrv += '    public static function login($arrdata){ \n';
                        loginsrv += '        $user = Login::where("'+this.loginsys.username+'",$arrdata["'+this.loginsys.username+'"])->where("'+this.loginsys.password+'",$arrdata["'+this.loginsys.password+'"])->first(); \n';
                        loginsrv += '        if($user){ \n';
                        loginsrv += '            return $user; \n';
                        loginsrv += '        } else { \n';
                        loginsrv += '            return false; \n';
                        loginsrv += '        } \n';
                        loginsrv += '    } \n';
                        loginsrv += '}  \n';
                        loginsrv += '   \n';
                        data.loginsrv =  loginsrv;


                    //------------------------------------------------------------ JwtController.php  
                        let jwtctl = '<\?php \n';
                        jwtctl += 'use \\Servit\\Restsrv\\RestServer\\RestController as BaseController; \n';
                        jwtctl += ' \n';
                        jwtctl += 'class JwtController extends BaseController \n';
                        jwtctl += '{ \n';
                        jwtctl += ' \n';
                        jwtctl += '    public $member = null; \n';
                        jwtctl += ' \n';
                        jwtctl += '    public function authorize() \n';
                        jwtctl += '    { \n';
                        jwtctl += '        try { \n';
                        jwtctl += '            $token = $this->input->token; \n';
                        jwtctl += '            $jwt = new JwtService(); \n';
                        jwtctl += '            $rs = $jwt->verify($token); \n';
                        jwtctl += '            if($rs){ \n';
                        jwtctl += '                $this->member = $jwt->getUser($token); \n';
                        jwtctl += '                $this->server->setStatus(200); \n';
                        jwtctl += '                return true; \n';
                        jwtctl += '            } else { \n';
                        jwtctl += '                $this->server->setStatus(401); \n';
                        jwtctl += '                return false; \n';
                        jwtctl += '            } \n';
                        jwtctl += '        } catch (Exception $e) { \n';
                        jwtctl += '            $this->server->setStatus(401); \n';
                        jwtctl += '            return false; \n';
                        jwtctl += '        } \n';
                        jwtctl += '    } \n';
                        jwtctl += ' \n';
                        jwtctl += '} \n';
                        jwtctl += ' \n';     

                        data.jwtctl= jwtctl;               
                    //-----------------------------------------------------------  LoginController.php
                        let loginctl = '<\?php \n';
                        loginctl += ' \n';
                        loginctl += 'use	\\Servit\\Restsrv\\RestServer\\RestException; \n';
                        loginctl += 'use	\\Servit\\Restsrv\\RestServer\\RestController as BaseController; \n';
                        loginctl += 'use	Illuminate\\Database\\Capsule\\Manager as Capsule; \n';
                        loginctl += 'use	Servit\\Restsrv\\Libs\\Request;  \n';
                        loginctl += 'use	Servit\\Restsrv\\Libs\\Linenotify; \n';
                        loginctl += 'use	Carbon\\Carbon; \n';
                        loginctl += 'use \\Servit\\Restsrv\\traits\\DbTrait; \n';
                        loginctl += ' \n';
                        loginctl += 'class LoginController  extends JwtController { \n';
                        loginctl += '     \n';
                        loginctl += '    /** \n';
                        loginctl += '    *@noAuth \n';
                        loginctl += '    *@url POST /login \n';
                        loginctl += '    *---------------------------------------------- \n';
                        loginctl += '    *FILE NAME:  LoginController.php gen for Servit Framework Controller \n';
                        loginctl += '    *---------------------------------------------- \n';
                        loginctl += '    */ \n';
                        loginctl += '    public function login(){ \n';
                        loginctl += '        try { \n';
                        loginctl += '            $arrdata = $this->input->input->toArray(); \n';
                        loginctl += '            $user = LoginService::login($arrdata); \n';
                        loginctl += '            if($user){  \n';
                        loginctl += '               $jwt = JwtService::getToken($user); \n';
                        loginctl += '               return [ \n';
                        loginctl += '                   "user" => $user, \n';
                        loginctl += '                   "token" => $jwt["token"],  \n';
                        loginctl += '                   "pubkey" => $jwt["pubkey"], \n';
                        loginctl += '                   "status" => "1", \n';
                        loginctl += '                   "success"=> true, \n';
                        loginctl += '               ]; \n';
                        loginctl += '             } else { \n';
                        loginctl += '                 throw new Exception("กรุณา login ใหม่!", 1); \n';
                        loginctl += '             } \n';
                        loginctl += '        } catch (Exception $e) { \n';
                        loginctl += '            return[ \n';
                        loginctl += '                "status" => "0", \n';
                        loginctl += '                "success"=> false, \n';
                        loginctl += '                "msg"=> $e->getMessage(), \n';
                        loginctl += '            ];  \n';
                        loginctl += '        } \n';
                        loginctl += '    } \n';
                        loginctl += ' \n';
                        loginctl += '} \n';
                        loginctl += '  \n';                    

                        data.loginctl = loginctl;
                    //-----------------------------------------------------------  Login.js 
                        let vuehtml = '';
                        vuehtml +=  'export default { \n';
                        vuehtml +=  '    template: ` \n';
                        vuehtml +=  '			<div class="content d-flex justify-content-center align-items-center"> \n';
                        vuehtml +=  '				<form class="login-form" action="index.html" @submit="login"> \n';
                        vuehtml +=  '					<div class="card mb-0"> \n';
                        vuehtml +=  '						<div class="card-body"> \n';
                        vuehtml +=  '							<div class="text-center mb-3"> \n';
                        vuehtml +=  '								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i> \n';
                        vuehtml +=  '								<h5 class="mb-0">Login to your account</h5> \n';
                        vuehtml +=  '								<span class="d-block text-muted">Your credentials</span> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div class="form-group form-group-feedback form-group-feedback-left"> \n';
                        vuehtml +=  '								<input type="text" class="form-control" placeholder="Username"  v-model="'+this.loginsys.username+'"> \n';
                        vuehtml +=  '								<div class="form-control-feedback"> \n';
                        vuehtml +=  '									<i class="icon-user text-muted"></i> \n';
                        vuehtml +=  '								</div> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div class="form-group form-group-feedback form-group-feedback-left"> \n';
                        vuehtml +=  '								<input type="password" class="form-control" placeholder="Password" v-model="'+this.loginsys.password+'" > \n';
                        vuehtml +=  '								<div class="form-control-feedback"> \n';
                        vuehtml +=  '									<i class="icon-lock2 text-muted"></i> \n';
                        vuehtml +=  '								</div> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div class="form-group d-flex align-items-center"> \n';
                        vuehtml +=  '								<div class="form-check mb-0"> \n';
                        vuehtml +=  '									<label class="form-check-label"> \n';
                        vuehtml +=  '										<input type="checkbox" v-model="remember" name="remember"     > \n';
                        vuehtml +=  '										Remember \n';
                        vuehtml +=  '									</label> \n';
                        vuehtml +=  '								</div> \n';
                        vuehtml +=  '								<a href="login_password_recover.html" @click="Forgot" class="ml-auto">Forgot password?</a> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div class="form-group"> \n';
                        vuehtml +=  '								<button type="submit"  @click="login" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div v-if="false"  class="form-group text-center text-muted content-divider"> \n';
                        vuehtml +=  '								<span class="px-2">or sign in with</span> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div v-if="false" class="form-group text-center"> \n';
                        vuehtml +=  '								<button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button> \n';
                        vuehtml +=  '								<button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button> \n';
                        vuehtml +=  '								<button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button> \n';
                        vuehtml +=  '								<button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div class="form-group text-center text-muted content-divider"> \n';
                        vuehtml +=  '								<span class="px-2">Don\'t have an account?</span> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<div class="form-group"> \n';
                        vuehtml +=  '								<a href="#" @click="signup" class="btn btn-light btn-block">Sign up</a> \n';
                        vuehtml +=  '							</div> \n';
                        vuehtml +=  '							<span class="form-text text-center text-muted">By continuing, you\'re confirming that you\'ve read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> \n';
                        vuehtml +=  '						</div> \n';
                        vuehtml +=  '					</div> \n';
                        vuehtml +=  '				</form> \n';
                        vuehtml +=  '			</div> \n';
                        vuehtml +=  '`, \n';
                        vuehtml +=  '    data() { \n';
                        vuehtml +=  '        return { \n';
                        vuehtml +=  '            '+this.loginsys.username+': "", \n';
                        vuehtml +=  '            '+this.loginsys.password+': "", \n';
                        vuehtml +=  '			remember: true \n';
                        vuehtml +=  '        }; \n';
                        vuehtml +=  '    }, \n';
                        vuehtml +=  '    beforeRouteEnter(to, from, next) { \n';
                        vuehtml +=  '        next(vm => { \n';
                        vuehtml +=  '            vm.$nextTick(() => { \n';
                        vuehtml +=  '                vm.clearlogin(); \n';
                        vuehtml +=  '            }); \n';
                        vuehtml +=  '        }); \n';
                        vuehtml +=  '    }, \n';
                        vuehtml +=  '    created() { \n';
                        vuehtml +=  '      const jwt = this.$ls.get("token");  \n';
                        vuehtml +=  '      if(jwt ) {  \n';
                        vuehtml +=  '          axios.defaults.headers.common["authorization"] = `Bearer ${jwt}`;  \n';
                        vuehtml +=  '      }  \n';
                        vuehtml +=  '    }, \n';
                        vuehtml +=  '    mounted() { \n';
                        vuehtml +=  '    }, \n';
                        vuehtml +=  '    methods: { \n';
                        vuehtml +=  '      clearlogin(){ \n';
                        vuehtml +=  '           console.log("login---clearlogin data--");  \n';
                        vuehtml +=  '           this.$R.clearlogin();  \n';
                        vuehtml +=  '           // this.$axios.defaults.headers.common["Authorization"] = "";  \n';
                        vuehtml +=  '           delete axios.defaults.headers.common["authorization"];   \n';
                        vuehtml +=  '      }, \n';
                        vuehtml +=  '      login(event){ \n';
                        vuehtml +=  '		  event.preventDefault(); \n';
                        vuehtml +=  '		  console.log("----call-login---"); \n';
                        vuehtml +=  '		  //this.$router.push("/"); \n';
                        vuehtml +=  ' \n';
                        vuehtml +=  '		  axios.post("/login",  \n';
                        vuehtml +=  '		  { \n';
                        vuehtml +=  '			 '+this.loginsys.username+':  this.'+this.loginsys.username+', \n';
                        vuehtml +=  '            '+this.loginsys.password+':  this.'+this.loginsys.password+', \n';
                        vuehtml +=  '			 remember: this.remmember \n';
                        vuehtml +=  '		  }) \n';
                        vuehtml +=  '		  .then((rs) => { \n';
                        vuehtml += '                console.log("---login-----",rs);   \n ';
                        vuehtml += '                const { user,token,pubkey} = rs.data;   \n ';
                        vuehtml += '                if (user && token) {   \n ';
                        vuehtml += '                    this.$ls.set("user", user);   \n ';
                        vuehtml += '                    this.$ls.set("token",token);   \n ';
                        vuehtml += '                    this.$ls.set("pubkey",pubkey);   \n ';
                        vuehtml += '                    this.$ls.set("role",user.role);   \n ';
                        vuehtml += '                    let username = "User Name"; \n ';
                        vuehtml += '                    if(user.name){ \n ';
                        vuehtml += '                        username = user.name;  \n ';
                        vuehtml += '                        this.$ls.set("username",username); \n ';
                        vuehtml += '                    } \n ';
                        vuehtml += '                if(user.avatar){ \n ';
                        vuehtml += '                    this.$store.state.auth.avatar = user.avatar;  \n ';
                        vuehtml += '                } else { \n ';
                        vuehtml += '                    this.$store.state.auth.avatar ="/global_assets/images/demo/users/user.png";  \n ';
                        vuehtml += '                } \n ';
                        vuehtml += '                    this.$ls.set("logined",true); \n ';
                        vuehtml += '                    if(token) {   \n ';
                        vuehtml += '                        axios.defaults.headers.common["authorization"] = `Bearer ${token}`;   \n ';
                        vuehtml += '                    } else {   \n ';
                        vuehtml += '                        delete axios.defaults.headers.common["authorization"];   \n ';
                        vuehtml += '                    }   \n ';
                        vuehtml += '                    this.$R.updatetoken(); \n ';

                        vuehtml +=  '                     this.$router.push("/");  \n';
                        vuehtml +=  '                     this.'+this.loginsys.username+' = "";  \n';
                        vuehtml +=  '                     this.'+this.loginsys.password+' = "";  \n';
                        vuehtml +=  '                 } else {  \n';
                        vuehtml +=  '                     alert("username/password ไม่ถูกต้อง");  \n';
                        vuehtml +=  '                 } \n';       
                        vuehtml +=  '		  }) \n';
                        vuehtml +=  '		  .catch( (err) => { \n';
                        vuehtml +=  '			  console.log(err); \n';
                        vuehtml +=  '		  }); \n';
                        vuehtml +=  '      }, \n';
                        vuehtml +=  '	  signup(event){ \n';
                        vuehtml +=  '		  event.preventDefault(); \n';
                        vuehtml +=  '		  console.log("----call-signup---"); \n';
                        vuehtml +=  '	  }, \n';
                        vuehtml +=  '	  Forgot(event){ \n';
                        vuehtml +=  '		  event.preventDefault(); \n';
                        vuehtml +=  '		  console.log("----call-Forgot---"); \n';
                        vuehtml +=  '	  }, \n';
                        vuehtml +=  '    }, \n';
                        vuehtml +=  '    computed: {}, \n';
                        vuehtml +=  '    components: {} \n';
                        vuehtml +=  '}; \n';
                        data.vuehtml = vuehtml;
                    //-----------------------------------------------------------  Login.vue v2 
                        let vue2 = "";
                        vue2 += '<template>  \n';
                        vue2 += '    <div>  \n';
                        vue2 += '        <form>  \n';
                        vue2 += '            <input type="text" placeholder="User" v-model="username" />  \n';
                        vue2 += '            <input type="password" placeholder="password" v-model="password" />  \n';
                        vue2 += '            <input type="submit" value="Sign In"  @click="login" />  \n';
                        vue2 += '            <input type="reset" value="Clear"  />  \n';
                        vue2 += '        </form>  \n';
                        vue2 += '    </div>  \n';
                        vue2 += '</template>  \n';
                        vue2 += '<script\>  \n';
                        vue2 += '    export default {  \n';
                        vue2 += '        data(){  \n';
                        vue2 += '            return {  \n';
                        vue2 += '                username:"",  \n';
                        vue2 += '                password:""  \n';
                        vue2 += '            }  \n';
                        vue2 += '        },  \n';
                        vue2 += '        methods:{  \n';
                        vue2 += '            login(){  \n';
                        vue2 += '                console.log("--login-----");  \n';
                        vue2 += '                axios.post("/login",{ username: this.username,password:this.password })  \n';
                        vue2 += '                .then((rs) => {  \n';
                        vue2 += '                    console.log(rs);  \n';
                        vue2 += '                    const { user,jwt} = rs.data;  \n';
                        vue2 += '                    console.log("--login-user--", user);  \n';
                        vue2 += '                    if (user && jwt) {  \n';
                        vue2 += '                        console.log("---login-----");  \n';
                        vue2 += '                        this.$ls.set("user", user);  \n';
                        vue2 += '                        //this.$store.state.user = user;  \n';
                        vue2 += '                        this.$ls.set("jwt",jwt.token);  \n';
                        vue2 += '                        //this.$store.state.jwt = jwt.token;  \n';
                        vue2 += '                        if(jwt.token) {  \n';
                        vue2 += '                            axios.defaults.headers.common["authorization"] = `Bearer ${jwt.token}`;  \n';
                        vue2 += '                        } else {  \n';
                        vue2 += '                            delete axios.defaults.headers.common["authorization"];  \n';
                        vue2 += '                        }  \n';
                        vue2 += '                        this.$router.push("/");  \n';
                        vue2 += '                        this.username = "";  \n';
                        vue2 += '                        this.password = "";  \n';
                        vue2 += '                    } else {  \n';
                        vue2 += '                        alert("username/password ไม่ถูกต้อง");  \n';
                        vue2 += '                    }  \n';
                        vue2 += '                })  \n';
                        vue2 += '                .catch( (err) => {  \n';
                        vue2 += '                    console.log(err);  \n';
                        vue2 += '                      \n';
                        vue2 += '                });  \n';
                        vue2 += '            }  \n';
                        vue2 += '        },  \n';
                        vue2 += '    }  \n';
                        vue2 += '</script\>  \n';
                        vue2 += '<style lang="css" scoped>  \n';
                        vue2 += '</style>  \n';
                        data.vue2 = vue2;
                    //-----------------------------------------------------------  Login.vue v3 
                        let vue3 = "";
                            vue3 += '<template>  \n';
                            vue3 += '    <div>  \n';
                            vue3 += '        <form>  \n';
                            vue3 += '            <input type="text" placeholder="User" v-model="username" />  \n';
                            vue3 += '            <input type="password" placeholder="password" v-model="password" />  \n';
                            vue3 += '            <input type="submit" value="Sign In"  @click="login" />  \n';
                            vue3 += '            <input type="reset" value="Clear"  />  \n';
                            vue3 += '        </form>  \n';
                            vue3 += '    </div>  \n';
                            vue3 += '</template>  \n';
                            vue3 += '<script\>  \n';
                            vue3 += '    export default {  \n';
                            vue3 += '        data(){  \n';
                            vue3 += '            return {  \n';
                            vue3 += '                username:"",  \n';
                            vue3 += '                password:""  \n';
                            vue3 += '            }  \n';
                            vue3 += '        },  \n';
                            vue3 += '        methods:{  \n';
                            vue3 += '            login(){  \n';
                            vue3 += '                console.log("--login-----");  \n';
                            vue3 += '                axios.post("/login",{ username: this.username,password:this.password })  \n';
                            vue3 += '                .then((rs) => {  \n';
                            vue3 += '                    console.log(rs);  \n';
                            vue3 += '                    const { user,jwt} = rs.data;  \n';
                            vue3 += '                    console.log("--login-user--", user);  \n';
                            vue3 += '                    if (user && jwt) {  \n';
                            vue3 += '                        console.log("---login-----");  \n';
                            vue3 += '                        this.$ls.set("user", user);  \n';
                            vue3 += '                        //this.$store.state.user = user;  \n';
                            vue3 += '                        this.$ls.set("jwt",jwt.token);  \n';
                            vue3 += '                        //this.$store.state.jwt = jwt.token;  \n';
                            vue3 += '                        if(jwt.token) {  \n';
                            vue3 += '                            axios.defaults.headers.common["authorization"] = `Bearer ${jwt.token}`;  \n';
                            vue3 += '                        } else {  \n';
                            vue3 += '                            delete axios.defaults.headers.common["authorization"];  \n';
                            vue3 += '                        }  \n';
                            vue3 += '                        this.$router.push("/");  \n';
                            vue3 += '                        this.username = "";  \n';
                            vue3 += '                        this.password = "";  \n';
                            vue3 += '                    } else {  \n';
                            vue3 += '                        alert("username/password ไม่ถูกต้อง");  \n';
                            vue3 += '                    }  \n';
                            vue3 += '                })  \n';
                            vue3 += '                .catch( (err) => {  \n';
                            vue3 += '                    console.log(err);  \n';
                            vue3 += '                      \n';
                            vue3 += '                });  \n';
                            vue3 += '            }  \n';
                            vue3 += '        },  \n';
                            vue3 += '    }  \n';
                            vue3 += '</script\>  \n';
                            vue3 += '<style lang="css" scoped>  \n';
                            vue3 += '</style>  \n';
                            vue3 += '                          \n';
                        data.vue3 = vue3;
                    //-----------------------------------------------------------  Login.svelte
                        let svelte = "Login svelte";
                        data.svelte = svelte;
                    //-----------------------------------------------------------  auth.js 
                        let vuestore = '';
                        vuestore += "   const state = { \n";
                        vuestore += "       name: '', \n";
                        vuestore += "       avatar:'/global_assets/images/demo/users/user.png', \n";
                        vuestore += "       logined: false, \n";
                        vuestore += "       user: {}, \n ";
                        vuestore += "       token:'', \n ";
                        vuestore += "       pubkey:'', \n ";
                        vuestore += "       role:0, \n ";
                        vuestore += "   }   \n";
                        vuestore += "   const getters = {}   \n";
                        vuestore += "   const mutations = {}   \n";
                        vuestore += "   const actions = {}  \n";
                        vuestore += "    \n";
                        vuestore += "   export default {   \n";
                        vuestore += "       namespaced: true,   \n";
                        vuestore += "       state,   \n";
                        vuestore += "       getters,   \n";
                        vuestore += "       mutations,   \n";
                        vuestore += "       actions   \n";
                        vuestore += "   }    \n";

                        data.store = vuestore;
                    //-----------------------------------------------------------  End.
                    this.codelogindata = data;
                    return data;
                },
                genmasterdetails(idx){
                    console.log('----gen all masterdetails---');
                    if(idx){
                        this.codegen  = ''; 
                        this.codemasterdetails = [];
                    }

                    this.masterdetails.map(md=>{
                        this.genmasterdetail(md,0);
                    })

                    if(idx && this.isDownload){
                        let fileName = 'codegen_allmsdt.zip';
                        this.genzipfile(fileName);
                    }

                },
                genmasterdetail(md,idx){
                    if(idx){
                       this.codegen  = ''; 
                       this.codemasterdetails = [];
                    }
                    console.log('---genmasterdetail---',md,idx);
                    <?php include(SRVPATH.'/views/codegen/v0/masterdetail.php'); ?>
                    console.log('this.codegen--->',this.codegen);
                    
                },
                genzipfile(filename) { // หลังสุด genzip ให้ d/l ถ้า isDownload
                    let d = new Date()
                    let fileName = ( d.getFullYear()+'-'+ d.getMonth() + '-'+ d.getDate() + d.getMilliseconds() )+'_'+filename;
                    console.log('-----start---gen---zip---file----',fileName,this.isDownload);
                    if(this.isDownload){
                        var zip = new JSZip();
                        let routedata = '';
                        let vuetm_routedoc = '';  // สำหรับ vuetm 
                        let vuetm_storedoc = '';  // สำหรับ vuetm 
                        let vuetm_navbardoc = '';  // สำหรับ vuetm 
                        //------gen tables ทั้งหมดที่เลือก------------------------------------start
                        let sqldoc = '';
                            this.codedata.map(tabledata=>{
                                    zip.file("models/"+tabledata.model.filename,tabledata.model.doc);
                                    zip.file("services/"+tabledata.service.filename,tabledata.service.doc);
                                    zip.file("controllers/"+tabledata.controller.filename,tabledata.controller.doc);
                                    // zip.file("sql/"+tabledata.sql.filename,tabledata.sql.doc);
                                    sqldoc += tabledata.sql.doc + '\n';

                                    console.log('---tabledata---',tabledata);
                                    //------vuejs type=module------------------------------------start
                                        tabledata.vuetm.files.map(v=>{
                                            zip.file("vuejs/tm/"+v.filename,v.doc);
                                        })
                                        vuetm_routedoc += tabledata.vuetm.routedoc;
                                        vuetm_storedoc += tabledata.vuetm.storedoc;
                                        vuetm_navbardoc += '<li class="nav-item"> \n';
                                        vuetm_navbardoc += '    <router-link to="/'+tabledata.vuetm.filename+'" class="nav-link" :class="$route.meta.active==\''+tabledata.vuetm.filename+'\'?\'active\':\'\'"  > \n';
                                        vuetm_navbardoc += '        <i class="icon-home4"></i> \n';
                                        vuetm_navbardoc += '        <span> \n';
                                        vuetm_navbardoc += '            '+tabledata.vuetm.classname+' \n';
                                        vuetm_navbardoc += '        </span> \n';
                                        vuetm_navbardoc += '    </router-link> \n';
                                        vuetm_navbardoc += '</li> \n';
                                    //------vuejs type=module------------------------------------end
                                    // zip.file("vuejs/vue2/"+tabledata.vue2.filename,tabledata.vue2.doc);  // todo ต่อไป
                                    // zip.file("vuejs/vue3/"+tabledata.vue3.filename,tabledata.vue3.doc);  // todo ต่อไป
                                    // zip.file("svelte/"+tabledata.svelte.filename,tabledata.svelte.doc);  // todo ต่อไป
                                    routedata +=  tabledata.routebygen.doc;
                            })
                            zip.file('sql/updatesql.sql',sqldoc);
                            //filetxt: "addroutes.txt--vuetm",
                            zip.file("vuejs/tm/addroute.txt",vuetm_routedoc+"\n\n"+vuetm_storedoc+"\n\n"+vuetm_navbardoc);
                            //filetxt: "addroutes.txt--vue2",
                            //filetxt: "addroutes.txt--vue3",
                            //filetxt: "addroutes.txt--svelte--ถ้ามี",

                        //------gen tables ทั้งหมดที่เลือก-----------------------------------end

                        //------- login system --------------------------------------start--
                            if(this.codelogindata.model){
                                zip.file("models/Login.php",this.codelogindata.model);
                            }
                            if(this.codelogindata.jwtsrv){
                                zip.file("services/JwtService.php",this.codelogindata.jwtsrv );
                            }
                            if(this.codelogindata.loginsrv){
                                zip.file("services/LoginService.php",this.codelogindata.loginsrv );
                            }
                            if(this.codelogindata.loginctl){
                                zip.file("controllers/LoginController.php",this.codelogindata.loginctl);
                                routedata  = '$server->addClass("LoginController","",""); \n' + routedata;
                            }
                            if(this.codelogindata.jwtctl){
                                zip.file("controllers/JwtController.php",this.codelogindata.jwtctl);
                                routedata  = '$server->addClass("JwtController","",""); \n' + routedata;
                            }
                            if(this.codelogindata.vuehtml){
                                zip.file("vuejs/tm/pages/Login.js",this.codelogindata.vuehtml);
                            }
                            if(this.codelogindata.vue2){
                                zip.file("vuejs/v2/pages/Login/Login.vue",this.codelogindata.vuehtml);
                            }
                            if(this.codelogindata.vue3){
                                zip.file("vuejs/v3/pages/Login/Login.vue",this.codelogindata.vuehtml);
                            }
                            if(this.codelogindata.svelte){
                                zip.file("svelte/pages/Login/Login.svelte",this.codelogindata.vuehtml);
                            }
                            if(this.codelogindata.store){
                                zip.file("vuejs/tm/store/Auth/auth.js",this.codelogindata.store);
                            }
                        //------- login system --------------------------------------end--
                        //------- Master Detail --------------------------------------start--
                            console.log('--------start---zip----masterdetail-----');
                            this.codemasterdetails.map(armd=>{
                                armd.map(md=>{
                                    // console.log('---add zip msdt---',md.filename);
                                    zip.file(md.filename,md.doc);
                                }); // armd
                            }) //codemasterdetails
                        //------- Master Detail ---------codemasterdetails-----------------------------end--
                        //------- route gen   ----------------------------------------
                        
                        zip.file("route/routebygen.php",'<\?php \n'+routedata+'\n ?>\n');

                        //------- gen download zip file   ----------------------------------------
                        zip.generateAsync({type:"blob"}).then(
                        (content)=>{
                            const a = document.createElement("a");
                            a.style.display = "none";
                            document.body.appendChild(a);
                            a.href = window.URL.createObjectURL(
                                new Blob([content],{type: "application/zip"})
                            );
                            a.setAttribute("download", fileName);
                            a.click();
                            window.URL.revokeObjectURL(a.href);
                            document.body.removeChild(a);
                            console.log('----gen zip end-----');
                        },
                        (err) =>{
                            console.log('genzip-err--->',err)
                        });
                    }
                },
            },
            mounted(){
                mybutton = document.getElementById("myBtn");
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};
                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                }
                this.$nextTick(()=>{
                        let relationtables = this.$ls.get('relations');
                        console.log('---on nextTick--',relationtables);
                        if( relationtables != null ) {
                            this.relationtables = relationtables;
                        }
                        this.tables.map(table=>{
                            if(this.relationtables[table.table] != undefined ){
                                table.relations = this.relationtables[table.table];
                            } else {
                                this.relationtables[table.table] = [];
                            }
                        });
                        this.$ls.set('relations',this.relationtables);
                });
            },
            created(){
                console.log('---on--created----');
                window.codegen = this;
                let logsys = this.$ls.get('loginsys');
                if(logsys != null ){
                    this.loginsys = logsys;
                } else {
                    this.loginsys = {};
                }
                let masterdetails = this.$ls.get('masterdetails');
                if(masterdetails){
                    this.masterdetails = masterdetails;
                } else {
                    this.masterdetails = [];
                }

                let tbs = this.$ls.get('tables');
                tbs.map((tb,idx)=>{
                    this.$set(this.tables,idx,tb);
                });

                window.addEventListener('beforeunload', (event) => {
                    this.updatetolocalstorage();
                })
            },
            beforeDestroy() {
            }
        });
        </script>
        <?php             
    }
    
    /**
    *@noAuth
    *@url POST /genbytable
    *----------------------------------------------
    *FILE NAME:  CodegenController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2020-03-10(Tue)  18:26:14 
    
    *----------------------------------------------
    */
    public function genbytable(){
        try {
            $input = $this->input->input->toArray();
            return [
                'input' => $input,
                'status' => '1',
                'success'=> true,
                'path' => __DIR__,
            ];
        } catch (Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }
    
    
    /**
    *@noAuth
    *@url POST /genall
    *----------------------------------------------
    *FILE NAME:  CodegenController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2020-03-10(Tue)  18:26:46 
    
    *----------------------------------------------
    */
    public function genall(){
        try {
            $input = $this->input->input->toArray();
            $route = '';
            foreach($input['tabledata'] as $table){
                file_put_contents(__DIR__.'/../'.$table['controller']['filename'],$table['controller']['doc']);
                file_put_contents(__DIR__.'/../../models/'.$table['model']['filename'],$table['model']['doc']);
                file_put_contents(__DIR__.'/../../services/'.$table['service']['filename'],$table['service']['doc']);
                $route .= $table['routebygen']['doc'];
                $sqls = $table['sql']['doc'];
                // dump($sql);
                if($sqls){
                    $sqlarrs = explode(';',$sqls);
                    foreach($sqlarrs as $sql){
                        if($sql){
                            Capsule::statement($sql);
                        }
                    }
                }
            }

            $loginroute = "";
            if($input['logindata']['model']){
                file_put_contents(__DIR__.'/../../models/Login.php',$input['logindata']['model']);
            }
            if($input['logindata']['jwtsrv']){
                file_put_contents(__DIR__.'/../../services/JwtService.php',$input['logindata']['jwtsrv']);
            }
            if($input['logindata']['loginsrv']){
                file_put_contents(__DIR__.'/../../services/LoginService.php',$input['logindata']['loginsrv']);
            }

            if($input['logindata']['jwtctl']){
                file_put_contents(__DIR__.'/../JwtController.php',$input['logindata']['jwtctl']);
                $loginroute .= '$server->addClass("JwtController","",""); '."\n";
            }

            if($input['logindata']['loginctl']){
                file_put_contents(__DIR__.'/../LoginController.php',$input['logindata']['loginctl']);
                $loginroute .= '$server->addClass("LoginController","",""); '."\n";
            }
            if($input['logindata']['vuehtml']){
                file_put_contents(__DIR__.'/../../views/pages/Login.vue',$input['logindata']['vuehtml']);
            }


            $route = '<?php //----route---generate by vuevm-----'."\n".$loginroute.$route;
            file_put_contents(__DIR__.'/../../route/routebygen.php',$route);
            return [
                'input' => $input,
                'status' => '1',
                'success'=> true,
                'path' => __DIR__,
            ];
        } catch (Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }

}