<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Category</h3></div>

                    <div class="card-body">
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-folder-plus"></i> &nbsp; Tambah Kategori </button>
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
            loadData() {
                axios.get("api/kategori").then(({data}) => (this.kategoris = data));
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
