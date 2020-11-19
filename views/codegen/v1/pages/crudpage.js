export default {
    template: `<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <b>Project Setting</b>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <router-link to="/home">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active">{{$route.name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="col-2">
                        <div class="d-flex align-items-center">
                            Show &nbsp;
                            <select class="custom-select mr-2" style="width:80px;">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="email" class="form-control" placeholder="Search...">
                    </div>
                    <div class="col-3">
                        <i class="fa fa-spinner fa-spin fa-x fa-fw"></i>
                        <i class="fa fa-cog fa-spin fa-x fa-fw"></i>
                        <i class="fa fa-spinner fa-pulse fa-x fa-fw"></i>
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-2 card-tools">
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-success" >
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="dropdown ml-1">
                                <a href="#" class="btn btn-secondary " data-toggle="dropdown"><i
                                        class="nav-icon fas fa-cog"></i></a>
                                <ul class="dropdown-menu ">
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                    <li><input class="ml-2" type="checkbox">&nbsp;&nbsp;column x</input></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-tool ml-5" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="min-height: 70vh;">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width:20px;">&nbsp;&nbsp;&nbsp;</th>
                            <th style="width:20px;white-space: nowrap;"># No</th>
                            <th style="width:20px;"><input type="checkbox"></th>
                            <th  >
                                <div class="d-flex">
                                    <div class="col-6">Firstname </div>
                                    <div class="col-6" style="display: inline-flex; align-items: center; flex-wrap: nowrap;cursor: pointer;">
                                        1
                                        <i class="fas fa-sort-down" style="display:none"></i>
                                        <i aria-hidden="true" class="fa fa-sort" ></i>
                                        <i class="fas fa-sort-up" style="display:none"></i>
                                    </div>
                                </div>
                                <input type="text" placeholder="Search..." style="color: darkcyan;">
                                
                            </th>
                            <th>
                                <div class="d-flex">
                                    <div class="col-6" >Lastname</div>
                                    <div class="col-6" style="display: inline-flex; align-items: center; flex-wrap: nowrap;cursor: pointer;">
                                        2
                                        <i class="fas fa-sort-down" style="display:none"></i>
                                        <i aria-hidden="true" class="fa fa-sort" ></i>
                                        <i class="fas fa-sort-up" style="display:none"></i>
                                    </div>
                                </div>
                                <input type="text" placeholder="Search..." style="color: darkcyan;">
                                
                            </th>
                            <th>
                                <div class="d-flex">
                                    <div class="col-6" >Email</div>
                                    <div class="col-6" style="display: inline-flex; align-items: center; flex-wrap: nowrap;cursor: pointer;">
                                        3
                                        <i class="fas fa-sort-down" style="display:none"></i>
                                        <i aria-hidden="true" class="fa fa-sort" ></i>
                                        <i class="fas fa-sort-up" style="display:none"></i>
                                    </div>
                                </div>
                                <input type="text" placeholder="Search..." style="color: darkcyan;">
                                
                            </th>
                            <th>&nbsp;</th>
                            <th class="text-center" style="width:100px;">
                                <div>Action</div>
                                <div>&nbsp; </div>
                            </th>
                        </tr>
                    </thead>
                <tbody>
                    <tr v-if="false">
                        <td class="text-center" colspan="8">NO DATA!</td>
                    </tr>
                    <tr v-if="false">
                        <td class="text-center " colspan="8" ><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>&nbsp;LOADING.....!</td>
                    </tr>
                    <template v-for="idx in 10">
                        <tr >
                            <td style="cursor:pointer;" data-toggle="collapse" :data-target="'#accordion'+idx" >+/-</td>
                            <td style="cursor:pointer;">#{{idx}}</td>
                            <td style="cursor:pointer;"><input type="checkbox"></td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>         
                                <i class="fa fa-spinner fa-spin fa-x fa-fw"></i>
                                <i class="fa fa-cog fa-spin fa-x fa-fw"></i>
                                <i class="fa fa-spinner fa-pulse fa-x fa-fw"></i>
                            </td>
                            <td class="d-flex justify-content-center" style="width:100px;cursor: pointer;">
                                    <i class="far fa-eye text-success"  style="width:35px;height:35px;" ></i>
                                    <i class="ml-1 far fa-edit text-warning"  style="width:35px;height:35px;" ></i>
                                    <i class="ml-1 far fa-trash-alt text-danger" style="width:35px;height:35px;"  ></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" :id="'accordion'+idx" class="collapse">
                                <div class="d-flex flex-col flex-wrap pl-5">
                                    <div>xxxxx</div>
                                    <div>xxxxx</div>
                                    <div>xxxxx</div>
                                    <div>xxxxx</div>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
                <thead  class="thead-dark">
                    <tr>
                        <th style="width:20px;">&nbsp;&nbsp;&nbsp;</th>
                        <th style="width:20px;white-space: nowrap;"># No</th>
                        <th style="width:20px;"><input type="checkbox"></th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>&nbsp;</th>
                        <th class="text-center" style="width:100px;">Action</th>
                    </tr>
                </thead>
            </table>
            <div class="d-flex justify-content-between mt-2 mb-2">
                <div>Displaying 1 to 10 of 200 items</div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                </nav>
                <div>
                    <select class="custom-select mr-2" style="width:180px;">
                        <option value="1">Page# 1</option>
                        <option value="2">Page# 2</option>
                        <option value="3">Page# 3</option>
                        <option value="4">Page# 4</option>
                        <option value="5">Page# 5</option>
                        <option value="6">Page# 6</option>
                        <option value="7">Page# 7</option>
                    </select>
                </div>
            </div>
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
    created() {
        console.log(this.name + 'component is created');
    },
    mounted() {},
    methods: {},
    computed: {},
    components: {}
};