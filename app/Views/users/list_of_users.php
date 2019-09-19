<?= $this->extend("layout/$default_template/index") ?>

<?= $this->section('page_title') ?>
    <h3><i class="fa fa-users"></i> List of Users</h3>
<?= $this->endSection() ?>

<?= $this->section('js_script') ?>
    <?= script_tag('node_modules/datatables.net/js/jquery.dataTables.min.js') ?>
    <script>
        $(function() {
            $('#example').DataTable({
                "ajax": '<?= site_url('users') ?>',
                "columns": [
                    {data: 'name'},
                    {data: 'position'},
                    {data: 'office'},
                    {data: 'extn'},
                    {data: 'start_date'},
                    {data: 'salary'},
                ]
            });
        })
    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <table id="datatable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
<?= $this->endSection() ?>
