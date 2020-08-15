<?php
require 'tools.php' ;
class datatable extends tools{

/* the id of table */private $table_id;


public function datatable_css(){
    echo '
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    
    
    ';
}
public function datatable_js(){
            echo '
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    /*    
        */
            



            
            
            ';
        ?>
        <script>
        var idioma=

        {
            "sProcessing":     "جارٍ التحميل...",
            "sLengthMenu":     "أظهر _MENU_ مدخلات",
            "sZeroRecords":    "لم يعثر على أية سجلات",
            "sEmptyTable":     "الجدول فارغ",
            "sInfo":           "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty":      "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered":   "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix":    "",
            "sSearch":         "ابحث",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "الأول",
                "sLast":     "الاخير",
                "sNext":     "التالي",
                "sPrevious": "السابق"
            },
            "oAria": {
                "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
            },
            "buttons": {
                "copyTitle": 'نسخ المعلومات ',
                "copyKeys": 'Use your keyboard or menu to select the copy command',
                "copySuccess": {
                    "_": ' تم نسخ  %d صف  بنجاح ',
                    "1": 'تم نسخ صف واحد بنجاح    '
                },

                "pageLength": {
                "_": " عرض  %d  من الصفوف",
                "-1": "   كل الصفوف "
                }
            }
        };

        $(document).ready(function() {

            $(document).ready(function() {
        $("<?php  echo $this->table_id; ?>").DataTable( {
            "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "language":idioma,
        } );
    } );
    
    

   } );
    </script>
    
      <?php
}
public function table_start($cols_name,$table_id){
    $this->table_id=$table_id;
        ?>



    <div class="container">
    

    <div class="row">
        
        <div class="col-12" >
        
        
        <table id="mytable" class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
                            <input type="checkbox" onclick="checkAll(this)">
								<label for="selectAll"></label>
							</span>
                        </th>
                        
                        <?php   
                        foreach ($cols_name as $value){
                            echo "<th>$value</th>";
                        }
                        
                        ?>
                      
                    </tr>
                </thead>
                <tbody>
      





    <?php
}

public function  table_end(){
    echo '
    

    </div>
    </div>
    
    
    
    
    
    
    </div>

    </tbody>
    
    </table>';
    ?>
    <script>
        function checkAll(bx) {
    var cbs = document.getElementsByTagName('input');
    for(var i=0; i < cbs.length; i++) {
        if(cbs[i].type == 'checkbox') {
        cbs[i].checked = bx.checked;
        }
    }
    }
    </script>
    <?php
    
}
	public function datatable_js2($url_dir){
    ?>
            
    <script src="<?php  echo $url_dir;  ?>includes/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/buttons.flash.min.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/jszip.min.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/pdfmake.min.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/vfs_fonts.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/buttons.html5.min.js"></script>
    <script src="<?php  echo $url_dir;  ?>includes/datatable/buttons.print.min.js"></script>

    

 <?php 

    
    
   
    ?>
    <script>
    var idioma=

    {
        "sProcessing":     "جارٍ التحميل...",
        "sLengthMenu":     "أظهر _MENU_ مدخلات",
        "sZeroRecords":    "لم يعثر على أية سجلات",
        "sEmptyTable":     "الجدول فارغ",
        "sInfo":           "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty":      "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered":   "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix":    "",
        "sSearch":         "ابحث",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "الأول",
            "sLast":     "الاخير",
            "sNext":     "التالي",
            "sPrevious": "السابق"
        },
        "oAria": {
            "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
        },
        "buttons": {
            "print":"طباعة",
            "copy":"نسخ",
            "excel":"تصدير الى اكسل",
            "copyTitle": 'نسخ المعلومات ',
            "copyKeys": 'Use your keyboard or menu to select the copy command',
            "copySuccess": {
                "_": ' تم نسخ  %d صف  بنجاح ',
                "1": 'تم نسخ صف واحد بنجاح    '
            },

            "pageLength": {
            "_": " عرض  %d  من الصفوف",
            "-1": "   كل الصفوف "
            }
        }
    };

    $(document).ready(function() {

        $(document).ready(function() {
    $("<?php  echo $this->table_id; ?>").DataTable( {
        "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            'excel','copy','print',
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'direction',"rtl" )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ],
        "language":idioma,
        "title":"hi",
    
    
    } );
    } );


        
    } );
    </script>

    <?php
}

};



?>
