<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text:  "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: "<?php echo Session::get('sweet_alert.timer'); ?>",
            type:  "<?php echo Session::get('sweet_alert.type'); ?>",
            position: "<?php echo Session::get('top-right','top-right'); ?>",
            width: "auto",
            grow:'colum',
            toast: true,
            buttonsStyling:true,
            background:'btn-success',
            customClass:'btn btn-success',
            confirmButtonClass:"btn btn-success",
            showConfirmButton: "<?php echo Session::get('sweet_alert.showConfirmButton'); ?>",
            confirmButtonText: "<?php echo Session::get('sweet_alert.confirmButtonText'); ?>",
            confirmButtonColor: "#AEDEF4"

            // more options
        });
    </script>
<?php endif; ?>
