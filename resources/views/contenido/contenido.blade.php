@extends('principal')
@section('contenido')

    @if(Auth::check())
            @if (Auth::user()->idrol == 1)

            <template v-if="menu==0">
                <h1>Escritorio</h1>
            </template>

            <template v-if="menu==64">
                <user></user>
            </template>

            {{-- <template v-if="menu==8">
                <rol></rol>
            </template> --}}

            <template v-if="menu==89922">
                <libro :ruta="ruta"></libro>
            </template>

            {{-- <template v-if="menu==89929">
                <notification :ruta="ruta"></notification>
            </template> --}}

            <template v-if="menu==89921">
                <oficina></oficina>
            </template>

            <template v-if="menu==001">
                <areas :ruta="ruta"></areas>
            </template>

            <template v-if="menu==002">
                <arl :ruta="ruta"></arl>
            </template>

            <template v-if="menu==003">
                <banco :ruta="ruta"></banco>
            </template>

            <template v-if="menu==004">
                <pension :ruta="ruta"></pension>
            </template>

            <template v-if="menu==005">
                <salud :ruta="ruta"></salud>
            </template>

            <template v-if="menu==006">
                <supervisor :ruta="ruta"></supervisor>
            </template>

            <template v-if="menu==007">
                <datoscompletos :ruta="ruta"></datoscompletos>
            </template>

            <template v-if="menu==008">
                <recurso :ruta="ruta"></recurso>
            </template>

            <template v-if="menu==009">
                <contratista :ruta="ruta"></contratista>
            </template>

            <template v-if="menu==0111">
                <aprendiz :ruta="ruta"></aprendiz>
            </template>

            <template v-if="menu==0112">
                <contrato :ruta="ruta"></contrato>
            </template>

            <template v-if="menu==0113">
                <ficha :ruta="ruta"></ficha>
            </template>

            <template v-if="menu==0114">
                <detfichaaprendiz :ruta="ruta"></detfichaaprendiz>
            </template>

            @elseif (Auth::user()->idrol == 2)

            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>

            @elseif (Auth::user()->idrol == 3)

            <template v-if="menu==76">
                <red></red>
            </template>

            @elseif (Auth::user()->idrol == 4)

            <template v-if="menu==009">
                <contratista :ruta="ruta"></contratista>
            </template>

            @elseif (Auth::user()->idrol == 5)

            <template v-if="menu==009">
                <contratista :ruta="ruta"></contratista>
            </template>
            
            @else

            @endif

    @endif

        
    @endsection