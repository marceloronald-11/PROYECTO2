$(document).on("ready",main);
	function cargarnota(url){
		$("#destino").text("cargando..");
		$("#destino").load(url);
	
	}
	
	function main(){
		$("#cargar1").on("click", function(){
				cargarnota("reporte1.php");
			});
		$("#cargar2").on("click", function(){
				cargarnota("reporte2.php");
			});
		$("#cargar3").on("click", function(){
				cargarnota("reporte3.php");
		});
	}