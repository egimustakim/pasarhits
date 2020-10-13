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
    // end form image upload
