<template>
    <main class="main">
    <!-- Breadcrumb -->
        <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Detalle Fichas
					<button type="button" @click="mostraFormulario()" class="btn btn-success btn-sm">
						<i class="icon-plus"></i>&nbsp;Nuevo
					</button>
				</div>
				<div class="card-body">
					<template v-if="listado==1">
						<div class="table-responsive">
							<table class="table table-striped table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
                                        <th>Número Ficha</th>
										<th>Nombre Aprendiz</th>
										<th>Fecha</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>
                                        <th>Número Ficha</th>
										<th>Nombre Aprendiz</th>
										<th>Fecha</th>
										<th>Opciones</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</template>
					<template v-else-if="listado==0">
						<div class="card-body">
							<form action method="post" enctype="multipart/form-data" class="form-horizontal">
								<md-card-content>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<span class="md-caption">Número Ficha</span>
                                            <multiselect v-model="arrayNu" :options="arrayNumero"
                                                placeholder="Seleccione un número"
                                                :custom-label="nameWithNumero"
                                                label="num_ficha"
                                                track-by="num_ficha">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">Aprendiz</span>
                                            <multiselect v-model="arrayAp" :options="arrayAprendiz"
                                                placeholder="Seleccione un aprendiz"
                                                :custom-label="nameWithAprendiz"
                                                label="nomFull"
                                                track-by="nomFull">
                                            </multiselect>
										</div>
									</div>
								</md-card-content>
							</form>
						</div>
						<div class="modal-footer">
							<md-card-actions>
							<md-button type="button" class="md-raised" @click="cerrarFormulario()">Cerrar</md-button>
								<md-button type="submit" v-if="tipoAccion==1" class="md-dense md-raised md-primary" :disabled="sending" @click="validarDatos()">Guardar</md-button>
								<md-button type="submit" v-if="tipoAccion==2" class="md-dense md-raised md-primary" :disabled="sending" @click="actualizarDetFicha()">Actualizar</md-button>
							</md-card-actions>
						</div>
					</template>
				</div>
			</div>
        </div>
    </main>
</template>
<script>

    import { validationMixin } from "vuelidate";
    import Multiselect from "vue-multiselect";
    import Toasted from 'vue-toasted';
    import vSelect from "vue-select";
    import {
		MdButton,  
		MdContent,
		MdField,
		MdCard,
		MdMenu,
		MdSwitch,
		MdDatepicker,
		MdList
    } from "vue-material/dist/components";

    Vue.use(Toasted,  {
        iconPack : 'material' // set your iconPack, defaults to material. material|fontawesome|custom-class
    });
    Vue.use(MdButton);

    Vue.use(MdContent);
    Vue.use(MdField);
    Vue.use(MdCard);
    Vue.use(MdMenu);
    Vue.use(MdSwitch);
    Vue.use(MdList);
    Vue.use(MdDatepicker);
    import { required, minLength, maxLength, email, sameAs } from "vuelidate/lib/validators";

