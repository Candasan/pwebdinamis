<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Category</h3></div>

                    <div class="card-body">

                        <button type="button" class="btn btn-success float-right" @click="modalBaru">
                            <i class="fas fa-folder-plus"></i> &nbsp; Tambah Kategori</button>

                        <br>
                        <br>
                        <br>
        
                        <table class="table table-bordered">
                            
                            <tr>
                                <th><center>Kategori</center></th>
                                <th style="width:25%"><center>Jumlah Berita</center></th>
                                <th style="width:15%"><center>Aksi</center></th>
                            </tr>

                            <tr v-for="items in kategoris" :key="items.id">
                                <td> 
                                    {{items.namakategori}}
                                </td>

                                <td>
                                
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
                        <!-- Modal -->
                        <div class="modal fade"
                        id="tambah"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="tambahLabel"
                        aria-hidden="true"
                        >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahLabel" v-show="!editmode">Tambah Data Baru</h5>
                                <h5 class="modal-title" id="tambahLabel" v-show="editmode">Rubah Data Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editmode ? updateData() : createData()">
                                <div class="modal-body">
                                <div class="form-group">
                                    <input
                                    v-model="form.namakategori"
                                    type="text"
                                    name="namakategori"
                                    placeholder="Nama Kategori"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('namakategori') }"
                                    />
                                    <has-error :form="form" field="namakategori"></has-error>
                                </div>
                                </div>

                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
                                <button v-show="editmode" type="submit" class="btn btn-primary">Rubah</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!--/Modal-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                kategoris: {},
                form: new Form({            //menyimpan data yang diinputkan
                    id: "",
                    namakategori: "",
                    jumlah: ""
                })
            };
        },

        methods: {                          //method untuk 
            modalBaru() {
                this.editmode = false;
                this.form.reset();
                $("#tambah").modal("show");
            },
            loadData() {
                axios.get("api/kategori").then(({data}) => (this.kategoris = data));
            },
            createData() {
            this.form
                .post("api/kategori")
                .then(() => {
                this.$Progress.start();
                Fire.$emit("refreshData");      //refresh database kedalam tabel
                $("#tambah").modal("hide");
                Toast.fire({                    //notifikasi 
                    type: "success",
                    title: "Data Berhasi Tersimpan"
                });
                this.$Progress.finish();
                })
                .catch();
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
