(function($) {
    $.fn.textBoxList = function(options) {
        var defaults = {
            values:[]
            },
            opts = $.extend(defaults, options),
            $this = $(this),
            initialId = $this.attr('id');
        function render() {
            var input = $this;
            //new $.GrowingInput($this,{});
            input.attr('id',_.uniqueId(initialId+'_'));
            $this.addClass('tbl-input');
            $this.removeClass('tbl-input-test');
            $this.addClass('tbl-current');
            if(opts.values.length>0){
                $.each(opts.values,function(index,value){                
                    addValue(value);
                });
             }else{
                manageEvents();
             }
            
        }

        function manageEvents() {
            $('.tbl-current').keydown(function(event) {

                if (event.keyCode === 13) {
                    console.log($(this).attr('value'));
                    if ($(this).attr('value') !== "") {
                        addValue($(this).attr('value'));
                    }
                    event.preventDefault();
                }
            });

        }

        function addValue(value) {
            var input = $('.tbl-current');
            input.attr('value',value);
            renderDisplayValue(input);
        }

        function renderDisplayValue(input) {
            
            var inputId = input.attr('id'),
                uniqueId = inputId.substring(inputId.lastIndexOf("_")),
                displayValue = $('<span>', {
                    id: 'tbl-display-value'+uniqueId,
                    text: input.attr('value')
                });
           
            var deletebutton= $('<a>', {
                href:"#",
                text: 'X'
            });
            
            deletebutton.click(onDelete);
            displayValue.append(deletebutton);
           
            deletebutton.addClass('tbl-display-delete');
            
            input.after(displayValue);
            displayValue.addClass('tbl-display-value');
            var tblInput = input.clone();
            tblInput.attr('value','');
            tblInput.attr('id',_.uniqueId(initialId+'_'));
            //new $.GrowingInput(tblInput,{});
            input.removeClass('tbl-current');
            
            tblInput.addClass('tbl-current');
            input.hide('fast');
            displayValue.after(tblInput);
            manageEvents();
        }
            
        function onDelete(event){
            var eltToDelete = $(this).parent(),
                eltToDeleteId = eltToDelete.attr('id'),
                uniqueId = eltToDeleteId.substring(eltToDeleteId.lastIndexOf("_"));

            eltToDelete.remove();
            $('#'+initialId+uniqueId).remove();
        }
        render();
    };
    
    
    waitForKeyElements ('input.tbl-input-test', function(node) {
    	node.textBoxList();
    });
})(jQuery);