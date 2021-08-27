<template>
    <main class="main">
    <!-- Breadcrumb -->
        <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Contratistas
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
                                        <th>Opciones</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Tipo Documento</th>
                                        <th>Documento</th>
                                        <th>Lugar Expedición</th>
                                        <th>Banco</th>
                                        <th>Tipo Cuenta</th>
                                        <th>Número Cuenta</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Télefono</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Rol</th>
                                        <th>Eps</th>
                                        <th>Pensiones</th>
                                        <th>ARL</th>
                                        <th>AREA</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>
										<th>Opciones</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Tipo Documento</th>
                                        <th>Documento</th>
                                        <th>Lugar Expedición</th>
                                        <th>Banco</th>
                                        <th>Tipo Cuenta</th>
                                        <th>Número Cuenta</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Télefono</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Rol</th>
                                        <th>Eps</th>
                                        <th>Pensiones</th>
                                        <th>ARL</th>
                                        <th>AREA</th>
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
											<md-field>
                                                <label>Tipo de documento</label>
												<md-select v-model="tp_doc" md-dense>
													<md-option
													v-for="objeto in arrayTpdoc"
													:key="objeto.id"
													:value="objeto.id"
													>{{objeto.name}}</md-option>
												</md-select>
                                            </md-field>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="md-layout-item">
											<md-field :class="getValidationClass('num_doc')">
												<label for="num_doc">Número Documento</label>
												<md-input type="number" id="num_doc" name="num_doc" autocomplete="given-name" v-model="form.num_doc" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.num_doc.required">El número de documento es requerido</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
                                            <span class="md-caption">Lugar Expedición</span>
                                            <multiselect v-model="arrayM" :options="arrayMpio"
                                                placeholder="Seleccione un lugar"
                                                :custom-label="nameWithMpio"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
                                        </div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('nombres')">
												<label for="nombres">Nombre</label>
												<md-input type="text" id="nombres" name="nombres" autocomplete="given-name" v-model="form.nombres" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.nombres.required">El nombre es requerido</span>																																	               
											</md-field>
										</div>
									</div>
                                    <div class="md-layout">
										<div class="md-layout-item">
											<md-field :class="getValidationClass('apellidos')">
												<label for="apellidos">Apellidos</label>
												<md-input type="text" id="apellidos" name="apellidos" autocomplete="given-name" v-model="form.apellidos" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.apellidos.required">Los apellidos son requeridos</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">Bancos</span>
                                            <multiselect v-model="arrayBa" :options="arrayBanco"
                                                placeholder="Seleccione un banco"
                                                :custom-label="nameWithBanco"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
                                            <md-field>
                                                <label>Tipo de cuenta</label>
												<md-select v-model="tp_cuenta" md-dense>
													<md-option
													v-for="objeto in arrayTpcuenta"
													:key="objeto.id"
													:value="objeto.id"
													>{{objeto.name}}</md-option>
												</md-select>
                                            </md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('num_cuenta')">
												<label for="num_cuenta">Número Cuenta</label>
												<md-input type="text" id="num_cuenta" name="num_cuenta" autocomplete="given-name" v-model="form.num_cuenta" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.num_cuenta.required">El número de cuenta es requerido</span>
											</md-field>
										</div>
									</div>
                                    <div class="md-layout">
										<div class="md-layout-item">
											<md-field :class="getValidationClass('direccion')">
												<label for="direccion">Dirección</label>
                                                <span class="md-prefix">
                                                    <i class="material-icons">house</i>
                                                </span>
												<md-input type="text" id="direccion" name="direccion" autocomplete="given-name" v-model="form.direccion" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.direccion.required">La dirección es requerida</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="md-layout-item">
											<md-field :class="getValidationClass('telefono')">
												<label for="telefono">Télefono</label>
												<md-input type="text" id="telefono" name="telefono" autocomplete="given-name" v-model="form.telefono" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.telefono.required">El télefono es requerido</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
                                            <md-field md-clearable :class="getValidationClass('email')">
                                                <label>E-mail</label>
                                                <span class="md-prefix">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <md-input v-model="form.email" md-counter="144"></md-input>
                                                <span class="md-error" v-if="!$v.form.email.email">Email incorrecto</span>
                                            </md-field>
                                            <span class="md-error" v-if="!$v.form.email.required"></span>
                                        </div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
                                            <md-field md-clearable :class="getValidationClass('email2')">
                                                <label>Confirmar E-mail</label>
                                                <span class="md-prefix">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <md-input v-model="form.email2" md-counter="144"></md-input>
                                                <!-- <span class="md-error" v-if="!$v.form.email2.sameAsemail2">Email incorrecto</span> -->
                                                <span class="md-error" v-if="!$v.form.email2.sameAsemail2">El e-mail NO coincide</span>
                                            </md-field>
                                        </div>
									</div>
									<div class="md-layout">
										<div class="md-layout-item">
											<md-datepicker v-model="fec_nac">
												<label>Fecha Nacimiento</label>
											</md-datepicker>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">EPS</span>
                                            <multiselect v-model="arraySa" :options="arraySalud"
                                                placeholder="Seleccione una EPS"
                                                :custom-label="nameWithSalud"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">Pensiones</span>
                                            <multiselect v-model="arrayPe" :options="arrayPension"
                                                placeholder="Seleccione una pensión"
                                                :custom-label="nameWithPension"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">ARL</span>
                                            <multiselect v-model="arrayAr" :options="arrayArl"
                                                placeholder="Seleccione una ARL"
                                                :custom-label="nameWithArl"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
										</div>
									</div>
									<div class="md-layout">
                                        <div class="md-layout-item">
											<span class="md-caption">Area</span>
                                            <multiselect v-model="arrayAre" :options="arrayArea"
                                                placeholder="Seleccione un area"
                                                :custom-label="nameWithArea"
                                                label="nombres"
                                                track-by="nombres">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="md-layout-item">
                                            <md-field>
                                                <label>Rol</label>
												<md-select v-model="is_rol" md-dense>
													<md-option
													v-for="objeto in arrayRol"
													:key="objeto.id"
													:value="objeto.id"
													>{{objeto.name}}</md-option>
												</md-select>
                                            </md-field>
										</div>&nbsp;&nbsp;&nbsp;
									</div>
								</md-card-content>
							</form>
						</div>
						<div class="modal-footer">
							<md-card-actions>
							<md-button type="button" class="md-raised" @click="cerrarFormulario()">Cerrar</md-button>
								<md-button type="submit" v-if="tipoAccion==1" class="md-dense md-raised md-primary" :disabled="sending" @click="validarDatos()">Guardar</md-button>
								<md-button type="submit" v-if="tipoAccion==2" class="md-dense md-raised md-primary" :disabled="sending" @click="actualizarContratista()">Actualizar</md-button>
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
			nombres:" ",
			apellidos:" ",
			num_doc:"",
			num_cuenta:"",
            email: " ",
            email2: " ",
			direccion:" ",
			telefono:"",

		},

		fec_nac:"",
		tp_cuenta:"",
		tp_doc:"",
		is_rol:" ",

		tipoAccion: 1,
		listado: 1,
		sending: false,
        // MULTISELCT
        arrayM:{id:0, nombre:'', nomDpto:''},
        arrayMpio:[],
        id_mpio:0,
        // idMpios:0,
        // MULTISELCT NORMAL
		arrayAre: {id:0, nombres:''},
		arrayArea: [],
		id_area:0,
		arrayAr: {id:0, nombre:''},
		arrayArl: [],
		id_riesgos:0,
		arrayBa: {id:0, nombre:''},
		arrayBanco: [],
		id_banco:0,
		arrayPe: {id:0, nombre:''},
		arrayPension: [],
		id_pension:0,
		arraySa: {id:0, nombre:''},
		arraySalud: [],
		id_eps:0,
		arrayContratista:[],
		id_contratista:0,
		// SELECT NORMAL PARA TIPO DE CUENTA y rol---
		arrayTpcuenta: [
			{ id: "AHORROS", name: "AHORROS" },
			{ id: "CORRIENTE", name: "CORRIENTE" }
		],
		arrayRol: [
			{ id: "INSTRUCTOR", name: "INSTRUCTOR" },
			{ id: "ADMINISTRATIVO", name: "ADMINISTRATIVO" }
		],
		arrayTpdoc: [
			{ id: "TARJETA DE IDENTIDAD", name: "TARJETA DE IDENTIDAD" },
			{ id: "CÉDULA", name: "CÉDULA" }
		],
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
			nombres: {
				required
			},
			apellidos: {
				required
			},
			num_doc: {
				required
			},
            telefono: {
				required
			},
			num_cuenta: {
				required
			},
            email: {
                email
            },
            email2: {
                sameAsemail2: sameAs("email")
            },
            direccion: {
				required
			},
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
				this.registrarContratista();
				this.clearForm();
			}
		},
		clearForm() {
            this.$v.$reset();
            
			this.form.nombres="";
			this.form.apellidos="";
			this.form.telefono="";
			this.form.num_doc="";
			// this.form.lugar_expe="";
			this.tp_doc="";
			this.tp_cuenta="";
			this.is_rol="";
			this.form.num_cuenta="";
			this.form.email="";
			this.form.email2="";
			this.form.direccion="";

			this.fec_nac="";

			this.arrayM = {id:0, nombre:'', nomDpto:''};
			this.arrayAre = {id:0, nombres:''};//area
			this.arrayAr = {id:0, nombre:''};//arl
			this.arrayBa = {id:0, nombre:''};
			this.arrayPe = {id:0, nombre:''};
			this.arraySa = {id:0, nombre:''};
			
			// this.form.apellidos="";
		},
        nameWithMpio ({ nombre, nomDpto }) {
            return `${nombre} — [${nomDpto}]`
        },
		nameWithArea ({ nombres}) {
            return `${nombres}`
        },
		nameWithArl ({ nombre}) {
            return `${nombre}`
        },
		nameWithBanco ({ nombre}) {
            return `${nombre}`
        },
		nameWithPension ({ nombre}) {
            return `${nombre}`
        },
		nameWithSalud ({ nombre}) {
            return `${nombre}`
        },
		listarContratista() {
            let me = this;
            var url = "/contratista";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
					me.arrayContratista = respuesta.contratistas.data;
					me.myTable(me.arrayContratista);
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
						{"defaultContent": "<button type='button' id='editar' class='editar btn btn-success btn-sm' data-tooltip title='Editar' > <i class='fas fa-edit'></i> </button> <button type='button' id='eliminar' class='eliminar btn btn-danger btn-sm' data-tooltip title='Eliminar' > <i class='icon-trash'></i>  </button>"},
						{ "data": "nomFull"},
						{ "data": "tp_doc"},
						{ "data": "num_doc"},
						{ "data": "nomMpio"},
                        { "data": "nombreBanco"},
						{ "data": "tp_cuenta"},
						{ "data": "num_cuenta"},
						{ "data": "email"},
						{ "data": "direccion"},
						{ "data": "telefono"},
						{ "data": "fec_nac"},
						{ "data": "is_rol"},
                        { "data": "nombreSalud"},
                        { "data": "nombrePension"},
                        { "data": "nombreArl"},
						{ "data": "nombreArea"},
						// { "data": "nombrePais" },
						// {"defaultContent": "<button class='btn'> <i class='fa fa-home'></i></button>"}
						// {"defaultContent": "<button type='button' @click='hola() class='btn btn-success btn-sm' data-tooltip title='Actualizar' > <i class='icon-pencil'></i>  </button> "},
						
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
					me.eliminarContratista(me.datos);
					//  console.log(data['modelo']);
				});
				
			});
		},
        getMpio() {
            let me = this;
            var url = "/mpio/selectMpio" ;
            axios.get(this.ruta + url).then(function(response) {
                var respuesta = response.data;
                me.arrayMpio = respuesta.mpio;
            }).catch(function(error) {
                console.log(error);
            });
        },
		selectArea() {
            let me = this;
            var url = "area/selectArea";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayArea = respuesta.areas;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		selectArl() {
            let me = this;
            var url = "arl/selectArl";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayArl = respuesta.arl;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		selectBanco() {
            let me = this;
            var url = "banco/selectBanco";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayBanco = respuesta.bancos;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		selectPension() {
            let me = this;
            var url = "pension/selectPension";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayPension = respuesta.pensiones;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		selectSalud() {
            let me = this;
            var url = "salud/selectSalud";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arraySalud = respuesta.salud;
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
			this.listarContratista();
		},
		registrarContratista() {
		let me = this;
            axios.post(this.ruta +"/contratista/registrar", {
				'nombres': this.form.nombres.toUpperCase(),
				'apellidos': this.form.apellidos.toUpperCase(),
				'num_doc': this.form.num_doc,
				// 'lugar_expe': this.form.lugar_expe,
				'tp_doc': this.tp_doc,
				'tp_cuenta': this.tp_cuenta.toUpperCase(),
				'is_rol': this.is_rol.toUpperCase(),
				'num_cuenta': this.form.num_cuenta,
				'direccion': this.form.direccion.toUpperCase(),
				'email': this.form.email.toUpperCase(),
				'telefono': this.form.telefono,

				'fec_nac': this.fec_nac,

                'id_mpio': this.arrayM.id,
				'id_area': this.arrayAre.id,
				'id_riesgos': this.arrayAr.id,
				'id_banco': this.arrayBa.id,
				'id_pension': this.arrayPe.id,
				'id_eps': this.arraySa.id,
                }).then(function (response) {
					me.listarContratista();
                    me.mensaje("Guardado", "Guardo ");
                    me.cerrarFormulario();
                }).catch(function (error) {
                console.log(error);
                });
		},
		mostrarActualizar(data = []) {
			let me = this;
			(this.tipoAccion = 2), (me.listado = 0);
			(this.id_contratista = data["id"]);

            this.arrayM.id = data["id_mpio"];
            this.arrayM.nombre = data["nomMpio"];
            this.arrayM.nomDpto = data["nomDpto"];
			this.arrayAre.id = data["id_area"];
			this.arrayAre.nombres = data["nombreArea"];
			this.arrayAr.id = data["id_riesgos"];
			this.arrayAr.nombre = data["nombreArl"];
			this.arrayBa.id = data["id_banco"];
			this.arrayBa.nombre = data["nombreBanco"];
			this.arrayPe.id = data["id_pension"];
			this.arrayPe.nombre = data["nombrePension"];
			this.arraySa.id = data["id_eps"];
			this.arraySa.nombre = data["nombreSalud"];

			this.form.nombres = data["nombres"];
			this.form.apellidos = data["apellidos"];
			this.form.num_doc = data["num_doc"];
			this.form.telefono = data["telefono"];
			this.tp_doc = data["tp_doc"];
			this.tp_cuenta = data["tp_cuenta"];
			this.is_rol = data["is_rol"];
			this.form.num_cuenta = data["num_cuenta"];
			this.form.email = data["email"];
			this.form.email2 = data["email"];
			this.form.direccion = data["direccion"];

			this.fec_nac = data["fec_nac"];
		},
		actualizarContratista() {
		let me = this;
            axios.put(this.ruta +"/contratista/actualizar", {
					'id':this.id_contratista,

					'nombres': this.form.nombres.toUpperCase(),
					'apellidos': this.form.apellidos.toUpperCase(),
					'num_doc': this.form.num_doc,
					'telefono': this.form.telefono,
					'tp_doc': this.tp_doc,
					'tp_cuenta': this.tp_cuenta.toUpperCase(),
					'is_rol': this.is_rol.toUpperCase(),
					'num_cuenta': this.form.num_cuenta,
                    'email': this.form.email.toUpperCase(),
                    'direccion': this.form.direccion.toUpperCase(),

					'fec_nac': this.fec_nac,

                    'id_mpio': this.arrayM.id,
					'id_area': this.arrayAre.id,
					'id_riesgos': this.arrayAr.id,
					'id_banco': this.arrayBa.id,
					'id_pension': this.arrayPe.id,
					'id_eps': this.arraySa.id,
            })
            .then(function (response) {
                me.listarContratista();
                me.mensaje("Actualizado", "Actualizo");
                me.cerrarFormulario();
            })
            .catch(function (error) {
                console.log(error);
            });
		},
		eliminarContratista(data = []) {
			Swal.fire({
				title: '¿Estás seguro de eliminar?' + data["nombres"],
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
					this.id_contratista = data["id"];
					axios.post(this.ruta +"/contratista/eliminar", {
					id: this.id_contratista
					})
					.then(function(response) {
						me.listarContratista();
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
        this.getMpio();
		this.selectArea();
		this.selectArl();
		this.selectBanco();
		this.selectPension();
		this.selectSalud();
		// this.selectSupervisor();
		this.listarContratista();
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