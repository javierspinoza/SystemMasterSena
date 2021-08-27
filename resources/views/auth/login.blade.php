@extends('auth.contenido')

@section('login')
<div class="row justify-content-center">
      <div class="col-md-8">
        
        <div class="card-group mb-0">
          <div class="card p-4">
          <form class="form-horizontal was-validated" method="POST" action="{{ route('login')}}">
          {{ csrf_field() }}
              <div class="card-body">
              <h2 style="color:#566573">Acceder</h2>
              <br>
              
              <p class="text-muted">Control de acceso al sistema</p>
              <div class="form-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                <span class="input-group-addon"><i class="icon-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">Acceder</button>
                </div>
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            
            <h6 style="color:#ABB2B9">Todos los derechos reservados &copy;SENA</h6>
          </form>
          </div>
          <div class="card text-white bg-dark  py-1 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              
                <img src="img\logoSena.png" class="card-img-top" alt="Cinque Terre" width="100%" height="100%"> 
                <h5>CONTRATACIÓN SENA </h5> 
                 <br>              
                {{-- <p class="card-subtitle mb-2 text-muted">Instalación sector 1</p>
                <p class="card-subtitle mb-2 text-muted">Intalacion internet</p>
                <p class="card-subtitle mb-2 text-muted">Tender Fibra Sector2</p>
                <p class="card-subtitle mb-2 text-muted">Video-Conferencia 30 de Dic</p>
                <p>  Sistema de Operación  </p>   --}}
            
            </div>
          </div>

        </div>
      </div>
    </div>
@endsection
