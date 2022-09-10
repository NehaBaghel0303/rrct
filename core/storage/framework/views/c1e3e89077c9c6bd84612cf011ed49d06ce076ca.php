    
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="<?php echo e(asset('backend/all.js')); ?>"></script>


<script src="<?php echo e(asset('backend/plugins/DataTables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/datatables.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script src="<?php echo e(asset('backend/plugins/select2/dist/js/select2.min.js')); ?>"></script>

<!--get role wise permissiom ajax script-->
<script src="<?php echo e(asset('backend/js/get-role.js')); ?>"></script>


<script src="<?php echo e(asset('backend/plugins/jquery-toast-plugin/dist/jquery.toast.min.js')); ?>"></script>


<script src="<?php echo e(asset('backend/js/form-components.js')); ?>"></script>





<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <?php echo $__env->make('backend.include.world', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
<?php echo $__env->make('backend.modal.speech-to-text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(getSetting('voice_input') == 1): ?>
    <script src="<?php echo e(asset('backend/js/speechRecognition.js')); ?>"></script>
<?php endif; ?>
<script type="text/javascript">
    $(function () {
        let dateInterval = getQueryParameter('date_filter');
        let start = moment().startOf('isoWeek');
        let end = moment().endOf('isoWeek');
        if (dateInterval) {
            dateInterval = dateInterval.split(' - ');
            start = dateInterval[0];
            end = dateInterval[1];
        }
        $('#date_filter').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "alwaysShowCalendars": true,
            startDate: start,
            endDate: end,
            locale: {
                format: 'YYYY-MM-DD',
                firstDay: 1,
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
            }
        });
    });
    function getQueryParameter(name) {
        const url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text).then(function() {
            console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
            console.error('Async: Could not copy text: ', err);
        });
    }
</script>


<script>    
    function menuSearch(){
        var filter, item;
        filter = $("#menu-search").val().trim().toLowerCase();
        items = $("#main-menu-navigation").find("a");
        items = items.filter(function(i,item){
            if($(item).html().trim().toLowerCase().indexOf(filter) > -1  && $(item).attr('href') !== '#'){
                return item;
            }
        });
        if(filter !== ''){
            $("#main-menu-navigation").addClass('d-none');
            $("#search-menu-navigation").html('')
            if(items.length > 0){
                for (i = 0; i < items.length; i++) {
                    const text = $(items)[i].innerText;
                    const link = $(items[i]).attr('href');
                    $("#search-menu-navigation").append(`<div class="nav-item"><a href="${link}" class="a-item"><i class="ik ik-more-horizontal"></i><span>${text}</span></a></li`);
                }
            }else{
                $("#search-menu-navigation").html(`<div class="nav-item"><h6	class="text-center text-muted d-block"><?php echo e(__(':(')); ?></h6></div>`);
            }
        }else{
            $("#main-menu-navigation").removeClass('d-none');
            $("#search-menu-navigation").html('')
        }
    }  
    
</script>

<script src="<?php echo e(asset('backend/dist/js/theme.js')); ?>"></script>



<?php if(session('success')): ?>
<script>
    $.toast({
      heading: 'SUCCESS',
      text: "<?php echo e(session('success')); ?>",
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#f96868',
      position: 'top-right'
    });
</script>
<?php endif; ?>


<?php if(session('error')): ?>
<script>
    $.toast({
      heading: 'ERROR',
      text: "<?php echo e(session('error')); ?>",
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#f2a654',
      position: 'top-right'
    });
</script>
<?php endif; ?>
<script>
    $(document).on('click','.delete-item',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var msg = $(this).data('msg') ?? "You won't be able to revert back!";
        $.confirm({
            draggable: true,
            title: 'Are You Sure!',
            content: msg,
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){
                            window.location.href = url;
                    }
                },
                close: function () {
                }
            }
        });
    });
</script>

<!-- Stack array for including inline js or scripts -->
<?php echo $__env->yieldPushContent('script'); ?>


<?php echo getSetting('plugin_script'); ?><?php /**PATH D:\wamp\www\projects\rrct\core\resources\views/backend/include/script.blade.php ENDPATH**/ ?>