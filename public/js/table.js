$(document).ready(function(){
    $('#tabla').DataTable({
    
     "language":fecha,
     "lengthMenu": [[-1], ["Todos"]],
      dom: 'Bfrtip',
            buttons: [
                'excel', 'csv', 'excel', 'pdf'
            ]
      
    
     });
    
    });
    
    var fecha={
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Listado en _MENU_",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta #tablaxs",
        "sInfo":           "",
        "sInfoEmpty":      "",
        "sInfoFiltered":   "",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar Registros:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    
        window.onload=function() {
            var contenedor=document.getElementById('contedor_carga');
            contenedor.style.visibility='hidden';
            contenedor.style.opacity='0'
        };
    
           $(document).ready(function() {
    
        // Setup - add a text input to each footer cell
        $('#tablax tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text"  style="width : 235px;""  placeholder="Buscar: '+title+'" />' );
        } );
     
        // DataTable
        var table = $('#tablax').DataTable({
             "language":fecha1,
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
     
    } );
    
    
    
    
     var fecha1={
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Listado en _MENU_",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta #tablaxs",
        "sInfo":           "<strong>Total Registros _TOTAL_</strong> ",
        "sInfoEmpty":      "",
        "sInfoFiltered":   "",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar Registros:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
     
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    
        window.onload=function() {
            var contenedor=document.getElementById('contedor_carga');
            contenedor.style.visibility='hidden';
            contenedor.style.opacity='0'
        };
    
           $(document).ready(function() {
    
        // Setup - add a text input to each footer cell
        $('#tablax2 tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Buscar:  '+title+'" />' );
        } );
     
        // DataTable
        var table = $('#tablax2').DataTable({
            "language":fecha1,
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
     
    } );
    