<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Blog Data</h3></div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th><center>Id</center></th>
                                <th><center>Kategori Id</center></th>
                                <th><center>User Id</center></th>
                                <th><center>Judul</center></th>
                                <th><center>Isi</center></th>
                                <th><center>Jumlah Baca</center></th>
                                <th style="width:30%"><center>Aksi</center></th>
                            </tr>
                            <tr v-for="items in blogs" :key="items.id">
                                <td>
                                    <center> {{items.id}} </center>
                                </td>

                                <td>
                                    <center> {{items.kategori_id}} </center>
                                </td>

                                <td>
                                    <center> {{items.user_id}} </center>
                                </td>

                                <td>
                                    <center> {{items.judul}} </center>
                                </td>

                                <td>
                                   <center>  {{items.isi}} </center>
                                </td>

                                <td>
                                    <center> {{items.jbaca}} </center>
                                </td>

                                <td>
                                <center>
                                <a href="#">
                                    <i class="fas fa-eye pink"> Read </i>
                                </a>
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                <a href="#">
                                    <i class="fas fa-edit cyan"> Edit </i>
                                </a>
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                <a href="#">
                                    <i class="fas fa-trash indigo"> Delete</i>
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
                blogs: {},
                form: new Form({            //menyimpan data yang diinputkan
                    id: "",
                    kategori_id: "",
                    user_id: "",
                    judul: "",
                    isi: "",
                    jbaca: ""
                })
            };
        },

        methods: {                          //method untuk 
            loadData() {
                axios.get("api/blog").then(({data}) => (this.blogs = data));
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
