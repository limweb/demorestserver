export default { 
    template: `
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <div class="col-2">
                        <div class="d-flex align-items-center">
                            DELETE Crud
                        </div>
                    </div>
                    <div class="col-8">
                    </div>
                </div>
                <div class="col-2 card-tools">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="ml-5 btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <h2>Delete CRUD {{ $store.state.crud.row_delete.name }}</h2>
                    <form v-on:submit="deleteRow">
                        <p>The action cannot be undone.</p>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a class="btn btn-default"><router-link to="/crud">Cancel</router-link></a>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <pre>{{$store.state.crud.row_delete}}</pre>
            </div>
        </div>
    </section>    
    `, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'CRUD deleteRow', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
      deleteRow(evt){
        evt.preventDefault();
        console.log('deleteRow--->');
      }
    }, 
    mounted() {}, 
    computed: {}, 
    components:{} 
}; 