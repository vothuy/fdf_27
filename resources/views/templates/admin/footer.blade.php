</div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="/">{{ trans('label.the project is coded by Thuy-OpenFramgia') }}</a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="">Thúy</a>
            </div>
        </div>
    </footer>
</div>        
</div>
{{ Html::script('/bower_components/jquery/dist/jquery.min.js') }}
{{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ Html::script('/bower_components/metisMenu/dist/metisMenu.min.js') }}
{{ Html::script('/bower_components/bootstrap/dist/js/sb-admin-2.js') }}
{{ Html::script('/bower_components/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
</body>
</html>
