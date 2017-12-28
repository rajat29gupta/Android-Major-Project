<!-- jQuery -->
<script src="js/jquery/jquery-1.11.1.min.js"></script>
<script src="js/jquery/jquery_ui/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>


<script src="js/admin-forms/js/jquery-ui-datepicker.min.js"></script>
<script src="js/plugins/select2/select2.min.js"></script>
<!-- FileUpload JS -->
<script src="js/plugins/fileupload/fileupload.js"></script>
<script src="js/plugins/holder/holder.min.js"></script>

<!-- Tagmanager JS -->
 <script src="js/plugins/tagsinput/tagsinput.min.js"></script>
 
 <script src="js/bootstrap-formhelpers.min.js"></script> 
  
<!-- Theme Javascript -->
<script src="js/utility/utility.js"></script>
<script src="js/demo/demo.js"></script>
<script src="js/main.js"></script>
<!-- AdminForms JS -->

<script>
$(".select2-single").select2();
$("#switch-modal").bootstrapSwitch();

$("#switch-modal2").bootstrapSwitch();

$("#switch-modal3").bootstrapSwitch();
</script>

<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>

<script>
$(document).ready(function() {
	$('img').on('dragstart', function(event) { event.preventDefault(); });
});
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    /* @time picker
     ------------------------------------------------------------------ */
    $('.inline-tp').timepicker({
                    format: 'LT'
                }
    );
    
    
    

    $('#timepicker1').timepicker({
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

    $('#timepicker2').timepicker({
      showOn: 'both',
      buttonText: '<i class="fa fa-clock-o"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

    $('#timepicker3').timepicker({
      showOn: 'both',
      disabled: true,
      buttonText: '<i class="fa fa-clock-o"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });
    
    
        
        

    

    /* @date time picker
    ------------------------------------------------------------------ */
    $('#datetimepicker1').datetimepicker({
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });
    
    $('#datetimepicker2').datetimepicker({
      showOn: 'both',
      buttonText: '<i class="fa fa-calendar-o"></i>',
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

    $('#datetimepicker3').datetimepicker({
      showOn: 'both',
      buttonText: '<i class="fa fa-calendar-o"></i>',
      disabled: true,
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

    $('.inline-dtp').datetimepicker({
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
    });

    /* @date picker
    ------------------------------------------------------------------ */
    $("#datepicker1").datepicker({
      dateFormat: 'yy-mm-dd',
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false,
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });
    
    $("#datepicker").datepicker({
      dateFormat: 'yy-mm-dd',
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false,
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

  

   $( "#datepicker_01" ).datepicker( {
      dateFormat: 'yy-mm-dd',
      buttonText: '<i class="fa fa-calendar-o"></i>',
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
    });


    $('#datepicker2').datepicker({
      numberOfMonths: 3,
      showOn: 'both',
      buttonText: '<i class="fa fa-calendar-o"></i>',
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

    $('#datepicker3').datepicker({
      showOn: 'both',
      disabled: true,
      buttonText: '<i class="fa fa-calendar-o"></i>',
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      beforeShow: function(input, inst) {
        var newclass = 'admin-form';
        var themeClass = $(this).parents('.admin-form').attr('class');
        var smartpikr = inst.dpDiv.parent();
        if (!smartpikr.hasClass(themeClass)) {
          inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
        }
      }
    });

    $('.inline-dp').datepicker({
      numberOfMonths: 1,
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false
    });
	});
		</script>


<script type="text/javascript">
jQuery(document).ready(function() {

"use strict";

// Init Theme Core    
Core.init();

// Init Demo JS    
Demo.init();        

// Init Boostrap Multiselects
$('#multiselect2').multiselect({
  includeSelectAllOption: true
});

// Init Boostrap Multiselects
$('#multiselect3').multiselect({
  includeSelectAllOption: true
}); 

// Init Boostrap Multiselects
$('#multiselect4').multiselect({
  includeSelectAllOption: true
}); 
 

// select dropdowns - placeholder like creation
    var selectList = $('.admin-form select');
    selectList.each(function(i, e) {
      $(e).on('change', function() {
        if ($(e).val() == "0") $(e).addClass("empty");
        else $(e).removeClass("empty")
      });
    });
    selectList.each(function(i, e) {
      $(e).change();
    });

    // Init tagsinput plugin
    $("input#tagsinput").tagsinput({
      tagClass: function(item) {
        return 'label label-default';
      }
    });

});
</script>




</body>
</html>