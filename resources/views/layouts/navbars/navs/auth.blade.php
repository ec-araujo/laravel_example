<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <p class="header" id="p1"></p>

        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav   d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href=" {{route('profile.edit') }} ">
                        <span class="no-icon">{{ __('Account') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
function addZero(i) {
  if (i < 10) {i = "0" + i}
  return i;
}

var date = new Date();
var dia = addZero(date.getDate());
var mes = addZero(date.getMonth() + 1); // Os meses começam em zero, então adicionamos 1
var ano = date.getFullYear();
var hora = date.getHours();
var minuto = addZero(date.getMinutes());
var segundo = addZero(date.getSeconds());
    date = dia + '/' + mes + '/' + ano + ' - ' + hora + ':' + minuto + ':' + segundo;
	document.getElementById("p1").innerHTML = date;


function clockTick() {
var date = new Date();
var dia = addZero(date.getDate());
var mes = addZero(date.getMonth() + 1); // Os meses começam em zero, então adicionamos 1
var ano = date.getFullYear();
var hora = date.getHours();
var minuto = addZero(date.getMinutes());
var segundo = addZero(date.getSeconds());
    date = dia + '/' + mes + '/' + ano + ' - ' + hora + ':' + minuto + ':' + segundo;
	document.getElementById("p1").innerHTML = date;
}
    setInterval(clockTick, 1000);
    </script>