export default {
	mixins: [validationMixin],
	props: ['ruta'],
	
	data() {

		Vue.material.locale.shortDays = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
		Vue.material.locale.shorterDays = ['D', 'L', 'M', 'M', 'J', 'V', 'S'];
		Vue.material.locale.shortMonths = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Sep','Oct','Nov','Dic'];
		Vue.material.locale.months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		let dateFormat = this.$material.locale.dateFormat || "yyyy-MM-dd";
		let now = new Date();
    
		return {

		form: {
		},

		tipoAccion: 1,
		listado: 1,
		sending: false,
        // MULTISELCT NORMAL
		arrayNu: {id:0, num_ficha:''},
		arrayNumero: [],
		id_ficha:0,
		arrayAp: {id:0, nomFull:''},
		arrayAprendiz: [],
		id_aprendiz:0,

		arrayDetFicha:[],
		id_detficha:0,
        fec_save:"",

		modal: 0,
		tituloModal: "",
		tipoAccion: 0,
		};
	},
	components: {
		vSelect,
		Multiselect
	},
	validations: {
		form: {
			// numero: {
			// 	required
			// },
		}
	},
	computed: {
		submittableDateTime() {
			const date = new Date(this.date);
			console.log(date);
			return date;
		},
		dateFormat() {
			return this.$material.locale.dateFormat ||"YYYY-MM-dd";
			// return moment(date).format('LL')
		},
		mdType() {
			switch (this.mdTypeValue) {
				case "fecCompra":
				return String;
			}
		}
	},
	methods: {
		//metodo que valida
		getValidationClass(fieldName) {
			const field = this.$v.form[fieldName];
			if (field) {
				return {
				"md-invalid": field.$invalid && field.$dirty
				};
			}
		},
		validarDatos() {
			this.$v.$touch();

			if (!this.$v.$invalid) {
				this.registrarDetFicha();
				this.clearForm();
			}
		},
		clearForm() {
            this.$v.$reset();

			this.arrayNu = {id:0, num_ficha:''};
			this.arrayAp = {id:0, nomFull:''};
		},
		nameWithAprendiz ({ nomFull}) {
            return `${nomFull}`
        },
		nameWithNumero ({ num_ficha}) {
            return `${num_ficha}`
        },
		listarDetFicha() {
            let me = this;
            var url = "detFichaAprendiz";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
					me.arrayDetFicha = respuesta.det_ficha_aprendiz.data;
					me.myTable(me.arrayDetFicha);
                    // me.pagination = respuesta.pagination;
                }).catch(function (error) {
                    console.log(error);
            });
		},
		myTable(datas){
		let me = this;

			$(document).ready(function() {
			
				var table = $('#dataTable').DataTable({destroy: true,
					stateSave: true,
					"scrollX": true,  //PARA DESPLAMIENTO HORIZONTAL
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
						{ "data": "numFicha"},
						{ "data": "nomFull"},
						{ "data": "fec_save"},
						// { "data": "nombrePais" },
						// {"defaultContent": "<button class='btn'> <i class='fa fa-home'></i></button>"}
						// {"defaultContent": "<button type='button' @click='hola() class='btn btn-success btn-sm' data-tooltip title='Actualizar' > <i class='icon-pencil'></i>  </button> "},
						{"defaultContent": "<button type='button' id='editar' class='editar btn btn-success btn-sm' data-tooltip title='Editar' > <i class='fas fa-edit'></i> </button> <button type='button' id='eliminar' class='eliminar btn btn-danger btn-sm' data-tooltip title='Eliminar' > <i class='icon-trash'></i>  </button>"},
						// {"defaultContent": "}
						// {"defaultContent": " <button type='button' class='md-raised' @click='this.hola()'> Cerrar </button>"}
					]
				});

				$('#dataTable tbody').on( 'click', '.editar', function () {
					me.datos = table.row( $(this).parents('tr') ).data();
					me.mostrarActualizar(me.datos);
					//  console.log(data['nombre']);
				});
				$('#dataTable tbody').on( 'click', '.eliminar', function () {
					me.datos= table.row( $(this).parents('tr') ).data();
					me.eliminarDetFicha(me.datos);
					//  console.log(data['modelo']);
				});
				
			});
		},
        
		selectFicha() {
            let me = this;
            var url = "ficha/selectFicha";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayNumero = respuesta.fichas;
                }).catch(function (error) {
                    console.log(error);
            });
        },
        selectAprendiz() {
            let me = this;
            var url = "aprendiz/selectAprendiz";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayAprendiz = respuesta.aprendices;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		mostraFormulario() {
			this.clearForm();
			let me = this;
			(this.tipoAccion = 1), (me.listado = 0);
		},
		cerrarFormulario() {
			this.listado = 1;
			this.listarDetFicha();
		},
		registrarDetFicha() {
		let me = this;
            axios.post(this.ruta +"/detFichaAprendiz/registrar", {

                'id_ficha': this.arrayNu.id,
				'id_aprendiz': this.arrayAp.id,
				// 'fec_save': this.fec_save,

                }).then(function (response) {
					me.listarDetFicha();
                    me.mensaje("Guardado", "Guardo ");
                    me.cerrarFormulario();
                }).catch(function (error) {
                console.log(error);
                });
		},
		mostrarActualizar(data = []) {
			let me = this;
			(this.tipoAccion = 2), (me.listado = 0);
			(this.id_detficha = data["id"]);

			this.arrayNu.id = data["id_ficha"];
			this.arrayNu.num_ficha = data["numFicha"];
			this.arrayAp.id = data["id_aprendiz"];
			this.arrayAp.nomFull = data["nomFull"];

		},
		actualizarDetFicha() {
		let me = this;
            axios.put(this.ruta +"/detFichaAprendiz/actualizar", {
				'id':this.id_detficha,

                'id_ficha': this.arrayNu.id,
				'id_aprendiz': this.arrayAp.id,
            })
            .then(function (response) {
                me.listarDetFicha();
                me.mensaje("Actualizado", "Actualizo");
                me.cerrarFormulario();
            })
            .catch(function (error) {
                console.log(error);
            });
		},
		eliminarDetFicha(data = []) {
			Swal.fire({
				title: '¿Estás seguro de eliminar este dato?',
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
					this.id_detficha = data["id"];
					axios.post(this.ruta +"/detFichaAprendiz/eliminar", {
					id: this.id_detficha
					})
					.then(function(response) {
						me.listarDetFicha();
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
	},
	mounted() {
		this.selectAprendiz();
		this.selectFicha();
		this.listarDetFicha();
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
	/* ESTILO PARA QUE LA TABLA SE DESPLAZE HORIZONTALMENTE */
	.div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
	/* STILO PARA PONERLE COLOR A LA TABLA */
	.dataTable th{
		background-color: #22a593 !important;
		color:white;
	}
	.material-icons.Color1 { color: rgb(31, 33, 34); }
	.material-icons.Color2 { color: rgba(223, 195, 37, 0.966); }
	.material-icons.Color3 { color: rgb(12, 170, 91); }
	.material-icons.Color4 { color: rgba(228, 54, 54, 0.863); }
</style>