<template>
    <main class="main">
    <!-- Breadcrumb -->
        <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Contratos
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
                                        <th>Contratista</th>
										<th>Supervisor</th>
										<th>ARL</th>
										<th>Recursos</th>
                                        <th>Número</th>
                                        <th>Fecha</th>
                                        <th>Objeto</th>
                                        <th>Educación</th>
                                        <th>Obligacion</th>
                                        <th>Experiencia</th>
                                        <th>Valor Inicial</th>
                                        <th>valor Hora Mes</th>
                                        <th>Plazo Inicial</th>
                                        <th>Tipo Contrato</th>
                                        <th>Horas</th>
                                        <th>Total Horas</th>
                                        <th>Número CDP</th>
                                        <th>Número Autorización</th>
                                        <th>Fecha Autorización</th>
                                        <th>Lugar Ejecución</th>   <!-- id lugar -->
										<th>Tipo Riesgo</th>
										<th>SIIF</th>
										<th>Fecha SIIF</th>
										<th>Número Poliza</th>
										<th>Valor Asegurado</th>
										<th>% Asegurado</th>
										<th>Vigencia 1</th>
										<th>Vigencia 2</th>
										<th>Número Aprobación</th>
										<th>Fecha Poliza</th>
										<th>Valor CDP</th>
										<th>Fecha Inicial Poliza</th>
										<th>Fecha Fin Poliza</th>
										<th>Link</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>
										<th>Opciones</th>
                                        <th>Contratista</th>
										<th>Supervisor</th>
										<th>ARL</th>
										<th>Recursos</th>
                                        <th>Número</th>
                                        <th>Fecha</th>
                                        <th>Objeto</th>
                                        <th>Educación</th>
                                        <th>Obligacion</th>
                                        <th>Experiencia</th>
                                        <th>Valor Inicial</th>
                                        <th>valor Hora Mes</th>
                                        <th>Plazo Inicial</th>
                                        <th>Tipo Contrato</th>
                                        <th>Horas</th>
                                        <th>Total Horas</th>
                                        <th>Número CDP</th>
                                        <th>Número Autorización</th>
                                        <th>Fecha Autorización</th>
                                        <th>Lugar Ejecución</th>   <!-- id lugar -->
										<th>Tipo Riesgo</th>
										<th>SIIF</th>
										<th>Fecha SIIF</th>
										<th>Número Poliza</th>
										<th>Valor Asegurado</th>
										<th>% Asegurado</th>
										<th>Vigencia 1</th>
										<th>Vigencia 2</th>
										<th>Número Aprobación</th>
										<th>Fecha Poliza</th>
										<th>Valor CDP</th>
										<th>Fecha Inicial Poliza</th>
										<th>Fecha Fin Poliza</th>
										<th>Link</th>
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
											<span class="md-caption">Contratista</span>
                                            <multiselect v-model="arrayCo" :options="arrayContratista"
                                                placeholder="Seleccione un contratista"
                                                :custom-label="nameWithContratista"
                                                label="nomFull"
                                                track-by="nomFull">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">Supervisor</span>
                                            <multiselect v-model="arraySu" :options="arraySupervisor"
                                                placeholder="Seleccione un supervisor"
                                                :custom-label="nameWithSupervisor"
                                                label="nomFull"
                                                track-by="nomFull">
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
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<span class="md-caption">Recursos</span>
                                            <multiselect v-model="arrayRe" :options="arrayRecursos"
                                                placeholder="Seleccione un Recurso"
                                                :custom-label="nameWithRecursos"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
										</div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('numero')">
												<label for="numero">Número</label>
												<md-input type="number" id="numero" name="numero" autocomplete="given-name" v-model="form.numero" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.numero.required">El número es requerido</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-datepicker v-model="fecha">
												<label>Fecha</label>
											</md-datepicker>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('educacion')">
												<label for="educacion">Educación</label>
												<md-input type="text" id="educacion" name="educacion" autocomplete="given-name" v-model="form.educacion" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.educacion.required">La educación es requerida</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('vr_inicial')">
												<label for="vr_inicial">Valor Inicial</label>
												<md-input type="number" id="vr_inicial" name="vr_inicial" autocomplete="given-name" v-model="form.vr_inicial" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.vr_inicial.required">La educación es requerida</span>																																	               
											</md-field>
										</div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field>
                                                <label>Objeto Contractual</label>
                                                <md-textarea v-model="objeto" md-autogrow></md-textarea>
                                            </md-field>
										</div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field>
                                                <label>Obligaciones</label>
                                                <md-textarea v-model="obligacion" md-autogrow></md-textarea>
                                            </md-field>
										</div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field>
                                                <label>Experiencia</label>
                                                <md-textarea v-model="experiencia" md-autogrow></md-textarea>
                                            </md-field>
										</div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field>
												<label for="vr_hora_mes">Valor Hora Mes</label>
												<md-input type="number" id="vr_hora_mes" name="vr_hora_mes" autocomplete="given-name" v-model="vr_hora_mes" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
												<label for="plazo_inicial">Plazo Inicial</label>
												<md-input type="text" id="plazo_inicial" name="plazo_inicial" autocomplete="given-name" v-model="plazo_inicial" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="md-layout-item">
											<md-field>
												<label>Tipo Contrato</label>
												<md-select v-model="tp_contrato" md-dense>
													<md-option
													v-for="objeto in arrayTpcontrato"
													:key="objeto.id"
													:value="objeto.id"
													>{{objeto.name}}</md-option>
												</md-select>
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
										<!-- <div v-show="tp_contrato==HORAS"> -->
											<div class="md-layout-item">
												<md-field>
													<label for="horas">Horas</label>
													<md-input type="text" id="horas" name="horas" autocomplete="given-name" v-model="horas" :disabled="sending" />																																	               
												</md-field>
											</div>
										<!-- </div> -->
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field>
												<label for="tot_horas">Total Horas</label>
												<md-input type="text" id="tot_horas" name="tot_horas" autocomplete="given-name" v-model="tot_horas" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('nro_cdp')">
												<label for="nro_cdp">Número CDP</label>
												<md-input type="number" id="nro_cdp" name="nro_cdp" autocomplete="given-name" v-model="form.nro_cdp" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.nro_cdp.required">La número CDP es requerido</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('nro_autoriza')">
												<label for="nro_autoriza">Número Autorización</label>
												<md-input type="number" id="nro_autoriza" name="nro_autoriza" autocomplete="given-name" v-model="form.nro_autoriza" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.nro_autoriza.required">La número de autorización es requerido</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
                                            <md-datepicker v-model="fec_autoriza">
												<label>Fecha Autorización</label>
											</md-datepicker>
                                        </div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<span class="md-caption">Lugar Ejecución</span>
                                            <multiselect v-model="arrayM" :options="arrayMpio"
                                                placeholder="Seleccione un lugar"
                                                :custom-label="nameWithMpio"
                                                label="nombre"
                                                track-by="nombre">
                                            </multiselect>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
                                                <label>Tipo de Riesgos</label>
												<md-select v-model="tp_riesgo" md-dense>
													<md-option
													v-for="objeto in arrayTpriesgo"
													:key="objeto.id"
													:value="objeto.id"
													>{{objeto.name}}</md-option>
												</md-select>
                                            </md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
                                            <md-field :class="getValidationClass('siif')">
												<label for="siif">Número SIIF</label>
												<md-input type="number" id="siif" name="siif" autocomplete="given-name" v-model="form.siif" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.siif.required">El número SIIF es requerido</span>
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-datepicker v-model="fec_siif">
												<label>Fecha SIIF</label>
											</md-datepicker>
										</div>
									</div>
                                    <div class="md-layout">
                                        <div class="md-layout-item">
											<md-field :class="getValidationClass('nro_poliza')">
												<label for="nro_poliza">Número Poliza</label>
												<md-input type="text" id="nro_poliza" name="nro_poliza" autocomplete="given-name" v-model="form.nro_poliza" :disabled="sending" />
												<span class="md-error" v-if="!$v.form.nro_poliza.required">El número de poliza es requerido</span>																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
												<label for="vr_asegurado">Valor Asegurado</label>
												<span class="md-prefix">
                                                    <i class="material-icons">attach_money</i>
                                                </span>
												<md-input type="number" id="vr_asegurado" name="vr_asegurado" autocomplete="given-name" v-model="vr_asegurado" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
												<label for="porc_asegura">% Asegurado</label>
												<span class="md-prefix">
                                                    <i class="material-icons">attach_money</i>
                                                </span>
												<md-input type="number" id="porc_asegura" name="porc_asegura" autocomplete="given-name" v-model="porc_asegura" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
												<label for="vigencia1">Vigencia 1</label>
												<md-input type="text" id="vigencia1" name="vigencia1" autocomplete="given-name" v-model="vigencia1" :disabled="sending" />																																	               
											</md-field>
										</div>
									</div>
									<div class="md-layout">
                                        <div class="md-layout-item">
											<md-field>
												<label for="vigencia2">Vigencia 2</label>
												<md-input type="text" id="vigencia2" name="vigencia2" autocomplete="given-name" v-model="vigencia2" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
												<label for="nro_aprobacion">Número Aprobación</label>
												<md-input type="number" id="nro_aprobacion" name="nro_aprobacion" autocomplete="given-name" v-model="nro_aprobacion" :disabled="sending" />																																	               
											</md-field>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-datepicker v-model="fec_poliza">
												<label>Fecha Poliza</label>
											</md-datepicker>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-field>
												<label for="vr_cdp">Valor CDP</label>
												<span class="md-prefix">
                                                    <i class="material-icons">attach_money</i>
                                                </span>
												<md-input type="number" id="vr_cdp" name="vr_cdp" autocomplete="given-name" v-model="vr_cdp" :disabled="sending" />																																	               
											</md-field>
										</div>
									</div>
									<div class="md-layout">
                                        <div class="md-layout-item">
											<md-datepicker v-model="fec_ini_pol">
												<label>Fecha Inicio Poliza</label>
											</md-datepicker>
										</div>&nbsp;&nbsp;&nbsp;
                                        <div class="md-layout-item">
											<md-datepicker v-model="fec_fin_pol">
												<label>Fecha Fin Poliza</label>
											</md-datepicker>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="md-layout-item">
											<md-field>
												<label for="link">Link</label>
												<md-input type="text" id="link" name="link" autocomplete="given-name" v-model="link" :disabled="sending" />																																	               
											</md-field>
										</div>
									</div>
								</md-card-content>
							</form>
						</div>
						<div class="modal-footer">
							<md-card-actions>
							<md-button type="button" class="md-raised" @click="cerrarFormulario()">Cerrar</md-button>
								<md-button type="submit" v-if="tipoAccion==1" class="md-dense md-raised md-primary" :disabled="sending" @click="validarDatos()">Guardar</md-button>
								<md-button type="submit" v-if="tipoAccion==2" class="md-dense md-raised md-primary" :disabled="sending" @click="actualizarContrato()">Actualizar</md-button>
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
			numero:"",
			educacion:"",
			vr_inicial:"",
			nro_cdp:"",
			nro_autoriza:"",
			siif:"",
			nro_poliza:"",
		},

		fecha:"",
		objeto:" ",
		obligacion:" ",
		experiencia:" ",
		vr_hora_mes:"",
		plazo_inicial:" ",
		horas:"",
		tot_horas:"",
		fec_autoriza:"",
		tp_riesgo:"",
		tp_contrato:"",
		// H:"",
		fec_siif:"",
		vr_asegurado:"",
		porc_asegura:"",
		vigencia1:"",
		vigencia2:"",
		nro_aprobacion:"",
		fec_poliza:"",
		vr_cdp:"",
		fec_ini_pol:"",
		fec_fin_pol:"",
		link:"",

		tipoAccion: 1,
		listado: 1,
		sending: false,
        // MULTISELCT
        arrayM:{id:0, nombre:'', nomDpto:''},
        arrayMpio:[],
        id_lugar:0,
        // MULTISELCT NORMAL
		arrayCo: {id:0, nomFull:''},
		arrayContratista: [],
		id_contratista:0,
		arraySu: {id:0, nomFull:''},
		arraySupervisor: [],
		id_supervisa:0,
		arrayAr: {id:0, nombre:''},
		arrayArl: [],
		id_arl:0,
        arrayRe: {id:0, nombre:''},
		arrayRecursos: [],
		id_recurso:0,

		arrayContrato:[],
		id_contrato:0,
		// SELECT NORMAL PARA TIPO DE contrato
		arrayTpcontrato: [
			{ id: "TIEMPO COMPLETO", name: "TIEMPO COMPLETO" },
			{ id: "HORAS", name: "HORAS" }
		],
        arrayTpriesgo: [
			{ id: "RIESGO 1", name: "RIESGO 1" },
			{ id: "RIESGO 2", name: "RIESGO 2" },
			{ id: "RIESGO 3", name: "RIESGO 3" },
			{ id: "RIESGO 4", name: "RIESGO 4" },
			{ id: "RIESGO 5", name: "RIESGO 5" },
			{ id: "RIESGO 6", name: "RIESGO 6" },
			{ id: "RIESGO 7", name: "RIESGO 7" }
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
			numero: {
				required
			},
            educacion: {
				required
			},
			vr_inicial: {
				required
			},
			nro_cdp: {
				required
			},
            nro_autoriza: {
				required
			},
			siif: {
				required
			},
            nro_poliza: {
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
				this.registrarContrato();
				this.clearForm();
			}
		},
		clearForm() {
            this.$v.$reset();
            
			this.form.numero="",
			this.form.educacion="",
			this.form.vr_inicial="",
			this.form.nro_cdp="",
			this.form.nro_autoriza="",
			this.form.siif="",
			this.form.nro_poliza="",

            this.fecha="",
            this.objeto=" ",
            this.obligacion=" ",
            this.experiencia=" ",
            this.vr_hora_mes="",
            this.plazo_inicial=" ",
            this.horas="",
            this.tot_horas="",
            this.fec_autoriza="",
            this.tp_riesgo="",
            this.tp_contrato="",
            this.fec_siif="",
            this.vr_asegurado="",
            this.porc_asegura="",
            this.vigencia1="",
            this.vigencia2="",
            this.nro_aprobacion="",
            this.fec_poliza="",
            this.vr_cdp="",
            this.fec_ini_pol="",
            this.fec_fin_pol="",
            this.link="",

			this.arrayM = {id:0, nombre:'', nomDpto:''};
			this.arrayCo = {id:0, nomFull:''};
			this.arrayAr = {id:0, nombre:''};//arl
			this.arraySu = {id:0, nomFull:''};
			this.arrayRe = {id:0, nombre:''};
			
			// this.form.apellidos="";
		},
        nameWithMpio ({ nombre, nomDpto }) {
            return `${nombre} — [${nomDpto}]`
        },
		nameWithContratista ({ nomFull}) {
            return `${nomFull}`
        },
		nameWithArl ({ nombre}) {
            return `${nombre}`
        },
		nameWithSupervisor ({ nomFull}) {
            return `${nomFull}`
        },
		nameWithRecursos ({ nombre}) {
            return `${nombre}`
        },
		listarContrato() {
            let me = this;
            var url = "contrato";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
					me.arrayContrato = respuesta.contratos.data;
					me.myTable(me.arrayContrato);
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
						{ "data": "nomSupervisor"},
						{ "data": "nomArl"},
						{ "data": "nomRecursos"},
						{ "data": "numero"},
						{ "data": "fecha"},
						{ "data": "objeto"},
						{ "data": "educacion"},
						{ "data": "obligacion"},
						{ "data": "experiencia"},
						{ "data": "vr_inicial"},
						{ "data": "vr_hora_mes"},
						{ "data": "plazo_inicial"},
						{ "data": "tp_contrato"},
						{ "data": "horas"},
						{ "data": "tot_horas"},
						{ "data": "nro_cdp"},
						{ "data": "nro_autoriza"},
						{ "data": "fec_autoriza"},
						{ "data": "nomMpio"},
						{ "data": "tp_riesgo"},
						{ "data": "siif"},
						{ "data": "fec_siif"},
						{ "data": "nro_poliza"},
						{ "data": "vr_asegurado"},
						{ "data": "porc_asegura"},
						{ "data": "vigencia1"},
						{ "data": "vigencia2"},
						{ "data": "nro_aprobacion"},
						{ "data": "fec_poliza"},
						{ "data": "vr_cdp"},
						{ "data": "fec_ini_pol"},
						{ "data": "fec_fin_pol"},
						{ "data": "link"},
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
					me.eliminarContrato(me.datos);
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
		selectContratista() {
            let me = this;
            var url = "contratista/selectContratista";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayContratista = respuesta.contratistas;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		selectSupervisor() {
            let me = this;
            var url = "supervisor/selectSupervisor";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arraySupervisor = respuesta.supervisores;
                }).catch(function (error) {
                    console.log(error);
            });
        },
		selectRecursos() {
            let me = this;
            var url = "recursos/selectRecursos";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayRecursos = respuesta.recursos;
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
			this.listarContrato();
		},
		registrarContrato() {
		let me = this;
            axios.post(this.ruta +"/contrato/registrar", {
				'numero': this.form.numero,
				'educacion': this.form.educacion.toUpperCase(),
				'vr_inicial': this.form.vr_inicial,
				'nro_cdp': this.form.nro_cdp,
				'nro_autoriza': this.form.nro_autoriza,
				'siif': this.form.siif,
				'nro_poliza': this.form.nro_poliza,

				'fecha': this.fecha,
				'objeto': this.objeto.toUpperCase(),
				'obligacion': this.obligacion.toUpperCase(),
				'experiencia': this.experiencia.toUpperCase(),
				'vr_hora_mes': this.vr_hora_mes,
				'plazo_inicial': this.plazo_inicial,
				'horas': this.horas,
				'tot_horas': this.tot_horas,
				'fec_autoriza': this.fec_autoriza,
				'tp_riesgo': this.tp_riesgo.toUpperCase(),
				'tp_contrato': this.tp_contrato.toUpperCase(),
				'fec_siif': this.fec_siif,
				'vr_asegurado': this.vr_asegurado,
				'porc_asegura': this.porc_asegura,
				'vigencia1': this.vigencia1,
				'vigencia2': this.vigencia2,
				'nro_aprobacion': this.nro_aprobacion,
				'fec_poliza': this.fec_poliza,
				'vr_cdp': this.vr_cdp,
				'fec_ini_pol': this.fec_ini_pol,
				'fec_fin_pol': this.fec_fin_pol,
				'link': this.link.toUpperCase(),

                'id_lugar': this.arrayM.id,
				'id_arl': this.arrayAr.id,
				'id_contratista': this.arrayCo.id,
				'id_supervisa': this.arraySu.id,
				'id_recurso': this.arrayRe.id,

                }).then(function (response) {
					me.listarContrato();
                    me.mensaje("Guardado", "Guardo ");
                    me.cerrarFormulario();
                }).catch(function (error) {
                console.log(error);
                });
		},
		mostrarActualizar(data = []) {
			let me = this;
			(this.tipoAccion = 2), (me.listado = 0);
			(this.id_contrato = data["id"]);

            this.arrayM.id = data["id_lugar"];
            this.arrayM.nombre = data["nomMpio"];
            this.arrayM.nomDpto = data["nomDpto"];
			this.arrayAr.id = data["id_arl"];
			this.arrayAr.nombre = data["nomArl"];
			this.arrayCo.id = data["id_contratista"];
			this.arrayCo.nomFull = data["nomFull"];
			this.arraySu.id = data["id_supervisa"];
			this.arraySu.nomFull = data["nomSupervisor"];
			this.arrayRe.id = data["id_recurso"];
			this.arrayRe.nombre = data["nomRecursos"];

			this.form.numero = data["numero"];
			this.form.educacion = data["educacion"];
			this.form.vr_inicial = data["vr_inicial"];
			this.form.nro_cdp = data["nro_cdp"];
			this.form.nro_autoriza = data["nro_autoriza"];
			this.form.siif = data["siif"];
			this.form.nro_poliza = data["nro_poliza"];


			this.fecha = data["fecha"];
			this.objeto = data["objeto"];
			this.obligacion = data["obligacion"];
			this.experiencia = data["experiencia"];
			this.vr_hora_mes = data["vr_hora_mes"];
			this.plazo_inicial = data["plazo_inicial"];
			this.horas = data["horas"];
			this.tot_horas = data["tot_horas"];
			this.fec_autoriza = data["fec_autoriza"];
			this.tp_riesgo = data["tp_riesgo"];
			this.tp_contrato = data["tp_contrato"];
			this.fec_siif = data["fec_siif"];
			this.vr_asegurado = data["vr_asegurado"];
			this.porc_asegura = data["porc_asegura"];
			this.vigencia1 = data["vigencia1"];
			this.vigencia2 = data["vigencia2"];
			this.nro_aprobacion = data["nro_aprobacion"];
			this.fec_poliza = data["fec_poliza"];
			this.vr_cdp = data["vr_cdp"];
			this.fec_ini_pol = data["fec_ini_pol"];
			this.fec_fin_pol = data["fec_fin_pol"];
			this.link = data["link"];

		},
		actualizarContrato() {
		let me = this;
            axios.put(this.ruta +"/contrato/actualizar", {
				'id':this.id_contrato,

				'numero': this.form.numero,
				'educacion': this.form.educacion.toUpperCase(),
				'vr_inicial': this.form.vr_inicial,
				'nro_cdp': this.form.nro_cdp,
				'nro_autoriza': this.form.nro_autoriza,
				'siif': this.form.siif,
				'nro_poliza': this.form.nro_poliza,

				'fecha': this.fecha,
				'objeto': this.objeto.toUpperCase(),
				'obligacion': this.obligacion.toUpperCase(),
				'experiencia': this.experiencia.toUpperCase(),
				'vr_hora_mes': this.vr_hora_mes,
				'plazo_inicial': this.plazo_inicial,
				'horas': this.horas,
				'tot_horas': this.tot_horas,
				'fec_autoriza': this.fec_autoriza,
				'tp_riesgo': this.tp_riesgo.toUpperCase(),
				'tp_contrato': this.tp_contrato.toUpperCase(),
				'fec_siif': this.fec_siif,
				'vr_asegurado': this.vr_asegurado,
				'porc_asegura': this.porc_asegura,
				'vigencia1': this.vigencia1,
				'vigencia2': this.vigencia2,
				'nro_aprobacion': this.nro_aprobacion,
				'fec_poliza': this.fec_poliza,
				'vr_cdp': this.vr_cdp,
				'fec_ini_pol': this.fec_ini_pol,
				'fec_fin_pol': this.fec_fin_pol,
				'link': this.link.toUpperCase(),

                'id_lugar': this.arrayM.id,
				'id_arl': this.arrayAr.id,
				'id_contratista': this.arrayCo.id,
				'id_supervisa': this.arraySu.id,
				'id_recurso': this.arrayRe.id,
            })
            .then(function (response) {
                me.listarContrato();
                me.mensaje("Actualizado", "Actualizo");
                me.cerrarFormulario();
            })
            .catch(function (error) {
                console.log(error);
            });
		},
		eliminarContrato(data = []) {
			Swal.fire({
				title: '¿Estás seguro de eliminar?' + data["numero"],
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
					this.id_contrato = data["id"];
					axios.post(this.ruta +"/contrato/eliminar", {
					id: this.id_contrato
					})
					.then(function(response) {
						me.listarContrato();
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
		this.selectArl();
		this.selectContratista();
		this.selectSupervisor();
		this.selectRecursos();
		this.listarContrato();
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