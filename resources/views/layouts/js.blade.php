
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{asset("asset/assets/plugins/jquery/jquery.min.js")}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{asset("asset/assets/plugins/bootstrap/js/popper.min.js")}}"></script>
    
        <script src="{{asset("asset/assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{asset("asset/assets/js/jquery.slimscroll.js")}}"></script>
        <!--Wave Effects -->
        <script src="{{asset("asset/assets/js/waves.js")}}"></script>
        <!--Menu sidebar -->
        <script src="{{asset("asset/assets/js/sidebarmenu.js")}}"></script>
        <!--stickey kit -->
        <script src="{{asset("asset/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
        <!--Custom JavaScript -->
        <script src="{{asset("asset/assets/js/custom.min.js")}}"></script>
        <!-- Footable -->
        <script src="{{asset("asset/assets/plugins/footable/js/footable.all.min.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/bootstrap-select/bootstrap-select.min.js")}}" type="text/javascript"></script>
        <!--FooTable init-->
        <script src="{{asset("asset/assets/js/footable-init.js")}}"></script>
        <!-- Sweet-Alert  -->
        <script src="{{asset("asset/assets/plugins/sweetalert/sweetalert.min.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/sweetalert/jquery.sweet-alert.custom.js")}}"></script>
        <!-- Plugin JavaScript -->
        <script src="{{asset("asset/assets/plugins/moment/moment.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js")}}"></script>
        <!-- Clock Plugin JavaScript -->
        <script src="{{asset("asset/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js")}}"></script>
        <!-- Color Picker Plugin JavaScript -->
        <script src="{{asset("asset/assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js")}}"></script>
        <!-- Date Picker Plugin JavaScript -->
        <script src="{{asset("asset/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js")}}"></script>
        <!-- Date range Plugin JavaScript -->
        <script src="{{asset("asset/assets/plugins/timepicker/bootstrap-timepicker.min.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/toastr/toastr.min.js")}}"></script>
        <script src="{{asset("asset/assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>

        <script>
        // MAterial Date picker    
        $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
        $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
        $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

        $('#min-date').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD HH:mm:ss', minDate: new Date() });
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });
        $('#check-minutes').click(function(e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
        // Colorpicker
        $(".colorpicker").asColorPicker();
        $(".complex-colorpicker").asColorPicker({
            mode: 'complex'
        });
        $(".gradient-colorpicker").asColorPicker({
            mode: 'gradient'
        });
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            format: 'MM/DD/YYYY h:mm A',
            timePickerIncrement: 30,
            timePicker12Hour: true,
            timePickerSeconds: false,
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2015',
            maxDate: '06/30/2015',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse',
            dateLimit: {
                days: 6
            }
        });
        </script>
        <!-- ============================================================== -->
        <!-- Style switcher -->
        <!-- ============================================================== -->
        <script src="{{asset("asset/assets/plugins/styleswitcher/jQuery.style.switcher.js")}}"></script>
    </body>
    
    </html>