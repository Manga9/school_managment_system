<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif
@toastr_js
@toastr_render

<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
                elem.checked = false;
            }
        }
    }
</script>

<script>
    $("#delete_all_btn").click(function(e) {
        var selected = new Array();
        $("#datatable input[type=checkbox]:checked").each(function() {
            selected.push(this.value);
        });
        if (selected.length > 0) {
            $('#delete_all').modal('show');
            $('input[id="delete_all_id"]').val(selected);
        } else {
            e.preventDefault();
        }
    });


    // old  grade

    $('select[name="grade_id"]').on('change', function () {
        var Grade_id = $(this).val();
        if (Grade_id) {
            $.ajax({
                url: "{{ URL::to('classes') }}/" + Grade_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="classroom_id"]').empty();
                    $('select[name="classroom_id"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                    $.each(data, function (key, value) {
                        $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });

    $('select[name="classroom_id"]').on('change', function () {
        var classroom_id = $(this).val();
        if (classroom_id) {
            $.ajax({
                url: "{{ URL::to('getSections') }}/" + classroom_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="section_id"]').empty();
                    $('select[name="section_id"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                    $.each(data, function (key, value) {
                        $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });

    $('select[name="classroom_id"]').on('change', function () {
        var classroom_id = $(this).val();
        if (classroom_id) {
            $.ajax({
                url: "{{ URL::to('getSubjects') }}/" + classroom_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                    $.each(data, function (key, value) {
                        $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });


    // new grade

    $('select[name="grade_id_new"]').on('change', function () {
        var Grade_id = $(this).val();
        if (Grade_id) {
            $.ajax({
                url: "{{ URL::to('classes') }}/" + Grade_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="classroom_id_new"]').empty();
                    $('select[name="classroom_id_new"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                    $.each(data, function (key, value) {
                        $('select[name="classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });

    $('select[name="classroom_id_new"]').on('change', function () {
        var classroom_id = $(this).val();
        if (classroom_id) {
            $.ajax({
                url: "{{ URL::to('getSections') }}/" + classroom_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="section_id_new"]').empty();
                    $('select[name="section_id_new"]').append('<option disabled selected> {{trans('main.choose')}} </option>');
                    $.each(data, function (key, value) {
                        $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });


</script>
