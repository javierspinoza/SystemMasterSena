<template>
    <main class="main">
        <!-- Breadcrumb -->
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Arl 
                    <button type="button" @click="abrirModal('arl','registrar')" class="btn btn-success btn-sm" >
                        <i class="icon-plus"></i>&nbsp;Nuevo
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>                    
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>                    
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
					</div>
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </div>
        <!--Inicio del modal agregar/actualizar-->
        <div class="modal fade" id="modalNuevo" :class="{'mostrar': modal}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button type="button" class="close" @click="cerrarModal()" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action method="post" enctype="multipart/form-data" class="form-horizontal">
                            <md-card-content>
                                <div class="md-layout">
                                    <div class="md-layout-item">
                                        <md-field :class="getValidationClass('nombre')">
                                            <label for="nombre">Nombre</label>
                                            <md-input type="text" id="nombre" name="nombre" autocomplete="given-name" v-model="form.nombre" :disabled="sending" />
                                            <span class="md-error" v-if="!$v.form.nombre.required">El nombre es requerido</span>																																	               
                                        </md-field>
                                    </div>
                                </div>
                            </md-card-content>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <md-card-actions>
                            <md-button type="button" class="md-raised" @click="cerrarModal()">Cerrar</md-button>
                        </md-card-actions>
                        <md-card-actions>
                            <md-button type="submit" v-if="tipoAccion==1" class="md-dense md-raised md-primary" :disabled="sending" @click="validarDatos()">Guardar</md-button>
                        </md-card-actions>
                        <md-card-actions>
                            <md-button type="submit" v-if="tipoAccion==2" class="md-dense md-raised md-primary" :disabled="sending" @click="actualizarArl()">Actualizar</md-button>
                        </md-card-actions>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->
    </main>
</template>

