<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="./public/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script src="./public/js/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product-table').DataTable({
            responsive: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#promotion-table').DataTable({
            responsive: true
        });
    });
</script>
<script>
        
        function testSth(ele)
        {
            var globalID;
            globalID = ele.id;
            
            document.cookie="cname="+globalID;
        }
           
</script>      
</body>

</html>