var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        //console.log('Dashboard Created');
        Template= new Template();
        Event   = new Event();
        //Result  = new Result();
        load_todo();
        load_note();
        load_posit();
        load_file();
        buscar_notas();
        
    };
    
    // ------------------------------------------------------------------------
    
    var load_todo = function() {
        $.get('api/get_todo',function(o){
            
            var cantidad = o.length;         
             var output='';

              if(cantidad > 0){

            for(var i=0 ; i<o.length; i++){
               output+= Template.todo(o[i]);
                                                          
            }
            
             $('#list_todo').html(output);

             }else{                
                 $('.ajax-loader-gray.loader-todo').hide();
                $('#no_todo').show();

            }

                              
        },'json');
    };
    
    // ------------------------------------------------------------------------
    
    var load_note = function() {
       
        $.get('api/get_note',function(o){
            var output='';
            var cantidad = o.length;

            if(cantidad > 0){

             for(var i=0 ; i<cantidad; i++){
               output+= Template.note(o[i]);               
            }
             
        $('#list_note').html(output);
         

            }else{
                $('.ajax-loader-gray.loader-notes').hide();    
                $('#no_notes').show();

            }

        },'json');


        
    };
    

    // ------------------------------------------------------------------------

    var buscar_notas = function(){

        $('#buscar_notas').keyup(function(){  

            if($('#no_notes').is(':visible')){
                return false;
            }

             $('.x-cancel-search').show();

             

             $('.x-cancel-search').on('click',function(){
                $('#buscar_notas').val('');
                load_note();
                $('.x-cancel-search').hide();
            });

                if($(this).val() == ""){
                $('.x-cancel-search').hide();
             }
             var url = $("form").attr('action');
             var postData =  $("form").serialize();

             $.post(url,postData,function(o){
                var output='';
                var cantidad = o.length;

                if(cantidad>0){
               
                for(var i=0 ; i<o.length; i++){
               output+= Template.note(o[i]);               
                }
             
              $('#list_note').html(output);

              }else{

                if(o.error !=""){
                Result.error(o.error);
                }

                $('#list_note').html('<br><br><h3 class="text-center" >Registro no encontrado</h3><br><br>');
              }
                

             },'json');




        });

    };


    // ------------------------------------------------------------------------
    
    var load_file = function() {
       
        $.get('api/listar_archivos',function(o){
            var output='';
            var cantidad = o.length;

         if(cantidad > 0){   
                               
             for(var i=0 ; i<o.length; i++){
               output+= Template.file(o[i]);               
            }
             
        $('#load_file').html(output);        
        $('#no_files').hide();

var script="https://www.dropbox.com/static/api/2/dropins.js";
var apikey ="qcc6s9ag82mgcv1";
id="dropboxjs";
//id="dropboxjs" data-app-key="qcc6s9ag82mgcv1"

//$("head").append('<script type="text/javascript"  src="' + script + '" ></script>');
//document.write("<script src=" + script + " id=" + id+ " data-app-key=" + apikey + "><" + "/script>");

var js = document.createElement("script");

js.type = "text/javascript";
js.src = script;
js.setAttribute("data-app-key",apikey);
js.id=id;


document.body.appendChild(js);


         }else{                
                $('#no_files').show();
            }


            $('.ajax-loader-gray_file').remove();

        },'json');
        
    };


    // ------------------------------------------------------------------------

        var load_posit = function() {
        $.get('api/get_posit',function(o){                        
               
             var output='';
             var cantidad = o.length;

            if(cantidad > 0){

            for(var i=0 ; i<o.length; i++){

               output+= Template.posit(o[i]);
                                                           
            }
            
        
             $('#posit').html(output);

             for(var i=0 ; i<o.length; i++){
             // console.log(o[i])   ; 
               $('#posit_'+ o[i].posit_id).html(o[i].content);       
            }


        // Contador             
             var optionstext0 = {
                        'maxCharacterSize': 140,
                        'originalStyle': 'originalTextareaInfo',
                        'warningStyle' : 'warningTextareaInfo',
                        'warningNumber': 40,
                        'displayFormat' : '#input/#max'
                };

                $( "ul#posit textarea" ).each(function(){
                    $(this).textareaCount(optionstext0);
                });  

      //hover de los posits
        
        $( "ul#posit li" ).hover(
            function() {
            $( this ).find( ".controlposit" ).css('display','block');
            }, function() {
            $( this ).find( ".controlposit" ).css('display','none');
            }
        );   


        //hover de color
         $( ".colorposit" ).hover(
            function() {
            $( this ).find( ".selcolor" ).css('display','block');
            }, function() {
            $( this ).find( ".selcolor" ).css('display','none');
            }
        );     

         }else{                
                $('#no_posit').show();
            }


                            
        },'json');
    };
    


    // ------------------------------------------------------------------------



    
    this.__construct();
    
};
