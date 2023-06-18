<div class="sidebar" data-color="red">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item @if($activePage == 'grafico') active @endif">
               <a class="nav-link" href="{{route('grafico')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('criar')}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __("Criar Registro") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('abrir')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Abrir Registro") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('relatorios')}}">
                     <i class="nc-icon nc-notes"></i>
                     <p>{{ __("Relatório") }}</p>
                 </a>
             </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('profile.edit')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Usuários") }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