<script>
    import { validationMixin } from "vuelidate";
    import { MdButton, MdContent, MdField,MdAutocomplete,MdCard, MdMenu, MdList } from "vue-material/dist/components";
    // import VueMaterial from 'vue-material'
    // Vue.use(VueMaterial)
    Vue.use(MdButton);
    Vue.use(MdContent);
    Vue.use(MdField);
    Vue.use(MdAutocomplete);
    Vue.use(MdCard);
    Vue.use(MdMenu);
    Vue.use(MdList);
    import { required, minLength, maxLength } from "vuelidate/lib/validators";

    export default {
        mixins: [validationMixin],
        props: ["ruta"],

        data() {
            return {

            form: {
                nombre: " "
            },
            sending: false,
            id_arl: 0,
            arrayArl: [],

            modal: 0,
            tituloModal: "",
            tipoAccion: 0,
            };
        },

        validations: {
            form: {
                nombre: {
                    required
                },
            }
        },

        methods: {
            getValidationClass(fieldName) {
                const field = this.$v.form[fieldName];
                if (field) {
                    return {
                    "md-invalid": field.$invalid && field.$dirty
                    };
                }
            },
            nameWithLang({ nombre }) {
                return `${nombre}`;
            },
            validarDatos() {
                this.$v.$touch();

                if (!this.$v.$invalid) {
                    this.registrarArl();
                    this.clearForm();
                }
            },
            clearForm() {
                this.$v.$reset();
                this.form.nombre = null;
            },

            listarArl() {
                let me=this;
                var url= '/arl';
                axios.get(this.ruta + url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArl = respuesta.arl.data;
                    me.myTable(me.arrayArl);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            myTable(datas){
            let me = this;

                $(document).ready(function() {
                
                    var table = $('#dataTable').DataTable({destroy: true,
                        stateSave: true,
                        data:datas,
                        "createdRow": function( row, data, dataIndex){
                            if( data[6] ==  `0`){
                                $(row).addClass('redClass');
                            }
                        },
                        "language": {
                            "lengthMenu": "Ver _MENU_ registros por página",
                            "zeroRecords": "NO existen Datos",
                            "info": "mostrando la página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "search":         "Buscar:",
                            "paginate": {
                                "first":      "Prim",
                                "last":       "Ant",
                                "next":       "Sig",
                                "previous":   "Ant"
                            },
                            "infoFiltered": "(filtrado de _MAX_ total registros)"
                        },
                        responsive: "true",
                        "columns": [
                            { "data": "nombre" },
                            // {"defaultContent": "<button class='btn'> <i class='fa fa-home'></i></button>"}
                            // {"defaultContent": "<button type='button' @click='hola() class='btn btn-success btn-sm' data-tooltip title='Actualizar' > <i class='icon-pencil'></i>  </button> "},
                            {"defaultContent": "<button type='button' id='editar' class='editar btn btn-success btn-sm' data-tooltip title='Editar' > <i class='fas fa-edit'></i> </button> <button type='button' id='eliminar' class='eliminar btn btn-danger btn-sm' data-tooltip title='Eliminar' > <i class='icon-trash'></i>  </button>"},
                            // {"defaultContent": "}
                            // {"defaultContent": " <button type='button' class='md-raised' @click='this.hola()'> Cerrar </button>"}
                        ]
                    });

                    $('#dataTable tbody').on( 'click', '.editar', function () {
                        me.datos = table.row( $(this).parents('tr') ).data();
                        me.abrirModal('arl','actualizar',me.datos);
                    });
                    $('#dataTable tbody').on( 'click', '.eliminar', function () {
                        me.datos= table.row( $(this).parents('tr') ).data();
                        me.eliminarArl(me.datos);
                    });
                });
            },
            registrarArl() {
                let me = this;
                    axios.post(this.ruta + '/arl/registrar',{
                        'nombre': this.form.nombre.toUpperCase(),
                    }).then(function (response) {
                        me.cerrarModal();
                        me.listarArl();
                        me.mensaje("Guardado", "Guardo");
                    }).catch(function (error) {
                        console.log(error);
                    });
            },
            actualizarArl() {
            let me = this;

            axios
                .put(this.ruta + "/arl/actualizar", {
                nombre: this.form.nombre.toUpperCase(),
                id: this.id_arl
                })
                .then(function(response) {
                me.cerrarModal();
                me.listarArl();
                me.mensaje("Actualizado", "Actualizó ");
                })
                .catch(function(error) {
                console.log(error);
                });
            },
            eliminarArl(data = []) {
                Swal.fire({
                    title: '¿Estás seguro de eliminar?' + data["nombre"],
                    text: "No podras revertir estos cambios!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borra este dato!',
                    cancelButtonText: 'No, Cancelalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let me = this;
                        this.id_arl = data["id"];
                        axios.post(this.ruta + "/arl/eliminar", {
                        id: this.id_arl
                        })
                        .then(function(response) {
                            me.listarArl();
                        })
                        .catch(function(error) {
                        console.log(error);
                        });

                        Swal.fire(
                        'Eliminado!',
                        'Dato borrado correctamente.',
                        'success'
                        )
                    }
                })
            },

            mensaje(tipo, crud) {
                Swal.fire(
                    tipo, 'El registro se ' + crud + 
                    ' con éxito. ',
                    'success'
                )
            },

            cerrarModal() {
            this.modal = 0;
            this.tituloModal = "";
            this.clearForm();
            },
            abrirModal(modelo, accion, data = []) {
                switch (modelo) {
                    case "arl": {// libro de el boton nuevo al inicio
                        switch (accion) {
                            case "registrar": {
                            this.modal = 1;
                            this.form.nombre="";
                            this.tituloModal = "Registrar ARL";
                            this.tipoAccion = 1;
                            break;
                            }
                            // muestra la información en el componente vue
                            case "actualizar": {
                            //console.log(data);
                            this.modal = 1;
                            this.tituloModal = "Actualizar ARL";
                            this.tipoAccion = 2;
                            this.id_arl = data["id"];
                            this.form.nombre = data["nombre"];
                            
                            // nombre v-model        datos que vienen del controlador (Main)
                            break;
                            }
                        }
                    }
                }
            },
        },

        mounted() {
            this.listarArl();
        }
    };
</script>
<style>
	.modal-content {
	width: 100% !important;
	position: absolute !important;
	}
	.mostrar {
	display: list-item !important;
	opacity: 1 !important;
	position: absolute !important;
	background-color: #3c29297a !important;
	}
	.div-error {
	display: flex;
	justify-content: center;
	}
	.text-error {
	color: red !important;
	font-weight: bold;
	}
	.material-icons.Color1 { color: rgb(31, 33, 34); }
	.material-icons.Color2 { color: rgba(223, 195, 37, 0.966); }
	.material-icons.Color3 { color: rgb(12, 170, 91); }
	.material-icons.Color4 { color: rgba(228, 54, 54, 0.863); }

    .dt-button {
    padding: 0;
    border: none;
    }
    /* STILO PARA PONERLE COLOR A LA TABLA */
	.dataTable th{
		background-color: #22a593 !important;
		color:white;
	}
</style>