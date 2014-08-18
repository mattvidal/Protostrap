    <!-- ADD ADDITIONAL FILES AT THE BOTTOM OF THE PAGE -->

    <script type="text/javascript">
        (function(document,navigator,standalone) {
            // prevents links from apps from oppening in mobile safari
            // this javascript must be the first script in your <head>
            if ((standalone in navigator) && navigator[standalone]) {
                var curnode, location=document.location, stop=/^(a|html)$/i;
                document.addEventListener('click', function(e) {
                    curnode=e.target;
                    while (!(stop).test(curnode.nodeName)) {
                        curnode=curnode.parentNode;
                    }
                    // Condidions to do this only on links to your own app
                    // if you want all links, use if('href' in curnode) instead.
                    // if('href' in curnode && ( curnode.href.indexOf('http') || ~curnode.href.indexOf(location.host) ) ) {
                    // Note by Memi Beltrame: I added the part after && to make sure this is only executed when the actual page is changed
                    if('href' in curnode && curnode.host+curnode.pathname != location.host+location.pathname)  {
                        e.preventDefault();
                        location.href = curnode.href;
                    }
                },false);
            }
        })(document,window.navigator,'standalone');
    </script>
    <!-- TO DO :
        Minify iscroll, datepicker, bootstrap-switch
        -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Typeahead -->
    <script >
        <?php include("./assets/js/bootstrap-typeahead.min.js");?>
    </script>
    <script>
        $(function(){
            init_typeahead();
        })
    </script>

    <!-- Datepicker -->
    <script >  <?php include("./assets/js/bootstrap-datepicker.min.js");?> </script>

    <!-- Bootstrap Select -->
    <script >  <?php include("./assets/js/bootstrap-select.min.js");?> </script>
    <script>
        $(function(){
            init_select();
        })
    </script>
    <script src="./assets/js/bootstrap-fileupload.min.js"></script>
        <script>
    </script>
    <script src="./assets/js/bootstrap-switch.min.js"></script>
        <script>
    </script>
    <script src="./assets/js/jquery-sortable.min.js"></script>
        <script>
    </script>
    <script src="./assets/js/fastclick.min.js"></script>
    <script>
        $(function(){
        })
    </script>





    <!-- Protostrap -->
    <script src="./assets/js/protostrap.js?time=<?php time();?>"></script>
    <script>
        <!-- Inline Scripts that need PHP -->


    </script>
    <!-- ADD your other login to main.js -->
    <script src="./assets/js/main.js?time=<?php time();?>"></script>