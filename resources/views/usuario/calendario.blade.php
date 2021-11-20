@extends('layouts.plantillausuario')
@section('title','usuario')

@section('content')


<!-- This is an example component -->
<div>

	<link rel="dns-prefetch" href="//unpkg.com" />
	<link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

	<style>
		[x-cloak] {
			display: none;
		}
	</style>

<div class="mt-10 md:flex ">
<div style="margin-left:20px" class=" flex-row  mb-2 md:mr-1">

Los eventos en el calendario se muestran segun el siguiente detalle:
<ol >
<li> <button style="background-color:#c9e9f6">Solicitud de excepciones</button> </li>

<li> <button style="background-color:#c9f6d6"> Baja médica</button></li>

<li> <button style="background-color:#ffd8d8"> Aniversario Cotel</button></li>
<li> <button style="background-color:#ffffc4">Cumpleaños</button></li>
</ol>
</DIV>
<div class="max-w-full  flex-rowantialiased sans-serif bg-gray-100 h-screen">
	<div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
		<div class="container mx-auto px-4 py-2 md:py-24">
			  
			<!-- <div class="font-bold text-gray-800 text-xl mb-4">
				Schedule Tasks
			</div> -->

			<div class="bg-white rounded-lg shadow overflow-hidden">

				<div class="flex items-center justify-between py-2 px-6">
					<div>
						<span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
						<span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
					</div>
					<div class="border rounded-lg px-1" style="padding-top: 0px;">
						<button 
							type="button"
							class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" 
							:class="{'cursor-not-allowed opacity-25': month == 0 }"
							:disabled="month == 0 ? true : false"
							@click="month--; getNoOfDays()">
							<svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
							</svg>  
						</button>
						<div class="border-r inline-flex h-6"></div>		
						<button 
							type="button"
							class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" 
							:class="{'cursor-not-allowed opacity-25': month == 11 }"
							:disabled="month == 11 ? true : false"
							@click="month++; getNoOfDays()">
							<svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
							</svg>									  
						</button>
					</div>
				</div>	

				<div class="-mx-1 -mb-1">
					<div class="flex flex-wrap" style="margin-bottom: -40px;">
						<template x-for="(day, index) in DAYS" :key="index">	
							<div style="width: 14.26%" class="px-2 py-2">
								<div
									x-text="day" 
									class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
							</div>
						</template>
					</div>

					<div class="flex flex-wrap border-t border-l">
						<template x-for="blankday in blankdays">
							<div 
								style="width: 14.28%; height: 120px"
								class="text-center border-r border-b px-4 pt-2"	
							></div>
						</template>	
						<template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
							<div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
								<div
									@click="showEventModal(date)"
									x-text="date"
									class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
									:class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
								></div>
								<div style="height: 80px;" class="overflow-y-auto mt-1">
									<!-- <div 
										class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-6 bg-gray-700 text-white leading-none"
										x-show="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"
										x-text="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"></div> -->

									<template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">	
										<div
											class="px-2 py-1 rounded-lg mt-1 overflow-hidden border"
											:class="{
												'border-blue-200 text-blue-800 bg-blue-100': event.event_theme === 'blue',
												'border-red-200 text-red-800 bg-red-100': event.event_theme === 'red',
												'border-yellow-200 text-yellow-800 bg-yellow-100': event.event_theme === 'yellow',
												'border-green-200 text-green-800 bg-green-100': event.event_theme === 'green',
												'border-purple-200 text-purple-800 bg-purple-100': event.event_theme === 'purple'
											}"
										>
											<p x-text="event.event_title" class="text-sm truncate leading-tight"></p>
										</div>
									</template>
								</div>
							</div>
						</template>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>	
	<script>
	
		const MONTH_NAMES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		const DAYS = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Domingo'];

		function app() {
			return {
				month: '',
				year: '',
				no_of_days: [],
				blankdays: [],
				days: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'],

				events: [
					<?php
$codigousu= session('codigo_usu');

$coneccion = mysqli_connect ("localhost", "root", "" );
$basededatos = 'cotel';
$bd =mysqli_select_db ($coneccion, $basededatos);
$codigo = "SELECT s.id,s.fechainicio,s.fechafin,YEAR(s.fechainicio) as anioinicio, MONTH(s.fechainicio) as mesinicio,DAY(s.fechainicio) as diainicio,YEAR(s.fechafin)as aniofin,MONTH(s.fechafin) as mesfin,DAY(s.fechafin) as diafin,t.id_tiposolicitud,t.nom_tiposolicitud,te.nom_tipoexcepcion, o.nom_opciones
FROM solicitud as s , tiposolicitud as t, tipoexcepcion as te, opcioneslista as o, usuario as u
WHERE u.codigo_usu=$codigousu and u.id=s.id_usuario and s.estado=1 and s.id_tiposolicitud!=2 and s.id_tiposolicitud!=3 and s.id_tiposolicitud = t.id_tiposolicitud AND
s.id_tipoexcepcion=te.id_tipoexcepcion and s.id_opcioneslista=o.id_opcioneslista";
$resultado = mysqli_query($coneccion, $codigo);
$color='red';
while ($rest = mysqli_fetch_array($resultado)) {

if($rest['id_tiposolicitud']==1){
$color='blue';
}else{
	$color='green';
}


?>
					{
						event_date: new Date(<?php echo $rest['anioinicio']?>, <?php echo $rest['mesinicio']-1?>, <?php echo $rest['diainicio']?>),
						event_title: "<?php echo 'INICIO '.$rest['nom_tiposolicitud']?>",
						event_theme: '<?php echo $color?>'
					},
					{
						event_date: new Date(<?php echo $rest['aniofin']?>, <?php echo $rest['mesfin']-1?>, <?php echo $rest['diafin']?>),
						event_title: "<?php echo 'FIN '.$rest['nom_tiposolicitud']?>",
						event_theme: '<?php echo $color?>'
					},
<?php 
$miinicio=mktime(0,0,0,$rest['mesinicio'],$rest['diainicio'],$rest['anioinicio']);
$mifin=mktime(0,0,0,$rest['mesfin'],$rest['diafin'],$rest['aniofin']);
$cont=0;
$midife=$mifin-$miinicio;
$diasfife=$midife/(60*60*24);
$diasfife=abs($diasfife);
$diasfife=floor($diasfife);
$dias=$rest['diainicio'];
if($diasfife>0){

while ($cont < $diasfife-1) {
$dias=$dias+1;
	?>
					{
						event_date: new Date(<?php echo $rest['aniofin']?>, <?php echo $rest['mesfin']-1?>, <?php echo $dias?>),
						event_title: "<?php echo $rest['nom_tiposolicitud']?>",
						event_theme: '<?php echo $color?>'
					},
	<?php
	$cont=$cont+1;
}
}
?>
					<?php 

				}
				?>

					{
						event_date: new Date(2021, 3, 12),
						event_title: "ANIVERSARIO COTEL",
						event_theme: 'red'
					},
					<?php
					$codigo123 = "SELECT DAY(Fnac)as dia,MONTH(Fnac) as mes,YEAR(Fnac) as an from usuario WHERE codigo_usu=$codigousu";
					$resultado123 = mysqli_query($coneccion, $codigo123);
					while ($rest123 = mysqli_fetch_array($resultado123)) {
					
					$dia=$rest123['dia'];
					$mes=$rest123['mes']-1;
					$an= date('Y');

					
				
					?>
					
					{

						event_date: new Date(2021, <?php echo $mes?>, <?php echo $dia?>),
						event_title: "FELIZ CUMPLEAÑOS",
						event_theme: 'yellow'
					}
					<?php
				
					}
				?>
				],
				event_title: '',
				event_date: '',
				event_theme: 'blue',

				themes: [
					{
						value: "blue",
						label: "Blue Theme"
					},
					{
						value: "red",
						label: "Red Theme"
					},
					{
						value: "yellow",
						label: "Yellow Theme"
					},
					{
						value: "green",
						label: "Green Theme"
					},
					{
						value: "purple",
						label: "Purple Theme"
					}
				],

				openEventModal: false,

				initDate() {
					let today = new Date();
					this.month = today.getMonth();
					this.year = today.getFullYear();
					this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
				},

				isToday(date) {
					const today = new Date();
					const d = new Date(this.year, this.month, date);

					return today.toDateString() === d.toDateString() ? true : false;
				},

				showEventModal(date) {
					// open the modal
					this.openEventModal = true;
					this.event_date = new Date(this.year, this.month, date).toDateString();
				},

				addEvent() {
					if (this.event_title == '') {
						return;
					}

					this.events.push({
						event_date: this.event_date,
						event_title: this.event_title,
						event_theme: this.event_theme
					});

					console.log(this.events);

					// clear the form data
					this.event_title = '';
					this.event_date = '';
					this.event_theme = 'blue';

					//close the modal
					this.openEventModal = false;
				},

				getNoOfDays() {
					let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

					// find where to start calendar day of week
					let dayOfWeek = new Date(this.year, this.month).getDay();
					let blankdaysArray = [];
					for ( var i=1; i <= dayOfWeek; i++) {
						blankdaysArray.push(i);
					}

					let daysArray = [];
					for ( var i=1; i <= daysInMonth; i++) {
						daysArray.push(i);
					}
					
					this.blankdays = blankdaysArray;
					this.no_of_days = daysArray;
				}
			}
		}
	</script>
	</div>
  </div>
  <script></script>
  @endsection