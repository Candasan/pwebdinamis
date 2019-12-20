<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>User</h3></div>

                    <div class="card-body">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">
                        <!-- <button type="button" class="btn btn-success float-right"> -->
                        <i class="fas fa-folder-plus"></i> &nbsp; Tambah User </button>

                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../../index3.html" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nama User ...">
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email ...">   
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                        </div>                                     
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="Password ...">   
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                        </div>                                     
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <br>
                        <br>
                        <br>

                        <table class="table table-bordered">
                            <tr>
                                <th><center>Nama User</center></th>
                                <th><center>Email</center></th>
                                <th style="width:15%"><center>Aksi</center></th>
                            </tr>
                            
                            <tr v-for="items in users" :key="items.id">
                                <td>
                                    <center> {{items.name}} </center>
                                </td>


                                <td>
                                    <center> {{items.email}} </center>
                                </td>

                                <td>
                                <center>
                                
                                <a href="#">
                                    <i class="fas fa-edit cyan"> </i>
                                </a>
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                <a href="#">
                                    <i class="fas fa-trash indigo"> </i>
                                </a>
                                </center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                users: {},
                form: new Form({            //menyimpan data yang diinputkan
                    id: "",
                    name: "",
                    email: "",
                    
                })
            };
        },

        methods: {                          //method untuk 
            loadData() {
                axios.get("api/user").then(({data}) => (this.users = data));
            }
        },
            created() {                     //untuk menampilkan / memanggil data di method atas
                this.loadData();
                Fire.$on("refreshData", () => {
                    this.loadData();
                });
            }
    };
</script>
