export default { 
    template: `<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <b>Gen Models Page</b>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
              <li class="breadcrumb-item active">{{$route.name}}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
         <div class="card-body" style="height: 70vh;">
        <!-- ------ ตาราง gen ระบบ  tables  ------------ -->
        <div v-for="(table,idx) in $store.state.tables" class="card ">
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
                        <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isVue2Typem" />* Vue2 TM
                        </div>
                        <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isVueui" />* Vue2 UI</div>
                        <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isVue3" />* Vue3 UI</div>
                        <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isSvelte" />* SVELTE UI
                        </div>
                    </div>
                    <!-- ----gen relation of table---------- -->
                    <div class="d-flex flex-row ">
                        <div style="height:80px">
                            <button @click="addrelation(table)"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-nowrap" v-for="(related,rdx) in table.relations"
                                style="background-color: aquamarine;">
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
                                        <option v-for="(selecttable,idxx) in tables" :value="selecttable.table">
                                            {{selecttable.table}}</option>
                                    </select>
                                    <select v-model="related.field_master">
                                        <option value="">--เลือก-field ตาราง {{table.table?table.table:'ต้นทาง'}}--
                                        </option>
                                        <option v-for="(ffield,idxy) in table.cols" :value="ffield.field">
                                            {{ffield.field}}</option>
                                    </select>
                                    <select v-model="related.field_relate">
                                        <option value="">--เลือก-field ตาราง
                                            {{related.relatetable_name?related.relatetable_name:'ปลายทาง'}}--</option>
                                        <option v-for="(lfield,idxz) in getcolsbytable(related.relatetable_name)"
                                            :value="lfield.field">{{lfield.field}}</option>
                                    </select>
                                    <label><input type="checkbox" v-model="related.isWith" />$with</label>
                                    <input style="width:50%" type="text" v-model="related.comment"
                                        placeholder="ใส่หมายเหตุให้กับ function relation" />
                                    <button @click="delrelation(rdx,table.relations)"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- ----gen relation of table---------- -->
                </div>
                <div class="text-nowrap  pl-2"><input type="checkbox" v-model="table.isSoftdelete" />* Soft Delete
                    <br />
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
                <div class="text-nowrap  pl-2"><a href="#codegen"><input @click="genbytable(table)" type="button"
                            class="btn btn-sm btn-primary" value="GEN by Table ZIP" /></a></div>
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
                                <th style="width:150px;" @click="toggleshow(table)"><input type="checkbox"
                                        v-model="table.allShow" /> Is Show</th>
                                <th style="width:150px;" @click="toggleedit(table)"><input type="checkbox"
                                        v-model="table.allEdit" /> Is Edit</th>
                                <th style="width:150px;" @click="togglecreate(table)"><input type="checkbox"
                                        v-model="table.allCreate" /> Is Create</th>
                                <th style="width:150px;" @click="toggledelete(table)"><input type="checkbox"
                                        v-model="table.allDelete" /> Is Delete</th>
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
                                    <select name="components" v-model="col.type.component" @change="changecol(col)">
                                        <option v-for="(component,idy) in $store.state.components" :key="idy">
                                            {{component}}</option>';
                                    </select>
                                    <labeL><input type="checkbox" v-model="col.noext">&nbsp;&nbsp;&nbsp;extpro</label>
                                </td>
                                <td v-if="chkrelation(col.type.component)">
                                    <div class="d-flex flex-column">
                                        <label>Table:<select name="tablea" v-model="col.tablea"
                                                @change="col.relation_name = col.tablea">
                                                <option>--เลือก-table--</option>
                                                <option v-for="(table,idt) in tables" :key="idt" :value="table.table">
                                                    {{table.table}}</option>
                                            </select></label>
                                        <label>Name:<input type="text" v-model="col.relation_name"
                                                plactholder="ralation name" /></label>
                                        <label>Value field:<select name="fielda" v-model="col.tablea_value">
                                                <option value="">--เลือก-field--</option>
                                                <option v-for="(column,idc) in getcols(col.tablea)" :key="idc"
                                                    :value="column.field">
                                                    {{column.label}}</option>
                                            </select></label>
                                        <label>Label field:<select name="fieldb" v-model="col.tablea_label">
                                                <option value="">--เลือก-field--</option>
                                                <option v-for="(columnc,idcc) in getcols(col.tablea)" :key="idcc"
                                                    :value="columnc.field">
                                                    {{columnc.label}}</option>
                                            </select></label>
                                    </div>
                                </td>
                                <td v-else-if="chkext(col.type.component) && col.noext">
                                    <div class="d-flex flex-column">
                                        <div v-for="(prop,keyp) in col.extprops" :key="keyp">
                                            <label>{{prop['key']}}
                                                <span v-if="prop['key'] == 'example'">{{prop['data']}}</span>
                                                <textarea v-else-if="prop['key']=='datas' " rows="3"
                                                    v-model="prop['data']"></textarea>
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
        <div class="card-footer">
           
        </div>
      </div>
    </section>
  </div>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'User Records', 
      }; 
    }, 
    methods: {
            datetimefields(cols) {
                return cols.filter(c => {
                    return (c.type.type == 'datetime' || c.field.toLocaleLowerCase().indexOf('date') != -1);
                })
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
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {}, 
    computed: {}, 
    components:{} 
}; 