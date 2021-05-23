
<script type="text/javascript">
    function get_results(selected1,selected2,selected3)
    {
        if(typeof selected1 =='undefined')
            {
                var selected1='';
            }
        if(typeof selected2 =='undefined')
            {
                var selected2='';
            }
        if(typeof selected3 =='undefined')
        {
            var selected3='';
        }
        var subject_name=jQuery('#subject_search').val();
        var loc=jQuery('#locations').val();
        var plat=jQuery('#platforms').val();
        jQuery.ajax({
            url:'searching.php',
            type:'POST',
            data:{subject_name : subject_name, loc : loc, plat : plat ,selected1 : selected1,selected2 : selected2, selected3 : selected3},
            success:function(data){
                jQuery('#results').html(data);
            },
            error:function(){alert("wrong")},
        });
    }
    jQuery('select[name="subject_search"]').change(function(){
        get_results();});
    jQuery('select[name="locations"]').change(function(){
        get_results();});
    jQuery('select[name="platforms"]').change(function(){
        get_results();});
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>
</html>

