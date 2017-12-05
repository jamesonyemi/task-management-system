@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text:  "{!!  Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: "{!! Session::get('sweet_alert.timer') !!}",
            type:  "{!!  Session::get('sweet_alert.type') !!}",
            position: "{!! Session::get('top-right','top-right') !!}",
            width: "auto",
            grow:'colum',
            toast: true,
            buttonsStyling:true,
            background:'btn-success',
            customClass:'btn btn-success',
            confirmButtonClass:"btn btn-success",
            showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            confirmButtonColor: "#AEDEF4"

            // more options
        });
    </script>
@endif
