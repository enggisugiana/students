<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; <?= date("Y"); ?> <div class="bullet"></div> Telkomsigma
    </div>
    <div class="footer-right">
        1.0.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/js/stisla.js'); ?>"></script>



<!-- Template JS File -->
<script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>

<!-- Page Specific JS File -->


<!-- JS Libraies -->
<script src="<?= base_url('assets/modules/chart.js/dist/Chart.min.js'); ?>"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<!-- <script src="<?= base_url('assets/modules/datatables/media/js/jquery.dataTables.min.js'); ?>"></script> -->
<script src="<?= base_url('assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/modules/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('assets/modules/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/modules/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
<script src="<?= base_url('assets/modules/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('assets/modules/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js'); ?>"></script>
<!-- Page Specific JS File -->
<!-- <script src="<?= base_url('assets/js/page/modules-chartjs.js'); ?>"></script> -->
<script src="<?= base_url('assets/js/page/modules-datatables.js'); ?>"></script>

<script type="text/javascript">
    var value = <?php print_r(json_encode($r_st_by_camp))?>;
    // console.log(value);
    var val = [];

    for (let i = 0; i < value.length; i++) {
        // const element = array[index];
        val.push(value[i]['nama']);
    }
    // console.log(value[0].nama);
    
    var temp = [];
    var count = 0;

    for(let i = 0; i < val.length; i++){
        // console.log(val[i]);
        for(let x = 0; x < value.length; x++){
            if(val[0] == value[x]['nama']){
                count++;
            }
        }
    }
    console.log(count);

    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [80,50,40,30,20,],
            backgroundColor: [
                '#191d21',
                '#63ed7a',
                '#ffa426',
                '#fc544b',
                '#6777ef',
            ],
            label: 'Students by Region'
        }],
        labels: val,
    },
    options: {
        responsive: true,
        legend: {
        position: 'bottom',
        },
    }
    });

    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [80,50,40,30,20,],
            backgroundColor: [
                '#191d21',
                '#63ed7a',
                '#ffa426',
                '#fc544b',
                '#6777ef',
            ],
            label: 'Students by Region'
        }],
        labels: ['A','B','C','D','E'],
    },
    options: {
        responsive: true,
        legend: {
        position: 'bottom',
        },
    }
    });
</script>
</body>

</html>