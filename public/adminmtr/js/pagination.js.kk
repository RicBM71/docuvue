var DatatablesBasicPaginations = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');
			
		// begin first table
		table.DataTable({
			responsive: true,
			pagingType: 'full_numbers',
            info: false,
            paging: true,    
            lengthChange: false,
            pageLength: 10,
            language: {
                    "url": "./datatable.Spanish.lang"
            }
  			// oLanguage: {
  			// 	"sSearch":         "Buscar:",
  			// 	"sProcessing":"Procesando...",
     //            "sLengthMenu":     "Mostrar _MENU_ registros",
     //            "sZeroRecords":    "No se encontraron resultados",
     //            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
     //            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
     //            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
     //            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
     //            "sInfoPostFix":    "",
     //            "sSearch":         "Buscar:",
     //            "sUrl":            "",
     //            "sInfoThousands":  ",",
     //            "sLoadingRecords": "Cargando...",
     //            "oPaginate": {
     //                "sFirst":    "<<",
     //                "sLast":     ">>",
     //                "sNext":     ">",
     //                "sPrevious": "<"
     //            },
     //            "oAria": {
     //                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
     //                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
     //            },
     //            "buttons": {
     //                "copy": "Copiar",
     //                "colvis": "Visibilidad"
     //            }
  			// }
			
		});
	};

	return {		
		//main function to initiate the module
		init: function() {
			initTable1();			
		},

	};



}();

jQuery(document).ready(function() {
	DatatablesBasicPaginations.init();
});