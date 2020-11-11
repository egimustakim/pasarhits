    //get 2 category
    $('#category').on('change', function(e){
        console.log(e);
        var parent_id = e.target.value;
        $.get('/rlaadmin/json-category?parent_id=' + parent_id,function(data){
            console.log(data);
            $('#category2').empty();
            $('#category2').append('<option>Choose Category</option>');
            $.each(data, function(index, category2Obj){
                $('#category2').append('<option value="'+ category2Obj.id +'">'+ category2Obj.name +'</option>')
            })
        });
    });

    // get 3 category
    $('#category2').on('change', function(e){
        console.log(e);
        var parent_id = e.target.value;
        $.get('/rlaadmin/json-category?parent_id=' + parent_id,function(data){
            console.log(data);
            $('#category3').empty();
            $('#category3').append('<option>Choose Category</option>');
            $.each(data, function(index, category3Obj){
                $('#category3').append('<option value="'+ category3Obj.id +'">'+ category3Obj.name +'</option>')
            })
        });
    });

    // image upload
    $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-upload">Browse<input type="file" class="uploadFile img" name="imgupload[]" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del" , function() {
        $(this).parent().remove();
    });
    $(function() {
        $(document).on("change",".uploadFile", function()
        {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
            }

        });
    });

   // add size & stock field input

    $(document).ready(function() {
        //get clone of first selectbox
        var slects = $('.outers').find("select").clone();
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="fieldExtra"><div class="form-group"><label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>'

        fieldHTML += '<div class="col-md-2 col-sm-2 col-xs-12"><select class="form-control" name="size[]" id="size[]" required>"' + $(slects).html() + '"</select></div>' //add same to selct-box
        fieldHTML += '<div class="col-md-2 col-sm-2 col-xs-12"><input type="text" class="form-control" name="stock[]" id="stock" placeholder="10" required></div><div class="col-md-2 col-sm-2 col-xs-12"><a href="javascript:void(0);" class="remove_button"><span class="glyphicon glyphicon-minus grey" aria-hidden="true" style="font-size:20px"></span></a></div></div><!-- form-group --></div>'; //New input field html
        var x = 1;

        //Once add button is clicked
        $(addButton).click(function() {
          if (x < maxField) {
            x++;
            $(wrapper).append(fieldHTML);
          }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
          e.preventDefault();
          $(this).closest(".fieldExtra").remove(); //get closest fieldExtra remove that
          x--;
        });
    });
