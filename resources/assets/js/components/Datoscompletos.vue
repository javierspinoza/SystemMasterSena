<template>
    <main class="main">
    <!-- Breadcrumb -->
        <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Datos
					<button type="button" @click="mostraFormulario()" class="btn btn-success btn-sm">
						<i class="icon-plus"></i>&nbsp;Nuevo
					</button>
				</div>
				<div class="card-body">
					<template v-if="listado==1">
						<div class="table-responsive">
							<table class="table table-striped table-bordered display" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Opciones</th>
										<th>Area</th>
                                        <th>Arl</th>
                                        <th>Banco</th>
                                        <th>Pensiones</th>
                                        <th>Eps</th>
                                        <th>Número</th>
                                        <th>Número Proceso</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
										<th>Tipo Documento</th>
                                        <th>Cc</th>
                                        <th>Lugar Expedición</th>
                                        <th>Número Contrato</th>
                                        <th>Fecha contrato</th>
                                        <th>Objeto Contractual</th>
                                        <th>Educación</th>
                                        <th>Obligaciones</th>
                                        <th>Experiencia Relacionada</th>
                                        <th>Valor Inicial Contrato</th>
                                        <th>Valor Hora Mensual</th>
                                        <th>Valor Adición</th>
                                        <th>Fecha Adición</th>
                                        <th>Valor Pagado</th>
                                        <th>Plazo Inicial</th>
                                        <th>Plazo Adición</th>
                                        <th>Plazo Ejecución Total</th>
                                        <th>Horas</th>
                                        <th>Adición Horas</th>
                                        <th>Total Horas</th>
                                        <th>Reversión</th>
                                        <th>Fecha Reversión</th>
                                        <th>Celular</th>
                                        <th>Tipo Cuenta</th>
                                        <th>Número Cuenta</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Número CDP</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Número Autorización</th>
                                        <th>Fecha Autorización</th>
                                        <th>Lugar Ejecución</th>
                                        <th>Fecha Inicio Secop</th>
                                        <th>Fecha Fin Secop</th>
                                        <th>Compromiso SIIF</th>
                                        <th>Fecha Compromiso</th>
                                        <th>Supervisor</th>
                                        <th>Número CC Supervisor</th>
                                        <th>Lugar Expedición</th>
                                        <th>Email Supervisor</th>
                                        <th>Cargo Supervisor</th>
                                        <th>Número Poliza</th>
                                        <th>Valor Asegurado</th>
                                        <th>% Asegurado</th>
                                        <th>Vigencia 1 Cumplimiento</th>
                                        <th>Vigencia 2 Cumplimiento</th>
                                        <th>Aprobacion Poliza</th>
                                        <th>Fecha Expedición Poliza</th>
                                        <th>Compañia Aseguradora</th>
                                        <th>Nit Compañia Aseguradora</th>
                                        <th>Valor CDP</th>
                                        <th>Fecha Inicio Cobertura</th>
                                        <th>Fecha Fin Cobertura</th>
                                        <th>Link Contrato</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>  
										<th>Opciones</th>
										<th>Area</th>
                                        <th>Arl</th>
                                        <th>Banco</th>
                                        <th>Pensiones</th>
                                        <th>Eps</th>
                                        <th>Número</th>
                                        <th>Número Proceso</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Tipo Documento</th>
                                        <th>Cc</th>
                                        <th>Lugar Expedición</th>
                                        <th>Número Contrato</th>
                                        <th>Fecha contrato</th>
                                        <th>Objeto Contractual</th>
                                        <th>Educación</th>
                                        <th>Obligaciones</th>
                                        <th>Experiencia Relacionada</th>
                                        <th>Valor Inicial Contrato</th>
                                        <th>Valor Hora Mensual</th>
                                        <th>Valor Adición</th>
                                        <th>Fecha Adición</th>
                                        <th>Valor Pagado</th>
                                        <th>Plazo Inicial</th>
                                        <th>Plazo Adición</th>
                                        <th>Plazo Ejecución Total</th>
                                        <th>Horas</th>
                                        <th>Adición Horas</th>
                                        <th>Total Horas</th>
                                        <th>Reversión</th>
                                        <th>Fecha Reversión</th>
                                        <th>Celular</th>
                                        <th>Tipo Cuenta</th>
                                        <th>Número Cuenta</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Número CDP</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Número Autorización</th>
                                        <th>Fecha Autorización</th>
                                        <th>Lugar Ejecución</th>
                                        <th>Fecha Inicio Secop</th>
                                        <th>Fecha Fin Secop</th>
                                        <th>Compromiso SIIF</th>
                                        <th>Fecha Compromiso</th>
                                        <th>Supervisor</th>
                                        <th>Número CC Supervisor</th>
                                        <th>Lugar Expedición</th>
                                        <th>Email Supervisor</th>
                                        <th>Cargo Supervisor</th>
                                        <th>Número Poliza</th>
                                        <th>Valor Asegurado</th>
                                        <th>% Asegurado</th>
                                        <th>Vigencia 1 Cumplimiento</th>
                                        <th>Vigencia 2 Cumplimiento</th>
                                        <th>Aprobacion Poliza</th>
                                        <th>Fecha Expedición Poliza</th>
                                        <th>Compañia Aseguradora</th>
                                        <th>Nit Compañia Aseguradora</th>
                                        <th>Valor CDP</th>
                                        <th>Fecha Inicio Cobertura</th>
                                        <th>Fecha Fin Cobertura</th>
                                        <th>Link Contrato</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</template>
					<template v-else-if="listado==0">
						<div class="card-body">
							<form action method="post" enctype="multipart/form-data" class="form-horizontal">
								<md-card-content>
									<div>
										<md-steppers :md-active-step.sync="active" md-vertical md-linear>
											<md-step id="first" md-label="First Step" md-description="Optional" :md-done.sync="first">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field :class="getValidationClass('num_proceso')">
															<label for="num">Número Proceso</label>
															<md-input type="number" id="num_proceso" name="num_proceso" autocomplete="given-name" v-model="form.num_proceso" :disabled="sending" />
															<span class="md-error" v-if="!$v.form.num_proceso.required">El número de proceso es requerido</span>																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="vlr_cdp">Valor CDP</label>
															<span class="md-prefix">
																<i class="material-icons">attach_money</i>
															</span>
															<md-input type="number" id="vlr_cdp" name="vlr_cdp" autocomplete="given-name" v-model="vlr_cdp" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field >
															<label for="lugar_ejecucion">Lugar Ejecución</label>
															<md-input type="text" id="lugar_ejecucion" name="lugar_ejecucion" autocomplete="given-name" v-model="lugar_ejecucion" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="num_cdp">Número CDP</label>
															<md-input type="number" id="num_cdp" name="num_cdp" autocomplete="given-name" v-model="num_cdp" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field >
															<label for="num_autorizacion">Número Autorización</label>
															<md-input type="number" id="num_autorizacion" name="num_autorizacion" autocomplete="given-name" v-model="num_autorizacion" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_autorizacion">
															<label>Fecha Autorización</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="link_contrato">Link Contrato</label>
															<md-input type="text" id="link_contrato" name="link_contrato" autocomplete="given-name" v-model="link_contrato" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<md-button class="md-raised md-primary" @click="setDone('first', 'second')">Continue</md-button>
											</md-step>

											<md-step id="second" md-label="Second Step" md-description="Optional" :md-done.sync="second">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field :class="getValidationClass('nombre')">
															<label for="nombre">Nombre</label>
															<md-input type="text" id="nombre" name="nombre" autocomplete="given-name" v-model="form.nombre" :disabled="sending" />
															<span class="md-error" v-if="!$v.form.nombre.required">El nombre es requerido</span>																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field :class="getValidationClass('apellido')">
															<label for="apellido">Apellidos</label>
															<md-input type="text" id="apellido" name="apellido" autocomplete="given-name" v-model="form.apellido" :disabled="sending" />
															<span class="md-error" v-if="!$v.form.apellido.required">Los apellidos son requeridos</span>																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_nacimiento">
															<label>Fecha Nacimiento</label>
														</md-datepicker>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label>Tipo Documento</label>
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
														<md-field :class="getValidationClass('cc')">
															<label for="cc">Número Cédula</label>
															<md-input type="number" id="cc" name="cc" autocomplete="given-name" v-model="form.cc" :disabled="sending" />
															<span class="md-error" v-if="!$v.form.cc.required">La Cédula es requerida</span>																																	               
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
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="celular">Celular</label>
															<span class="md-prefix">
																<i class="material-icons">settings_phone</i>
															</span>
															<md-input type="number" id="celular" name="celular" autocomplete="given-name" v-model="celular" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="email">Email</label>
															<span class="md-prefix">
																<i class="material-icons">email</i>
															</span>
															<md-input type="text" id="email" name="email" autocomplete="given-name" v-model="email" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="direccion">Dirección</label>
															<span class="md-prefix">
																<i class="material-icons">house</i>
															</span>
															<md-input type="text" id="direccion" name="direccion" autocomplete="given-name" v-model="direccion" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<div class="md-layout">
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
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<span class="md-caption">Bancos</span>
														<multiselect v-model="arrayBa" :options="arrayBanco"
															placeholder="Seleccione un banco"
															:custom-label="nameWithBanco"
															label="nombre"
															track-by="nombre">
														</multiselect>
													</div>
												</div>
												<div class="md-layout">
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
														<md-datepicker v-model="fec_ini_cobertura">
															<label>Fecha Inicio Cobertura</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_fin_cobertura">
															<label>Fecha Fin Cobertura</label>
														</md-datepicker>
													</div>
												</div>
												<md-button class="md-raised md-primary" @click="setDone('second', 'three')">Continue</md-button>
											</md-step>

											<md-step id="three" md-label="Three Step" md-description="Optional" :md-done.sync="three">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field :class="getValidationClass('num_contrato')">
															<label for="num_contrato">Número Contrato</label>
															<md-input type="number" id="num_contrato" name="num_contrato" autocomplete="given-name" v-model="form.num_contrato" :disabled="sending" />
															<span class="md-error" v-if="!$v.form.num_contrato.required">El número de contrato es requerido</span>																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_contrato">
															<label>Fecha Contrato</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="horas">Horas</label>
															<span class="md-prefix">
																<i class="material-icons">access_time</i>
															</span>
															<md-input type="text" id="horas" name="horas" autocomplete="given-name" v-model="horas" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field >
															<label for="vlr_hra_mensual">Valor Hora Mensual</label>
															<span class="md-prefix">
																<i class="material-icons">attach_money</i>
															</span>
															<md-input type="number" id="vlr_hra_mensual" name="vlr_hra_mensual" autocomplete="given-name" v-model="vlr_hra_mensual" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field >
															<label for="vlr_ini_contrato">Valor Inicial Contrato</label>
															<span class="md-prefix">
																<i class="material-icons">attach_money</i>
															</span>
															<md-input type="number" id="vlr_ini_contrato" name="vlr_ini_contrato" autocomplete="given-name" v-model="vlr_ini_contrato" :disabled="sending" />																																               
														</md-field>
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
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label>Objeto Contractual</label>
															<md-textarea v-model="obj_contractual" md-autogrow></md-textarea>
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label>Obligaciones</label>
															<md-textarea v-model="obligaciones" md-autogrow></md-textarea>
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label>Experiencia Relacionada</label>
															<md-textarea v-model="exp_relacionada" md-autogrow></md-textarea>
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field :class="getValidationClass('educacion')">
															<label>Educación</label>
															<md-textarea v-model="form.educacion" md-autogrow></md-textarea>
															<span class="md-error" v-if="!$v.form.educacion.required">La educación es requerida</span>
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-datepicker v-model="fec_inicio_secop">
															<label>Fecha Inicio Secop</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_fin_secop">
															<label>Fecha Fin Secop</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="plazo_inicial">Plazo Inicial</label>
															<md-input type="text" id="plazo_inicial" name="plazo_inicial" autocomplete="given-name" v-model="plazo_inicial" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<md-button class="md-raised md-primary" @click="setDone('three', 'four')">Continue</md-button>
											</md-step>

											<md-step id="four" md-label="Four Step" md-description="Optional" :md-done.sync="four">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field >
															<label for="vlr_adicion">Valor Adición</label>
															<span class="md-prefix">
																<i class="material-icons">attach_money</i>
															</span>
															<md-input type="number" id="vlr_adicion" name="vlr_adicion" autocomplete="given-name" v-model="vlr_adicion" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_adicion">
															<label>Fecha Adición</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="vlr_pagado">Valor Pagado</label>
															<span class="md-prefix">
																<i class="material-icons">attach_money</i>
															</span>
															<md-input type="number" id="vlr_pagado" name="vlr_pagado" autocomplete="given-name" v-model="vlr_pagado" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="plazo_adicion">Plazo Adición</label>
															<md-input type="text" id="plazo_adicion" name="plazo_adicion" autocomplete="given-name" v-model="plazo_adicion" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="adicion_horas">Adicion Horas</label>
															<span class="md-prefix">
																<i class="material-icons">access_time</i>
															</span>
															<md-input type="text" id="adicion_horas" name="adicion_horas" autocomplete="given-name" v-model="adicion_horas" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="total_horas">Total Horas</label>
															<span class="md-prefix">
																<i class="material-icons">access_time</i>
															</span>
															<md-input type="text" id="total_horas" name="total_horas" autocomplete="given-name" v-model="total_horas" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="plazo_eje_total">Plazo Ejecucuión Total</label>
															<md-input type="text" id="plazo_eje_total" name="plazo_eje_total" autocomplete="given-name" v-model="plazo_eje_total" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_reversion">
															<label>Fecha Reversión</label>
														</md-datepicker>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="reversion">Reversión</label>
															<md-input type="text" id="reversion" name="reversion" autocomplete="given-name" v-model="reversion" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<md-button class="md-raised md-primary" @click="setDone('four', 'five')">Continue</md-button>
											</md-step>

											<md-step id="five" md-label="Five Step" md-description="Optional" :md-done.sync="five">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field >
															<label for="compromiso_siif">Compromiso SIIF</label>
															<md-input type="text" id="compromiso_siif" name="compromiso_siif" autocomplete="given-name" v-model="compromiso_siif" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_compromiso">
															<label>Fecha Compromiso</label>
														</md-datepicker>
													</div>
												</div>
												<md-button class="md-raised md-primary" @click="setDone('five', 'six')">Continue</md-button>
											</md-step>

											<md-step id="six" md-label="Six Step" md-description="Optional" :md-done.sync="six">
												<div class="md-layout">
													<div class="md-layout-item">
														<span class="md-caption">Supervisor</span>
														<multiselect v-model="arraySu" :options="arraySupervisor"
															placeholder="Seleccione un supervisor"
															:custom-label="nameWithSupervisor"
															label="nomFull"
															track-by="nomFull">
														</multiselect>
													</div>
													<!-- <div class="md-layout-item">
														<md-field >
															<label for="num_cc_sup">Número Cédula</label>
															<md-input type="number" id="num_cc_sup" name="num_cc_sup" autocomplete="given-name" v-model="num_cc_sup" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field >
															<label for="lug_exp_sup">Lugar Expedición</label>
															<md-input type="text" id="lug_exp_sup" name="lug_exp_sup" autocomplete="given-name" v-model="lug_exp_sup" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field >
															<label for="email_sup">Email Supervisor</label>
															<span class="md-prefix">
																<i class="material-icons">email</i>
															</span>
															<md-input type="text" id="email_sup" name="email_sup" autocomplete="given-name" v-model="email_sup" :disabled="sending" />																																	               
														</md-field>
													</div> -->
												</div>
												<!-- <div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="cargo_sup">Cargo Supervisor</label>
															<md-input type="text" id="cargo_sup" name="cargo_sup" autocomplete="given-name" v-model="cargo_sup" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div> -->
												<md-button class="md-raised md-primary" @click="setDone('six', 'seven')">Continue</md-button>
											</md-step>

											<md-step id="seven" md-label="Seven Step" md-description="Optional" :md-done.sync="seven">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="num_poliza">Número Poliza</label>
															<md-input type="number" id="num_poliza" name="num_poliza" autocomplete="given-name" v-model="num_poliza" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="vlr_asegurado">Valor Asegurado</label>
															<span class="md-prefix">
																<i class="material-icons">attach_money</i>
															</span>
															<md-input type="number" id="vlr_asegurado" name="vlr_asegurado" autocomplete="given-name" v-model="vlr_asegurado" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="por_asegurado">% Asegurado</label>
															<md-input type="text" id="por_asegurado" name="por_asegurado" autocomplete="given-name" v-model="por_asegurado" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="vigencia1_cumpli">Vigencia1 Cumplimiento</label>
															<md-input type="text" id="vigencia1_cumpli" name="vigencia1_cumpli" autocomplete="given-name" v-model="vigencia1_cumpli" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="vigencia2_cumpli">Vigencia2 Cumplimiento</label>
															<md-input type="text" id="vigencia2_cumpli" name="vigencia2_cumpli" autocomplete="given-name" v-model="vigencia2_cumpli" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="apro_poliza">Aprobación Poliza</label>
															<md-input type="text" id="apro_poliza" name="apro_poliza" autocomplete="given-name" v-model="apro_poliza" :disabled="sending" />																																	               
														</md-field>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-datepicker v-model="fec_exp_poliza">
															<label>Fecha Expedición Poliza</label>
														</md-datepicker>
													</div>&nbsp;&nbsp;&nbsp;
													<div class="md-layout-item">
														<md-field>
															<label for="nit_comp">Nit Compañia</label>
															<md-input type="text" id="nit_comp" name="nit_comp" autocomplete="given-name" v-model="nit_comp" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field>
															<label for="comp_aseguradora">Compañia aseguradora</label>
															<md-input type="text" id="comp_aseguradora" name="comp_aseguradora" autocomplete="given-name" v-model="comp_aseguradora" :disabled="sending" />																																	               
														</md-field>
													</div>
												</div>
												<md-button class="md-raised md-primary" @click="setDone('seven', 'eight')">Continue</md-button>
											</md-step>

											<md-step id="eight" md-label="Eight Step" md-description="Optional" :md-done.sync="eight">
												<div class="md-layout">
													<div class="md-layout-item">
														<md-field :class="getValidationClass('num')">
															<label for="num">Número</label>
															<md-input type="number" id="num" name="num" autocomplete="given-name" v-model="form.num" :disabled="sending" />
															<span class="md-error" v-if="!$v.form.num.required">El número es requerido</span>																																	               
														</md-field>
													</div>
												</div>
											</md-step>

										</md-steppers>
									</div>
								</md-card-content>
							</form>
						</div>
						<div class="modal-footer">
							<md-card-actions>
							<md-button type="button" class="md-raised" @click="cerrarFormulario()">Cerrar</md-button>
								<md-button type="submit" v-if="tipoAccion==1" class="md-dense md-raised md-primary" :disabled="sending" @click="validarDatos()">Guardar</md-button>
								<md-button type="submit" v-if="tipoAccion==2" class="md-dense md-raised md-primary" :disabled="sending" @click="actualizarDatos()">Actualizar</md-button>
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
		MdList,
		MdSteppers,
		MdDialog,
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
	Vue.use(MdSteppers);
	Vue.use(MdDialog);
    import { required, minLength, maxLength } from "vuelidate/lib/validators";

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

		active: 'first',
		first: false,
		second: false,
		three: false,
		four: false,
		five: false,
		six: false,
		seven: false,
		eight: false,
		

		form: {
			num:"",
			num_proceso:"",
			nombre:"",
			apellido:"",
			cc:"",
			num_contrato:"",
			educacion:"",
			num_cuenta:"",
		},
		tp_cuenta:"",
		tp_doc:" ",
		fec_contrato:"",
		fec_nacimiento:"",
		fec_inicio_secop:"",
		fec_fin_secop:"",
		obj_contractual:" ",
		obligaciones:" ",
		exp_relacionada:" ",
		vlr_ini_contrato:"",
		vlr_hra_mensual:"",
		vlr_adicion:"",
		fec_adicion:"",
		vlr_pagado:"",
		plazo_inicial:" ",
		plazo_adicion:" ",
		plazo_eje_total:" ",
		horas:"",
		adicion_horas:"",
		total_horas:"",
		reversion:" ",
		fec_reversion:"",
		celular:"",
		email:" ",
		direccion:" ",
		num_cdp:"",
		num_autorizacion:"",
		fec_autorizacion:"",
		lugar_ejecucion:" ",
		compromiso_siif:" ",
		fec_compromiso:"",
		num_cc_sup:"",
		lug_exp_sup:" ",
		email_sup:" ",
		cargo_sup:" ",
		num_poliza:"",
		vlr_asegurado:"",
		por_asegurado:"",
		vigencia1_cumpli:" ",
		vigencia2_cumpli:" ",
		apro_poliza:"",
		fec_exp_poliza:" ",
		comp_aseguradora:" ",
		nit_comp:"",
		vlr_cdp:"",
		fec_ini_cobertura:"",
		fec_fin_cobertura:"",
		link_contrato:" ",


		tipoAccion: 1,
		listado: 1,
		sending: false,

		arrayTpcuenta: [
			{ id: "AHORROS", name: "AHORROS" },
			{ id: "CORRIENTE", name: "CORRIENTE" }
		],
		arrayTpdoc: [
			{ id: "TARJETA DE IDENTIDAD", name: "TARJETA DE IDENTIDAD" },
			{ id: "PRECEDULA", name: "PRECEDULA" },
			{ id: "CÉDULA", name: "CÉDULA" }
		],
		arrayAre: {id:0, nombres:''},
		arrayArea: [],
		id_area:0,
		arrayAr: {id:0, nombre:''},
		arrayArl: [],
		id_arl:0,
		arrayBa: {id:0, nombre:''},
		arrayBanco: [],
		id_banco:0,
		arrayPe: {id:0, nombre:''},
		arrayPension: [],
		id_pension:0,
		arraySa: {id:0, nombre:''},
		arraySalud: [],
		id_salud:0,
		arraySu: {id:0, nomFull:''},
		arraySupervisor: [],
		id_supervisor:0,

		arrayM:{id:0, nombre:'', nomDpto:''},
        arrayMpio:[],
        lugar_expe:0,

		arrayDatos:[],
		id_datos:0,

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
			num: {
				required
			},
			num_proceso: {
				required
			},
			nombre: {
				required
			},
			apellido: {
				required
			},
			cc: {
				required
			},
			num_contrato: {
				required
			},
			educacion: {
				required
			},
			num_cuenta: {
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
			return this.$material.locale.dateFormat ||"yyyy-MM-dd";
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
		setDone (id, index) {
			this[id] = true

			this.secondStepError = null

			if (index) {
				this.active = index
			}
		},
		setError () {
			this.secondStepError = 'This is an error!'
		},

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
				this.registrarDatos();
				this.clearForm();
			}
		},
		clearForm() {
			this.$v.$reset();

			this.form.num="";
			this.form.num_proceso="";
			this.form.nombre="";
			this.form.apellido="";
			this.form.cc="";
			this.form.num_contrato="";
			this.form.educacion="";
			this.form.num_cuenta="";

			this.tp_doc="";
			this.tp_cuenta="";
			this.fec_contrato="";
			this.fec_nacimiento="";
			this.fec_inicio_secop="";
			this.fec_fin_secop="";
			this.obj_contractual="";
			this.obligaciones="";
			this.exp_relacionada="";
			this.vlr_ini_contrato="";
			this.vlr_hra_mensual="";
			this.vlr_adicion="";
			this.fec_adicion="";
			this.vlr_pagado="";
			this.plazo_inicial="";
			this.plazo_adicion="";
			this.plazo_eje_total="";
			this.horas="";
			this.adicion_horas="";
			this.total_horas="";
			this.reversion="";
			this.fec_reversion="";
			this.celular="";
			this.email ="";
			this.direccion="";
			this.num_cdp="";
			this.num_autorizacion="";
			this.fec_autorizacion="";
			this.lugar_ejecucion="";
			this.compromiso_siif="";
			this.fec_compromiso="";
			this.num_cc_sup="";
			this.lug_exp_sup="";
			this.email_sup="";
			this.cargo_sup="";
			this.num_poliza="";
			this.vlr_asegurado="";
			this.por_asegurado="";
			this.vigencia1_cumpli="";
			this.vigencia2_cumpli="";
			this.apro_poliza="";
			this.fec_exp_poliza="";
			this.comp_aseguradora="";
			this.nit_comp="";
			this.vlr_cdp="";
			this.fec_ini_cobertura="";
			this.fec_fin_cobertura="";
			this.link_contrato="";

			this.arrayAre = {id:0, nombres:''};
			this.arrayAr = {id:0, nombre:''};//arl
			this.arrayBa = {id:0, nombre:''};
			this.arrayPe = {id:0, nombre:''};
			this.arraySa = {id:0, nombre:''};
			this.arraySu = {id:0, nomFull:''};
			this.arrayM = {id:0, nombre:'', nomDpto:''};
			
			// this.form.apellidos="";
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
		nameWithSupervisor ({ nomFull}) {
            return `${nomFull}`
        },
		nameWithMpio ({ nombre, nomDpto }) {
            return `${nombre} — [${nomDpto}]`
        },
		listarDatos() {
            let me = this;
            var url = "/datos";
            axios.get(this.ruta + url).then(function (response) {
                    var respuesta = response.data;
					me.arrayDatos = respuesta.datocompletos.data;
					me.myTable(me.arrayDatos);
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
						{ "data": "nombreArea"},
						{ "data": "nombreArl"},
						{ "data": "nombreBanco"},
						{ "data": "nombrePension"},
						{ "data": "nombreSalud"},
						{ "data": "num"},
						{ "data": "num_proceso"},
						{ "data": "nombre"},
						{ "data": "apellido"},
						{ "data": "tp_doc"},
						{ "data": "cc"},
						{ "data": "nomMpio"},
						{ "data": "num_contrato"},
						{ "data": "fec_contrato"},
						{ "data": "obj_contractual"},
						{ "data": "educacion"},
						{ "data": "obligaciones"},
						{ "data": "exp_relacionada"},
						{ "data": "vlr_ini_contrato"},
						{ "data": "vlr_hra_mensual"},
						{ "data": "vlr_adicion"},
						{ "data": "fec_adicion"},
						{ "data": "vlr_pagado"},
						{ "data": "plazo_inicial"},
						{ "data": "plazo_adicion"},
						{ "data": "plazo_eje_total"},
						{ "data": "horas"},
						{ "data": "adicion_horas"},
						{ "data": "total_horas"},
						{ "data": "reversion"},
						{ "data": "fec_reversion"},
						{ "data": "celular"},
						{ "data": "tp_cuenta"},
						{ "data": "num_cuenta"},
						{ "data": "email"},
						{ "data": "direccion"},
						{ "data": "num_cdp"},
						{ "data": "fec_nacimiento"},
						{ "data": "num_autorizacion"},
						{ "data": "fec_autorizacion"},
						{ "data": "lugar_ejecucion"},
						{ "data": "fec_inicio_secop"},
						{ "data": "fec_fin_secop"},
						{ "data": "compromiso_siif"},
						{ "data": "fec_compromiso"},
						{ "data": "nomSupervisor"},
						{ "data": "num_cc_sup"},
						{ "data": "lug_exp_sup"},
						{ "data": "email_sup"},
						{ "data": "cargo_sup"},
						{ "data": "num_poliza"},
						{ "data": "vlr_asegurado"},
						{ "data": "por_asegurado"},
						{ "data": "vigencia1_cumpli"},
						{ "data": "vigencia2_cumpli"},
						{ "data": "apro_poliza"},
						{ "data": "fec_exp_poliza"},
						{ "data": "comp_aseguradora"},
						{ "data": "nit_comp"},
						{ "data": "vlr_cdp"},
						{ "data": "fec_ini_cobertura"},
						{ "data": "fec_fin_cobertura"},
						{ "data": "link_contrato"},
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
					me.eliminarDatos(me.datos);
					//  console.log(data['modelo']);
				});
				
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
		mostraFormulario() {
			this.clearForm();
			let me = this;
			(this.tipoAccion = 1), (me.listado = 0);
		},
		cerrarFormulario() {
			this.listado = 1;
			this.listarDatos();
		},
		registrarDatos() {
		let me = this;
            axios.post(this.ruta +"/datos/registrar", {
				'num': this.form.num,
				'num_proceso': this.form.num_proceso,
				'nombre': this.form.nombre.toUpperCase(),
				'apellido': this.form.apellido.toUpperCase(),
				'cc': this.form.cc,
				'num_contrato': this.form.num_contrato,
				'educacion': this.form.educacion.toUpperCase(),
				'num_cuenta': this.form.num_cuenta,

				'tp_doc': this.tp_cuenta.toUpperCase(),
				'tp_cuenta': this.tp_cuenta.toUpperCase(),
				'fec_contrato': this.fec_contrato,
				'fec_nacimiento': this.fec_nacimiento,
				'fec_inicio_secop': this.fec_inicio_secop,
				'fec_fin_secop': this.fec_fin_secop,
				'obj_contractual': this.obj_contractual.toUpperCase(),
				'obligaciones': this.obligaciones.toUpperCase(),
				'exp_relacionada': this.exp_relacionada.toUpperCase(),
				'vlr_ini_contrato': this.vlr_ini_contrato,
				'vlr_hra_mensual': this.vlr_hra_mensual,
				'vlr_adicion': this.vlr_adicion,
				'fec_adicion': this.fec_adicion,
				'vlr_pagado': this.vlr_pagado,
				'plazo_inicial': this.plazo_inicial.toUpperCase(),
				'plazo_adicion': this.plazo_adicion.toUpperCase(),
				'plazo_eje_total': this.plazo_eje_total.toUpperCase(),
				'horas': this.horas,
				'adicion_horas': this.adicion_horas,
				'total_horas': this.total_horas,
				'reversion': this.reversion.toUpperCase(),
				'fec_reversion': this.fec_reversion,
				'celular': this.celular,
				'email': this.email.toUpperCase(),
				'direccion': this.direccion.toUpperCase(),
				'num_cdp': this.num_cdp,
				'num_autorizacion': this.num_autorizacion,
				'fec_autorizacion': this.fec_autorizacion,
				'lugar_ejecucion': this.lugar_ejecucion.toUpperCase(),
				'compromiso_siif': this.compromiso_siif.toUpperCase(),
				'fec_compromiso': this.fec_compromiso,
				'num_cc_sup': this.num_cc_sup,
				'lug_exp_sup': this.lug_exp_sup.toUpperCase(),
				'email_sup': this.email_sup.toUpperCase(),
				'cargo_sup': this.cargo_sup.toUpperCase(),
				'num_poliza': this.num_poliza,
				'vlr_asegurado': this.vlr_asegurado,
				'por_asegurado': this.por_asegurado,
				'vigencia1_cumpli': this.vigencia1_cumpli,
				'vigencia2_cumpli': this.vigencia2_cumpli,
				'apro_poliza': this.apro_poliza,
				'fec_exp_poliza': this.fec_exp_poliza,
				'comp_aseguradora': this.comp_aseguradora.toUpperCase(),
				'nit_comp': this.nit_comp,
				'vlr_cdp': this.vlr_cdp,
				'fec_ini_cobertura': this.fec_ini_cobertura,
				'fec_fin_cobertura': this.fec_fin_cobertura,
				'link_contrato': this.link_contrato.toUpperCase(),

				'id_area': this.arrayAre.id,
				'id_arl': this.arrayAr.id,
				'id_banco': this.arrayBa.id,
				'id_pension': this.arrayPe.id,
				'id_salud': this.arraySa.id,
				'id_supervisor': this.arraySu.id,
				'lugar_expe': this.arrayM.id,
                }).then(function (response) {
					me.listarDatos();
                    me.mensaje("Guardado", "Guardo ");
                    me.cerrarFormulario();
                }).catch(function (error) {
                console.log(error);
                });
		},
		mostrarActualizar(data = []) {
			let me = this;
			(this.tipoAccion = 2), (me.listado = 0);
			(this.id_datos = data["id"]);

			this.arrayAre.id = data["id_area"];
			this.arrayAre.nombres = data["nombreArea"];
			this.arrayAr.id = data["id_arl"];
			this.arrayAr.nombre = data["nombreArl"];
			this.arrayBa.id = data["id_banco"];
			this.arrayBa.nombre = data["nombreBanco"];
			this.arrayPe.id = data["id_pension"];
			this.arrayPe.nombre = data["nombrePension"];
			this.arraySa.id = data["id_salud"];
			this.arraySa.nombre = data["nombreSalud"];
			this.arraySu.id = data["id_supervisor"];
			this.arraySu.nomFull = data["nomSupervisor"];
			this.arrayM.id = data["lugar_expe"];
            this.arrayM.nombre = data["nomMpio"];
            this.arrayM.nomDpto = data["nomDpto"];

			this.form.num = data["num"];
			this.form.num_proceso = data["num_proceso"];
			this.form.nombre = data["nombre"];
			this.form.apellido = data["apellido"];
			this.form.cc = data["cc"];
			this.form.num_contrato = data["num_contrato"];
			this.form.educacion = data["educacion"];
			this.form.num_cuenta = data["num_cuenta"];

			this.tp_doc = data["tp_doc"];
			this.tp_cuenta = data["tp_cuenta"];
			this.email = data["email"];
			this.fec_contrato = data["fec_contrato"];
			this.fec_nacimiento = data["fec_nacimiento"];
			this.fec_inicio_secop = data["fec_inicio_secop"];
			this.fec_fin_secop = data["fec_fin_secop"];
			this.obj_contractual = data["obj_contractual"];
			this.obligaciones = data["obligaciones"];
			this.exp_relacionada = data["exp_relacionada"];
			this.vlr_ini_contrato = data["vlr_ini_contrato"];
			this.vlr_hra_mensual = data["vlr_hra_mensual"];
			this.vlr_adicion = data["vlr_adicion"];
			this.fec_adicion = data["fec_adicion"];
			this.vlr_pagado = data["vlr_pagado"];
			this.plazo_inicial = data["plazo_inicial"];
			this.plazo_adicion = data["plazo_adicion"];
			this.plazo_eje_total = data["plazo_eje_total"];
			this.horas = data["horas"];
			this.adicion_horas = data["adicion_horas"];
			this.total_horas = data["total_horas"];
			this.reversion = data["reversion"];
			this.fec_reversion = data["fec_reversion"];
			this.celular = data["celular"];
			this.email = data["email"];
			this.direccion = data["direccion"];
			this.num_cdp = data["num_cdp"];
			this.num_autorizacion = data["num_autorizacion"];
			this.fec_autorizacion = data["fec_autorizacion"];
			this.lugar_ejecucion = data["lugar_ejecucion"];
			this.compromiso_siif = data["compromiso_siif"];
			this.fec_compromiso = data["fec_compromiso"];
			this.num_cc_sup = data["num_cc_sup"];
			this.lug_exp_sup = data["lug_exp_sup"];
			this.email_sup = data["email_sup"];
			this.cargo_sup = data["cargo_sup"];
			this.num_poliza = data["num_poliza"];
			this.vlr_asegurado = data["vlr_asegurado"];
			this.por_asegurado = data["por_asegurado"];
			this.vigencia1_cumpli = data["vigencia1_cumpli"];
			this.vigencia2_cumpli = data["vigencia2_cumpli"];
			this.apro_poliza = data["apro_poliza"];
			this.fec_exp_poliza = data["fec_exp_poliza"];
			this.comp_aseguradora = data["comp_aseguradora"];
			this.nit_comp = data["nit_comp"];
			this.vlr_cdp = data["vlr_cdp"];
			this.fec_ini_cobertura = data["fec_ini_cobertura"];
			this.fec_fin_cobertura = data["fec_fin_cobertura"];
			this.link_contrato = data["link_contrato"];

		},
		actualizarDatos() {
		let me = this;
            axios.put(this.ruta +"/datos/actualizar", {
					'id':this.id_datos,

                    'email': this.email.toUpperCase(),
					'num': this.form.num,
					'num_proceso': this.form.num_proceso,
					'nombre': this.form.nombre.toUpperCase(),
					'apellido': this.form.apellido.toUpperCase(),
					'cc': this.form.cc,
					'num_contrato': this.form.num_contrato,
					'educacion': this.form.educacion.toUpperCase(),
					'num_cuenta': this.form.num_cuenta,

					'tp_doc': this.tp_doc.toUpperCase(),
					'tp_cuenta': this.tp_cuenta.toUpperCase(),
					'fec_contrato': this.fec_contrato,
					'fec_nacimiento': this.fec_nacimiento,
					'fec_inicio_secop': this.fec_inicio_secop,
					'fec_fin_secop': this.fec_fin_secop,
					'obj_contractual': this.obj_contractual.toUpperCase(),
					'obligaciones': this.obligaciones.toUpperCase(),
					'exp_relacionada': this.exp_relacionada.toUpperCase(),
					'vlr_ini_contrato': this.vlr_ini_contrato,
					'vlr_hra_mensual': this.vlr_hra_mensual,
					'vlr_adicion': this.vlr_adicion,
					'fec_adicion': this.fec_adicion,
					'vlr_pagado': this.vlr_pagado,
					'plazo_inicial': this.plazo_inicial.toUpperCase(),
					'plazo_adicion': this.plazo_adicion.toUpperCase(),
					'plazo_eje_total': this.plazo_eje_total.toUpperCase(),
					'horas': this.horas,
					'adicion_horas': this.adicion_horas,
					'total_horas': this.total_horas,
					'reversion': this.reversion.toUpperCase(),
					'fec_reversion': this.fec_reversion,
					'celular': this.celular,
					'email': this.email.toUpperCase(),
					'direccion': this.direccion.toUpperCase(),
					'num_cdp': this.num_cdp,
					'num_autorizacion': this.num_autorizacion,
					'fec_autorizacion': this.fec_autorizacion,
					'lugar_ejecucion': this.lugar_ejecucion.toUpperCase(),
					'compromiso_siif': this.compromiso_siif.toUpperCase(),
					'fec_compromiso': this.fec_compromiso,
					'num_cc_sup': this.num_cc_sup,
					'lug_exp_sup': this.lug_exp_sup.toUpperCase(),
					'email_sup': this.email_sup.toUpperCase(),
					'cargo_sup': this.cargo_sup.toUpperCase(),
					'num_poliza': this.num_poliza,
					'vlr_asegurado': this.vlr_asegurado,
					'por_asegurado': this.por_asegurado,
					'vigencia1_cumpli': this.vigencia1_cumpli,
					'vigencia2_cumpli': this.vigencia2_cumpli,
					'apro_poliza': this.apro_poliza,
					'fec_exp_poliza': this.fec_exp_poliza,
					'comp_aseguradora': this.comp_aseguradora.toUpperCase(),
					'nit_comp': this.nit_comp,
					'vlr_cdp': this.vlr_cdp,
					'fec_ini_cobertura': this.fec_ini_cobertura,
					'fec_fin_cobertura': this.fec_fin_cobertura,
					'link_contrato': this.link_contrato.toUpperCase(),

					'id_area': this.arrayAre.id,
					'id_arl': this.arrayAr.id,
					'id_banco': this.arrayBa.id,
					'id_pension': this.arrayPe.id,
					'id_salud': this.arraySa.id,
					'id_supervisor': this.arraySu.id,
					'lugar_expe': this.arrayM.id,
            })
            .then(function (response) {
                me.listarDatos();
                me.mensaje("Actualizado", "Actualizo");
                me.cerrarFormulario();
            })
            .catch(function (error) {
                console.log(error);
            });
		},
		eliminarDatos(data = []) {
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
					this.id_datos = data["id"];
					axios.post(this.ruta +"/datos/eliminar", {
					id: this.id_datos
					})
					.then(function(response) {
						me.listarDatos();
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
		this.selectSupervisor();
		this.listarDatos();
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