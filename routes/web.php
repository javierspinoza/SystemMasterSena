<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    // Route::get('/login', 'Auth\LoginController@login');
});

Route::group(['middleware'=>['auth']],function(){
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // notificaciones
    Route::post('/notification/get', 'NotificationController@get');
    
    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');

    Route::group(['middleware' => ['Almacenero']], function () {
        // Route::get('/categoria', 'CategoriaController@index');
        // Route::post('/categoria/registrar', 'CategoriaController@store');
        // Route::put('/categoria/actualizar', 'CategoriaController@update');
        // Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        // Route::put('/categoria/activar', 'CategoriaController@activar');
        // Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        // Route::get('/articulo', 'ArticuloController@index');
        // Route::post('/articulo/registrar', 'ArticuloController@store');
        // Route::put('/accesorio/actualizar', 'AccesorioController@update');
        // Route::post('/accesorio/registrar', 'AccesorioController@store');
        // Route::post('/accesorio/eliminar', 'AccesorioController@destroy');
        // Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        // Route::put('/articulo/activar', 'ArticuloController@activar');
        // Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        // Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        // Route::get('/articulo/selectAccesorio', 'ArticuloController@selectAccesorio');

        // Route::get('/proveedor', 'ProveedorController@index');
        // Route::post('/proveedor/registrar', 'ProveedorController@store');
        // Route::put('/proveedor/actualizar', 'ProveedorController@update');
        // Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        // Route::get('/ingreso', 'IngresoController@index');
        // Route::post('/ingreso/registrar', 'IngresoController@store');
        // Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        // Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        // Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

    });

    Route::group(['middleware' => ['Vendedor']], function () {
        // Route::get('/cliente', 'ClienteController@index');
        // Route::post('/cliente/registrar', 'ClienteController@store');
        // Route::post('/cliente/registrar2', 'ClienteController@store2');
        // Route::put('/cliente/actualizar', 'ClienteController@update');        
        // Route::put('/cliente/actualizar2', 'ClienteController@update2');        
        // Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        // Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        // Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta'); 

        // Route::get('/venta', 'VentaController@index');
        // Route::post('/venta/registrar', 'ventaController@store');
        // Route::put('/venta/desactivar', 'ventaController@desactivar');
        // Route::get('/venta/obtenerCabecera', 'ventaController@obtenerCabecera');
        // Route::get('/venta/obtenerDetalles', 'ventaController@obtenerDetalles');
    });

    Route::group(['middleware' => ['Contratista']], function () {
        
        Route::get('/contratista', 'ContratistaController@index');
        Route::post('/contratista/registrar', 'ContratistaController@store');
        Route::put('/contratista/actualizar', 'ContratistaController@update');
        Route::post('/contratista/eliminar','ContratistaController@destroy');
    });
    Route::group(['middleware' => ['Planta']], function () {
        
    });

    Route::group(['middleware' => ['Administrador']], function () {
        
        Route::get('/libro', 'LibroController@index');
        Route::post('/libro/registrar', 'LibroController@store');
        Route::put('/libro/actualizar', 'LibroController@update');
        Route::post('/libro/eliminar','LibroController@destroy');

        Route::get('/area', 'AreaController@index');
        Route::post('/area/registrar', 'AreaController@store');
        Route::put('/area/actualizar', 'AreaController@update');
        Route::post('/area/eliminar','AreaController@destroy');
        Route::get('/area/selectArea','AreaController@selectArea');

        Route::get('/arl', 'ArlController@index');
        Route::post('/arl/registrar', 'ArlController@store');
        Route::put('/arl/actualizar', 'ArlController@update');
        Route::post('/arl/eliminar','ArlController@destroy');
        Route::get('/arl/selectArl','ArlController@selectArl');

        Route::get('/banco', 'BancoController@index');
        Route::post('/banco/registrar', 'BancoController@store');
        Route::put('/banco/actualizar', 'BancoController@update');
        Route::post('/banco/eliminar','BancoController@destroy');
        Route::get('/banco/selectBanco','BancoController@selectBanco');

        Route::get('/pension', 'PensionController@index');
        Route::post('/pension/registrar', 'PensionController@store');
        Route::put('/pension/actualizar', 'PensionController@update');
        Route::post('/pension/eliminar','PensionController@destroy');
        Route::get('/pension/selectPension','PensionController@selectPension');

        Route::get('/salud', 'SaludController@index');
        Route::post('/salud/registrar', 'SaludController@store');
        Route::put('/salud/actualizar', 'SaludController@update');
        Route::post('/salud/eliminar','SaludController@destroy');
        Route::get('/salud/selectSalud','SaludController@selectSalud');

        Route::get('/supervisor', 'SupervisorController@index');
        Route::post('/supervisor/registrar', 'SupervisorController@store');
        Route::put('/supervisor/actualizar', 'SupervisorController@update');
        Route::post('/supervisor/eliminar','SupervisorController@destroy');
        Route::put('/supervisor/desactivar', 'SupervisorController@desactivar');
        Route::put('/supervisor/activar', 'SupervisorController@activar');
        Route::get('/supervisor/selectSupervisor','SupervisorController@selectSupervisor');

        Route::get('/datos', 'DatoCompletoController@index');
        Route::post('/datos/registrar', 'DatoCompletoController@store');
        Route::put('/datos/actualizar', 'DatoCompletoController@update');
        Route::post('/datos/eliminar','DatoCompletoController@destroy');

        Route::get('/mpio/selectMpio', 'MpioController@selectMpio');
        Route::get('/mpio/getMpios', 'MpioController@getMpios');

        Route::get('/dpto/selectDpto', 'DptoController@selectDpto');
        Route::get('/dpto/selectDptoCbx', 'DptoController@selectDptoCbx');

        Route::get('/recursos', 'RecursosController@index');
        Route::post('/recursos/registrar', 'RecursosController@store');
        Route::put('/recursos/actualizar', 'RecursosController@update');
        Route::post('/recursos/eliminar','RecursosController@destroy');
        Route::get('/recursos/selectRecursos','RecursosController@selectRecursos');

        Route::get('/contratista', 'ContratistaController@index');
        Route::post('/contratista/registrar', 'ContratistaController@store');
        Route::put('/contratista/actualizar', 'ContratistaController@update');
        Route::post('/contratista/eliminar','ContratistaController@destroy');
        Route::get('/contratista/selectContratista','ContratistaController@selectContratista');

        Route::get('/aprendiz', 'AprendicesController@index');
        Route::post('/aprendiz/registrar', 'AprendicesController@store');
        Route::put('/aprendiz/actualizar', 'AprendicesController@update');
        Route::post('/aprendiz/eliminar','AprendicesController@destroy');
        Route::put('/aprendiz/desactivar', 'AprendicesController@desactivar');
        Route::put('/aprendiz/activar', 'AprendicesController@activar');
        Route::get('/aprendiz/selectAprendiz','AprendicesController@selectAprendiz');

        Route::get('/contrato', 'ContratoController@index');
        Route::post('/contrato/registrar', 'ContratoController@store');
        Route::put('/contrato/actualizar', 'ContratoController@update');
        Route::post('/contrato/eliminar','ContratoController@destroy');
        // Route::get('/contrato/selectContrato','ContratoController@selectContrato');

        Route::get('/ficha', 'FichaController@index');
        Route::post('/ficha/registrar', 'FichaController@store');
        Route::put('/ficha/actualizar', 'FichaController@update');
        Route::post('/ficha/eliminar','FichaController@destroy');
        Route::put('/ficha/desactivar', 'FichaController@desactivar');
        Route::put('/ficha/activar', 'FichaController@activar');
        Route::get('/ficha/selectFicha','FichaController@selectFicha');

        Route::get('/detFichaAprendiz', 'DetFichaAprendizController@index');
        Route::post('/detFichaAprendiz/registrar', 'DetFichaAprendizController@store');
        Route::put('/detFichaAprendiz/actualizar', 'DetFichaAprendizController@update');
        Route::post('/detFichaAprendiz/eliminar','DetFichaAprendizController@destroy');
        // Route::get('/detFichaAprendiz/selectDetFichaAprendiz','DetFichaAprendizController@selectDetFichaAprendiz');
    });

});

//Route::get('/home', 'HomeController@index')->name('home');
