<html>
	

	<div class="container-fluid">
  
  
  
  <table class="table table-striped">
      <thead><tr><th>Col 1</th><th>Col 2</th><th>Col 3</th></tr></thead>
      <tbody>
      <tr>
      	<td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display left">cell</a></td>
      </tr>
       <tr>
      	<td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display left">cell</a></td>
      </tr>
       <tr>
      	<td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display left">cell</a></td>
      </tr>
       <tr>
      	<td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display left">cell</a></td>
      </tr>
       <tr>
      	<td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display left">cell</a></td>
      </tr>
       <tr>
      	<td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display text">cell</a></td>
        <td><a href="#" title="pop display left">cell</a></td>
      </tr>
      </tbody>
  </table>
  
  <div id="contenido">
  <p>
  Prueba desde html <b>Content</b>
  </p>
  </div>
  
  
</div>

<style type="text/css">
	.popover-title{
  cursor:move;
}
</style>

<script type="text/javascript">
	$(".table td a").popover({ 
    html: true,
    content: function(){ return $('#contenido').html()},
    placement: function(pop,ele){
        if($(ele).parent().is('td:last-child')){
        return 'left'
        }else{
        return 'bottom'
        }
    }
});



    $('body').on('mousedown', '.popover', function() {
        $('.arrow').css('display','none');
        $(this).addClass('draggable').parents().on('mousemove', function(e) {
            $('.draggable').offset({
                top: e.pageY - $('.draggable').outerHeight() / 2,
                left: e.pageX - $('.draggable').outerWidth() / 2
            }).on('mouseup', function() {
                $(this).removeClass('draggable');
            });
        });
        e.preventDefault();
    }).on('mouseup', function() {
        $('.draggable').removeClass('draggable');
    });
    
    
    


</script>

</html>